<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BackupRecovery {
    function __construct() {
        $this->db = get_instance()->db;
        $this->input = get_instance()->input;
        $this->backDB = get_instance()->load_db(array('dbname'=>'at_avdiscovery_160801'),false,true);
    }

    function from_gl(){

        $trans = $this->get_trans_from_backup();

        if( count($trans) >0 ) foreach ($trans AS $tran){
            switch ($tran->type){
                case ST_SALESINVOICE:
                    $this->restore_sale_invoice($tran->type_no,ST_SALESINVOICE);
                    break;
                default:break;
            }

        }
        die('recovery from GL');
    }

    private function get_oldest_id(){
        $this->db->select('gl.counter, gl.type,gl.type_no')->from('gl_trans AS gl');
        $this->db->where("ABS(gl.amount) > 0");

        $this->db->join('voided AS v','v.type=gl.type AND v.id=gl.type_no','LEFT')
        ->where('v.id IS NULL')
        ;
        $query = $this->db->order_by('gl.counter ASC')->get();

        if( !is_object($query) ){
            bug($this->db->last_query());
        } else {
            return $query->row()->counter;
        }
    }

    private function get_trans_from_backup(){
        $gl_tran_oldest_id = $this->get_oldest_id();

        $this->backDB->select('gl.counter, gl.type,gl.type_no')->from('gl_trans AS gl');
        $this->backDB->where("ABS(gl.amount) > 0");
        $this->backDB->where("gl.counter < $gl_tran_oldest_id");

        $this->backDB->join('voided AS v','v.type=gl.type AND v.id=gl.type_no','LEFT')
        ->where('v.id IS NULL');

        $query = $this->backDB->group_by('gl.type,gl.type_no')->order_by('gl.counter DESC')->get();

        if( !is_object($query) ){
            bug($this->backDB->last_query());
        } else {
            return $query->result();
        }
    }

    function restore_sale_invoice($tran_no=0,$tran_type=ST_SALESINVOICE){
        /*
         * Check and insert Header
         */
        $this->backDB->select('tran.*')->from('debtor_trans AS tran');
        $this->backDB->where(array('tran.trans_no'=>$tran_no,'tran.type'=>$tran_type));
        $this->backDB->where("(tran.ov_amount <> 0)");
        $this->backDB->join('voided AS v','v.type=tran.type AND v.id=tran.trans_no','LEFT')
        ->where('v.id IS NULL');

        $row = $this->backDB->get();
        if( $row->num_rows() == 1  ){
            $this->db->select('tran.*')->from('debtor_trans AS tran');
            $this->db->where(array('tran.trans_no'=>$tran_no,'tran.type'=>$tran_type));
            $this->db->join('voided AS v','v.type=tran.type AND v.id=tran.trans_no','LEFT')
            ->where('v.id IS NULL');
            $row_current = $this->db->get();
            if( $row_current->num_rows() < 1  ){
                $this->db->insert('debtor_trans',$row->row_array());
            }
        }

        /*
         * Check & insert detail
         */
        $this->backDB->select('*')->from('debtor_trans_details');
        $this->backDB->where(array('debtor_trans_no'=>$tran_no,'debtor_trans_type'=>$tran_type));
        $rows_detail = $this->backDB->get();
        if( $rows_detail->num_rows() > 0  ) foreach ($rows_detail->result() AS $detail){
            $this->db->where('id',$detail->id)->delete('debtor_trans_details');
            $this->db->insert('debtor_trans_details',(array)$detail);
        }

        /*
         * check & insert GL trans
         */
        $this->backDB->select('*')->from('gl_trans');
        $this->backDB->where(array('type_no'=>$tran_no,'type'=>$tran_type));

        $rows_gl = $this->backDB->get();
        if( $rows_gl->num_rows() > 0  ) foreach ($rows_gl->result() AS $gl){
            $this->db->where('counter',$gl->counter)->delete('gl_trans');
            $this->db->insert('gl_trans',(array)$gl);
        }



    }
}