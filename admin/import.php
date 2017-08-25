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
$path_to_root="..";

include($path_to_root . "/includes/session.inc");
// page(_($help_context = "Import Data"));

include_once($path_to_root . "/includes/ui.inc");
include_once($path_to_root . "/admin/db/import_db.php");
include_once($path_to_root . "/includes/db_pager.inc");


if( isset( $_GET['reset'] ) && $_GET['reset']=='at' ){
	$ci->db->query('TRUNCATE import_process;');
	$ci->db->query('TRUNCATE import_products;');
	$ci->db->query('TRUNCATE import_supplier;');
	$ci->db->query('TRUNCATE import_units;');
	$ci->db->query('TRUNCATE import_customer;');

}


$import = new import_data();
simple_page_mode(true);
//-----------------------------------------------------------------------------------
$type='do_upload';
if( isset($_GET['type']) ){
	$type = $_GET['type'];
}

$data = $ci->db->query('SELECT * FROM import_process WHERE complate < total')->row();
if( $type=='check' ){
	if( $data ){
		$data->subdomain = $user;
	}

	echo json_encode($data); die;
} else if ($type=='status' && isset($_GET['process']) ) {
	$data = $ci->db->query('SELECT * FROM import_process WHERE id='.$_GET['process'])->row();
	echo json_encode($data); die;
}

$js = add_js_ufile('/js/jquery.min.js').add_js_ufile('/js/import.js');


page(_("Import Data"),false, false, "", $js);


if( $data && isset($data->id) ){
	echo "<script type='text/javascript'>setTimeout(check_import, 500); tab_actions(); </script>";
} else {
	echo "<script type='text/javascript'>$( document ).ready(function() { import_items_action(); tab_actions(); });</script>";

}

if ($Mode=='ADD_ITEM' ){
	$input_error = 0;

	if (isset($_FILES['excelfile']) && $_FILES['excelfile']['name'] != '') {
// 		$result = $_FILES['excelfile']['error'];
		$filepath = company_path()."/import";
		if (!file_exists($filepath)){
			mkdir($filepath);
		}
		$fileinfo = pathinfo($_FILES['excelfile']['name']);
		$filename = clean_file_name($fileinfo['filename'].'_'.time().'.'.$fileinfo['extension']);

// 		//But check for the worst
		if (!in_array( $fileinfo['extension'], array('xls','XLS','xlsx','XLSX'))){
// 			display_error(_('Only XLS files are supported - a file extension of '.$fileinfo['extension'].' is expected'));
// 			$input_error = 1;
		} elseif ( $_FILES['excelfile']['size'] > ($max_image_size * 1024)) {
// 			display_error(_('The file size is over the maximum allowed. The maximum size allowed in KB is') . ' ' . $max_image_size);
// 			$input_error = 1;
		} elseif (file_exists($filename)) {

		}

		if ($input_error != 1){
			$result  =  move_uploaded_file($_FILES['excelfile']['tmp_name'], $filepath.'/'.$filename);

			if(!$result){
				display_error(_('Error uploading logo file'));
			} else {
				$import->readfile($filename);
			}
		}
	}
	$Mode = 'RESET';
} else {
	display_note(_("Upload Excel file to import data into system"), 0, 1);
	display_note( anchor('company/Data_Migration_Template.xls','File template & Guide'), 0, 1);
}


if ($Mode == 'RESET'){
	$selected_id = -1;
	$sav = get_post('show_inactive');
	unset($_POST);
	$_POST['show_inactive'] = $sav;
	header("Location: /admin/import.php");
}

if( isset($_GET['remove_product']) ){
	$ci->db->where('id', $_GET['remove_product'])->delete('import_products');
	header("Location: /admin/import.php?_tabs_sel=product");
}

if( isset($_GET['remove_supplier']) ){
	$ci->db->where('id', $_GET['remove_supplier'])->delete('import_supplier');
	header("Location: /admin/import.php?_tabs_sel=supplier");
}
if( isset($_GET['remove_customer']) ){
	$ci->db->where('id', $_GET['remove_customer'])->delete('import_customer');
	header("Location: /admin/import.php?_tabs_sel=customer");
}



function show_data_product(){
	global $ci,$import;


	$page = 0;
	if( isset($_GET['page'] ) ){
		$page = $_GET['page']-1;
	}

	$limit = 50;
	if( isset($_POST['add_product']) && $_POST['add_product'] ){
		$products = $_POST['product'];
		if( $products && count($products) > 0 ){
			foreach ($products AS $pro){
				$import->add_product($pro);
			}
		}
	}

	$field = array(
		'stock_id'=>'Product Code',
		//'stock_id'=>'Product Code',
		'description'=>'Product Name',
		'category_id'=>'Category',
	);

	$html = '<table class="tablestyle" >';
	if( $field ){
		$button = '<tr class="notitle" ><td colspan=2 >'.submit('add_product', _("Import Product"), false, _('Submit changes')).$ci->db->count_all('import_products').'</td><td colspan=3></td></tr>';

		$html.= '<thead>'.$button.'<tr>';
		$html.='<td class="center" ><input type="checkbox" name="checkall" ></td>';
		foreach ($field AS $name=>$title){
			$html.="<td >$title</td>";
		}
		$html.="<td></td>";
		$html.= '</tr></thead>';
	}

	$items = $ci->db->select('id,stock_id, description, category_id')->get('import_products',$limit,$limit* $page)->result();


	if( $items && count($items) > 0){
		$html.= '<tbody>';
		foreach ($items AS $ite){

			$duplicate = $ci->db->where('stock_id',$ite->stock_id)->get('stock_master')->row();

			$html.= '<tr class="'.( ($duplicate && isset($duplicate->stock_id)) ? 'red' : null) .'">';
			$html.='<td class="center" ><input type="checkbox" name="product[]" value="'.$ite->id.'" ></td>';
			foreach ($field AS $name=>$title){
				$value = $ite->$name;
				$html.="<td >$value</td>";
			}
			$html.='<td >'
				//.anchor('#',set_icon(ICON_EDIT,'Remove'),' class="row_edit" ')
				.anchor('admin/import.php?remove_product='.$ite->id,set_icon(ICON_DELETE,'Remove'),' class="row_remove" ')
			.'</td>';

			$html.= '</tr>';
		}

		$_GET['_tabs_sel'] = 'product';

		$html.= '<tfoot><tr>'
					.'<td colspan=5 ></td></tr>'
					.paging_control_row(5,$limit,$page, $ci->db->count_all('import_products'),false)
				.'</tfoot>';

		$html.= '</tbody>';
	} else {
		header("Location: /admin/import.php");
	}
	echo $html;
}

function show_data_supplier(){
	global $ci,$import;
	$limit = 50;



	$page = 0;
	if( isset($_GET['page'] ) ){
		$page = $_GET['page']-1;
	}

	if( isset($_POST['add_supplier']) && $_POST['add_supplier'] ){
		$supplier = $_POST['supplier'];
		if( $supplier && count($supplier) > 0 ){

			foreach ($supplier AS $pro){
				$import->add_supplier($pro);
			}
		}


	}
	$field = array(
			'supp_ref'=>'Short Name',
			//'stock_id'=>'Product Code',
			'supp_name'=>'Supplier Name',
			'supp_account_no'=>'Our Customer No',
	);

	$html = '<table class="tablestyle" >';
	if( $field ){
		$button = '<tr class="notitle" ><td colspan=2 >'.submit('add_supplier', _("Import Supplier"), false, _('Submit changes')).$ci->db->count_all('import_supplier').'</td><td colspan=3></td></tr>';

		$html.= '<thead>'.$button.'<tr>';

		$html.='<td class="center" ><input type="checkbox" name="checkall" ></td>';
		foreach ($field AS $name=>$title){
			$html.="<td >$title</td>";
		}
		$html.="<td></td>";
		$html.= '</tr></thead>';
	}

	$items = $ci->db->select('id,supp_ref, supp_name, supp_account_no')->get('import_supplier',$limit,$limit*$page)->result();


	if( $items && count($items) > 0){
		$html.= '<tbody>';
		foreach ($items AS $ite){
			$duplicate = $ci->db->where('supp_ref',$ite->supp_ref)->get('suppliers')->row();

			$html.= '<tr class="'.( ($duplicate && isset($duplicate->supplier_id)) ? 'red' : null) .'">';
			$html.='<td class="center" ><input type="checkbox" name="supplier[]" value="'.$ite->id.'" ></td>';
			foreach ($field AS $name=>$title){
				$value = $ite->$name;
				$html.="<td >$value</td>";
			}
			$html.='<td >'
					//.anchor('#',set_icon(ICON_EDIT,'Remove'),' class="row_edit" ')
					.anchor('admin/import.php?remove_supplier='.$ite->id,set_icon(ICON_DELETE,'Remove'),' class="row_remove" ')
					.'</td>';

			$html.= '</tr>';
		}



		$_GET['_tabs_sel'] = 'supplier';
		$html.= '<tfoot><tr>'
				.'<td colspan=5 ></td></tr>'
						.paging_control_row(5,$limit,$page, $ci->db->count_all('import_supplier'),false)
						.'</tfoot>';

		$html.= '</tbody>';
	} else {
		header("Location: /admin/import.php");
	}
	echo $html;
}

function show_data_customer(){
	global $ci,$import;
	$limit = 50;

	$page = 0;
	if( isset($_GET['page'] ) ){
		$page = $_GET['page']-1;
	}


	if( isset($_POST['add_customer']) && $_POST['add_customer'] ){
		$supplier = $_POST['customer'];
		if( $supplier && count($supplier) > 0 ){
			foreach ($supplier AS $pro){
				$import->add_customer($pro);
			}
		}


	}
	$field = array(
			'debtor_ref'=>'Short Name',
			'name'=>'Customer Name',
			//'stock_id'=>'Product Code',
			'tax_id'=>'GST No.',

	);

	$html = '<table class="tablestyle" >';
	if( $field ){
		$button = '<tr class="notitle" ><td colspan=2 >'.submit('add_customer', _("Import Customer"), false, _('Submit changes')).$ci->db->count_all('import_customer').'</td><td colspan=3></td></tr>';

		$html.= '<thead>'.$button.'<tr>';

		//$html.= '<thead><tr><td>'.submit('add_customer', _("Import Customer"), false, _('Submit changes')).$ci->db->count_all('import_customer').'</td><td colspan=5></td></tr><tr>';


		$html.='<td class="center" ><input type="checkbox" name="checkall" ></td>';
		foreach ($field AS $name=>$title){
			$html.="<td >$title</td>";
		}
		$html.="<td></td>";
		$html.= '</tr></thead>';
	}

	$items = $ci->db->select('id,debtor_ref, name, curr_code,tax_id')->get('import_customer',$limit,$limit*$page )->result();


	if( $items && count($items) > 0){
		$html.= '<tbody>';
		foreach ($items AS $ite){
			$duplicate = $ci->db->where('debtor_ref',$ite->debtor_ref)->get('debtors_master')->row();
			// bug($duplicate);
			$html.= '<tr class="'.( ($duplicate && isset($duplicate->debtor_no)) ? 'red' : null) .'">';
			$html.='<td class="center" ><input type="checkbox" name="customer[]" value="'.$ite->id.'" ></td>';

			foreach ($field AS $name=>$title){
				$value = $ite->$name;
				$html.="<td >$value</td>";
			}
			$html.='<td >'
					//.anchor('#',set_icon(ICON_EDIT,'Remove'),' class="row_edit" ')
					.anchor('admin/import.php?remove_customer='.$ite->id,set_icon(ICON_DELETE,'Remove'),' class="row_remove" ')
					.'</td>';

			$html.= '</tr>';
		}



		$_GET['_tabs_sel'] = 'customer';
		$html.= '<tfoot><tr>'
				.'<td colspan=5 ></td></tr>'
						.paging_control_row(5,$limit,$page, $ci->db->count_all('import_customer'),false)
						.'</tfoot>';

		$html.= '</tbody>';
	}  else {
		header("Location: /admin/import.php");
	}
	echo $html;
}



if( isset($_GET['_tabs_sel']) ){
	$_POST['_tabs_sel'] = $_GET['_tabs_sel'];

}
//-----------------------------------------------------------------------------------
function show_data(){
	global $ci;
	$list_view = array();

	if( $ci->db->table_exists('import_products') && $ci->db->count_all('import_products') > 0 ){
		$list_view['product'] = array(_('Products'), 1);
	}

	if( $ci->db->table_exists('import_supplier') && $ci->db->count_all('import_supplier') > 0 ){
		$list_view['supplier'] = array(_('Suppliers'), 1);
	}

	if( $ci->db->table_exists('import_customer') && $ci->db->count_all('import_customer') > 0 ){
		$list_view['customer'] = array(_('Customer'), 1);
	}

	if( !empty($list_view) ){
		tabbed_content_start('tabs', $list_view);
	}

	switch (get_post('_tabs_sel')){
		case 'product': show_data_product();break;
		case 'supplier': show_data_supplier();break;
		case 'customer': show_data_customer();break;
		default: break;
	}
	tabbed_content_end();
}


start_form(TRUE);



//-----------------------------------------------------------------------------------

start_table(TABLESTYLE2);
echo '<tr><td class="label" style="width:20%;" >'._("Data File:").'</td>';
file_cells(null, 'excelfile',null);
echo '<td class="label" style="width:40%;" >';
submit('ADD_ITEM', _("Upload New File"), 'both', _('Submit changes'));
echo '</td>';
echo '</tr>';
end_table(1);

show_data();



// switch (get_post('_tabs_sel')) {
// 	default:
// 	case 'settings':
// 		customer_settings($selected_id);
// 		break;
// 	case 'contacts':
// 		$contacts = new contacts('contacts', $selected_id, 'customer');
// 		$contacts->show();
// 		break;
// 	case 'transactions':
// 		$_GET['customer_id'] = $selected_id;
// 		$_GET['popup'] = 1;
// 		include_once($path_to_root."/sales/inquiry/customer_inquiry.php");
// 		break;
// 	case 'orders':
// 		$_GET['customer_id'] = $selected_id;
// 		$_GET['popup'] = 1;
// 		include_once($path_to_root."/sales/inquiry/sales_orders_view.php");
// 		break;
// };


end_form();

end_page();

?>
