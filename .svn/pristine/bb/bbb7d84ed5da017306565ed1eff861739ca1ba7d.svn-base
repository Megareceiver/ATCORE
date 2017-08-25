<?php
class Sales_Trans_Model extends CI_Model {
    function __construct(){
        parent::__construct();
    }

    function get_tran($tran_type,$tran_no){
        $result = $this->db->where(array('trans_no'=>$tran_no, 'type'=>$tran_type))->get('debtor_trans');

        if( !is_object($result) ){
            check_db_error("can not get tran detail", $this->db->last_query() );
            return FALSE;
        }
        $data = $result->row();
        $data->branch_detail = $this->db->where(array('branch_code'=>$data->branch_code))->get('cust_branch')->row();
        return $data;
    }

}