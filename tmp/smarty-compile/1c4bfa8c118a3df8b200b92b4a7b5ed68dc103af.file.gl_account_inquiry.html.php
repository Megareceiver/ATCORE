<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-09 18:54:54
         compiled from "/var/www/atcore/ci_module/gl/views/inquiry/gl_account_inquiry.html" */ ?>
<?php /*%%SmartyHeaderCode:1605025295823007eae0aa7-43036790%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c4bfa8c118a3df8b200b92b4a7b5ed68dc103af' => 
    array (
      0 => '/var/www/atcore/ci_module/gl/views/inquiry/gl_account_inquiry.html',
      1 => 1478688122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1605025295823007eae0aa7-43036790',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'table' => 0,
    'title' => 0,
    'balance_open' => 0,
    'date_from' => 0,
    'items' => 0,
    'balance' => 0,
    'ite' => 0,
    'credit_total' => 0,
    'debit_total' => 0,
    'field' => 0,
    'date_to' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5823007ec486e5_09376502',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5823007ec486e5_09376502')) {function content_5823007ec486e5_09376502($_smarty_tpl) {?><?php if (!is_callable('smarty_function_tempFunction')) include '/var/www/atcore/ci//thirdparty/Smarty-3.1.21/ci/function.tempFunction.php';
?><?php if (isset($_smarty_tpl->tpl_vars['table']->value)) {?>
<div class="table-responsive">

	<table width=100% cellpadding=2 cellspacing=0 class="table-striped table-hover table-headfixed" >
	<thead><tr>
	<?php  $_smarty_tpl->tpl_vars['title'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['title']->_loop = false;
 $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['table']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['title']->key => $_smarty_tpl->tpl_vars['title']->value) {
$_smarty_tpl->tpl_vars['title']->_loop = true;
 $_smarty_tpl->tpl_vars['field']->value = $_smarty_tpl->tpl_vars['title']->key;
?>
		<?php if (is_array($_smarty_tpl->tpl_vars['title']->value)) {?>
			<td <?php if (isset($_smarty_tpl->tpl_vars['title']->value[1])) {?> class="<?php echo $_smarty_tpl->tpl_vars['title']->value[1];?>
" <?php }?> <?php if (isset($_smarty_tpl->tpl_vars['title']->value[2])) {?> style="width:<?php echo $_smarty_tpl->tpl_vars['title']->value[2];?>
%"<?php }?>><?php echo $_smarty_tpl->tpl_vars['title']->value[0];?>
</td>
		<?php } else { ?>
			<td><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</td>
		<?php }?>

	<?php } ?>
	</tr></thead>


	<tbody>
	<?php $_smarty_tpl->tpl_vars['balance'] = new Smarty_variable($_smarty_tpl->tpl_vars['balance_open']->value, null, 0);?>
	<?php $_smarty_tpl->tpl_vars['credit_total'] = new Smarty_variable(0, null, 0);?>
	<?php $_smarty_tpl->tpl_vars['debit_total'] = new Smarty_variable(0, null, 0);?>
	<tr class="header" >
		<td class="center" colspan="3">Opening Balance</td>
		<td class="center"><?php echo $_smarty_tpl->tpl_vars['date_from']->value;?>
</td>
		<td class="right"><?php if ($_smarty_tpl->tpl_vars['balance_open']->value>0) {?>
			<?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['balance_open']->value,'zero'=>0),$_smarty_tpl);?>

			<?php $_smarty_tpl->tpl_vars['debit_total'] = new Smarty_variable($_smarty_tpl->tpl_vars['balance_open']->value, null, 0);?>
		<?php }?></td>
		<td class="right"><?php if ($_smarty_tpl->tpl_vars['balance_open']->value<0) {?>
			<?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['balance_open']->value,'zero'=>0,'absolute'=>1),$_smarty_tpl);?>

			<?php $_smarty_tpl->tpl_vars['credit_total'] = new Smarty_variable($_smarty_tpl->tpl_vars['balance_open']->value, null, 0);?>
		<?php }?></td>
		<td colspan="3"></td>
	</tr>

	<?php if (count($_smarty_tpl->tpl_vars['items']->value)) {?>
	<?php  $_smarty_tpl->tpl_vars['ite'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ite']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ite']->key => $_smarty_tpl->tpl_vars['ite']->value) {
$_smarty_tpl->tpl_vars['ite']->_loop = true;
?>
		<?php $_smarty_tpl->tpl_vars['balance'] = new Smarty_variable($_smarty_tpl->tpl_vars['balance']->value+$_smarty_tpl->tpl_vars['ite']->value->amount, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['credit_total'] = new Smarty_variable($_smarty_tpl->tpl_vars['credit_total']->value+$_smarty_tpl->tpl_vars['ite']->value->credit, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['debit_total'] = new Smarty_variable($_smarty_tpl->tpl_vars['debit_total']->value+$_smarty_tpl->tpl_vars['ite']->value->debit, null, 0);?>
		<tr>
		<?php  $_smarty_tpl->tpl_vars['title'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['title']->_loop = false;
 $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['table']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['title']->key => $_smarty_tpl->tpl_vars['title']->value) {
$_smarty_tpl->tpl_vars['title']->_loop = true;
 $_smarty_tpl->tpl_vars['field']->value = $_smarty_tpl->tpl_vars['title']->key;
?>

			<?php if (is_array($_smarty_tpl->tpl_vars['title']->value)) {?>
				<td <?php if (isset($_smarty_tpl->tpl_vars['title']->value[1])) {?> class="<?php echo $_smarty_tpl->tpl_vars['title']->value[1];?>
" <?php }?> style="<?php if (isset($_smarty_tpl->tpl_vars['title']->value[2])) {?>width:<?php echo $_smarty_tpl->tpl_vars['title']->value[2];?>
%;<?php }?>">
			<?php } else { ?>
				<td>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['field']->value=='items_action') {?>
				<?php echo smarty_function_tempFunction(array('func'=>$_smarty_tpl->tpl_vars['title']->value[2],'item'=>$_smarty_tpl->tpl_vars['ite']->value),$_smarty_tpl);?>

			<?php } elseif ($_smarty_tpl->tpl_vars['field']->value=='balance') {?>
				<?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['balance']->value,'zero'=>0),$_smarty_tpl);?>

			<?php } elseif ($_smarty_tpl->tpl_vars['field']->value=='item') {?>
				<?php echo at_smarty::payment_person_name(array('type'=>$_smarty_tpl->tpl_vars['ite']->value->person_type_id,'person_id'=>$_smarty_tpl->tpl_vars['ite']->value->person_id),$_smarty_tpl);?>

			<?php } elseif ($_smarty_tpl->tpl_vars['field']->value=='memo') {?>
				<?php echo AccountingCommentSmarty::comment_get(array('tran_type'=>$_smarty_tpl->tpl_vars['ite']->value->type,'tran_no'=>$_smarty_tpl->tpl_vars['ite']->value->type_no),$_smarty_tpl);?>

			<?php } else { ?>

				<?php if (is_array($_smarty_tpl->tpl_vars['title']->value)) {?>
					<?php if (isset($_smarty_tpl->tpl_vars['title']->value[3])&&$_smarty_tpl->tpl_vars['title']->value[3]=='date') {?>
						<?php echo form::date_format(array('time'=>$_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['field']->value}),$_smarty_tpl);?>

					<?php } elseif (isset($_smarty_tpl->tpl_vars['title']->value[3])&&$_smarty_tpl->tpl_vars['title']->value[3]=='trans_type') {?>
						<?php echo at_smarty::trans_type(array('type'=>$_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['field']->value}),$_smarty_tpl);?>

					<?php } elseif (isset($_smarty_tpl->tpl_vars['title']->value[3])&&$_smarty_tpl->tpl_vars['title']->value[3]=='number') {?>
						<?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['field']->value},'zero'=>0,'absolute'=>1),$_smarty_tpl);?>

					<?php } elseif (isset($_smarty_tpl->tpl_vars['title']->value[3])&&$_smarty_tpl->tpl_vars['title']->value[3]=='supp_invoice_link') {?>
						<?php echo form::anchor(array('uri'=>("purchasing/view/view_supp_invoice.php?trans_no=").($_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['field']->value}),'title'=>$_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['field']->value}),$_smarty_tpl);?>

					<?php } elseif (isset($_smarty_tpl->tpl_vars['title']->value[3])&&$_smarty_tpl->tpl_vars['title']->value[3]=='tran_detail_view') {?>
						<?php echo at_smarty::tran_detail_view(array('type'=>$_smarty_tpl->tpl_vars['ite']->value->type,'tran_no'=>$_smarty_tpl->tpl_vars['ite']->value->trans_no,'title'=>$_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['field']->value}),$_smarty_tpl);?>



					<?php } elseif (isset($_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['field']->value})) {?>
						<?php echo $_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['field']->value};?>

					<?php }?>
				<?php } elseif (isset($_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['field']->value})) {?>
					<?php echo $_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['field']->value};?>

				<?php }?>
			<?php }?>

			</td>
		<?php } ?>

		</tr>
	<?php }
}?>

	<tr class="header" >
		<td class="center" colspan="3">Ending  Balance</td>
		<td class="center"><?php echo $_smarty_tpl->tpl_vars['date_to']->value;?>
</td>
		<td class="right"><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['debit_total']->value,'absolute'=>1),$_smarty_tpl);?>
</td>
		<td class="right"><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['credit_total']->value,'absolute'=>1),$_smarty_tpl);?>
</td>
		<td class="right"><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['balance']->value),$_smarty_tpl);?>
</td>
		<td colspan="2"></td>
	</tr>

	</tbody>

	</table>
</div>
<?php }?><?php }} ?>
