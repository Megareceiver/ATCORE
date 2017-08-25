<?php
class DocumentsBookkeepers  {
    function __construct() {
        $this->db = get_instance()->db;
        $this->input = get_instance()->input;
        $this->datatable = module_control_load('datatable','html');
        $this->modal = module_control_load('modal','html');
    }

    var $document_tran_types = array(
            null=>' -- All document types --',
            'bank_deposit'=>'Bank Deposit',
            'bank_payment'=>'Bank Payment',
            'bank_statement'=>'Bank Statement',
            'customer_bill'=>'Customer Bill',
            'customer_receipt'=>'Customer Receipt',
            'expense_bill'=>'Expense Bill',
            'expense_payment'=>'Expense Payment',
            'supplier_bill'=>'Supplier Bill',
            'supplier_payment'=>'Supplier Payment'
        );

    var $fields = array(
        'tran_type' => array('type'=>'options','title'=> 'Document Type','value'=>null ),
        'date_from' => array('type'=>'date','title'=> 'From','value'=>"" ),
        'date_to' => array('type'=>'date','title'=> 'To','value'=>NULL ),
        'status' => array('type'=>'options','title'=> NULL,'value'=>0 ,'options'=>array(0=>'All',2=>'Posted',1=>'Unpost')),
    );

    function index(){

        $this->fields['date_from']['value'] = begin_month();
        $this->fields['date_to']['value'] = end_month();
        $this->fields['tran_type']['options'] = $this->document_tran_types;

        $detail_id=post_edit('detail');
        $file_id=post_edit('file');

        $delete_id=post_edit('delete');
        $delete_confirm = post_edit('removeconfirm');

        $posting_id=post_edit('posting');

        $taget_id = max($file_id,$detail_id,$delete_id,$delete_confirm);

        if( $this->input->post('SUBMIT') OR $taget_id ){
            foreach ($this->fields AS $k=>$f){
                $this->fields[$k]['value'] = input_post($k);
            }

            if ($delete_confirm) {
                $this->item_delete($delete_confirm);
            }
        }


//         add_js('js/table.js');
        add_js('js/modal.js');
        page("Mobile Accountant");

        global $Ajax;
        if(in_ajax()) {
            if( $posting_id ){
                $this->posting($posting_id);
            }
            if( $this->input->post('SUBMIT') OR $delete_id OR $delete_confirm){
                $Ajax->activate('_page_body');
            }

            if ( $detail_id OR $file_id OR $delete_id) {
                $Ajax->activate('_atmodel');
            }

        }

        start_form();
        module_view('inquiry/filter-control',$this->fields);
        $this->datatable->view($this->datatable_view, $this->document_items($this->fields),'trans_tbl');


        div_start('_atmodel');
        if ( $detail_id) {
            $this->item_view($detail_id);
        } else if ( $file_id ) {
            $this->item_view_file($file_id);
        } elseif ( $delete_id ) {
            $this->modal->confirm(
                array(
                    'button_ok'=>array('name'=>"removeconfirm$delete_id",'title'=>'Yes'),
                    'content'=>'Are you sure to delete '.$this->upload_title(input_val('tran_type')).' Document?',
                    'title'=>"Confim Delete")
            );
        }

        div_end();
        end_form();
        end_page();
    }



    var $datatable_view = array(
        'tran_type'=>array('Document Type','left',10,'bookeeper_type'),
        'id'=>array('Upload ID','left',8),
        'ref'=>array('Trn Ref','left',8),
        'customer'=>array('Transaction Party','left',15),
        'status'=>array('Status','center',7),
        'datetime'=>array('Upload Date','center',8),
        'detail'=>array('Data View','center',7),
        'file'=>array('Document View','center',7),
        'action'=>array('DEL','center',5)
    );

    private function document_items(){

        if( is_date($date_from = $this->fields['date_from']['value']) ){
            $date_from_str = strtotime($date_from);
            $this->db->where('datetime >', date("Y-m-d",strtotime("-1 day",$date_from_str)));
        }

        if( is_date($date_to = $this->fields['date_to']['value']) ){
            $date_to_str = strtotime($date_to);
            $this->db->where('datetime <',date("Y-m-d",strtotime("+1 day",$date_to_str)));
        }

        if( strlen($tran_type=$this->fields['tran_type']['value']) <1 ){
            $tran_type = key($this->document_tran_types);
        }
        if( strlen($tran_type) > 0 ){
            $this->db->where('tran_type',$tran_type);
        }

        if( ($status = $this->fields['status']['value']) > 0 ){
            $this->db->where('status', $status);
        }



        $this->db->from('documents_bookkeepers');
        $query = $this->db->order_by('datetime DESC, id DESC')->get();
        $data = $query->result();

        global $session;

        $DataReturn = array();
        if( !empty($data) ) foreach ($data AS $field){
            $data_submit = unserialize($field->data);
            $row = (object)array(
                'tran_type'=>$this->upload_title($field->tran_type),
                'id'=>$this->tran_type_str($field->tran_type)."-".$field->id,
                'ref'=>strtoupper($data_submit['ref']),
                'status'=>'<span style="color:#DDD; font-weight: bold;">POSTED</span>',

                'customer'=>$this->tran_party($field->tran_type,$data_submit),
                'datetime'=>sql2date($field->datetime),
                'detail'=>'<button href="#" class="ajaxsubmit" name="detail'.$field->id.'" value="1" type="submit">
                  <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Detail </button>',

                'file'=>'<button class="ajaxsubmit" name="file'.$field->id.'" value="1" type="submit">
                  <span class="glyphicon glyphicon-picture" aria-hidden="true"></span> File </button>',
                'action'=>'<button class="ajaxsubmit" name="delete'.$field->id.'" value="1" type="submit">
                  &nbsp;<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;</button>',

            );
            if( $field->status < 2 ){
//                 $row->detail = '<button href="#" class="ajaxsubmit" name="posting'.$field->id.'" value="1" type="submit">
//                   <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Post</button>';
                $row->status = '<span style="color:red; font-weight: bold;">UNPOST</span>';
            }
            $DataReturn[] = $row;
        }


        return $DataReturn;
    }

    /*
     * Item value for listview
     */
    private function tran_type_str($tran_type=NULL){
        switch ($tran_type){
            case 'bank_deposit':
                $str = "BD";
                break;
            case 'bank_payment':
                $str = "BP";
                break;
            case 'bank_statement':
                $str = "BT"; break;

            case 'customer_bill':
                $str = "CB"; break;
            case 'customer_receipt':
                $str = "CR"; break;

            case 'expense_bill':
                $str = "EB"; break;
            case 'expense_payment':
                $str = "EB"; break;

            case 'supplier_bill':
                $str = "SB"; break;
            case 'supplier_payment':
                $str = "SP"; break;
            default:
                $str = NULL;
        }
        return $str;
    }

    private function upload_title($str=NULL){
        $title = null;
        if( strlen($str) > 0 ){
            $data = explode('_', $str);
            if( count($data) > 0 ) foreach ($data AS $t){
                $title .= " ".ucfirst($t);
            }
        }
        return $title;
    }

    private function tran_party($tran_type=NULL,$datasubmit=array()){
        switch ($tran_type){
            case 'bank_deposit':
                $str = "BD";
                break;
            case 'bank_payment':
                $str = "BP";
                break;
            case 'bank_statement':
                $str = "BT"; break;

            case 'customer_bill':
                $str = "CB"; break;
            case 'customer_receipt':
                $str = "CR"; break;

            case 'expense_bill':
                $str = "EB"; break;
            case 'expense_payment':
                $str = "EB"; break;

            case 'supplier_bill':
                $str = NULL;
                if( isset($datasubmit['supplier_id']) ){
                    $supplier = $this->db->where('supplier_id',$datasubmit['supplier_id'])->get('suppliers')->row();
                    if( is_object($supplier) ){
                        $str = $supplier->supp_name;
                    }
                }

                break;
            case 'supplier_payment':
                $str = $datasubmit['supplier_name']; break;
            default:
                $str = NULL;
        }
        return $str;
    }

    private function item_view($id=0){

        $data = $this->db->where('id',$id)->get('documents_bookkeepers')->row();
        if( is_object($data) AND isset($data->id) ){
            $uploaded = unserialize($data->data);
            $fields = array(
            );
            foreach ($uploaded AS $k=>$val){
                if( $k != 'file' ){
                    if( strpos($k, '_amount') OR strpos($k, '_open_balance') ){
                        $val = number_total(floatval($val));
                    }
                    $fields[$k] = array('type'=>'text','title'=>$this->upload_title($k),'value'=>$val );
                }

            }
            switch ($data->tran_type){
                case 'bank_deposit':
                    $str = "BD";
                    break;
                case 'bank_payment':
                    $str = "BP";
                    break;
                case 'bank_statement':
                    $str = "BT"; break;

                case 'customer_bill':
                    $str = "CB"; break;
                case 'customer_receipt':
                    $str = "CR"; break;

                case 'expense_bill':
                    $str = "EB"; break;
                case 'expense_payment':
                    $str = "EB"; break;

                case 'supplier_bill':
                case 'supplier_payment':
//                     unset($fields['supplier_id']);
                    $fields['supplier_id'] = array('type'=>'text','title'=>"Supplier",'value'=>NULL );

                    if( isset($uploaded['supplier_id']) ){
                        $supplier = $this->db->where('supplier_id',$uploaded['supplier_id'])->get('suppliers')->row();
                        if( is_object($supplier) ){
                             $fields['supplier_id']['value'] = $supplier->supp_name;
                        }
                    }
                    $fields['type']['title'] = "Expense Type";
                    if( isset($uploaded['type']) ){
                        $expense_type = $this->db->where('id',$uploaded['type'])->get('sys_expense_type')->row();
                        if( is_object($supplier) ){
                            $fields['type']['value'] = $expense_type->title;
                        }
                    }

                    break;
                default:
                    $str = NULL;
            }
//             $buttons = array('posting'=>array('title'=>'Post Transaction','attributes'=>' class="btn btn-primary" ','icon'=>'send') );
            $this->modal->view(array('fields'=>$fields,'title'=>$this->upload_title($data->tran_type)." Details"));
        }
    }

    private function item_view_file($id=0){
        $data = $this->db->where('id',$id)->get('documents_bookkeepers')->row();
        if( is_object($data) AND isset($data->id) ){
            $uploaded = unserialize($data->data);

            if( isset($uploaded['file']) && strlen($file=$uploaded['file']) > 0 ){
                $this->modal->view_img(array('img'=>config_item('assets_domain').$file,'title'=>$this->upload_title($data->tran_type)." File",'width'=>800 ));
            }
        }
    }

    private function item_delete($id=0){
        $data = $this->db->where('id',$id)->get('documents_bookkeepers')->row();
        if( is_object($data) AND isset($data->id) ){
            $uploaded = unserialize($data->data);
            $this->db->where('id',$id)->delete('documents_bookkeepers');
            if( isset($uploaded['file']) && strlen($file=$uploaded['file']) > 0 && ($file_path=realpath(config_item('assets_path').$file))){
                unlink($file_path);
            }
        }
    }

    private function posting($id=0){
        $data = $this->db->where('id',$id)->get('documents_bookkeepers')->row();
        if( is_object($data) AND isset($data->id) ){
            global $Ajax;
            switch ($data->tran_type){
                case 'supplier_bill':
                    $Ajax->redirect(site_url('purchasing/supplier_invoice.php').'?New=1&document='.$data->id);
                    break;
                default:
                    $str = NULL;
            }
        }
    }

}