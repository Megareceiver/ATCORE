<?php
class HtmlDatatable  {
    function __construct() {
        $this->db = get_instance()->db;
        $this->db->reset();
    }

    var $limit = 10;

    public function view($tableFields = array(), $query,$elementID_out=NULL,$view='table_items',$view_module='html'){
        $offset = 1;
        $load = false;
        if( input_post('first') ){
            $offset = 1;
            $load = true;
        } elseif (input_post('next')){
            $offset = input_post('next');
            $load = true;
        } elseif (input_post('end')){
            $offset = input_post('end');
            $load = true;
        }

        if( $load == true AND strlen($elementID_out) > 0 ){
            global $Ajax;
            $Ajax->activate($elementID_out);
        }
        $data = array('table'=>$tableFields,'items'=>NULL);

        if( is_object($query) && get_class($query)=="CI_DB_mysql_result" ){

            $db = $this->db->query( $this->db->last_query()." LIMIT ".($this->limit*($offset-1)).",".$this->limit);

            $data['page'] = $offset;
            $data['total'] = $query->num_rows();
            $data['items'] = $db->result();
        } elseif ( is_array($query)){
            $data['items'] = $query;
        }else {
            display_db_error("Database have errors!", $this->db->last_query(),false);
            return FALSE;
        }

        if( strlen($elementID_out) >0 ){
            div_start($elementID_out);
        }

        module_view($view,$data,true, true,$view_module);

        if( strlen($elementID_out) >0 ){
            div_end();
        }

    }
}