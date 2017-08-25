<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-21 09:42:36
         compiled from "/var/www/atcore/ci/views/reporting/gst_form3/gl-trans-xml.html" */ ?>
<?php /*%%SmartyHeaderCode:5078205925832510c298f62-22233425%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08fa0c7a8267c9092d98e67dd0f4af2d37603a22' => 
    array (
      0 => '/var/www/atcore/ci/views/reporting/gst_form3/gl-trans-xml.html',
      1 => 1456125669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5078205925832510c298f62-22233425',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'account' => 0,
    'account_name' => 0,
    'memo_' => 0,
    'counter' => 0,
    'type_no' => 0,
    'type_name' => 0,
    'debit' => 0,
    'credit' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5832510c2b5f75_75628757',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5832510c2b5f75_75628757')) {function content_5832510c2b5f75_75628757($_smarty_tpl) {?><LedgerEntry>
	<TransactionDate>2015-12-18</TransactionDate>
	<AccountID><?php echo $_smarty_tpl->tpl_vars['account']->value;?>
</AccountID>
	<AccountName><?php echo $_smarty_tpl->tpl_vars['account_name']->value;?>
</AccountName>
	<TransactionDescription><?php echo $_smarty_tpl->tpl_vars['memo_']->value;?>
</TransactionDescription>
	<Name></Name>
	<TransactionID><?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
</TransactionID>
	<SourceDocumentID><?php echo $_smarty_tpl->tpl_vars['type_no']->value;?>
</SourceDocumentID>
	<SourceType><?php echo $_smarty_tpl->tpl_vars['type_name']->value;?>
</SourceType>
	<Debit><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['debit']->value),$_smarty_tpl);?>
</Debit>
	<Credit><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['credit']->value),$_smarty_tpl);?>
</Credit>
	<Balance><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['total']->value),$_smarty_tpl);?>
</Balance>
</LedgerEntry><?php }} ?>
