<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-21 09:42:36
         compiled from "/var/www/atcore/ci/views/reporting/gst-form3-xml.html" */ ?>
<?php /*%%SmartyHeaderCode:695846485832510c592ed8-86742919%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a3951d7870ba2a7fcc860c7030b62cb16e63179' => 
    array (
      0 => '/var/www/atcore/ci/views/reporting/gst-form3-xml.html',
      1 => 1456125669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '695846485832510c592ed8-86742919',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'company' => 0,
    'date_from' => 0,
    'date_to' => 0,
    'created' => 0,
    'purchase_xml' => 0,
    'supplies_xml' => 0,
    'gl_trans_xml' => 0,
    'purchase_total' => 0,
    'sale_total' => 0,
    'gl_trans_total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5832510c5d9b66_18965757',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5832510c5d9b66_18965757')) {function content_5832510c5d9b66_18965757($_smarty_tpl) {?><?php echo '<?xml';?> version="1.0" encoding="utf-8" <?php echo '?>';?>

<GSTAuditFile>
    <Companies>
        <Company>
            <BusinessName><?php echo $_smarty_tpl->tpl_vars['company']->value['coy_name'];?>
</BusinessName>
            <BusinessRN><?php echo $_smarty_tpl->tpl_vars['company']->value['coy_no'];?>
</BusinessRN>
            <GSTNumber><?php echo $_smarty_tpl->tpl_vars['company']->value['gst_no'];?>
</GSTNumber>
            <PeriodStart><?php echo $_smarty_tpl->tpl_vars['date_from']->value;?>
</PeriodStart>
            <PeriodEnd><?php echo $_smarty_tpl->tpl_vars['date_to']->value;?>
</PeriodEnd>
            <GAFCreationDate><?php echo $_smarty_tpl->tpl_vars['created']->value;?>
</GAFCreationDate>
            <ProductVersion>AT v5.1</ProductVersion>
            <GAFVersion>GAF_V1.0</GAFVersion>
        </Company>
    </Companies>
    <Purchases>
		
        <?php if (isset($_smarty_tpl->tpl_vars['purchase_xml']->value)) {
echo $_smarty_tpl->tpl_vars['purchase_xml']->value;
}?>
    </Purchases>
    <Supplies>
    	
        <?php if (isset($_smarty_tpl->tpl_vars['supplies_xml']->value)) {
echo $_smarty_tpl->tpl_vars['supplies_xml']->value;
}?>
    </Supplies>
    <Ledger>
    
        <?php if (isset($_smarty_tpl->tpl_vars['gl_trans_xml']->value)) {
echo $_smarty_tpl->tpl_vars['gl_trans_xml']->value;
}?>
    </Ledger>
    <Footer>
        <TotalPurchaseCount><?php echo $_smarty_tpl->tpl_vars['purchase_total']->value['count'];?>
</TotalPurchaseCount>
        <TotalPurchaseAmount><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['purchase_total']->value['amount']),$_smarty_tpl);?>
</TotalPurchaseAmount>
        <TotalPurchaseAmountGST><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['purchase_total']->value['gst']),$_smarty_tpl);?>
</TotalPurchaseAmountGST>
        <TotalSupplyCount><?php echo $_smarty_tpl->tpl_vars['sale_total']->value['count'];?>
</TotalSupplyCount>
        <TotalSupplyAmount><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['sale_total']->value['amount']),$_smarty_tpl);?>
</TotalSupplyAmount>
        <TotalSupplyAmountGST><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['sale_total']->value['gst']),$_smarty_tpl);?>
</TotalSupplyAmountGST>
        <TotalLedgerCount><?php echo $_smarty_tpl->tpl_vars['gl_trans_total']->value['count'];?>
</TotalLedgerCount>
        <TotalLedgerDebit><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['gl_trans_total']->value['debit']),$_smarty_tpl);?>
</TotalLedgerDebit>
        <TotalLedgerCredit><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['gl_trans_total']->value['credit']),$_smarty_tpl);?>
</TotalLedgerCredit>
        <TotalLedgerBalance><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['gl_trans_total']->value['balance']),$_smarty_tpl);?>
</TotalLedgerBalance>
    </Footer>
</GSTAuditFile><?php }} ?>
