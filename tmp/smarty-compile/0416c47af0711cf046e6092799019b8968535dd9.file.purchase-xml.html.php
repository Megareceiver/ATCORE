<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-21 09:42:35
         compiled from "/var/www/atcore/ci/views/reporting/gst_form3/purchase-xml.html" */ ?>
<?php /*%%SmartyHeaderCode:5587664275832510bd46f97-91299896%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0416c47af0711cf046e6092799019b8968535dd9' => 
    array (
      0 => '/var/www/atcore/ci/views/reporting/gst_form3/purchase-xml.html',
      1 => 1456125669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5587664275832510bd46f97-91299896',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'supp_name' => 0,
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
  'unifunc' => 'content_5832510bd5e837_83312622',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5832510bd5e837_83312622')) {function content_5832510bd5e837_83312622($_smarty_tpl) {?><Purchase>
	<SupplierName><?php echo $_smarty_tpl->tpl_vars['supp_name']->value;?>
</SupplierName>
	<SupplierBRN></SupplierBRN>
	<InvoiceDate><?php echo $_smarty_tpl->tpl_vars['tran_date']->value;?>
</InvoiceDate>
	<InvoiceNumber><?php echo $_smarty_tpl->tpl_vars['trans_no']->value;?>
</InvoiceNumber>
	<ImportDeclarationNo></ImportDeclarationNo>
	<LineNumber><?php echo $_smarty_tpl->tpl_vars['line_no']->value;?>
</LineNumber>
	<ProductDescription><?php echo $_smarty_tpl->tpl_vars['item_name']->value;?>
</ProductDescription>
	<PurchaseValueMYR><?php echo $_smarty_tpl->tpl_vars['price']->value;?>
</PurchaseValueMYR>
	<GSTValueMYR><?php echo $_smarty_tpl->tpl_vars['gst_value']->value;?>
</GSTValueMYR>
	<TaxCode><?php echo $_smarty_tpl->tpl_vars['tax_code']->value;?>
</TaxCode>
	<FCYCode><?php echo $_smarty_tpl->tpl_vars['currence']->value;?>
</FCYCode>
	<PurchaseFCY>0.00</PurchaseFCY>
	<GSTFCY>0.00</GSTFCY>
</Purchase><?php }} ?>
