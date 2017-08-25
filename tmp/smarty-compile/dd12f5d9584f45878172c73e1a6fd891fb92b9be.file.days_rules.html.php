<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-15 20:17:49
         compiled from "/var/www/atcore/ci/views/sale/days_rules.html" */ ?>
<?php /*%%SmartyHeaderCode:28620172582afced0f1f98-75682551%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd12f5d9584f45878172c73e1a6fd891fb92b9be' => 
    array (
      0 => '/var/www/atcore/ci/views/sale/days_rules.html',
      1 => 1456125669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28620172582afced0f1f98-75682551',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'date' => 0,
    'threshold' => 0,
    'items' => 0,
    'tran' => 0,
    'total' => 0,
    'page' => 0,
    'page_last' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_582afced159698_79018837',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582afced159698_79018837')) {function content_582afced159698_79018837($_smarty_tpl) {?>
<div class="row">

	<div class="col-md-2 form-group2" role="form">
	  		<span class="input-group-addon" id="sizing-addon1">Date</span>
			<?php echo form::formInput(array('type'=>'DATE','name'=>'date','value'=>$_smarty_tpl->tpl_vars['date']->value),$_smarty_tpl);?>

		</div>

		<div class="col-md-2 form-group2" role="form">
	  		<span class="input-group-addon" id="sizing-addon1">Days</span>
			<input type="text" class="form-control" placeholder="Threshold" name="threshold" value="<?php echo $_smarty_tpl->tpl_vars['threshold']->value;?>
"  style="width: 80px !important; ">
		</div>

	  	<div class="col-md-1"><button type="submit" class="ajaxsubmit">Load Deliverys</button></div>

</div>

<div class="container" style="margin-top: 10px;"><table class="bottraps_style">
	<thead>
		<tr>
			<td style=" width: 10%" >Type</td>
			<td style="width: 5%" >#</td>
			<td style=" width: 10%" ">Reference</td>
			<td style=" width: 10%" class="textcenter">Date</td>
			<td>Customer</td>
			<td style=" width: 10%" class="textcenter">Days</td>
		</tr>
	</thead>
	<?php if ($_smarty_tpl->tpl_vars['items']->value) {?><tbody><?php  $_smarty_tpl->tpl_vars['tran'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tran']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tran']->key => $_smarty_tpl->tpl_vars['tran']->value) {
$_smarty_tpl->tpl_vars['tran']->_loop = true;
?>
		<tr>
			<td><?php echo at_smarty::trans_type(array('type'=>$_smarty_tpl->tpl_vars['tran']->value->type),$_smarty_tpl);?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['tran']->value->trans_no;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['tran']->value->reference;?>
</td>
			<td class="textcenter"><?php echo form::date_format(array('time'=>$_smarty_tpl->tpl_vars['tran']->value->tran_date),$_smarty_tpl);?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['tran']->value->customer_name;?>
</td>
			<td class="textcenter" ><?php echo pdf_smarty::days_diff(array('begin'=>$_smarty_tpl->tpl_vars['tran']->value->tran_date,'end'=>$_smarty_tpl->tpl_vars['date']->value),$_smarty_tpl);?>
</td>


		</tr>
	<?php } ?></tbody><?php }?>
	<?php if (count($_smarty_tpl->tpl_vars['items']->value)<$_smarty_tpl->tpl_vars['total']->value) {?>
	<tfoot><tr>
		<td colspan="9"></td>
		<td><button class="ajaxsubmit" type="submit" name="first" value="1">First</button></td>
		<td><button class="ajaxsubmit" type="submit" name="pre" value="<?php if ($_smarty_tpl->tpl_vars['page']->value>1) {
echo $_smarty_tpl->tpl_vars['page']->value-1;
} else { ?>1<?php }?>">Pre</button></td>
		<td><button class="ajaxsubmit" type="submit" name="next" value="<?php if ($_smarty_tpl->tpl_vars['page']->value<$_smarty_tpl->tpl_vars['page_last']->value) {
echo $_smarty_tpl->tpl_vars['page']->value+1;
} else {
echo $_smarty_tpl->tpl_vars['page_last']->value;
}?>">Next</button></td>
		<td><button class="ajaxsubmit" type="submit" name="last" value=<?php echo $_smarty_tpl->tpl_vars['page_last']->value;?>
>Last</button></td>

	</tr></tfoot>

	<?php }?>
</table></div>

<?php }} ?>
