<?php
class SalesInquiry {
    function __construct() {
    }

    function fillter(){
        $filterType = 0;
        if( isset($_POST['filterType']) ){
            $filterType = $_POST['filterType'];
        } else if ( isset($_GET['filtertype']) ){
            $filterType = $_GET['filtertype'];
        }


        start_table(TABLESTYLE_NOBORDER);
        start_row();

        if (!@$_GET['popup'])
            customer_list_cells(_("Select a customer: "), 'customer_id', null, true, false, false, !@$_GET['popup']);

        // date_cells(_("From:"), 'TransAfterDate', '', null, -30);
        // date_cells(_("To:"), 'TransToDate', '', null, 1);
        echo $ci->finput->qdate('From','TransAfterDate',null,'cells',false,null,null,-30);
        echo $ci->finput->qdate('To','TransToDate',null,'cells',false,null,null,1);


        // if (!isset($_POST['filterType'])) $_POST['filterType'] = 0;


        cust_allocations_list_cells(null, 'filterType', $filterType, true);
        check_cells('Voided','voided');
        submit_cells('RefreshInquiry', _("Search"),'',_('Refresh Inquiry'), 'default');
        end_row();
        end_table();
    }
}