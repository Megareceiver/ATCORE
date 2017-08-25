<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-11 12:30:43
         compiled from "/var/www/atcore/ci/views/reporting/header_title.html" */ ?>
<?php /*%%SmartyHeaderCode:182046416558254973ad0f28-88053230%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52e94564202f3ce9dbd287041fd85ea3c83a9fb8' => 
    array (
      0 => '/var/www/atcore/ci/views/reporting/header_title.html',
      1 => 1456125669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '182046416558254973ad0f28-88053230',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order' => 0,
    'page_number' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58254973b0aeb4_65844594',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58254973b0aeb4_65844594')) {function content_58254973b0aeb4_65844594($_smarty_tpl) {?><table cellspacing="0" >
	<tr><td >Date</td><td><?php echo $_smarty_tpl->tpl_vars['order']->value['date'];?>
</td></tr>
	<?php if (isset($_smarty_tpl->tpl_vars['order']->value['purchase_order'])) {?>
		<tr><td >Purchase Order No.</td><td><?php echo $_smarty_tpl->tpl_vars['order']->value['purchase_order'];?>
</td></tr>
	<?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['order']->value['invoice_no'])) {?>
		<tr><td >Invoice No.</td><td><?php echo $_smarty_tpl->tpl_vars['order']->value['invoice_no'];?>
</td></tr>
	<?php } elseif (isset($_smarty_tpl->tpl_vars['order']->value['delivery_no'])) {?>
		<tr><td >Delivery No.</td><td><?php echo $_smarty_tpl->tpl_vars['order']->value['delivery_no'];?>
</td></tr>
	<?php } elseif (isset($_smarty_tpl->tpl_vars['order']->value['credit_note_no'])) {?>
		<tr><td >Credit Note No.</td><td><?php echo $_smarty_tpl->tpl_vars['order']->value['credit_note_no'];?>
</td></tr>
	<?php } elseif (isset($_smarty_tpl->tpl_vars['order']->value['order_no'])) {?>
		<tr><td >Order No.</td><td><?php echo $_smarty_tpl->tpl_vars['order']->value['order_no'];?>
</td></tr>
	<?php } elseif (isset($_smarty_tpl->tpl_vars['order']->value['supp_credit_no'])) {?>
		<tr><td >Remittance No.</td><td><?php echo $_smarty_tpl->tpl_vars['order']->value['supp_credit_no'];?>
</td></tr>
	<?php } elseif (isset($_smarty_tpl->tpl_vars['order']->value['quotation_no'])) {?>
		<tr><td >Quotation No.</td><td><?php echo $_smarty_tpl->tpl_vars['order']->value['quotation_no'];?>
</td></tr>

	<?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['order']->value['receipt_no'])) {?>
		<tr><td >Receipt No.</td><td><?php echo $_smarty_tpl->tpl_vars['order']->value['receipt_no'];?>
</td></tr>
	<?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['page_number']->value)) {?>
		<tr><td >Page.</td><td><?php echo $_smarty_tpl->tpl_vars['page_number']->value;?>
</td></tr>
	<?php }?>


</table><?php }} ?>
