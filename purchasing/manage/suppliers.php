<?php
/**********************************************************************
    Copyright (C) FrontAccounting, LLC.
	Released under the terms of the GNU General Public License, GPL,
	as published by the Free Software Foundation, either version 3
	of the License, or (at your option) any later version.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
    See the License here <http://www.gnu.org/licenses/gpl-3.0.html>.
***********************************************************************/
$page_security = 'SA_SUPPLIER';
$path_to_root = "../..";
include($path_to_root . "/includes/db_pager.inc");
include_once($path_to_root . "/includes/session.inc");
$js = "";
if ($use_popup_windows)
	$js .= get_js_open_window(900, 500);
if ($use_date_picker)
	$js .= get_js_date_picker();

page(_($help_context = "Suppliers"), @$_REQUEST['popup'], false, "", $js);

include_once($path_to_root . "/includes/ui.inc");
include_once($path_to_root . "/includes/ui/contacts_view.inc");
global $ci;
$common_model = $ci->model('common',true);
check_db_has_tax_groups(_("There are no tax groups defined in the system. At least one tax group is required before proceeding."));

if (isset($_GET['supplier_id'])){
	$_POST['supplier_id'] = $_GET['supplier_id'];
}

$supplier_id = get_post('supplier_id');
//--------------------------------------------------------------------------------------------
function supplier_settings(&$supplier_id){
    global $ci, $Ajax;
    $Ajax->activate('_page_body');
	start_outer_table(TABLESTYLE2);
	table_section(1);
	$_POST['gst'] = 0;
	if ($supplier_id) {
		//SupplierID exists - either passed when calling the form or from the form itself
		$myrow = get_supplier($_POST['supplier_id']);

		$_POST['supp_name'] = $myrow["supp_name"];
		$_POST['supp_ref'] = $myrow["supp_ref"];
		$_POST['address']  = $myrow["address"];
		$_POST['supp_address']  = $myrow["supp_address"];

		$_POST['gst_no']  = $myrow["gst_no"];
		$_POST['website']  = $myrow["website"];
		$_POST['supp_account_no']  = $myrow["supp_account_no"];
		$_POST['bank_account']  = $myrow["bank_account"];
		$_POST['dimension_id']  = $myrow["dimension_id"];
		$_POST['dimension2_id']  = $myrow["dimension2_id"];
		$_POST['curr_code']  = $myrow["curr_code"];
		$_POST['payment_terms']  = $myrow["payment_terms"];
		$_POST['credit_limit']  = price_format($myrow["credit_limit"]);
		$_POST['tax_group_id'] = $myrow["tax_group_id"];
		$_POST['tax_included'] = $myrow["tax_included"];
		$_POST['payable_account']  = $myrow["payable_account"];
		$_POST['purchase_account']  = $myrow["purchase_account"];
		$_POST['payment_discount_account'] = $myrow["payment_discount_account"];
		$_POST['notes']  = $myrow["notes"];
	 	$_POST['inactive'] = $myrow["inactive"];


	 	$_POST['supplier_tax_id'] = $myrow["supplier_tax_id"];

	 	if( $myrow["supplier_tax_id"] ){
	 	    $_POST['gst'] = 1;
	 	}
	 	$_POST['industry_code'] = $myrow["industry_code"];
	 	$_POST['self_bill'] = $myrow["self_bill"];
	 	$_POST['self_bill_approval_ref'] = $myrow["self_bill_approval_ref"];
// 	 	if( !isset($_POST['valid_gst']) ){
// 	 		$_POST['valid_gst'] = $myrow["valid_gst"];
// 	 	}


	} else {
		$_POST['supp_name'] = $_POST['supp_ref'] = $_POST['address'] = $_POST['supp_address'] = $_POST['tax_group_id'] = $_POST['website'] = $_POST['supp_account_no'] = $_POST['notes'] = '';
		$_POST['dimension_id'] = 0;
		$_POST['dimension2_id'] = 0;
		$_POST['tax_included'] = 0;
		$_POST['sales_type'] = -1;
		$_POST['gst_no'] = $_POST['bank_account'] = '';
		$_POST['payment_terms']  = '';
		$_POST['credit_limit'] = price_format(0);

		$company_record = get_company_prefs();
		$_POST['curr_code']  = $company_record["curr_default"];
		$_POST['payable_account'] = $company_record["creditors_act"];
		$_POST['purchase_account'] = ''; // default/item's cogs account
		$_POST['payment_discount_account'] = $company_record['pyt_discount_act'];
		$_POST['self_bill'] = false;
		$_POST['self_bill_approval_ref'] = null;
// 		$_POST['valid_gst'] = 0;
	}
	if( isset($_POST['_valid_gst_update'] ) ){
	    $_POST['valid_gst'] = $ci->input->post('valid_gst');
	} else if ( $supplier_id ){
		$_POST['valid_gst'] = $myrow["valid_gst"];
	}

	$tax_disable = false;
	if( isset($_POST['valid_gst']) && $_POST['valid_gst'] ){
	    $_POST['gst'] = 1;
	    $_POST['supplier_tax_id'] = 16;
	    $tax_disable = true;
	}





	table_section_title(_("Basic Data"));

	text_row(_("Supplier Name:"), 'supp_name', null, 42, 40);
	text_row(_("Supplier Short Name:"), 'supp_ref', null, 30, 30);

	text_row(_("GSTNo:"), 'gst_no', null, 42, 40);
	link_row(_("Website:"), 'website', null, 35, 55);
	if ($supplier_id && !is_new_supplier($supplier_id) && (key_in_foreign_table($_POST['supplier_id'], 'supp_trans', 'supplier_id') ||
		key_in_foreign_table($_POST['supplier_id'], 'purch_orders', 'supplier_id')))
	{
		label_row(_("Supplier's Currency:"), $_POST['curr_code']);
		hidden('curr_code', $_POST['curr_code']);
	} else {
		currencies_list_row(_("Supplier's Currency:"), 'curr_code', null);
	}

	$disable = null;
	$company = get_company_pref();
	if( !isset($company['gst_no']) ||  trim($company['gst_no']) =='' ){
		$disable = ' disabled="disabled " ';
	}

	//tax_groups_list_row(_("Tax Group:"), 'tax_group_id', null);
	///radio///
	if( !isset($_POST['supplier_tax_id']) ){
	    $_POST['supplier_tax_id'] = null;
	}


// 	if(isset($_POST["supplier_tax_id"]) && $_POST["supplier_tax_id"] > 0){
// 		echo '<tr><td><input type="radio" name="gst" value="0" >&nbsp;&nbsp;GST by Product Setting</td><td>&nbsp;</td></tr>';
// 		echo '<tr><td><input type="radio" name="gst" value="1"  checked>&nbsp;&nbsp;GST by Supplier</td>';
// // 		echo supplier_tax_list_row(_("supplier_tax_id"), 'supplier_tax_id', $_POST['supplier_tax_id']);
// // 		echo $ci->finput->inputtaxes(null,'supplier_tax_id',$_POST['supplier_tax_id'],'3','column');
// 	} else {
// 		if(isset($_POST['submit']) && $_POST['gst'] == 1) {
	    if( input_val('gst') == 1) {
			echo '<tr><td><input type="radio" name="gst" value="0"  >&nbsp;&nbsp;GST by Product Setting</td><td>&nbsp;</td></tr>';
			echo '<tr><td><input type="radio" name="gst" value="1"  checked>&nbsp;&nbsp;GST by Supplier</td>';
		}else {
			echo '<tr><td><input type="radio" name="gst" value="0" '.(($disable) ? $disable : 'checked').' >&nbsp;&nbsp;GST by Product Setting</td><td>&nbsp;</td></tr>';
			echo '<tr><td><input type="radio" name="gst" value="1" '.$disable.' >&nbsp;&nbsp;GST by Supplier</td>';
		}
// 		hidden('gst');

// 		echo  supplier_tax_list_row(_("supplier_tax_id"), 'supplier_tax_id', $_POST['supplier_tax_id']);

// 	}
    if( !input_val('valid_gst') ){
	    echo $ci->finput->inputtaxes(null,'supplier_tax_id',input_val('supplier_tax_id'),'3','column',false,array(16));
// 	    die('here');;
	} else {
	    echo $ci->finput->inputtaxes(null,'supplier_tax_id',input_val('supplier_tax_id'),'3','column');
	}

	if( defined('COUNTRY') && COUNTRY== 60 ){
	    text_row(_("Our Customer No:"), 'supp_account_no', null, 42, 40);

	    date_row('Last Verified Date', 'last_verifile', 'Last Verified Date');
	    check_row('Is Valid GST Reg','valid_gst', input_val('valid_gst') ,true );
	} else {
	    hidden('supp_account_no');
	    hidden('last_verifile');
	    hidden('valid_gst');
	}


	//industry_code_list_row(_("Industry Code:"), 'industry_code', $_POST['industry_code']);
	table_section_title(_("Purchasing"));
	text_row(_("Bank Name/Account:"), 'bank_account', null, 42, 40);
	amount_row(_("Credit Limit:"), 'credit_limit', null);
	payment_terms_list_row(_("Payment Terms:"), 'payment_terms', null);
	//
	// tax_included option from supplier record is used directly in update_average_cost() function,
	// therefore we can't edit the option after any transaction waas done for the supplier.
	//
	//if (is_new_supplier($supplier_id))
	check_row(_("Prices contain tax included:"), 'tax_included');
	//else {
	//	hidden('tax_included');
	//	label_row(_("Prices contain tax included:"), $_POST['tax_included'] ? _('Yes') : _('No'));
	//}
	table_section_title(_("Accounts"));
	gl_all_accounts_list_row(_("Accounts Payable Account:"), 'payable_account', $_POST['payable_account']);
	gl_all_accounts_list_row(_("Purchase Account:"), 'purchase_account', $_POST['purchase_account'],
		false, false, _("Use Item Inventory/COGS Account"));

	gl_all_accounts_list_row(_("Purchase Discount Account:"), 'payment_discount_account', $_POST['payment_discount_account']);
	if (!$supplier_id) {
		table_section_title(_("Contact Data"));
		text_row(_("Phone Number:"), 'phone', null, 32, 30);
		text_row(_("Secondary Phone Number:"), 'phone2', null, 32, 30);
	}

	table_section(2);
	$dim = get_company_pref('use_dimension');
	if ($dim >= 1)
	{
		table_section_title(_("Department"));
		dimensions_list_row(_("Department")." 1:", 'dimension_id', null, true, " ", false, 1);
		if ($dim > 1)
			dimensions_list_row(_("Department")." 2:", 'dimension2_id', null, true, " ", false, 2);
	}
	if ($dim < 1)
		hidden('dimension_id', 0);
	if ($dim < 2)
		hidden('dimension2_id', 0);


	table_section_title(_("Addresses"));
	textarea_row(_("Mailing Address:"), 'address', null, 35, 5);
	textarea_row(_("Physical Address:"), 'supp_address', null, 35, 5);

	table_section_title(_("General"));
	textarea_row(_("General Notes:"), 'notes', null, 35, 5);
	if ($supplier_id)
		record_status_list_row(_("Supplier status:"), 'inactive');
	else {
		table_section_title(_("Contact Data"));
		text_row(_("Contact Person:"), 'contact', null, 42, 40);
		text_row(_("Fax Number:"), 'fax', null, 32, 30);
		email_row(_("E-mail:"), 'email', null, 35, 55);
		languages_list_row(_("Document Language:"), 'rep_lang', null, _('System default'));
	}

	if( defined('COUNTRY') && COUNTRY==60 ){
	    table_section_title(_("Self Bill"));

	    text_row(_("Approval Ref:"), 'self_bill_approval_ref');
	    check_row(_("Self Bill:"), 'self_bill');
	} else {
	    hidden('self_bill_approval_ref');
	    hidden('self_bill');
	}


	end_outer_table(1);

	div_start('controls');
	if ($supplier_id){
// 		submit_center_first('submit', _("Update Supplier"), _('Update supplier data'), @$_REQUEST['popup'] ? true : 'default');
	    submit_center_first('submit', _("Update Supplier"), _('Update supplier data'), false);


		submit_return('select', get_post('supplier_id'), _("Select this supplier and return to document entry."));
		submit_center_last('delete', _("Delete Supplier"),
		  _('Delete supplier data if have been never used'), true);
	}
	else
	{
		submit_center('submit', _("Add New Supplier Details"), true, '', 'default');
	}
	div_end();
}

if (isset($_POST['submit'])) {

	//initialise no input errors assumed initially before we test
	$input_error = 0;

	/* actions to take once the user has clicked the submit button
	ie the page has called itself with some user input */

	//first off validate inputs sensible

	if (strlen($_POST['supp_name']) == 0 || $_POST['supp_name'] == "") {
		$input_error = 1;
		display_error(_("The supplier name must be entered."));
		set_focus('supp_name');
	}

	if (strlen($_POST['supp_ref']) == 0 || $_POST['supp_ref'] == "") {
		$input_error = 1;
		display_error(_("The supplier short name must be entered."));
		set_focus('supp_ref');
	} else {
		$same_ref = $ci->db->where('supp_ref',$_POST['supp_ref'])->get('suppliers')->row();

		if( isset($same_ref->supplier_id) && $same_ref->supplier_id !=  $_POST['supplier_id']){
			display_error(_("Dupplicate Supplier short name!"));
			set_focus('supp_ref');
		}

	}

	if ($input_error !=1 ) {

	    $supplier_tax_id = (input_val('gst') == 0)  ? -1 : input_val('supplier_gst_03_type');
		begin_transaction();

		$supplier_update = array(
		    'supp_name'=>null,
		    'supp_ref'=>null,
		    'address'=>null,
		    'supp_address'=>null,
		    'gst_no'=>null,
		    'website'=>null,
		    'supp_account_no'=>null,
		    'bank_account'=>null,
		    'credit_limit'=>null,
		    'dimension_id'=>null,
		    'dimension2_id'=>null,
		    'curr_code'=>null,
		    'payment_terms'=>null,
		    'payable_account'=>null,
		    'purchase_account'=>null,
		    'payment_discount_account'=>null,
		    'notes'=>null,
		    'tax_group_id'=>null,
		    'tax_included'=>null,

		    'self_bill_approval_ref'=>null,
		    'self_bill'=>null,
		    'valid_gst'=>0,
		    'last_verifile'=>null
		);
		$supplier_update = $ci->finput->get_post($supplier_update);
		$supplier_update['credit_limit'] = floatval($supplier_update['credit_limit']);

		if( array_key_exists('tax_included', $supplier_update) ) {
		    $supplier_update['tax_included'] = ($supplier_update['tax_included'] || $supplier_update['tax_included']=='on') ? 1: 0;
		} else {
		    $supplier_update['tax_included'] = 0;
		}


// 		bug($supplier_update);
        if( !isset($supplier_update['valid_gst']) ){
            $supplier_update['valid_gst'] = false;
        }

        if( isset($_POST['gst']) && isset($_POST['supplier_tax_id']) ){
            $supplier_update['supplier_tax_id'] = $ci->input->post('supplier_tax_id');

//             $supplier_update['gst'] = $ci->input->post('gst');
        } else {
            $supplier_update['supplier_tax_id'] = null;
//             $supplier_update['gst'] = 0;
        }
// bug($supplier_update);die;
		if ($supplier_id) {
// 			update_supplier($_POST['supplier_id'], $_POST['supp_name'], $_POST['supp_ref'], $_POST['address'],
// 				$_POST['supp_address'], $_POST['gst_no'],
// 				$_POST['website'], $_POST['supp_account_no'], $_POST['bank_account'],
// 				input_num('credit_limit', 0), $_POST['dimension_id'], $_POST['dimension2_id'], $_POST['curr_code'],
// 				$_POST['payment_terms'], $_POST['payable_account'], $_POST['purchase_account'], $_POST['payment_discount_account'],
// 				$_POST['notes'], $ci->input->post('tax_group_id'), $ci->input->post('tax_included'), $supplier_tax_id, $ci->input->post('industry_code'),
// 				$ci->input->post('self_bill_approval_ref'),
// 				$ci->input->post('self_bill') );
		    $common_model->update($supplier_update,'suppliers',array('supplier_id'=>$_POST['supplier_id'] ),false);
// 		    bug($supplier_update);die;
			update_record_status($_POST['supplier_id'], $_POST['inactive'],
				'suppliers', 'supplier_id');

			$Ajax->activate('supplier_id'); // in case of status change
			display_notification(_("Supplier has been updated."));
		} else {
// 			add_supplier($_POST['supp_name'], $_POST['supp_ref'], $_POST['address'], $_POST['supp_address'],
// 				$_POST['gst_no'], $_POST['website'], $_POST['supp_account_no'], $_POST['bank_account'],
// 				input_num('credit_limit',0), $_POST['dimension_id'], $_POST['dimension2_id'],
// 				$_POST['curr_code'], $_POST['payment_terms'], $_POST['payable_account'], $_POST['purchase_account'],
// 				$_POST['payment_discount_account'], $_POST['notes'], $_POST['tax_group_id'], check_value('tax_included'), $supplier_tax_id, $_POST['industry_code'],
// 			    $ci->input->post('self_bill_approval_ref'),
// 				$ci->input->post('self_bill'));
			$common_model->update($supplier_update,'suppliers',array('supplier_id'=>$_POST['supplier_id'] ),false);

			$supplier_id = $_POST['supplier_id'] = db_insert_id();

			add_crm_person($_POST['supp_ref'], $_POST['contact'], '', $_POST['address'],
				$_POST['phone'], $_POST['phone2'], $_POST['fax'], $_POST['email'],
				$_POST['rep_lang'], '');

			add_crm_contact('supplier', 'general', $supplier_id, db_insert_id());

			display_notification(_("A new supplier has been added."));
			$Ajax->activate('_page_body');
		}
		commit_transaction();
	}

} elseif (isset($_POST['delete']) && $_POST['delete'] != "") {
	//the link to delete a selected record was clicked instead of the submit button

	$cancel_delete = 0;

	// PREVENT DELETES IF DEPENDENT RECORDS IN 'supp_trans' , purch_orders

	if (key_in_foreign_table($_POST['supplier_id'], 'supp_trans', 'supplier_id')) {
		$cancel_delete = 1;
		display_error(_("Cannot delete this supplier because there are transactions that refer to this supplier."));

	}
	else
	{
		if (key_in_foreign_table($_POST['supplier_id'], 'purch_orders', 'supplier_id'))
		{
			$cancel_delete = 1;
			display_error(_("Cannot delete the supplier record because purchase orders have been created against this supplier."));
		}

	}
	if ($cancel_delete == 0)
	{
		delete_supplier($_POST['supplier_id']);

		unset($_SESSION['supplier_id']);
		$supplier_id = '';
		$Ajax->activate('_page_body');
	} //end if Delete supplier
}

start_form();

if (db_has_suppliers()){
	start_table(false, "", 3);
//	start_table(TABLESTYLE_NOBORDER);
	start_row();
	supplier_list_cells(_("Select a supplier: "), 'supplier_id', null,
		  _('New supplier'), true, check_value('show_inactive'));
	check_cells(_("Show inactive:"), 'show_inactive', null, true);
	end_row();
	end_table();
	if (get_post('_show_inactive_update')) {
		$Ajax->activate('supplier_id');
		set_focus('supplier_id');
	}
}
else
{
	hidden('supplier_id', get_post('supplier_id'));
}

if (!$supplier_id)
	unset($_POST['_tabs_sel']); // force settings tab for new customer

tabbed_content_start('tabs', array(
		'settings' => array(_('&General settings'), $supplier_id),
		'contacts' => array(_('&Contacts'), $supplier_id),
		'transactions' => array(_('&Transactions'), $supplier_id),
		'orders' => array(_('Purchase &Orders'), $supplier_id),
	));

	switch (get_post('_tabs_sel')) {
		default:
		case 'settings':
			supplier_settings($supplier_id);
			break;
		case 'contacts':
			$contacts = new contacts('contacts', $supplier_id, 'supplier');
			$contacts->show();
			break;
		case 'transactions':
			$_GET['supplier_id'] = $supplier_id;
			$_GET['popup'] = 1;
			include_once($path_to_root."/purchasing/inquiry/supplier_inquiry.php");
			break;
		case 'orders':
			$_GET['supplier_id'] = $supplier_id;
			$_GET['popup'] = 1;
			include_once($path_to_root."/purchasing/inquiry/po_search_completed.php");
			break;
	};
br();
tabbed_content_end();
hidden('popup', @$_REQUEST['popup']);
end_form();

end_page(@$_REQUEST['popup']);

?>
