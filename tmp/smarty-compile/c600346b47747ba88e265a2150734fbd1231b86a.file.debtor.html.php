<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-12-10 07:52:55
         compiled from "/var/www/atcore/ci/views/bad-deb/debtor.html" */ ?>
<?php /*%%SmartyHeaderCode:1803979726584b43d75217b3-22691875%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c600346b47747ba88e265a2150734fbd1231b86a' => 
    array (
      0 => '/var/www/atcore/ci/views/bad-deb/debtor.html',
      1 => 1456125670,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1803979726584b43d75217b3-22691875',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datebaddeb' => 0,
    'date' => 0,
    'threshold' => 0,
    'debtor' => 0,
    'items' => 0,
    'tran' => 0,
    'total' => 0,
    'page' => 0,
    'page_last' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_584b43d761bc39_38684560',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584b43d761bc39_38684560')) {function content_584b43d761bc39_38684560($_smarty_tpl) {?>
<div class="row">
	<div class="col-md-3 form-group2">
		<select  name="datebaddeb" class="combo" title="" _last="0"   >
		       <option value="D">Date</option>
		       <option  <?php if ($_smarty_tpl->tpl_vars['datebaddeb']->value=='M') {?> selected="true" <?php }?> value="M">Month</option>
		</select>
		<span id="datedeb">
        	<?php if ($_smarty_tpl->tpl_vars['datebaddeb']->value=='D') {?>
            	<?php echo form::formInput(array('type'=>'DATE','name'=>'date','value'=>$_smarty_tpl->tpl_vars['date']->value),$_smarty_tpl);?>

			<?php } else { ?>
				<span class="form-control inputdate">
					<input class="monthpicker" name='date' type="text" value="<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
" />
				</span>
			<?php }?>

		</span>

	</div>

		<div class="col-md-2 form-group2" role="form">
	  		<span class="input-group-addon" id="sizing-addon1">Threshold</span>
			<input type="text" class="form-control" placeholder="Threshold" name="threshold" value="<?php echo $_smarty_tpl->tpl_vars['threshold']->value;?>
"  style="width: 80px !important; ">
		</div>
	  	<div class="col-md-5 form-group2">
			<span class="input-group-addon" id="sizing-addon1">Customer</span>
			<?php echo form::formInput(array('type'=>'CUSTOMER','name'=>'debtor','all'=>true,'value'=>$_smarty_tpl->tpl_vars['debtor']->value),$_smarty_tpl);?>

		</div>
	  	<div class="col-md-1"><button type="submit" class="ajaxsubmit">Load Overdue Invoices</button></div>

</div>

<div class="container" style="margin-top: 10px;"><table class="bottraps_style">
	<thead>
		<tr>
			<td></td>
			<td colspan="9"></td>
			<td colspan="4" class="textcenter" >Status</td>

		</tr>
		<tr>
			<td>Trans No</td>
			<td>Date</td>
			<td>Customer</td>
			<td>Curr</td>
			<td>Amount</td>
			<td>Base Amt</td>
			<td>ExRT</td>
			<td>GST Amt</td>
			<td>O/D days</td>
			<td style="width:8%; text-align: center;">Processed</td>
			<td>RevTrn</td>
			<td style="width:8%; text-align: center;" >Paid</td>
			<td>RevTrn</td>
		</tr>
	</thead>
	<?php if ($_smarty_tpl->tpl_vars['items']->value) {?><tbody><?php  $_smarty_tpl->tpl_vars['tran'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tran']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tran']->key => $_smarty_tpl->tpl_vars['tran']->value) {
$_smarty_tpl->tpl_vars['tran']->_loop = true;
?>
		<tr>
			<td class="textcenter"><?php echo $_smarty_tpl->tpl_vars['tran']->value->trans_no;?>
</td>
			<td class="textcenter"><?php echo form::date_format(array('time'=>$_smarty_tpl->tpl_vars['tran']->value->tran_date),$_smarty_tpl);?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['tran']->value->debtor_name;?>
</td>
			<td class="textcenter"><?php echo $_smarty_tpl->tpl_vars['tran']->value->curr_code;?>
</td>
			<td class="textright" ><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['tran']->value->ov_amount,'amount'=>1),$_smarty_tpl);?>
</td>
			<td class="textright" ><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['tran']->value->ov_amount*$_smarty_tpl->tpl_vars['tran']->value->rate,'amount'=>1),$_smarty_tpl);?>
</td>
			<td class="textright" ><?php echo $_smarty_tpl->tpl_vars['tran']->value->rate;?>
</td>
			<td class="textright" ><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['tran']->value->ov_gst*$_smarty_tpl->tpl_vars['tran']->value->rate,'amount'=>1),$_smarty_tpl);?>
</td>
			<td class="textcenter"><?php echo form::days_to_now(array('time'=>$_smarty_tpl->tpl_vars['tran']->value->tran_date),$_smarty_tpl);?>
</td>
			<td class="textcenter" >
				<?php if ($_smarty_tpl->tpl_vars['tran']->value->process) {?>
					Yes
				<?php } else { ?>
					<button type="submit" class="ajaxsubmit" name="process" value="<?php echo $_smarty_tpl->tpl_vars['tran']->value->trans_no;?>
" ajax=false >Process</button>
				<?php }?>
			</td>
			<td class="textcenter"><?php if ($_smarty_tpl->tpl_vars['tran']->value->process) {
echo $_smarty_tpl->tpl_vars['tran']->value->process;
}?></td>
			<td class="textcenter">
				<?php if ($_smarty_tpl->tpl_vars['tran']->value->paid) {?>
					Yes
				<?php } elseif ($_smarty_tpl->tpl_vars['tran']->value->process) {?>
					<button type="submit" class="ajaxsubmit" name="paid" value="<?php echo $_smarty_tpl->tpl_vars['tran']->value->trans_no;?>
" ajax=false >Paid</button>
				<?php } else { ?>
					No
				<?php }?>
			</td>
			<td class="textcenter"><?php if ($_smarty_tpl->tpl_vars['tran']->value->paid) {
echo $_smarty_tpl->tpl_vars['tran']->value->paid;
}?></td>
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
