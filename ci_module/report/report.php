<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if( !class_exists('Report') ) :
class Report {
    function __construct() {
        global $ci;
        $this->ci = $ci;
        $this->page_security = 'SA_GLTRANSVIEW';
        $this->ci->page_title = 'Reports and Analysis';
        include_once(ROOT . "/includes/ui.inc");
        if( !method_exists($this->ci, 'qpdf') ){
            $this->ci->load_library('qpdf');
        }

    }

    var $fields = array();
    var $view = 'form-reports';
    function form($title='Report',$buttons=NULL){
        $ci = get_instance();

        if( !$buttons ){
            $buttons = array( 'report_submit'=>"Download: $title");
        }
        if( !module_view_file_exist($this->view,'report') ){
            $this->view = 'form-reports';
        }

        page($this->ci->page_title. " | $title");
        start_form($multi=false, $dummy=false, $action=get_instance()->uri->uri_string());
        $ci->temp_view($this->view,array('fields'=>$this->fields,'submit'=>$buttons),false,'report');
        end_form();
        end_page();
    }

    function submit(){
        $data = array();
        if( !empty($this->fields) ) foreach ($this->fields AS $name=>$f){
            $data[$name] = $f['value'];
            if( input_val($name) ){
                $data[$name] = input_val($name);
            }
            if( $f['type']=='orientation' ){
                $data[$name] = ($data[$name] && $data[$name]=='L') ? 'L' : 'P';
            }
        }
        return $data;
    }
    function view(){
    }

    var $report_params = array("");

    function front_report($page_title=NULL,$tableHeader=array() ,$tran_type=NULL){
        $path_to_root = ROOT;
        $destination = input_val('report_type');
        if( !$destination ){
            $destination = $destination=='excel'? true : false;
        }

        $orientation = input_val('orientation');
        if( !$orientation ){
            $orientation = 'P';
        }else{
            $orientation = ($orientation = 'orientation') ? 'P' :'L';
        }

        if ($destination)
            include_once(ROOT . "/reporting/includes/excel_report.inc");
        else
            include_once(ROOT . "/reporting/includes/pdf_report.inc");



        $rep = new FrontReport($page_title, str3_function_name($page_title), user_pagesize(), 9, $orientation);
        $rep->tran_type = $tran_type;
        list ($headers, $cols, $aligns) = $this->report_front_params($tableHeader);

        if ($orientation == 'L')
            recalculate_cols($cols);
//         $rep->Font();
        $rep->Info($this->report_params, $cols, $headers, $aligns);
        $this->rep = $rep;
        return $this->rep;
    }

    function report_front_params($params_array = NULL){
        $cols = array(0);
        $headers = array();
        $aligns = array();
        if( count($params_array) > 0 ) while ( list ($key, $val) = each ($params_array)){
            if( count($val[0]) > 0 ){
                $headers[] = $val[0];
                $cols[] = $val[1];
                $aligns[] = isset($val[2]) ? $val[2] : 'left';
            }

        }
        return array($headers, $cols, $aligns);


    }

    var $discount, $shipping, $subTotal, $taxTotal, $leftAllocate = 0;
    var $taxes = array();
    var $type = 0;
    function invoice_footer($name=""){
        $this->rep->TextCol(1, 5,	$this->rep->company['curr_default'].":".price_in_words( $this->subTotal + $this->taxTotal , ST_CHEQUE));
        $max_col = count($this->rep->cols)-2;

        $this->rep->Font('bold');
        if( in_array($this->type, array(ST_SUPPAYMENT)) ) {
            $this->rep->TextCol($max_col-2, $max_col,	_("TOTAL $name"));
        } else {
            $this->rep->TextCol($max_col-2, $max_col,	_("TOTAL $name INCL. GST"));

        }
        $this->rep->TextCol($max_col, $max_col+1,	number_total( $this->subTotal + $this->taxTotal ));



        //             $this->rep->NewLine(-1);
        //             $this->rep->TextCol(3, 7,	_('TOTAL ORDER EX GST'));
        //             $this->rep->TextCol(7, 8,	number_total($tran->tax_included ? $SubTotal-$taxTotal: $SubTotal));


        $this->rep->Font();
        if( in_array($this->type, array(ST_SUPPAYMENT)) ) {
//             $this->rep->TextCol(1, 5,	$this->rep->company['curr_default'].":".price_in_words( $Total ,ST_CUSTPAYMENT));

            $this->rep->NewLine(-1);
            $this->rep->TextCol($max_col-2, $max_col,	_('Left to Allocate'));
            $this->rep->TextCol($max_col, $max_col+1,	number_total($this->leftAllocate));

            $this->rep->NewLine(-1);
            $this->rep->TextCol($max_col-2, $max_col,	_('Total Allocated'));
            $this->rep->TextCol($max_col, $max_col+1,	number_total($this->subTotal-$this->leftAllocate));

        }

        if( abs($this->discount) != 0 ){
            $this->rep->NewLine(-1);
            $this->rep->TextCol($max_col-2, $max_col, _('Total Discount'));
            $this->rep->TextCol($max_col, $max_col+1, number_total($this->discount));
        }



        if( count($this->taxes) > 0 ) foreach ($this->taxes AS $tax){
            if( abs($tax['amount']) != 0 ){
                $this->rep->NewLine(-1);
                $this->rep->TextCol($max_col-2, $max_col,	$tax['name']);
                $this->rep->TextCol($max_col, $max_col+1, number_total($tax['amount']) );
            }
        }

        if( abs($this->shipping) != 0 ){
            $this->rep->NewLine(-1);
            $this->rep->TextCol($max_col-2, $max_col,	_('Shipping'));
            $this->rep->TextCol($max_col, $max_col+1,number_total($this->shipping));
        }

        if( in_array($this->type, array(ST_SALESORDER, ST_SALESINVOICE)) ) {
            $this->rep->NewLine(-1);
            $this->rep->TextCol($max_col-2, $max_col,	_(' Sub-total'));
            $this->rep->TextCol(7, 8,	number_total($this->subTotal));
        }


    }
}
ENDIF;