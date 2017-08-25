<?php
class GlInquiryAccount  {
    function __construct() {
        $this->db = get_instance()->db;
        $this->trans_model = module_model_load('trans','gl');
        $this->void_model = module_model_load('tran','void');

        $this->filters = array(
            'account' => array('type'=>'gl_acc','title'=>'Account','value'=>0 ),
            'date_from' => array('type'=>'date','title'=>'From','value'=>'' ),
            'date_to' => array('type'=>'date','title'=>'To','value'=>'' ),
            'amount_min'=> array('type'=>'number','title'=>'Amount min','value'=>'' ),
            'amount_max'=> array('type'=>'number','title'=>'Amount max','value'=>'' ),
            'check_incorrect'=> array('type'=>'check','title'=>'','value'=>false ),
        );

        $this->filters['check_incorrect']['value'] = true;
//         $this->filters['account']['value'] = 1070;
//         $this->filters['date_from']['value'] = '01-04-2016'; //begin_month()
//         $this->filters['date_to']['value'] = '30-04-2016'; //begin_month()
        $this->check = (input_val('check_incorrect'));
    }


    function index(){
        if( $this->check ){
            $this->datatable_headers['tran_exist'] = array(NULL,'center',5,'memo_get');
        }


//         add_js('js/table.js');
        page("General Ledger Inquiry");
        $this->filter_input();

        global $Ajax;
        $Ajax->activate('trans_tbl');

        div_start("trans_tbl");
        module_view("inquiry/gl_account_inquiry",array(
            'table'=>$this->datatable_headers,
            'items'=>$this->get_trans(),
            'date_from'=>sql2date($this->filters['date_from']['value']),
            'date_to'=>sql2date($this->filters['date_to']['value']),
            'balance_open'=>$this->get_opening()
        ));
        div_end();
        end_page();
    }

    private function filter_input(){

        if( input_post('SUBMIT') ){
            foreach ($this->filters AS $k=>$f){
                $this->filters[$k]['value'] = input_post($k);
            }
        } else {
            if( empty($this->filters['date_from']['value']) ){
                $this->filters['date_from']['value'] = begin_month();
            }

            if( empty($this->filters['date_to']['value']) ){
                $this->filters['date_to']['value'] = end_month();
            }
        }

        start_form();
        module_view('inquiry/gl_account_inquiry_filter',$this->filters);
        end_form();
    }

    var $datatable_headers = array(
        'type'=>array('Type','left',15,'trans_type'),
        'type_no'=>array('#','center',7),
        'tran_date'=>array('Date','center',9,'date'),
        'item'=>array('Person/Item','left',24),
        'debit'=>array('Debit','right',10,'number'),
        'credit'=>array('Credit','right',10,'number'),
        'balance'=>array('Balance','right',10,'number'),
        'memo'=>array('Memo','left',15,'memo_get'),
    );


    private function get_trans(){
        $account = $this->filters['account']['value'];
        $date_from = $this->filters['date_from']['value'];
        $date_to = $this->filters['date_to']['value'];
        $dimension = $dimension2 = 0;
        $amount_min = $amount_max = 0;

        if( !$account ) return NULL;

        if( $this->check ){
            $check_bank_tran_exist = "SELECT COUNT(*) FROM bank_trans AS bank WHERE bank.trans_no=gl.type_no AND bank.type=gl.type AND bank.amount <>0";
            $check_sales_tran_exist = "SELECT COUNT(*) FROM debtor_trans AS sale WHERE sale.trans_no=gl.type_no AND sale.type=gl.type AND  (sale.ov_amount <>0 OR sale.ov_freight <> 0)";

            $check_exist = "CASE gl.type"

                ." when ".ST_BANKPAYMENT." then ($check_bank_tran_exist)"
                ." when ".ST_BANKDEPOSIT." then ($check_bank_tran_exist)"
                ." when ".ST_BANKTRANSFER." then ($check_bank_tran_exist)"

                ." when ".ST_CUSTPAYMENT." then ($check_bank_tran_exist)"
                ." when ".ST_SUPPAYMENT." then ($check_bank_tran_exist)"

                ." when ".ST_SALESINVOICE." then ($check_sales_tran_exist)"
//                 ." when ".ST_SUPPAYMENT." then ($check_bank_tran_exist)"
                ." ELSE 0 END"
                ;
            $this->db->select("$check_exist AS tran_exist",false);

            $this->db->having('(tran_exist <> 1 AND gl.type <> '.ST_BANKTRANSFER.')');

        }


        $this->db->select('gl.*')->from('gl_trans AS gl');
        $this->db->where('gl.amount <>',0);

        $this->void_model->not_voided('gl.type','gl.type_no');


        if ($account != null){
            $this->db->where('gl.account',$account);
        }
        $this->db->select("IF(gl.amount >0,gl.amount,0) AS debit",false);
        $this->db->select("IF(gl.amount <0,-gl.amount,0) AS credit",false);


        if( is_date($date_from) ){
            $this->db->where('gl.tran_date >=',date2sql($date_from));
        }
        if( is_date($date_to) ){
            $this->db->where('gl.tran_date <=',date2sql($date_to));
        }

        $this->db->left_join('chart_master AS chart',"chart.account_code=gl.account")->select("chart.account_name");

        if ($dimension != 0){
            $this->db->where('gl.dimension_id', $dimension<0 ? 0: $dimension );
        }
        if ($dimension2 != 0) {
            $this->db->where('gl.dimension2_id', $dimension2<0 ? 0: $dimension2 );
        }
//         if ($filter_type != null AND is_numeric($filter_type)) {
//             $this->db->where('gl.type', $filter_type);
//         }
        if ($amount_min != null) {
            $this->db->where('ABS(gl.amount) >=', abs($amount_min) );
        }
        if ($amount_max != null) {
            $this->db->where('ABS(gl.amount) <=', abs($amount_max) );
        }
//         $this->db->where('gl.type <>',ST_BANKTRANSFER);
//         $this->db->where("gl.type",ST_SALESINVOICE);
//         $this->db->where_not_in("gl.type",array(ST_JOURNAL,ST_OPENING_CUSTOMER));
        $data = $this->db->order_by("gl.tran_date, gl.counter")->get();

        if( !is_object($data) ){
            display_error('The transactions for could not be retrieved');
            return false;
        } else {
            return $data->result();
        }
    }

    private function get_opening(){
        $gl_account = $this->filters['account']['value'];


        $this->db->select("SUM(amount) AS amount",false);
        $this->db->where('account',$gl_account);
        $this->db->where("tran_date < ",date2sql( $this->filters['date_from']['value']) );

        $result = $this->db->get('gl_trans');
        if( !is_object($result) ){
            check_db_error("The starting balance for account $gl_account could not be calculated", $this->db->last_query());
        } else {
            $data = $result->row();
            return (is_object($data) AND isset($data->amount) ) ? $data->amount : 0;
        }
    }
}