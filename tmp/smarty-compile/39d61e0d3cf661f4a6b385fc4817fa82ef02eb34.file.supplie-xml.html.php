<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-21 09:42:35
         compiled from "/var/www/atcore/ci/views/reporting/gst_form3/supplie-xml.html" */ ?>
<?php /*%%SmartyHeaderCode:16792625475832510bcb5a65-61813978%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39d61e0d3cf661f4a6b385fc4817fa82ef02eb34' => 
    array (
      0 => '/var/www/atcore/ci/views/reporting/gst_form3/supplie-xml.html',
      1 => 1456125669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16792625475832510bcb5a65-61813978',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'customer' => 0,
    'tran_date' => 0,
    'trans_no' => 0,
    'line_no' => 0,
    'item_name' => 0,
    'price' => 0,
    'gst_value' => 0,
    'tax_code' => 0,
    'currence' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5832510bcebce4_36071732',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5832510bcebce4_36071732')) {function content_5832510bcebce4_36071732($_smarty_tpl) {?>
<Supply>
	<CustomerName><?php echo $_smarty_tpl->tpl_vars['customer']->value;?>
</CustomerName>
	<CustomerBRN></CustomerBRN>
	<InvoiceDate><?php echo $_smarty_tpl->tpl_vars['tran_date']->value;?>
</InvoiceDate>
	<InvoiceNumber><?php echo $_smarty_tpl->tpl_vars['trans_no']->value;?>
</InvoiceNumber>
	<LineNumber><?php echo $_smarty_tpl->tpl_vars['line_no']->value;?>
</LineNumber>
	<ProductDescription><?php echo $_smarty_tpl->tpl_vars['item_name']->value;?>
</ProductDescription>
	<SupplyValueMYR><?php echo $_smarty_tpl->tpl_vars['price']->value;?>
</SupplyValueMYR>
	<GSTValueMYR><?php echo $_smarty_tpl->tpl_vars['gst_value']->value;?>
</GSTValueMYR>
	<TaxCode><?php echo $_smarty_tpl->tpl_vars['tax_code']->value;?>
</TaxCode>
	<Country />
	<FCYCode><?php echo $_smarty_tpl->tpl_vars['currence']->value;?>
</FCYCode>
	<SupplyFCY>0.00</SupplyFCY>
	<GSTFCY>0.00</GSTFCY>
</Supply><?php }} ?>
