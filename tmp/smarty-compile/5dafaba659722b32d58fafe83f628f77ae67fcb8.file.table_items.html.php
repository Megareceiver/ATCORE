<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-10 09:59:51
         compiled from "/var/www/atcore/ci_module/reporting/views/table_items.html" */ ?>
<?php /*%%SmartyHeaderCode:8010559405823d49712e5f8-19236271%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5dafaba659722b32d58fafe83f628f77ae67fcb8' => 
    array (
      0 => '/var/www/atcore/ci_module/reporting/views/table_items.html',
      1 => 1456125653,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8010559405823d49712e5f8-19236271',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'table' => 0,
    'title' => 0,
    'k' => 0,
    'amount_w' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5823d49714e991_41887262',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5823d49714e991_41887262')) {function content_5823d49714e991_41887262($_smarty_tpl) {?><table class="items" cellpadding="3" cellspacing="0">
	<tbody>
		<tr class="color_header" >
			<?php $_smarty_tpl->tpl_vars['k'] = new Smarty_variable(0, null, 0);?>
			<?php  $_smarty_tpl->tpl_vars['title'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['title']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['table']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['title']->key => $_smarty_tpl->tpl_vars['title']->value) {
$_smarty_tpl->tpl_vars['title']->_loop = true;
?>
			<td width="<?php echo pdf_smarty::pdf_column_w(array('w'=>$_smarty_tpl->tpl_vars['title']->value['w']),$_smarty_tpl);?>
" class="botop bobottom textbold <?php if (isset($_smarty_tpl->tpl_vars['title']->value['class'])) {
echo $_smarty_tpl->tpl_vars['title']->value['class'];
}?> <?php if ($_smarty_tpl->tpl_vars['k']->value==0) {?>boleft<?php }?>" ><?php echo $_smarty_tpl->tpl_vars['title']->value['title'];?>
</td>
			<?php $_smarty_tpl->tpl_vars['k'] = new Smarty_variable($_smarty_tpl->tpl_vars['k']->value+1, null, 0);?>
			<?php } ?>

			<td class="textright borderall textbold boleft" style="width: <?php echo $_smarty_tpl->tpl_vars['amount_w']->value;?>
mm;">Balance</td>

		</tr>
	</tbody>
</table><?php }} ?>
