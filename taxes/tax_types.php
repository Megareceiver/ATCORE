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
$page_security = 'SA_TAXRATES';
$path_to_root = "..";

include($path_to_root . "/includes/session.inc");
page(_($help_context = "Tax Types"));

include_once($path_to_root . "/includes/ui.inc");
include_once($path_to_root . "/taxes/db/tax_types_db.inc");

simple_page_mode(true);
//-----------------------------------------------------------------------------------

function can_process(){
	global $selected_id;

	if (strlen($_POST['name']) == 0){
		display_error(_("The tax type name cannot be empty."));
		set_focus('name');
		return false;
	}
	elseif (!check_num('rate', 0))
	{
		display_error( _("The default tax rate must be numeric and not less than zero."));
		set_focus('rate');
		return false;
	}

	//if (!is_tax_gl_unique(get_post('sales_gl_code'), get_post('purchasing_gl_code'), $selected_id)) {
	//	display_error( _("Selected GL Accounts cannot be used by another tax type."));
	//	set_focus('sales_gl_code');
	//	return false;
	//}
	return true;
}

//-----------------------------------------------------------------------------------

if ($Mode=='ADD_ITEM' && can_process())
{
    //if($_POST['inactive'] == 1) $_POST['inactive'] = 0;
    //else  $_POST['inactive'] = 1;
	add_tax_type($_POST['name'], $_POST['sales_gl_code'],$_POST['purchasing_gl_code'], input_num('rate', 0),$_POST['gst_03_type'],null,$_POST['use_for']);
	display_notification(_('New tax type has been added'));
	$Mode = 'RESET';
}

//-----------------------------------------------------------------------------------

if ($Mode=='UPDATE_ITEM' && can_process()){
    //if($_POST['inactive'] == 1) $_POST['inactive'] = 0;
    //else $_POST['inactive'] = 1;
	update_tax_type($selected_id, $_POST['name'], $_POST['sales_gl_code'], $_POST['purchasing_gl_code'], input_num('rate'),input_val('gst_03_type'),null,$_POST['use_for']);
	display_notification(_('Selected tax type has been updated'));
	$Mode = 'RESET';
}

//-----------------------------------------------------------------------------------

function can_delete($selected_id)
{
	if (key_in_foreign_table($selected_id, 'tax_group_items', 'tax_type_id'))
	{
		display_error(_("Cannot delete this tax type because tax groups been created referring to it."));

		return false;
	}

	return true;
}


//-----------------------------------------------------------------------------------

if ($Mode == 'Delete'){
	if (can_delete($selected_id)){
		delete_tax_type($selected_id);
		display_notification(_('Selected tax type has been deleted'));
	}
	$Mode = 'RESET';
}

if ($Mode == 'RESET')
{
	$selected_id = -1;
	$sav = get_post('show_inactive');
	unset($_POST);
	$_POST['show_inactive'] = $sav;
}
//-----------------------------------------------------------------------------------

// $result = get_all_tax_types(check_value('show_inactive'));

$taxes = $ci->api_membership->get_data('taxdetail');
$tax_model = $ci->model('tax',true);

start_form();

display_note(_("To avoid problems with manual journal entry all tax types should have unique Sales/Purchasing GL accounts."), 0, 1);
start_table(TABLESTYLE);

$th = array(_("Description"), _("Default Rate (%)"), _("Sales GL Account"), _("Purchasing GL Account"),_('Type'), "");
inactive_control_column($th);
table_header($th);

$k = 0;
$taxcode_options = $ci->api->get_data("tax_code",true);
$taxcode_options = $taxcode_options['options'];

foreach ($taxes AS $tax) {
	$tax_gl = $tax_model->get_row($tax->id);
	if( !is_object($tax_gl) ){
	    $ci->db->insert('tax_types',array('id'=>$tax->id,'name'=>$tax->name,'rate'=>$tax->rate,'inactive'=>1,'sales_gl_code'=>2150,'purchasing_gl_code'=>1300) );
	    $tax_gl = $tax_model->get_row($tax->id);
	}
	alt_table_row_color($k);
	label_cell($tax->name);
	label_cell(percent_format($tax->rate), "align=right");
	label_cell($tax_gl->sales_gl_code . "&nbsp;" . $tax_gl->SalesAccountName );
	label_cell($tax_gl->purchasing_gl_code . "&nbsp;" . $tax_gl->PurchasingAccountName );


	label_cell($tax->no);


	inactive_control_cell($tax->id,1, 'tax_types', 'id');
	edit_button_cell("Edit".$tax->id, _("Edit"));
	//  	delete_button_cell("Delete".$myrow["id"], _("Delete"));

	end_row();
}

inactive_control_row($th);
end_table(1);
//-----------------------------------------------------------------------------------

start_table(TABLESTYLE2);
if ($Mode == 'Edit'):
    $tax_type = NULL;
    $tax_rate = 0;

        if ($selected_id != -1) {
         	if ($Mode == 'Edit') {
        		//editing an existing status code
         	    $tax_row = $ci->api_membership->get_data("taxdetail/$selected_id");
//          	    bug($tax_row);
        		$myrow = get_tax_type($selected_id);
//         bug($myrow);
        		$_POST['name']  = $tax_row->name;
        		$_POST['rate']  = percent_format($tax_row->rate);
        		$_POST['sales_gl_code']  = $myrow["sales_gl_code"];
        		$_POST['purchasing_gl_code']  = $myrow["purchasing_gl_code"];
                //

                $_POST['active'] = ( isset($myrow['active'])) ? $myrow['active'] : 0;
                $_POST['gst_03_type'] = $myrow['gst_03_type'];
        //         $_POST['f3_box']=$myrow['f3_box'];
                $_POST['use_for']=$tax_row->use_for;
        	}
        	hidden('selected_id', $selected_id);
        	$tax_api =$ci->api_membership->get_data('taxdetail/'.$selected_id);
        	$tax_type = $tax_api->no;
        	$tax_rate = $tax_api->rate;

//         	$tax_type =
        }

        label_row( _("Description :"),$tax_row->name);
        hidden('name', $tax_row->name);


        label_row( _("Default Rate :"),number_format2($tax_rate,2).' %');
        hidden('rate', $tax_rate);

        gl_all_accounts_list_row(_("Sales GL Account:"), 'sales_gl_code', null);
        gl_all_accounts_list_row(_("Purchasing GL Account:"), 'purchasing_gl_code', null);

        //check_row(_("Active"),'inactive',1,0);

        // text_row_ex(_("GST 03 Box  :"),'f3_box',50);
//         tax_types_list_row(_("Type :"),'gst_03_type',null);

        label_row( _("Type :"),$tax_type);
        tax_use_for_list_row('Use In','use_for');

        //function customer_list_row($label, $name, $selected_id, $all_option=false, $submit_on_change=false)


        end_table(1);
        if ($Mode == 'Edit') {
        	submit_add_or_update_center($selected_id == -1, '', 'both');
        }
        end_form();
endif;
end_page();

?>
