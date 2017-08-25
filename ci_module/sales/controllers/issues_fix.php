<?php

class SalesIssuesFix {
    function __construct() {
        $this->db = get_instance()->db;

    }

    function index(){
        $this->restore_customer_invoice();
        die('sales/issues-fix =>index');
    }

    function restore_customer_invoice($restore = false){
        if( !isset($this->backDB) ){
            $restore = false;
        }


        $this->db->where('gl.type_no >0')->where('ABS(gl.amount) > 0');
        $this->db->where_in('gl.type',array(ST_SALESINVOICE,ST_SUPPINVOICE));
        $this->db->from('gl_trans AS gl');

        $check_debtor_tran_exist = "SELECT COUNT(*) FROM debtor_trans AS deb WHERE deb.trans_no=gl.type_no AND deb.type=gl.type AND deb.ov_amount <>0";
        $check_supp_tran_exist = "SELECT COUNT(*) FROM supp_trans AS supp WHERE supp.trans_no=gl.type_no AND supp.type=gl.type";
        $check_exist = "CASE gl.type"
            ." when ".ST_SALESINVOICE." then ($check_debtor_tran_exist) "
            ." when ".ST_SUPPINVOICE." then ($check_supp_tran_exist)"
            ." ELSE 0 END"
                ;

        $this->db->select("($check_exist) AS tran_exist",false);
        $this->db->having('(tran_exist < 1)');

        $this->db->select("(SELECT count(v.id) FROM voided AS v WHERE v.type=gl.type AND v.id=gl.type_no) AS voided",false);
        $this->db->having('voided < 1');


        $this->db->select('gl.*');
        $query = $this->db->get();
        if( !is_object($query) ){
            bug( $this->db->last_query() );die;
        }
        if( !$restore ){
            bug('transaciont count = ' . $query->num_rows());
            bug($query->result());
            die();
        }
        $trans_lost = array();
        if ($query->num_rows() > 0)
            foreach ($query->result() as $tran) {
                switch ($tran->type) {
                    case ST_SALESINVOICE:
                        $data_current = $this->db->where(array(
                            'type' => $tran->type,
                            'trans_no' => $tran->type_no
                        ))
                            ->get('debtor_trans')
                            ->row();

                        if (empty($data_current)) {

                            $data_old = $this->backDB->where(array(
                                'type' => $tran->type,
                                'trans_no' => $tran->type_no
                            ))
                                ->get('debtor_trans')
                                ->row_array();
                            $trans_lost[] = $data_old;
                            $this->db->insert('debtor_trans', $data_old);
                        }
                        break;
                    case ST_SUPPINVOICE:

                        $data_current = $this->db->where(array(
                            'type' => $tran->type,
                            'trans_no' => $tran->type_no
                        ))
                            ->get('supp_trans')
                            ->row();
                        if (empty($data_current)) {
                            $data_old = $this->backDB->where(array(
                                'type' => $tran->type,
                                'trans_no' => $tran->type_no
                            ))
                                ->get('debtor_trans')
                                ->row_array();
                            $payment_lost[] = $data_old;
                        //                         $this->db->insert('debtor_trans',$data_old);
                    }
                    break;
                default :
                    break;
            }
        }

        bug($trans_lost);die;
    }

    function restore_customer_payment($restore = false){
        if( !isset($this->backDB) ){
            $restore = false;
        }


//         $this->db->where('gl.type_no >0')->where('ABS(gl.amount) > 0');
//         $this->db->where_in('gl.type',array(ST_CUSTPAYMENT));
        $this->db->from('bank_trans AS bank')
            ->select('bank.*')
            ->where_in('bank.type',array(ST_CUSTPAYMENT))
            ->where('ABS(bank.amount) > 0')
            ->join('debtor_trans AS tran','tran.trans_no = bank.trans_no AND tran.type = bank.type','LEFT')
            ->group_by('bank.id, bank.type, bank.trans_no')
            ->select('tran.trans_no AS debtor_tran_no')
            ->having('debtor_tran_no IS NULL')
            ;
        $this->db->select("(SELECT count(v.id) FROM voided AS v WHERE v.type=bank.type AND v.id=bank.trans_no) AS voided",false)
            ->having('voided < 1');


        $query = $this->db->order_by('bank.trans_no ASC')->get();

        if( !$restore ){
            bug('transaciont count = '.$query->num_rows());
            bug($query->result());
            die;
        }




        $trans_lost = array();
        if( $query->num_rows() > 0 ) foreach ($query->result() AS $tran){

            switch ($tran->type){
                case ST_CUSTPAYMENT:
                    $data_current = $this->db->where(array('type'=>$tran->type,'trans_no'=>$tran->trans_no))->get('debtor_trans')->row();

                    if( empty($data_current) ){

                        $data_old = $this->backDB->where(array('type'=>$tran->type,'trans_no'=>$tran->trans_no))->get('debtor_trans')->row_array();
                        $trans_lost[] = $data_old;
                        $this->db->insert('debtor_trans',$data_old);
                    }

                    $gl_where = array('type'=>$tran->type,'type_no'=>$tran->trans_no);

                    $this->db->where($gl_where)->update('gl_trans',array('amount'=>0));

                    $data_gl_old_query = $this->backDB->where($gl_where)->get('gl_trans');
                    if( $data_gl_old_query->num_rows() > 0 ) foreach ($data_gl_old_query->result_array() AS $gl_row){
                        $this->db->insert('gl_trans',$gl_row);
                    }
// bug($tran);die;
                    break;
//                 case ST_SUPPINVOICE:

//                     $data_current = $this->db->where(array('type'=>$tran->type,'trans_no'=>$tran->type_no))->get('supp_trans')->row();
//                     if( empty($data_current) ){
//                         $data_old = $this->backDB->where(array('type'=>$tran->type,'trans_no'=>$tran->type_no))->get('debtor_trans')->row_array();
//                         $payment_lost[] = $data_old;
//                         //                         $this->db->insert('debtor_trans',$data_old);
//                     }
//                     break;
                default :  break;
            }
        }

                bug($trans_lost);die;
    }

    function credit_note($restore = false){
        if( !isset($this->backDB) ){
            $restore = false;
        }
    }
}
?>