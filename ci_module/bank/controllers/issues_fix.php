<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BankIssuesFix {
    function __construct() {
        $ci = get_instance();

        $this->db = $ci->db;
        $this->gl_trans_model = module_model_load('trans','gl');
        $this->bank_trans_model = module_model_load('trans','bank');
    }

    function index(){

        $this->bank_tran();
//         $this->customer_supplier_payment(FALSE);
    }
    /*
     * 20161018
     * QuanNH add
     */
    private function check_bankpayment_lost_header(){
        return ;
        $this->db->select('gl.*')->from('gl_trans AS gl');

        $this->db->where('ABS(gl.amount) > 0');
        $this->db->left_join('bank_trans AS b','b.type=gl.type AND b.trans_no=gl.type_no');
        $this->db->select('b.trans_no');
        $this->db->where('b.trans_no IS NULL');

        $this->db->where('gl.account',1065);
        $this->db->where('gl.type',ST_BANKDEPOSIT);

        $result = $this->db->get();


        if( $result->num_rows() > 0 ) foreach ($result->result() AS $tran){

            $tran_reinsert = array(
                'type'=>$tran->type,
                'trans_no'=>$tran->type_no,
                'tax_inclusive'=>0,
                'ref'=>ref_get($tran->type,$tran->type_no),
                'trans_date'=>$tran->tran_date,
                'dimension_id'=>$tran->dimension_id,
                'dimension2_id'=>$tran->dimension2_id,

                'person_type_id'=>$tran->person_type_id,
                'person_id'=>$tran->person_id,
                'amount' =>$tran->amount,
                'bank_act'=>2

            );

            $this->db->insert('bank_trans',$tran_reinsert);
        }

    }

    /*
     * 20161018
     * QuanNH add
     */
    function check_bank_duplicate(){
        $this->db->select('type, trans_no, COUNT(id) AS duplicate');
        $this->db->where('amount <> 0');
        $this->db->where_in('type',array(ST_BANKDEPOSIT,ST_BANKPAYMENT));
        $this->db->having("COUNT(*) > 1",false);
        $this->db->group_by('type, trans_no');
        $result = $this->db->get('bank_trans');

        if( is_object($result) && $result->num_rows() > 0 ){
            foreach ($result->result() AS $tran){
                $gl_trans = $this->gl_trans_model->get_gl_trans($tran->type,$tran->trans_no);
                if( count($gl_trans) > 3){
                    bug($gl_trans);
                    die;
                } else {
                    $bank_trans = $this->bank_trans_model->get_bank_trans($tran->type,$tran->trans_no);
                }

            }

        }
    }

    function customer_supplier_payment($restore = false){

        if( !isset($this->backDB) ){
            $restore = false;
        }


        $this->db->where('bank.trans_no >0');
        $this->db->where_in('bank.type',array(ST_CUSTPAYMENT,ST_SUPPAYMENT));
        $this->db->from('bank_trans AS bank');

        $check_debtor_tran_exist = "SELECT COUNT(*) FROM debtor_trans AS deb WHERE deb.trans_no=bank.trans_no AND deb.type=bank.type";
        $check_supp_tran_exist = "SELECT COUNT(*) FROM supp_trans AS supp WHERE supp.trans_no=bank.trans_no AND supp.type=bank.type";

        $check_exist = "CASE bank.type"
            ." when ".ST_CUSTPAYMENT." then ($check_debtor_tran_exist) "
            ." when ".ST_SUPPAYMENT." then ($check_supp_tran_exist)"
            ." ELSE 0 END"
                ;
        $this->db->select("($check_exist) AS tran_exist",false);

        $this->db->select("(SELECT SUM(gl.amount) FROM gl_trans AS gl WHERE gl.type=bank.type AND gl.type_no=bank.trans_no) AS gl_sum",false);
        $this->db->select("(SELECT COUNT(*) FROM gl_trans AS gl_count WHERE gl_count.type=bank.type AND gl_count.type_no=bank.trans_no) AS gl_count",false);
        $this->db->having('(tran_exist < 1 OR ABS(gl_sum) <> 0 OR gl_count < 1)');


        $this->db->select("(SELECT count(v.id) FROM voided AS v WHERE v.type=bank.type AND v.id=bank.trans_no) AS voided",false);
        $this->db->having('voided < 1');
        $this->db->select('bank.*')->order_by("bank.trans_date ASC");


        $query = $this->db->get();
//                 bug( $this->db->last_query() );die;
        $payment_lost = array();
        if( !$restore ){
            bug('transaciont count = '.$query->num_rows());
            bug($query->result());
            die;
        }
//         bug($query->result());
// die('do restore');
        if( $query->num_rows() > 0 ) foreach ($query->result() AS $tran){

            switch ($tran->type){
                case ST_CUSTPAYMENT:
                    if( $tran->tran_exist < 1 ){
                        $data_current = $this->db->where(array('type'=>$tran->type,'trans_no'=>$tran->trans_no))->get('debtor_trans')->row();

                        if( empty($data_current) ){

                            $data_old = $this->backDB->where(array('type'=>$tran->type,'trans_no'=>$tran->trans_no))->get('debtor_trans')->row_array();
                            $payment_lost[] = $data_old;
                            $this->db->insert('debtor_trans',$data_old);
                        }
                    } elseif ( ABS($tran->gl_sum) > 0 ){

                        $data_gl_old = $this->backDB->where(array('type'=>$tran->type,'type_no'=>$tran->trans_no))->get('gl_trans');

                        if( is_object($data_gl_old) AND get_class($data_gl_old)=='CI_DB_mysql_result' ){
                            foreach ($data_gl_old->result() AS $gl_old){
                                $gl_current = $this->db->where('counter',$gl_old->counter)->get('gl_trans');

                                if( is_object($gl_current) AND get_class($gl_current)=='CI_DB_mysql_result' AND $gl_current->num_rows() < 1){
                                    $this->db->insert('gl_trans',$gl_old);
                                }
                            }
                        }
//                         bug($tran);
//                         bug($data_gl_old);die;
//                         die('restore gl trans');
                    }

                    break;
                case ST_SUPPAYMENT:

                    $data_current = $this->db->where(array('type'=>$tran->type,'trans_no'=>$tran->trans_no))->get('supp_trans')->row();
                    if( empty($data_current) ){
                        $data_old = $this->backDB->where(array('type'=>$tran->type,'trans_no'=>$tran->trans_no))->get('debtor_trans')->row_array();
                        $payment_lost[] = $data_old;
//                         $this->db->insert('debtor_trans',$data_old);
                    }
                    break;
                default: break;

            }

        }

        bug($payment_lost);die;
    }

    private function bank_tran(){
        $dec = user_amount_dec();
        $this->db->from('bank_accounts AS bank, sys_prefs AS sys')->select('bank.*');
        $this->db->where('sys.name','curr_default');
        $this->db->where("sys.value <> bank.bank_curr_code");
        $query = $this->db->get();

        if($query->num_rows() > 0) foreach ($query->result() AS $bank){
            $this->db->from('bank_trans AS tran')
                ->where('tran.bank_act',$bank->id)
                ->where('ABS(tran.amount) >',0)
            ;

            $this->db->where_in('tran.type',array(ST_BANKPAYMENT,ST_BANKDEPOSIT));
            $this->db->select('tran.*');
            $this->db->left_join('gl_trans AS gl','gl.type = tran.type AND gl.type_no= tran.trans_no AND gl.account='.$bank->account_code)
                    ->select('gl.amount AS gl_amount');

            $this->db->left_join('exchange_rates AS ec',"ec.date_=tran.trans_date")
                ->where('ec.curr_code',$bank->bank_curr_code)
                ->select('ec.rate_buy')
                ->select("ROUND(ec.rate_buy*tran.amount,$dec) AS amount_exchanged",false)
            ;
            $this->db->having("ABS(amount_exchanged) <> ABS(gl_amount)");

            $query = $this->db->get();
            bug($this->db->last_query());
            bug($query->row());
            die;
        }

    }
}