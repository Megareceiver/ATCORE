<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminAuditTrail {

    function __construct() {
        $this->ci = get_instance();
        $this->db = $this->ci->db;
        $this->void_model = load_module_model('tran',true,'void');

        $this->ci->smarty->registerPlugin('function', 'gl_view_str', "get_gl_view_listview" );
        $this->ci->smarty->registerPlugin('function', 'date_str', "date_view_listview" );
        $this->ci->smarty->registerPlugin('function', 'datetime_str', "datetime_view_listview" );

    }

    function index(){
        if( $this->ci->uri->uri_string !='admin/audit-trail' ){
            redirect('admin/audit-trail');
        }

        global $Ajax;
        $Ajax->activate('_page_body');

        page(_("Audit Trail"));
        start_form();
        module_view('audit_trail_filter',array('fillter_title'=>input_val('type')));
        table_view($this->table_view,$this->items(),false,true);
        end_form();
        end_page();
    }

    var $table_view = array(
        'type'=>array('Type',null,12,'trans_type','type'),
		'trans_no'=>array('Trans Number','center',10),
		'username'=>array('Created by',null,15),
		'description'=>'Description',
		'gl_date'=>array('Trans Date','center',10,'date_str','gl_date'),
		'stamp'=>array('Created Date','center',20,'datetime_str','stamp'),
        'items_action'=>array(null,'center','gl_view_str'),

    );

    private function items(){
        $fillter = input_val('type');
        if( is_null($fillter) ){
            $fillter = 0;
        }
        $page = input_val('page');
        if( !$page ){
            $page = input_val('first');
        }
        if( !$page ){
            $page = input_val('next');
        }
        if( !$page ){
            $page = input_val('end');
        }
        if( intval($page) < 1 ){
            $page = 1;
        }

        $this->db->select('a.*')->from('audit_trail AS a');
        $this->db->select('u.real_name AS username')->join('users AS u','u.id=a.user','left');

        $this->db->where('type',$fillter);
        $this->db->order_by('a.stamp  DESC');
//         $this->void_model->not_voided('a.type','a.trans_no');

        $tempdb = clone $this->db;

//         $items = $this->db->limit(page_padding_limit, page_padding_limit*($page-1) )->get()->result();
        $data['items'] = $this->db->limit(page_padding_limit, page_padding_limit*($page-1) )->get()->result();
    	$data['total'] = $tempdb->count_all_results();
    	$data['page']= $page;
        return $data;
    }
}