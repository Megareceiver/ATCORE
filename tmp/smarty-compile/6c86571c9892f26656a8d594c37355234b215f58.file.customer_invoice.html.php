<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-10 10:04:31
         compiled from "/var/www/atcore/ci/views/sale/customer_invoice.html" */ ?>
<?php /*%%SmartyHeaderCode:19705720365823d5afc987c3-77519336%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c86571c9892f26656a8d594c37355234b215f58' => 
    array (
      0 => '/var/www/atcore/ci/views/sale/customer_invoice.html',
      1 => 1475207911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19705720365823d5afc987c3-77519336',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'table' => 0,
    'field' => 0,
    'th' => 0,
    'items' => 0,
    'k' => 0,
    'name' => 0,
    'ite' => 0,
    'subtotal' => 0,
    'ChargeFreightCost' => 0,
    'taxes' => 0,
    'tax' => 0,
    'tax_included' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5823d5afdbbac0_62851241',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5823d5afdbbac0_62851241')) {function content_5823d5afdbbac0_62851241($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['table']->value)) {?>
<?php $_smarty_tpl->tpl_vars['subtotal'] = new Smarty_variable(0, null, 0);?>
	<table class="tablestyle" width="70%" cellspacing="0" cellpadding="2" colspan="8">
		<thead><tr>
			<?php  $_smarty_tpl->tpl_vars['th'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['th']->_loop = false;
 $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['table']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['th']->key => $_smarty_tpl->tpl_vars['th']->value) {
$_smarty_tpl->tpl_vars['th']->_loop = true;
 $_smarty_tpl->tpl_vars['field']->value = $_smarty_tpl->tpl_vars['th']->key;
?>
				<?php if ($_smarty_tpl->tpl_vars['field']->value=='edit'||$_smarty_tpl->tpl_vars['field']->value=='remove') {?>
					<th class="tableheader textcenter" style="width: 5px;" ></th>
				<?php } else { ?>
					<th class="tableheader <?php if (isset($_smarty_tpl->tpl_vars['th']->value['class'])) {?> <?php echo $_smarty_tpl->tpl_vars['th']->value['class'];
}?>" <?php if (isset($_smarty_tpl->tpl_vars['th']->value['w'])) {?>style="width: <?php echo $_smarty_tpl->tpl_vars['th']->value['w'];?>
%;" <?php }?>><?php echo $_smarty_tpl->tpl_vars['th']->value['title'];?>
</th>
				<?php }?>
			<?php } ?>
		</tr></thead>
		<?php $_smarty_tpl->tpl_vars['name'] = new Smarty_variable('inputname', null, 0);?>
		<tbody><?php  $_smarty_tpl->tpl_vars['ite'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ite']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ite']->key => $_smarty_tpl->tpl_vars['ite']->value) {
$_smarty_tpl->tpl_vars['ite']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['ite']->key;
?>
			<tr><?php  $_smarty_tpl->tpl_vars['th'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['th']->_loop = false;
 $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['table']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['th']->key => $_smarty_tpl->tpl_vars['th']->value) {
$_smarty_tpl->tpl_vars['th']->_loop = true;
 $_smarty_tpl->tpl_vars['field']->value = $_smarty_tpl->tpl_vars['th']->key;
?>
				<td <?php if (isset($_smarty_tpl->tpl_vars['th']->value['class'])) {?> class="<?php echo $_smarty_tpl->tpl_vars['th']->value['class'];?>
" <?php }?>>
				<?php $_smarty_tpl->tpl_vars['name'] = new Smarty_variable((((("line[").($_smarty_tpl->tpl_vars['k']->value)).("][")).($_smarty_tpl->tpl_vars['field']->value)).("]"), null, 0);?>

				<?php if ($_smarty_tpl->tpl_vars['field']->value=='total') {?>
					<?php echo form::formInput(array('name'=>$_smarty_tpl->tpl_vars['name']->value,'class'=>'title number money','readonly'=>1,'value'=>0),$_smarty_tpl);?>

				<?php } elseif ($_smarty_tpl->tpl_vars['field']->value=='stock_id') {?>
					<?php echo form::anchor(array('uri'=>('inventory/inquiry/stock_status.php?stock_id=').($_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['field']->value}),'title'=>$_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['field']->value},'opennew'=>1),$_smarty_tpl);?>

					<?php echo form::inputHidden(array('name'=>$_smarty_tpl->tpl_vars['name']->value,'value'=>$_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['field']->value}),$_smarty_tpl);?>

				<?php } elseif ($_smarty_tpl->tpl_vars['field']->value=='discount_percent') {?>
					<?php echo form::formInput(array('name'=>$_smarty_tpl->tpl_vars['name']->value,'class'=>'title number money','readonly'=>1,'value'=>$_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['field']->value}*100),$_smarty_tpl);?>

				<?php } elseif ($_smarty_tpl->tpl_vars['field']->value=='edit') {?>
					<?php echo formlist::editAjax(array(),$_smarty_tpl);?>

				<?php } elseif ($_smarty_tpl->tpl_vars['field']->value=='remove') {?>
					<?php echo formlist::removeAjax(array(),$_smarty_tpl);?>

				<?php } elseif ($_smarty_tpl->tpl_vars['field']->value=='tax_type_id') {?>
					<?php echo formlist::input_tax_title(array('name'=>$_smarty_tpl->tpl_vars['name']->value,'value'=>$_smarty_tpl->tpl_vars['ite']->value->tax_type_id),$_smarty_tpl);?>



				<?php } else { ?>
					<?php echo form::formInput(array('name'=>$_smarty_tpl->tpl_vars['name']->value,'value'=>$_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['field']->value},'class'=>'title','readonly'=>1),$_smarty_tpl);?>

				<?php }?>
				</td><?php } ?>
				<?php $_smarty_tpl->tpl_vars['subtotal'] = new Smarty_variable($_smarty_tpl->tpl_vars['subtotal']->value+$_smarty_tpl->tpl_vars['ite']->value->qty_dispatched*$_smarty_tpl->tpl_vars['ite']->value->price*(1-$_smarty_tpl->tpl_vars['ite']->value->discount_percent), null, 0);?>
			<?php } ?></tr>

			<tr>
			<?php  $_smarty_tpl->tpl_vars['th'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['th']->_loop = false;
 $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['table']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['th']->key => $_smarty_tpl->tpl_vars['th']->value) {
$_smarty_tpl->tpl_vars['th']->_loop = true;
 $_smarty_tpl->tpl_vars['field']->value = $_smarty_tpl->tpl_vars['th']->key;
?> <?php if ($_smarty_tpl->tpl_vars['field']->value!='edit'&&$_smarty_tpl->tpl_vars['field']->value!='remove') {?>
				<td class="<?php if (isset($_smarty_tpl->tpl_vars['th']->value['class'])) {?> <?php echo $_smarty_tpl->tpl_vars['th']->value['class'];?>
 <?php }?>" >

				<?php if ($_smarty_tpl->tpl_vars['field']->value=='price') {?>
					<?php echo form::formInput(array('name'=>$_smarty_tpl->tpl_vars['field']->value,'class'=>'number'),$_smarty_tpl);?>

				<?php } elseif ($_smarty_tpl->tpl_vars['field']->value=='tax_type_id') {?>
					<?php echo formlist::input_taxes(array('name'=>$_smarty_tpl->tpl_vars['field']->value,'trans'=>2),$_smarty_tpl);?>

				<?php } elseif ($_smarty_tpl->tpl_vars['field']->value=='item_description') {?>
					<?php echo formlist::input_products(array('name'=>$_smarty_tpl->tpl_vars['field']->value),$_smarty_tpl);?>

				<?php } elseif ($_smarty_tpl->tpl_vars['field']->value=='total'||$_smarty_tpl->tpl_vars['field']->value=='units'||$_smarty_tpl->tpl_vars['field']->value=='qty_dispatched'||$_smarty_tpl->tpl_vars['field']->value=='qty_done') {?>
					<?php echo form::formInput(array('name'=>$_smarty_tpl->tpl_vars['field']->value,'class'=>'title','readonly'=>1,'attr'=>'readonly'),$_smarty_tpl);?>


				<?php } else { ?>
					<?php echo form::formInput(array('name'=>$_smarty_tpl->tpl_vars['field']->value),$_smarty_tpl);?>

				<?php }?>
				</td>
			<?php }
} ?>

				<td colspan="2">
					<a href="javascript:void(0)" class="add-item ajaxsubmit" >Add Item</a>
				</td>
			</tr>
		</tbody>
		<tfoot ><tr class="edit-row" style="display: none;" >
			<?php  $_smarty_tpl->tpl_vars['th'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['th']->_loop = false;
 $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['table']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['th']->key => $_smarty_tpl->tpl_vars['th']->value) {
$_smarty_tpl->tpl_vars['th']->_loop = true;
 $_smarty_tpl->tpl_vars['field']->value = $_smarty_tpl->tpl_vars['th']->key;
?>
				<td class="<?php if (isset($_smarty_tpl->tpl_vars['th']->value['class'])) {?> <?php echo $_smarty_tpl->tpl_vars['th']->value['class'];?>
 <?php }?>" >
				<?php if ($_smarty_tpl->tpl_vars['field']->value=='edit') {?>
					<?php echo formlist::saveAjax(array(),$_smarty_tpl);?>

				<?php } elseif ($_smarty_tpl->tpl_vars['field']->value=='remove') {?>
					<?php echo formlist::cancelAjax(array(),$_smarty_tpl);?>


				<?php } elseif ($_smarty_tpl->tpl_vars['field']->value=='price') {?>
					<?php echo form::formInput(array('name'=>$_smarty_tpl->tpl_vars['field']->value,'class'=>'number'),$_smarty_tpl);?>

				<?php } elseif ($_smarty_tpl->tpl_vars['field']->value=='tax_type_id') {?>
					<?php echo formlist::input_taxes(array('name'=>$_smarty_tpl->tpl_vars['field']->value,'trans'=>2),$_smarty_tpl);?>

				<?php } elseif ($_smarty_tpl->tpl_vars['field']->value=='item_description') {?>
					<?php echo formlist::input_products(array('name'=>$_smarty_tpl->tpl_vars['field']->value),$_smarty_tpl);?>

				<?php } elseif ($_smarty_tpl->tpl_vars['field']->value=='total'||$_smarty_tpl->tpl_vars['field']->value=='units'||$_smarty_tpl->tpl_vars['field']->value=='units'||$_smarty_tpl->tpl_vars['field']->value=='qty_dispatched'||$_smarty_tpl->tpl_vars['field']->value=='qty_done') {?>
					<?php echo form::formInput(array('name'=>$_smarty_tpl->tpl_vars['field']->value,'class'=>'title','readonly'=>1),$_smarty_tpl);?>

				<?php } elseif ($_smarty_tpl->tpl_vars['field']->value=='tax_type_name') {?>
					<?php echo formlist::input_taxes(array('name'=>$_smarty_tpl->tpl_vars['field']->value,'trans'=>2),$_smarty_tpl);?>


				<?php } else { ?>
					<?php echo form::formInput(array('name'=>$_smarty_tpl->tpl_vars['field']->value),$_smarty_tpl);?>

				<?php }?>
				</td>
			<?php } ?>
			<tr>
				<td align="right" colspan="9">Shipping Cost</td>
				<td colspan="3" align="right" ><input type="text" value="<?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['ChargeFreightCost']->value,'amount'=>1),$_smarty_tpl);?>
" name="ChargeFreightCost" style="width: 95%;"></td>
			</tr>
			<?php if ($_smarty_tpl->tpl_vars['taxes']->value&&count($_smarty_tpl->tpl_vars['taxes']->value)>0) {
$_smarty_tpl->tpl_vars['tax'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tax']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['taxes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tax']->key => $_smarty_tpl->tpl_vars['tax']->value) {
$_smarty_tpl->tpl_vars['tax']->_loop = true;
?>
				<tr>
					<td align="right" colspan="9"><?php echo $_smarty_tpl->tpl_vars['tax']->value->name;?>
 (<?php echo $_smarty_tpl->tpl_vars['tax']->value->rate;?>
%) <?php if ($_smarty_tpl->tpl_vars['tax_included']->value==1) {
echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['tax']->value->value),$_smarty_tpl);
}?></td><td align="right" colspan="3" ><?php if ($_smarty_tpl->tpl_vars['tax_included']->value!=1) {
echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['tax']->value->value),$_smarty_tpl);
}?></td>
				</tr>
			<?php }
}?>
			<tr>
				<td align="right" colspan="9">Sub-total</td><td align="right" colspan="3" ><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['subtotal']->value+$_smarty_tpl->tpl_vars['ChargeFreightCost']->value,'amount'=>1),$_smarty_tpl);?>
</td>
			</tr>
		</tr></tfoot>
	</table><br>
<?php }?><?php }} ?>
