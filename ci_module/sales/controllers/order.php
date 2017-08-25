<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SalesOrder {
    function __construct() {
        $ci = get_instance();
//         $this->order_control = $ci->module_control_load('sales','order',true);

        add_document_ready_js("$('select[name=stock_search_select], select[name=customer]').chosen();");
        $this->model = load_module_model('customer_trans',true);

    }

    var $fillter = array(
        'trans_no'=>array('title'=>'#'),
        'ref'=>array('title'=>'Ref'),
        'date_from'=>array('title'=>'From','type'=>'date'),
        'date_to'=>array('title'=>'To','type'=>'date'),
        'stock_location'=>array('title'=>'Locations'),
        'stock_search'=>array('title'=>'Item','type'=>'stock_product_select'),
        'customer'=>array('title'=>'Select a Customer','type'=>'customer'),
    );

    function index(){
        page("Sales Orders");


        $this->items();
        end_page();
    }

    function items($trans_type=ST_SALESORDER){
        $this->fillter_view();
// bug($this->model);die('quannh');
        $items = $this->model->search_order();
    }

    function fillter_view($fields=array()){
        $ci = get_instance();
        if( !$fields || empty($fields) ){
            $fields = $this->fillter;
        }
        $fields['date_from']['value'] = add_months(Today(),-1);
        $ci->temp_view('fillter/order',array('fields'=>$fields));

    }

    function invoice(){

    }

}