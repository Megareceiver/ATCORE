<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_Expense_Model extends CI_Model {
    function __construct(){
        parent::__construct();
    }

    function create_table(){
        if( !$this->db->table_exists('sys_expense_type') ){

            $this->db->query("CREATE TABLE IF NOT EXISTS `sys_expense_type` (
                `id` int(11) NOT NULL,
                  `title` varchar(25) NOT NULL,
                    `class` varchar(50) NULL,
                    `gl_account` varchar(15) NULL
                ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;");

            $this->db->query("ALTER TABLE `sys_expense_type` ADD PRIMARY KEY (`id`);");
            $this->db->query("ALTER TABLE `sys_expense_type` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;");
        }
    }

    function items(){
        $this->db->select('t.*')->order_by('t.title');
        $this->db->join('chart_master AS gl','gl.account_code=t.gl_account','LEFT')->select('gl.account_name AS gl_description');
        $result = $this->db->get('sys_expense_type AS t');
        if( $result->num_rows() > 0 ){
            return $result->result();
        } else {
            return array();
        }
    }

    function get_row($id=0){
        if( !is_numeric($id) ){
            $id = 0;
        }
        $result = $this->db->where('id',$id)->get('sys_expense_type AS t');
        if( $result->num_rows() > 0 ){
            return $result->row();
        } else {
            return array();
        }
    }

    function check_exist($title,$id=0){
        if( !is_numeric($id) ){
            $id = 0;
        }
        $this->db->where('title',$title);
        $this->db->where("id <> $id");
        $result = $this->db->get('sys_expense_type');

        if( !is_object($result) ){
            display_db_error("Database have errors!", $this->db->last_query(),false);
            return false;
        }
        return $result->num_rows() > 0 ? true : false;
    }

    function add($data = array()) {
        if( array_key_exists('id', $data) ){
            unset($data['id']);
        }
        $this->db->insert('sys_expense_type',$data);
        $id = $this->db->insert_id();
        if( !$id ){
            display_error( _("could not add expense type"));
            return false;
        }
        return $id;
    }

    function update($id,$data=array()){
        if( !$id || !is_array($data) )
            return false;
        $this->db->update('sys_expense_type',$data,array('id'=>$id));
        return true;

    }

    function delete($id=0){
        if( is_numeric($id) ){
            $this->db->where('id',$id)->delete('sys_expense_type');
        }
    }

}