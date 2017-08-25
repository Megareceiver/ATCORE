<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-11 12:30:44
         compiled from "/var/www/atcore/ci/views/export/total.html" */ ?>
<?php /*%%SmartyHeaderCode:1135085136582549741aecc5-82537411%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74ff6dd7fedb9281094eae5b25206caea607726a' => 
    array (
      0 => '/var/www/atcore/ci/views/export/total.html',
      1 => 1456125669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1135085136582549741aecc5-82537411',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'border_top' => 0,
    'height' => 0,
    'width' => 0,
    'amount_w' => 0,
    'sub_total' => 0,
    'order' => 0,
    'taxes' => 0,
    'tax' => 0,
    'amount_total' => 0,
    'legal_text' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58254974227894_93881277',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58254974227894_93881277')) {function content_58254974227894_93881277($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable(0, null, 0);?>
<div class="container wrapper" >
	<table cellpadding="3" cellspacing="0" width="100%" class="bobottom  boright" >
		<tbody>
			<tr>
				<td class="boright boleft <?php if ($_smarty_tpl->tpl_vars['border_top']->value) {?>botop<?php }?>" style="height: <?php echo $_smarty_tpl->tpl_vars['height']->value;?>
mm; width: <?php echo $_smarty_tpl->tpl_vars['width']->value-$_smarty_tpl->tpl_vars['amount_w']->value;?>
mm;" ></td>
				<td class="boleft <?php if ($_smarty_tpl->tpl_vars['border_top']->value) {?>botop<?php }?>" style="width: <?php echo $_smarty_tpl->tpl_vars['amount_w']->value;?>
mm;"></td>
			</tr>
			<tr>
				<td style="width: <?php echo $_smarty_tpl->tpl_vars['width']->value-$_smarty_tpl->tpl_vars['amount_w']->value;?>
mm;" class="textright boleft" >Sub-total</td>
				<td class="textright boleft" style="width: <?php echo $_smarty_tpl->tpl_vars['amount_w']->value;?>
mm;" ><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['sub_total']->value,'amount'=>1),$_smarty_tpl);?>
</td>
			</tr>
			<?php if (isset($_smarty_tpl->tpl_vars['order']->value['shipping_total'])) {?>
			<tr>
				<td style="width: <?php echo $_smarty_tpl->tpl_vars['width']->value-$_smarty_tpl->tpl_vars['amount_w']->value;?>
mm;" class="textright boleft" >Shipping</td>
				<td class="textright boleft" style="width: <?php echo $_smarty_tpl->tpl_vars['amount_w']->value;?>
mm;" ><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['order']->value['shipping_total'],'amount'=>1),$_smarty_tpl);?>
</td>
			</tr>
			<?php }?>
			<?php  $_smarty_tpl->tpl_vars['tax'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tax']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['taxes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tax']->key => $_smarty_tpl->tpl_vars['tax']->value) {
$_smarty_tpl->tpl_vars['tax']->_loop = true;
?>
			<tr>
				<td style="width: <?php echo $_smarty_tpl->tpl_vars['width']->value-$_smarty_tpl->tpl_vars['amount_w']->value;?>
mm;" class="textright boleft" >Tax (<?php echo $_smarty_tpl->tpl_vars['tax']->value['name'];?>
) Amount</td>
				<td style="" class="textright boleft " style="width: <?php echo $_smarty_tpl->tpl_vars['amount_w']->value;?>
mm;" ><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['tax']->value['value'],'amount'=>1),$_smarty_tpl);?>
</td>
			</tr>
			<?php } ?>

			<?php if (isset($_smarty_tpl->tpl_vars['amount_total']->value)) {?>
			<tr>
				<td style="width: <?php echo $_smarty_tpl->tpl_vars['width']->value-$_smarty_tpl->tpl_vars['amount_w']->value;?>
mm;" class="textright boleft" ><b>TOTAL PO</b></td>
				<td  class="textright boleft" style="width: <?php echo $_smarty_tpl->tpl_vars['amount_w']->value;?>
mm;" ><b><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['amount_total']->value,'amount'=>1),$_smarty_tpl);?>
</b></td>
			</tr>
			<?php }?>

			<?php if (isset($_smarty_tpl->tpl_vars['order']->value['amount_total_val'])) {?>
				<?php if (isset($_smarty_tpl->tpl_vars['order']->value['order_ex_gst'])) {?>
				<tr>
					<td style="width: <?php echo $_smarty_tpl->tpl_vars['width']->value-$_smarty_tpl->tpl_vars['amount_w']->value;?>
mm;" class="textright boleft" ><b>TOTAL ORDER EX GST</b></td>
					<td  class="textright boleft" style="width: <?php echo $_smarty_tpl->tpl_vars['amount_w']->value;?>
mm;" ><b><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['sub_total']->value,'amount'=>1),$_smarty_tpl);?>
</b></td>
				</tr>
				<?php }?>
			<tr>
				<td  class="boleft" style="width: 115mm;" ><?php echo pdf_smarty::money_words(array('num'=>$_smarty_tpl->tpl_vars['order']->value['amount_total_val'],'curr_code'=>$_smarty_tpl->tpl_vars['order']->value['curr_code']),$_smarty_tpl);?>
</td>
				<td style="width: <?php echo $_smarty_tpl->tpl_vars['width']->value-$_smarty_tpl->tpl_vars['amount_w']->value-115;?>
mm;" class="textright" ><b><?php if (isset($_smarty_tpl->tpl_vars['order']->value['amount_total_title'])) {
echo $_smarty_tpl->tpl_vars['order']->value['amount_total_title'];
} else { ?>TOTAL PO<?php }?></b></td>
				<td  class="textright boleft" style="width: <?php echo $_smarty_tpl->tpl_vars['amount_w']->value;?>
mm;" ><b><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['order']->value['amount_total_val'],'amount'=>1),$_smarty_tpl);?>
</b></td>
			</tr>
			<?php }?>

		</tbody>
	</table>

</div>

<?php if (isset($_smarty_tpl->tpl_vars['legal_text']->value)&&$_smarty_tpl->tpl_vars['legal_text']->value!='') {?><p><i style="font-size: 80%;"><?php echo form::print_address(array('addr'=>$_smarty_tpl->tpl_vars['legal_text']->value),$_smarty_tpl);?>
</i></p><?php }?>

<div class="container wrapper" >
<table cellpadding="3" cellspacing="0" width="100%" >
	<tbody>
		<tr>
			<td style="width: 30%; height: 23mm" class="textcenter borderall"><h4>Prepared By</h4></td>
			<td style="width: 5%;"></td>
			<td style="width: 30%;" class="textcenter borderall"><h4>Approved By</h3></td>
			<td style="width: 5%;"></td>
			<td style="width: 30%;" class="textcenter borderall"><h4>Received By</h3></td>
		</tr>

	</tbody>
	</table>
</div>



<?php }} ?>
