<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SupplierInquiryBalance  extends ci {

    function __construct(){
        $this->db = get_instance()->db;
    }

    function index(){
        return $this->ledger_check();
    }
    /*
     * Ledger check
     */

    var $datatable_headers = array(
        'type'=>array('Type','left',15,'trans_type'),
        'type_no'=>array('#','center',7),
        'supp_reference'=>array('Supp Ref','left',7),
        'tran_date'=>array('Date','center',9,'date'),
//         'item'=>array('Person/Item','left',24),
        'debit'=>array('Debit','right',10,'number'),
        'credit'=>array('Credit','right',10,'number'),
        'balance'=>array('Balance','right',10,'number'),

    );

    function ledger_check(){

        page("General Ledger Inquiry");
        $this->filter_input();

        global $Ajax;
        $Ajax->activate('trans_tbl');

        div_start("trans_tbl");
        module_view("inquiry/ledger_check",array(
            'table'=>$this->datatable_headers,
            'suppliers'=>$this->get_trans(),
            'date_from'=>sql2date($this->filters['date_from']['value']),
            'date_to'=>sql2date($this->filters['date_to']['value']),
        ));
        div_end();
        end_page();
    }


    var $filters = array(
        'supplier_id' => array('type'=>'SUPPLIER','title'=>'Supplier','all'=>true,'value'=>ALL_TEXT),
        'date_from' => array('type'=>'date','title'=>'From','value'=>'' ),
        'date_to' => array('type'=>'date','title'=>'To','value'=>'' ),
    );

    var $check = false;

    private function filter_input(){

        if( input_post('SUBMIT') ){
            foreach ($this->filters AS $k=>$f){
                $this->filters[$k]['value'] = input_post($k);
            }
        } else {
//             $this->filters['date_from']['value'] = begin_month();
//             $this->filters['date_to']['value'] = end_month();
            $this->filters['date_from']['value'] = '1-4-2016';
            $this->filters['date_to']['value'] = '31-5-2016';
        }

//         $this->filters['supplier_id']['value'] = 6;
        start_form();
        module_view('inquiry/inquiry_filter',$this->filters);
        end_form();
    }

    private function get_trans(){
        $this->supplier_transaction_model = module_model_load( 'transaction','supplier' );

        $supplier_id = $this->filters['supplier_id']['value'];
        $date_from = $this->filters['date_from']['value'];
        $date_to = $this->filters['date_to']['value'];
        $dimension = $dimension2 = 0;
        $amount_min = $amount_max = 0;


        $this->db->from('suppliers')->select('supplier_id, supp_name AS name , curr_code');

        if ($supplier_id != ALL_TEXT AND !empty($supplier_id)){
            $this->db->where('supplier_id',$supplier_id);
        }

        $suppliers = $this->db->order_by('supp_name')->get()->result();
        foreach ($suppliers AS $i => $supp){
            $suppliers[$i]->trans = $this->supplier_transaction_model->get_transactions($supp->supplier_id, $date_from, $date_to);
            $suppliers[$i]->opening = $this->supplier_transaction_model->get_open_balance($supp->supplier_id, $date_from, $date_to);
        }


// bug($suppliers);
// bug($suppliers);die;
        return $suppliers;
    }
}
