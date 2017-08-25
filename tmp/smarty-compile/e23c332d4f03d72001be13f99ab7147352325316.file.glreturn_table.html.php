<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-09 21:50:06
         compiled from "/var/www/atcore/ci_module/dashboard/views/glreturn_table.html" */ ?>
<?php /*%%SmartyHeaderCode:19125727795823298ed204e4-04974345%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e23c332d4f03d72001be13f99ab7147352325316' => 
    array (
      0 => '/var/www/atcore/ci_module/dashboard/views/glreturn_table.html',
      1 => 1456125653,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19125727795823298ed204e4-04974345',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'items' => 0,
    'total' => 0,
    'ite' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5823298ed759d2_81522851',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5823298ed759d2_81522851')) {function content_5823298ed759d2_81522851($_smarty_tpl) {?><table class="table table-striped clearfix block border_ccc">


	<tbody>
	<?php if (count($_smarty_tpl->tpl_vars['items']->value)) {?>
	<?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable(0, null, 0);?>
	<?php  $_smarty_tpl->tpl_vars['ite'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ite']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ite']->key => $_smarty_tpl->tpl_vars['ite']->value) {
$_smarty_tpl->tpl_vars['ite']->_loop = true;
?>
		<?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable($_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['ite']->value->total, null, 0);?>
		<tr>
			<td style="width: 200px;" class="titlecolor" ><?php echo $_smarty_tpl->tpl_vars['ite']->value->class_name;?>
</td>
			<td class="text-right"><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['ite']->value->total),$_smarty_tpl);?>
</td>
		</tr>
	<?php } ?>

	<?php } else { ?>
		<tr><td colspan="<?php echo count($_smarty_tpl->tpl_vars['items']->value);?>
" class="center" >No Items</td> </tr>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['total']->value>0) {?>
	<tr>
		<td class="titlecolor">Calculated Return</td>
		<td class="text-right" ><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['total']->value),$_smarty_tpl);?>
</td>

	</tr>
	<?php }?>
	</tbody>
</table>
<?php }} ?>
