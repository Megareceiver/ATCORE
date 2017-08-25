<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-11 12:30:43
         compiled from "/var/www/atcore/ci/views/reporting/order/sale_delivery.html" */ ?>
<?php /*%%SmartyHeaderCode:1064481671582549739c9443-55389074%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89bc7b22b3e9a0385a4084e48f116a502626f6f7' => 
    array (
      0 => '/var/www/atcore/ci/views/reporting/order/sale_delivery.html',
      1 => 1456125669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1064481671582549739c9443-55389074',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name' => 0,
    'contact' => 0,
    'delivery' => 0,
    'delivery_addr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58254973a1abb4_27155440',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58254973a1abb4_27155440')) {function content_58254973a1abb4_27155440($_smarty_tpl) {?><div class="container wrapper">
<table style="width: 100%;" cellpadding="0" cellspacing="0" >
	<tr style="line-height: 30px;">
		<td width="12px"></td>
		<td width="50%;">Charge To</td>
		<td width="50%;">Deliver To</td>
	</tr>
	<tr>
		<td width="12px"></td>
		<td>
			<?php if (isset($_smarty_tpl->tpl_vars['name']->value)) {?><p><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</p><?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['contact']->value['name'])&&$_smarty_tpl->tpl_vars['contact']->value['name']!='') {?><p>Contact Person: <i><?php echo $_smarty_tpl->tpl_vars['contact']->value['name'];?>
</i></p><?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['contact']->value['email'])&&$_smarty_tpl->tpl_vars['contact']->value['email']!='') {?><p><?php echo $_smarty_tpl->tpl_vars['contact']->value['email'];?>
</p><?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['contact']->value['phone'])&&$_smarty_tpl->tpl_vars['contact']->value['phone']!='') {?><p><?php echo $_smarty_tpl->tpl_vars['contact']->value['phone'];?>
</p><?php }?>
		</td>
		<td>
			<?php if (isset($_smarty_tpl->tpl_vars['delivery']->value)) {?><p><?php echo $_smarty_tpl->tpl_vars['delivery']->value;?>
</p><?php }?>

			<?php if (isset($_smarty_tpl->tpl_vars['name']->value)) {?><p><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</p><?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['delivery_addr']->value)&&$_smarty_tpl->tpl_vars['delivery_addr']->value!='') {?>
				<p><?php echo form::print_address(array('addr'=>$_smarty_tpl->tpl_vars['delivery_addr']->value),$_smarty_tpl);?>
</p>

			<?php }?>
		</td>
	</tr>
</table>
</div><?php }} ?>
