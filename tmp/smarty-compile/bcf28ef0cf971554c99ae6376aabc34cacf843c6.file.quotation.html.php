<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-11 12:30:43
         compiled from "/var/www/atcore/ci/views/reporting/aux_info/quotation.html" */ ?>
<?php /*%%SmartyHeaderCode:30816566058254973a2e036-54916295%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bcf28ef0cf971554c99ae6376aabc34cacf843c6' => 
    array (
      0 => '/var/www/atcore/ci/views/reporting/aux_info/quotation.html',
      1 => 1456125669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30816566058254973a2e036-54916295',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'items' => 0,
    'ite' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58254973a41f71_45538433',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58254973a41f71_45538433')) {function content_58254973a41f71_45538433($_smarty_tpl) {?><div class="container wrapper">
	<table class="common" cellpadding="3" cellspacing="0"  >

		<thead ><tr class="color_header" >
			<?php  $_smarty_tpl->tpl_vars['ite'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ite']->_loop = false;
 $_smarty_tpl->tpl_vars['title'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ite']->key => $_smarty_tpl->tpl_vars['ite']->value) {
$_smarty_tpl->tpl_vars['ite']->_loop = true;
 $_smarty_tpl->tpl_vars['title']->value = $_smarty_tpl->tpl_vars['ite']->key;
?>
			<td width="<?php echo $_smarty_tpl->tpl_vars['ite']->value['w'];?>
%" class="textcenter"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</td>
			<?php } ?>

		</tr></thead>

		<tbody ><tr>
			<?php  $_smarty_tpl->tpl_vars['ite'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ite']->_loop = false;
 $_smarty_tpl->tpl_vars['title'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ite']->key => $_smarty_tpl->tpl_vars['ite']->value) {
$_smarty_tpl->tpl_vars['ite']->_loop = true;
 $_smarty_tpl->tpl_vars['title']->value = $_smarty_tpl->tpl_vars['ite']->key;
?>
			<td class="textcenter" ><?php echo $_smarty_tpl->tpl_vars['ite']->value['val'];?>
</td>
			<?php } ?>
		</tr></tbody>
	</table>
</div><?php }} ?>
