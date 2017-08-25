<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminRevenueType {
    static $f_year = NULL;
    function __construct() {
        global $ci;
        $this->ci = $ci;
        $this->db = $ci->db;
        $this->model = module_model_load('revenue');
        $page_security = 'SA_FISCALYEARS';
        $ci->smarty->registerPlugin('function', 'AdminExpenseType_Items', "AdminRevenueType::listViewActions" );
        self::$f_year = get_company_pref('f_year');


    }

    function listViewActions($item=NULL){
        $html = button("edit".$item->id, $item->id, _("Edit"), ICON_EDIT, $aspect=false);

        if( self::$f_year != $item->id){
            $html.= button("delete".$item->id, $item->id, _("Delete"), ICON_DELETE, $aspect=false);
        }
        return $html;
    }

    function index(){
        global $Ajax;
        if(in_ajax()) {
            $Ajax->activate('_page_body');
        }

        page(_("Revenue Type"));
        start_form($multi=false, $dummy=false, $action=site_url('admin/fiscal-years'));

        $selected_id = 0;
        if( post_edit('edit') ){
            $selected_id = post_edit('edit');
        } elseif ($id=post_edit('delete')) {
            $this->model->delete($id);
        } elseif( $_POST ){
            $this->submit();
        }

        $items = $this->model->items();

        table_view($this->table_view,$items,false,false);

        $this->edit($selected_id);
        end_form();
        end_page();
    }

    var $table_view = array(
        'class'=>array("Class",null,10),
        'title'=>array("Type",null,30),
        'gl_account'=>array("COA Mapping",null,10),
        'gl_description'=>array("COA Description",null,40),
        'items_action'=>array(NULL,'','AdminExpenseType_Items')
    );

    var $field = array(
        'id'=>array(NULL,'HIDDEN'),
        'title'=>array("Revenue Type"),
        'class'=>array("Class"),
        'gl_account'=>array("COA Mapping",'gl_acc'),
    );

    private function edit($id=0){

        $row = $this->model->get_row($id);
        if( !empty($row) ) foreach ($this->field AS $k=>$a){
            if( isset($row->$k) ){
                $this->field[$k][2] = $row->$k;
            }
        }

        form_edit($this->field,false);
        br(1);
        submit_add_or_update_center(($id >0) ? false : true, '', 'default');
    }

    private function submit(){

        $selected_id = $this->ci->input->post('id');

        if ( input_post('UPDATE_ITEM') &&  intval($selected_id) > 0){

             $this->data = array();

            if (!$this->check_data_add() )
                return false;


            $this->model->update($selected_id, $this->data);


                display_notification(_('Selected Expense Type has been updated'));

        } elseif ( $_POST['ADD_ITEM'] ){
            $this->data = array();

            if (!$this->check_data_add() )
                return false;

            $this->model->add($this->data);
            display_notification(_('New Expense Type has been added'));
        }
    }

    private function check_data_add(){
        $id = input_post('id');
        $title = input_post('title');


        if (strlen($title) < 5 OR $this->model->check_exist($title,$id)) {
            display_error( _("Expense Type is duplicated."));
            set_focus('title');
            return false;
        }

        $this->data = array('id'=>$id,'title'=>$title,'class'=>input_post('class'),'gl_account'=>input_post('gl_account'));
        return true;
    }
}