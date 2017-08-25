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
$page_security = 'SA_SETUPCOMPANY';
$path_to_root = "..";
include($path_to_root . "/includes/session.inc");
$js = get_js_date_picker();
page(_($help_context = "Company Setup"),false, false, "", $js);

include_once($path_to_root . "/includes/date_functions.inc");
include_once($path_to_root . "/includes/ui.inc");

include_once($path_to_root . "/admin/db/company_db.inc");
//-------------------------------------------------------------------------------------------------

if (isset($_POST['update']) && $_POST['update'] != ""){
    $max_image_size = 500;
	$input_error = 0;

	if (!check_num('login_tout', 10)){
		display_error(_("Login timeout must be positive number not less than 10."));
		set_focus('login_tout');
		$input_error = 1;
	}
	if (strlen($_POST['coy_name'])==0) {
		$input_error = 1;
		display_error(_("The company name must be entered."));
		set_focus('coy_name');
	}



	if (isset($_FILES['pic']) && $_FILES['pic']['name'] != '') {
		$result = $_FILES['pic']['error'];
		$filename = company_path()."/images";

		if (!file_exists($filename)){
			mkdir($filename);
		}

		$upload_file = clean_file_name($_FILES['pic']['name']);
		$filename .= "/".$upload_file;
		$ext = pathinfo($filename);
		$store_file = $ext['filename'].'-'.time().'.'.$ext['extension'];
		$filename = str_replace($upload_file, $store_file, $filename);

		 //But check for the worst
		if (!in_array( substr($filename,-4), array('.jpg','.JPG','.png','.PNG')))
		{
			display_error(_('Only jpg and png files are supported - a file extension of .jpg or .png is expected'));
			$input_error = 1;
		}
		elseif ( $_FILES['pic']['size'] > ($max_image_size * 1024))
		{ //File Size Check
			display_error(_('The file size is over the maximum allowed. The maximum size allowed in KB is') . ' ' . $max_image_size);
			$input_error = 1;
		}
		elseif ( $_FILES['pic']['type'] == "text/plain" )
		{  //File type Check
			display_error( _('Only graphics files can be uploaded'));
			$input_error = 1;
		}


// 		if (file_exists($filename)){
// 		    $ext = pathinfo($filename);

//             $filename_store = $store_file;
// // 		    $filename = company_path()."/images/".$filename_store;
// // 			$result = unlink($filename);
// // 			if (!$result){
// // 				display_error(_('The existing image could not be removed'));
// // 				$input_error = 1;
// // 			}
// 		} else {
// 		    $filename_store = $_POST['coy_logo'];
// 		}


		if ($input_error != 1){
			$result  =  move_uploaded_file($_FILES['pic']['tmp_name'], $filename);
// 			$_POST['coy_logo'] = clean_file_name($_FILES['pic']['name']);
			$_POST['coy_logo'] = $store_file;
			$filename_store = $store_file;
			if(!$result){
			    display_error(_('Error uploading logo file'));
			}

		}
	}



	if (check_value('del_coy_logo')){
		$filename = company_path()."/images/".clean_file_name($filename_store);
		if (file_exists($filename))
		{
			$result = unlink($filename);
			if (!$result)
			{
				display_error(_('The existing image could not be removed'));
				$input_error = 1;
			}
		}
		$_POST['coy_logo'] = "";
	}

	if ($_POST['add_pct'] == "")
		$_POST['add_pct'] = -1;
	if ($_POST['round_to'] <= 0)
		$_POST['round_to'] = 1;

	if ($input_error != 1){
	    $value_array = get_post( array('coy_name','coy_no','gst_no','tax_prd','tax_last',
				'postal_address','phone', 'fax', 'email', 'coy_logo', 'domicile',
				'use_dimension', 'curr_default', 'f_year',
				'no_item_list' => 0, 'no_customer_list' => 0,
				'no_supplier_list' =>0, 'base_sales',
				'time_zone' => 0, 'add_pct', 'round_to', 'login_tout', 'auto_curr_reval',
				'bcc_email'));
	    if( isset($filename_store)  ){
	        $value_array['coy_logo'] = $filename_store;
	    }

	    if( !$value_array['curr_default'] ){
	        unset($value_array['curr_default']);
	    }

// 	    bug($value_array);die;
		update_company_prefs($value_array);

		$_SESSION['wa_current_user']->timeout = $_POST['login_tout'];
		display_notification_centered(_("Company setup has been updated."));
	}
	set_focus('coy_name');
// 	$Ajax->activate('_page_body');
	$Ajax->redirect('company_preferences.php');
} /* end of if submit */

//---------------------------------------------------------------------------------------------
if (get_company_pref('bcc_email') === null) { // available from 2.3.14, can be not defined on pre-2.4 installations
	set_company_pref('bcc_email', 'setup.company', 'varchar', 100, '');
	refresh_sys_prefs();
}

start_form(true);
$myrow = get_company_prefs();
$field_set_post = array(
    'coy_name','gst_no','tax_prd','tax_last','coy_no','postal_address','coy_logo',
    'phone','fax','email','domicile','use_dimension','base_sales','no_item_list','no_customer_list','no_supplier_list',
    'curr_default','f_year','time_zone','version_id','add_pct','login_tout','round_to','auto_curr_reval','bcc_email',
    'self_bill_approval_ref','self_bill_start_date','self_bill_end_date'

);

foreach ( $field_set_post AS $field){
    if( isset($myrow[$field]) ) $_POST[$field]  =$myrow[$field];
}


if ($_POST['add_pct'] == -1)
	$_POST['add_pct'] = "";

$_POST['del_coy_logo']  = 0;


start_outer_table(TABLESTYLE2);

table_section(1);

text_row_ex(_("Name (to appear on reports):"), 'coy_name', 42, 50);
textarea_row(_("Address:"), 'postal_address', input_post('postal_address'), 35, 6);
text_row_ex(_("Domicile:"), 'domicile', 25, 55);

text_row_ex(_("Phone Number:"), 'phone', 25, 55);
text_row_ex(_("Fax Number:"), 'fax', 25);
email_row_ex(_("Email Address:"), 'email', 25, 55);

email_row_ex(_("BCC Address for all outgoing mails:"), 'bcc_email', 25, 55);

text_row_ex(_("Official Company Number:"), 'coy_no', 25);
text_row_ex(_("GSTNo:"), 'gst_no', 25);

currencies_list_row(_("Home Currency:"), 'curr_default', $_POST['curr_default']);
fiscalyears_list_row(_("Fiscal Year:"), 'f_year', $_POST['f_year']);
text_row_ex(_("Tax Periods:"), 'tax_prd', 10, 10, '', null, null, _('Months.'));
text_row_ex(_("Tax Last Period:"), 'tax_last', 10, 10, '', null, null, _('Months back.'));

if( defined('COUNTRY') && COUNTRY== 60 AND config_ci('kastam')==true ){
    table_section_title(_("Self Bill"));
    text_row_ex(_("Approval Ref:"), 'self_bill_approval_ref', 10, 10);
    date_row(_("Start Date:"), 'self_bill_start_date');
    date_row(_("End Date:"), 'self_bill_end_date');
} else {
    hidden('self_bill_approval_ref');
    hidden('self_bill_start_date');
    hidden('self_bill_end_date');
}


table_section(2);
// bug($myrow);
label_row(_("Company Logo:"), $myrow['coy_logo']);
file_row(_("New Company Logo (.jpg)") . ":", 'pic', 'pic');
check_row(_("Delete Company Logo:"), 'del_coy_logo', $_POST['del_coy_logo']);

//number_list_row(_("Use Dimensions:"), 'use_dimension', null, 0, 2);

sales_types_list_row(_("Base for auto price calculations:"), 'base_sales', $_POST['base_sales'], false,
    _('No base price list') );
text_row_ex(_("Add Price from Std Cost:"), 'add_pct', 10, 10, '', null, null, "%");
$curr = get_currency($_POST['curr_default']);
text_row_ex(_("Round to nearest:"), 'round_to', 10, 10, '', null, null, $curr['hundreds_name']);
label_row("", "&nbsp;");

check_row(_("Search Item List"), 'no_item_list', null);
check_row(_("Search Customer List"), 'no_customer_list', null);
check_row(_("Search Supplier List"), 'no_supplier_list', null);
label_row("", "&nbsp;");
check_row(_("Automatic Revaluation Currency Accounts"), 'auto_curr_reval', $_POST['auto_curr_reval']);
check_row(_("Time Zone on Reports"), 'time_zone', $_POST['time_zone']);
text_row_ex(_("Login Timeout:"), 'login_tout', 10, 10, '', null, null, _('seconds'));
//label_row(_("Version Id"), $_POST['version_id']);

end_outer_table(1);

hidden('coy_logo', input_val('coy_logo'));
// submit_center('update', _("Update"), true, '', false);
submit_center('update', _("Update"), true, '',  'default');

end_form(2);
//-------------------------------------------------------------------------------------------------

end_page();

?>
