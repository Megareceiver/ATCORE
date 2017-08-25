<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-19 18:51:46
         compiled from "/var/www/atcore/ci/views/gl/wrong_posting.html" */ ?>
<?php /*%%SmartyHeaderCode:185086390158302ec24fbca5-09878706%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e9b7a1e6ed2884c7223554b182b5a461a05058b' => 
    array (
      0 => '/var/www/atcore/ci/views/gl/wrong_posting.html',
      1 => 1456125669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '185086390158302ec24fbca5-09878706',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fields' => 0,
    'items' => 0,
    'ite' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58302ec2563d97_45186457',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58302ec2563d97_45186457')) {function content_58302ec2563d97_45186457($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['fields']->value)) {?>
	<table width=100% cellpadding=2 cellspacing=0 >
	<thead><tr>
	
	<th style="width: 10%;">Account</th>
	<th style="text-align: left;">Account Name</th>
	<th style="text-align: left; width: 15%;">Type</th>
	<th style="text-align: left;">#</th>
	<th style="width: 10%;">Trans Date</th>
	<th style="text-align: right;">Amount</th>
	<th>Actions</th>
	
	</tr></thead>
	<tbody>
	<?php if (isset($_smarty_tpl->tpl_vars['items']->value)&&count($_smarty_tpl->tpl_vars['items']->value)>0) {?>
	<?php  $_smarty_tpl->tpl_vars['ite'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ite']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ite']->key => $_smarty_tpl->tpl_vars['ite']->value) {
$_smarty_tpl->tpl_vars['ite']->_loop = true;
?>
		<tr>
		<td class="center" ><?php echo $_smarty_tpl->tpl_vars['ite']->value->account;?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['ite']->value->account_name;?>
</td>
		<td><?php echo at_smarty::trans_type(array('type'=>$_smarty_tpl->tpl_vars['ite']->value->type),$_smarty_tpl);?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['ite']->value->type_no;?>
</td>
		<td class="center" ><?php echo form::date_format(array('time'=>$_smarty_tpl->tpl_vars['ite']->value->tran_date),$_smarty_tpl);?>
</td>
		<td class="textright" ><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['ite']->value->amount),$_smarty_tpl);?>
</td>
	
		<td class="center">
			
			<a  href="../../gl/view/gl_trans_view.php?type_id=<?php echo $_smarty_tpl->tpl_vars['ite']->value->type;?>
&trans_no=<?php echo $_smarty_tpl->tpl_vars['ite']->value->type_no;?>
" onclick="javascript:openWindow(this.href,this.target); return false;" ><img border="0" height="12" title="GL" src="../../themes/uniq365/images/gl.png"></a>
			<?php if ($_smarty_tpl->tpl_vars['ite']->value->type==@constant('ST_SALESINVOICE')) {?>
				<a  href="../../sales/sales_order_entry.php?reinvoice=<?php echo $_smarty_tpl->tpl_vars['ite']->value->type_no;?>
" onclick="javascript:openWindow(this.href,this.target); return false;" ><img border="0" height="12" title="GL" src="../../themes/uniq365/images/refresh.png"></a>
			<?php } elseif ($_smarty_tpl->tpl_vars['ite']->value->type==@constant('ST_SUPPINVOICE')) {?>
				<a  href="../../purchasing/supplier_invoice.php?reinvoice=<?php echo $_smarty_tpl->tpl_vars['ite']->value->type_no;?>
" onclick="javascript:openWindow(this.href,this.target); return false;" ><img border="0" height="12" title="GL" src="../../themes/uniq365/images/refresh.png"></a>
			<?php }?>
		</td>
		
		</tr>

	<?php } ?>
	<?php } else { ?>
		<tr><td colspan="7" class="center" >No Items</td> </tr>
	<?php }?>
	
	</tbody>
	<?php if (count($_smarty_tpl->tpl_vars['items']->value)>0) {?>
	<tfoot><tr><td class="textright" colspan="7"><?php echo form_smarty::table_page_padding(array(),$_smarty_tpl);?>
</td></tr></tfoot>
	<?php }?>
	</table>
<?php }?><?php }} ?>
