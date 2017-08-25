<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-14 11:45:57
         compiled from "/var/www/atcore/ci/views/opening/inventory.html" */ ?>
<?php /*%%SmartyHeaderCode:179166817582933752962b9-14870145%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5edcb06d0c73ec11721a908e3f435abf34a30b9' => 
    array (
      0 => '/var/www/atcore/ci/views/opening/inventory.html',
      1 => 1456125670,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179166817582933752962b9-14870145',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fields' => 0,
    'field' => 0,
    'items' => 0,
    'name' => 0,
    'ite' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_582933753bf534_66635236',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582933753bf534_66635236')) {function content_582933753bf534_66635236($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['fields']->value)) {?>
	<table id="inventory_openning" >
		<thead><tr>
			<?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->_loop = true;
?>
				<td style="<?php if (isset($_smarty_tpl->tpl_vars['field']->value['w'])) {?>width: <?php echo $_smarty_tpl->tpl_vars['field']->value['w'];?>
px;<?php } elseif (isset($_smarty_tpl->tpl_vars['field']->value['size'])) {?>width: <?php echo $_smarty_tpl->tpl_vars['field']->value['size'];?>
%;<?php }?>" ><?php echo $_smarty_tpl->tpl_vars['field']->value['title'];?>
</td>
			<?php } ?>
			<td></td>
		</tr></thead>
		<tbody>
		<?php if (!empty($_smarty_tpl->tpl_vars['items']->value)) {
$_smarty_tpl->tpl_vars['ite'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ite']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ite']->key => $_smarty_tpl->tpl_vars['ite']->value) {
$_smarty_tpl->tpl_vars['ite']->_loop = true;
?>
			<tr>
				
				<?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->_loop = true;
 $_smarty_tpl->tpl_vars['name']->value = $_smarty_tpl->tpl_vars['field']->key;
?>
					<?php $_smarty_tpl->tpl_vars['val'] = new Smarty_variable(0, null, 0);?>
					<?php if (isset($_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['name']->value})) {?>
						<?php $_smarty_tpl->tpl_vars['val'] = new Smarty_variable($_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['name']->value}, null, 0);?>
					<?php }?>

					<?php if ($_smarty_tpl->tpl_vars['name']->value=='total') {?>
					<td>
						<?php echo form::formInput(array('type'=>$_smarty_tpl->tpl_vars['field']->value['type'],'field'=>$_smarty_tpl->tpl_vars['field']->value,'name'=>($_smarty_tpl->tpl_vars['name']->value).('_iventory[]'),'value'=>$_smarty_tpl->tpl_vars['ite']->value->cost*$_smarty_tpl->tpl_vars['ite']->value->qty),$_smarty_tpl);?>

						<?php echo form::inputHidden(array('name'=>"total[]",'value'=>$_smarty_tpl->tpl_vars['ite']->value->cost*$_smarty_tpl->tpl_vars['ite']->value->qty,'attr'=>' class="amount" '),$_smarty_tpl);?>

					</td>
					<?php } else { ?>
					<td><?php echo form::formInput(array('type'=>$_smarty_tpl->tpl_vars['field']->value['type'],'field'=>$_smarty_tpl->tpl_vars['field']->value,'name'=>($_smarty_tpl->tpl_vars['name']->value).('[]'),'value'=>$_smarty_tpl->tpl_vars['val']->value),$_smarty_tpl);?>
</td>
					<?php }?>

				<?php } ?>
				<td><?php echo form::inputHidden(array('name'=>"id[]",'value'=>$_smarty_tpl->tpl_vars['ite']->value->id),$_smarty_tpl);?>
 <button class="ajaxsubmit" ajax=false title="remove item" value=<?php echo $_smarty_tpl->tpl_vars['ite']->value->id;?>
 name="Remove" type="submit" ><span>Remove</span></button></td>
			</tr>
		<?php }
}?>

		<tr>
			<?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->_loop = true;
 $_smarty_tpl->tpl_vars['name']->value = $_smarty_tpl->tpl_vars['field']->key;
?>
				<td><?php echo form::formInput(array('type'=>$_smarty_tpl->tpl_vars['field']->value['type'],'field'=>$_smarty_tpl->tpl_vars['field']->value,'name'=>($_smarty_tpl->tpl_vars['name']->value).('[]')),$_smarty_tpl);?>
</td>
			<?php } ?>
			<td><?php echo form::inputHidden(array('name'=>"id[]",'value'=>0),$_smarty_tpl);?>
<button id="AddItem" class="ajaxsubmit" title="Add new item to document" value="Add Item" name="AddItem" type="submit" ><span>Add Item</span></button></td>
		</tr>
		</tbody>
	</table>

	<center style="padding-top: 10px;" ><button value="items" id="submit" name="update" aspect="default" type="submit" class="ajaxsubmit" ><img height="12" src="../../themes/template/images/ok.gif"><span>Update</span></button></center>

<?php }?><?php }} ?>
