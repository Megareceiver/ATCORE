<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-23 17:00:52
         compiled from "/var/www/atcore/ci_module/tax/views/gst_grouping/grouping_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:1937108163582a8f4ce19144-18023640%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '696fe7887dcf031f987577a5617db6cdcc7a04a8' => 
    array (
      0 => '/var/www/atcore/ci_module/tax/views/gst_grouping/grouping_detail.html',
      1 => 1485160827,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1937108163582a8f4ce19144-18023640',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_582a8f4d152775_19835280',
  'variables' => 
  array (
    'from' => 0,
    'to' => 0,
    'sum_col' => 0,
    'taxes' => 0,
    'tax' => 0,
    'o' => 0,
    'price_base' => 0,
    'tax_base' => 0,
    'gst' => 0,
    'sale_gst' => 0,
    'gst_each' => 0,
    'purchase_gst' => 0,
    'taxcode' => 0,
    '5b_check' => 0,
    '5b' => 0,
    '6b_check' => 0,
    '6b' => 0,
    'abs_value' => 0,
    'sale_base' => 0,
    'purchase_base' => 0,
    'number' => 0,
    'sale_base_total' => 0,
    'sale_gst_total' => 0,
    'purchase_base_total' => 0,
    'purchase_gst_total' => 0,
    'sale_base_amount' => 0,
    'sale_gst_amount' => 0,
    'purchase_base_amount' => 0,
    'purchase_gst_amount' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582a8f4d152775_19835280')) {function content_582a8f4d152775_19835280($_smarty_tpl) {?>
<p>From : <?php echo form::date_format(array('time'=>$_smarty_tpl->tpl_vars['from']->value),$_smarty_tpl);?>
 to <?php echo form::date_format(array('time'=>$_smarty_tpl->tpl_vars['to']->value),$_smarty_tpl);?>
</p>

<table cellspacing="1" class="gst-grouping-header"  >
	<thead>
		<tr>
			<td>Date</td>
			<td>Trn</td>
			<td>Ref</td>
			<td>Curr</td>
			<td>Rate</td>
			<td>Item</td>
			<td>Suppliers/Customer</td>
			<td class="textright" >Sales/Purchase Amt</td>
			<td class="textright" >GST</td>
			<td class="textright">Sales (Base)</td>
			<td class="textright">S.GST (Base)</td>
			<td class="textright">Purchase (Base)</td>
			<td class="textright">P.GST (Base)</td>
			<?php if ($_smarty_tpl->tpl_vars['sum_col']->value) {?>
			<td class="textright">Pay/Claim</td>
			<?php }?>
		</tr>
	</thead>
	<tbody >


		<?php $_smarty_tpl->tpl_vars['gst'] = new Smarty_variable(0, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['number'] = new Smarty_variable(1, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['sale_gst_amount'] = new Smarty_variable(0, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['sale_base_amount'] = new Smarty_variable(0, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['purchase_gst_amount'] = new Smarty_variable(0.0, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['purchase_base_amount'] = new Smarty_variable(0.0, null, 0);?>

		<?php $_smarty_tpl->tpl_vars['5b_check'] = new Smarty_variable(explode(',',"SR,DS,AJS"), null, 0);?> <?php $_smarty_tpl->tpl_vars['5b'] = new Smarty_variable(0, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['6b_check'] = new Smarty_variable(explode(',',"TX,IM,TX-E43,TX-RE,AJP"), null, 0);?> <?php $_smarty_tpl->tpl_vars['6b'] = new Smarty_variable(0, null, 0);?>


		<?php if (isset($_smarty_tpl->tpl_vars['taxes']->value)) {?> <?php  $_smarty_tpl->tpl_vars['tax'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tax']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['taxes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tax']->key => $_smarty_tpl->tpl_vars['tax']->value) {
$_smarty_tpl->tpl_vars['tax']->_loop = true;
?> <?php if (!empty($_smarty_tpl->tpl_vars['tax']->value->items)&&$_smarty_tpl->tpl_vars['tax']->value->id) {?>
			<tr class="tax_header">
				<th>-</th>
				<th colspan="12" style="font-weight: bold; text-align: left;"><?php echo $_smarty_tpl->tpl_vars['tax']->value->name;?>
 (<?php echo $_smarty_tpl->tpl_vars['tax']->value->no;?>
)</th>
				<th class="textright" ><span class="glyphicon glyphicon-minus button-hide" ></span></th>
			</tr>
			<?php $_smarty_tpl->tpl_vars['sale_base_total'] = new Smarty_variable(0, null, 0);?>
			<?php $_smarty_tpl->tpl_vars['sale_gst_total'] = new Smarty_variable(0, null, 0);?>
			<?php $_smarty_tpl->tpl_vars['purchase_base_total'] = new Smarty_variable(0, null, 0);?>
			<?php $_smarty_tpl->tpl_vars['purchase_gst_total'] = new Smarty_variable(0, null, 0);?>
			<?php $_smarty_tpl->tpl_vars['gst_each'] = new Smarty_variable(0, null, 0);?>


			<?php $_smarty_tpl->tpl_vars['taxcode'] = new Smarty_variable('', null, 0);?>

			<?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['o']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tax']->value->items; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value) {
$_smarty_tpl->tpl_vars['o']->_loop = true;
?>
				<?php $_smarty_tpl->tpl_vars['sale_gst'] = new Smarty_variable(0, null, 0);?>
				<?php $_smarty_tpl->tpl_vars['sale_base'] = new Smarty_variable(0, null, 0);?>
				<?php $_smarty_tpl->tpl_vars['purchase_gst'] = new Smarty_variable(0, null, 0);?>
				<?php $_smarty_tpl->tpl_vars['purchase_base'] = new Smarty_variable(0, null, 0);?>
				<?php $_smarty_tpl->tpl_vars['price'] = new Smarty_variable(0, null, 0);?>
				<?php $_smarty_tpl->tpl_vars['tax_base'] = new Smarty_variable(0, null, 0);?>
				<?php $_smarty_tpl->tpl_vars['price_base'] = new Smarty_variable(0, null, 0);?>


				<?php $_smarty_tpl->tpl_vars['price_base'] = new Smarty_variable($_smarty_tpl->tpl_vars['o']->value->unit_price*$_smarty_tpl->tpl_vars['o']->value->quantity*(1-$_smarty_tpl->tpl_vars['o']->value->discount_percent), null, 0);?>
				<?php if ($_smarty_tpl->tpl_vars['o']->value->tax_included==1) {?>
					<?php $_smarty_tpl->tpl_vars['tax_base'] = new Smarty_variable($_smarty_tpl->tpl_vars['tax']->value->rate/(100+$_smarty_tpl->tpl_vars['tax']->value->rate)*$_smarty_tpl->tpl_vars['price_base']->value, null, 0);?>
					<?php $_smarty_tpl->tpl_vars['price_base'] = new Smarty_variable($_smarty_tpl->tpl_vars['price_base']->value-$_smarty_tpl->tpl_vars['tax_base']->value, null, 0);?>
				<?php } else { ?>
					<?php $_smarty_tpl->tpl_vars['tax_base'] = new Smarty_variable($_smarty_tpl->tpl_vars['tax']->value->rate*$_smarty_tpl->tpl_vars['price_base']->value/100, null, 0);?>
				<?php }?>

				<?php if ($_smarty_tpl->tpl_vars['o']->value->type=='CCN') {?>
					<?php $_smarty_tpl->tpl_vars['price_base'] = new Smarty_variable(-$_smarty_tpl->tpl_vars['price_base']->value, null, 0);?>
					<?php $_smarty_tpl->tpl_vars['tax_base'] = new Smarty_variable(-$_smarty_tpl->tpl_vars['tax_base']->value, null, 0);?>
				<?php }?>


				<?php if ($_smarty_tpl->tpl_vars['o']->value->type=='S'||$_smarty_tpl->tpl_vars['o']->value->type=='DS'||$_smarty_tpl->tpl_vars['o']->value->type=='CCN'||$_smarty_tpl->tpl_vars['o']->value->type=='SBD') {?>
					<?php $_smarty_tpl->tpl_vars['sale_base'] = new Smarty_variable($_smarty_tpl->tpl_vars['price_base']->value*$_smarty_tpl->tpl_vars['o']->value->curr_rate, null, 0);?>
					<?php $_smarty_tpl->tpl_vars['sale_gst'] = new Smarty_variable($_smarty_tpl->tpl_vars['tax_base']->value*$_smarty_tpl->tpl_vars['o']->value->curr_rate, null, 0);?>
					<?php $_smarty_tpl->tpl_vars['gst'] = new Smarty_variable($_smarty_tpl->tpl_vars['gst']->value+$_smarty_tpl->tpl_vars['sale_gst']->value, null, 0);?>
					<?php $_smarty_tpl->tpl_vars['gst_each'] = new Smarty_variable($_smarty_tpl->tpl_vars['gst_each']->value+$_smarty_tpl->tpl_vars['sale_gst']->value, null, 0);?>

				<?php } elseif ($_smarty_tpl->tpl_vars['o']->value->type=='P'||$_smarty_tpl->tpl_vars['o']->value->type=='BP'||$_smarty_tpl->tpl_vars['o']->value->type=='SCN'||$_smarty_tpl->tpl_vars['o']->value->type=='PBD') {?>
					<?php $_smarty_tpl->tpl_vars['purchase_base'] = new Smarty_variable($_smarty_tpl->tpl_vars['price_base']->value*$_smarty_tpl->tpl_vars['o']->value->curr_rate, null, 0);?>
					<?php $_smarty_tpl->tpl_vars['purchase_gst'] = new Smarty_variable($_smarty_tpl->tpl_vars['tax_base']->value*$_smarty_tpl->tpl_vars['o']->value->curr_rate, null, 0);?>
					<?php if ($_smarty_tpl->tpl_vars['o']->value->type!='BL') {?>
						<?php $_smarty_tpl->tpl_vars['gst'] = new Smarty_variable($_smarty_tpl->tpl_vars['gst']->value+$_smarty_tpl->tpl_vars['purchase_gst']->value, null, 0);?>
						<?php $_smarty_tpl->tpl_vars['gst_each'] = new Smarty_variable($_smarty_tpl->tpl_vars['gst_each']->value+$_smarty_tpl->tpl_vars['purchase_gst']->value, null, 0);?>
					<?php }?>
				<?php }?>

				<?php $_smarty_tpl->tpl_vars['taxcode'] = new Smarty_variable($_smarty_tpl->tpl_vars['tax']->value->no, null, 0);?>

				<?php if (isset($_smarty_tpl->tpl_vars['taxcode']->value)&&in_array($_smarty_tpl->tpl_vars['taxcode']->value,$_smarty_tpl->tpl_vars['5b_check']->value)) {?>

					<?php if ($_smarty_tpl->tpl_vars['o']->value->type=='S'||$_smarty_tpl->tpl_vars['o']->value->type=='DS'||$_smarty_tpl->tpl_vars['o']->value->type=='CCN'||$_smarty_tpl->tpl_vars['o']->value->type=='SBD') {?>
	   					<?php $_smarty_tpl->tpl_vars['5b'] = new Smarty_variable($_smarty_tpl->tpl_vars['5b']->value+$_smarty_tpl->tpl_vars['sale_gst']->value, null, 0);?>
	   				
	   				<?php } elseif ($_smarty_tpl->tpl_vars['o']->value->type=='P'||$_smarty_tpl->tpl_vars['o']->value->type=='BP'||$_smarty_tpl->tpl_vars['o']->value->type=='SCN'||$_smarty_tpl->tpl_vars['o']->value->type=='PBD') {?>
	   					<?php $_smarty_tpl->tpl_vars['5b'] = new Smarty_variable($_smarty_tpl->tpl_vars['5b']->value+$_smarty_tpl->tpl_vars['purchase_gst']->value, null, 0);?>
	   				<?php }?>

				<?php }?>

				<?php if (isset($_smarty_tpl->tpl_vars['taxcode']->value)&&in_array($_smarty_tpl->tpl_vars['taxcode']->value,$_smarty_tpl->tpl_vars['6b_check']->value)) {?>
					<?php if ($_smarty_tpl->tpl_vars['o']->value->type=='S'||$_smarty_tpl->tpl_vars['o']->value->type=='DS'||$_smarty_tpl->tpl_vars['o']->value->type=='CCN'||$_smarty_tpl->tpl_vars['o']->value->type=='SBD') {?>
	   					<?php $_smarty_tpl->tpl_vars['6b'] = new Smarty_variable($_smarty_tpl->tpl_vars['6b']->value+$_smarty_tpl->tpl_vars['sale_gst']->value, null, 0);?>
	   				<?php } elseif ($_smarty_tpl->tpl_vars['o']->value->type=='P'||$_smarty_tpl->tpl_vars['o']->value->type=='BP'||$_smarty_tpl->tpl_vars['o']->value->type=='SCN'||$_smarty_tpl->tpl_vars['o']->value->type=='PBD') {?>
	   					<?php $_smarty_tpl->tpl_vars['6b'] = new Smarty_variable($_smarty_tpl->tpl_vars['6b']->value+$_smarty_tpl->tpl_vars['purchase_gst']->value, null, 0);?>
	   				<?php }?>

				<?php }?>

				<?php if (($_smarty_tpl->tpl_vars['o']->value->type=='S'||$_smarty_tpl->tpl_vars['o']->value->type=='CCN')&&$_smarty_tpl->tpl_vars['tax']->value->sales_gl_code!=2150) {?>
					<tr style="background: #3C7;">
   				<?php } elseif (($_smarty_tpl->tpl_vars['o']->value->type=='P'||$_smarty_tpl->tpl_vars['o']->value->type=='SCN')&&$_smarty_tpl->tpl_vars['tax']->value->purchasing_gl_code!=1300) {?>
					<tr style="background: #3C7;">
				<?php } else { ?>
					<tr>
				<?php }?>
					<td ><?php echo form::date_format(array('time'=>$_smarty_tpl->tpl_vars['o']->value->tran_date),$_smarty_tpl);?>
</td>
					<td>
						<?php if ($_smarty_tpl->tpl_vars['o']->value->type=='S') {?>
							<a onclick="popitup('../../sales/view/view_invoice.php?trans_no=<?php echo $_smarty_tpl->tpl_vars['o']->value->trans_no;?>
'); return false;" href="#" target="_blank"><?php echo $_smarty_tpl->tpl_vars['o']->value->trans_no;?>
</a>
						<?php } elseif ($_smarty_tpl->tpl_vars['o']->value->type=='P') {?>
							<a onclick="popitup('../../purchasing/view/view_supp_invoice.php?trans_no=<?php echo $_smarty_tpl->tpl_vars['o']->value->trans_no;?>
'); return false;" href="#" target="_blank"><?php echo $_smarty_tpl->tpl_vars['o']->value->trans_no;?>
</a>
						<?php } elseif ($_smarty_tpl->tpl_vars['o']->value->type=='BP') {?>
							<a onclick="popitup('../../gl/view/gl_payment_view.php?trans_no=<?php echo $_smarty_tpl->tpl_vars['o']->value->trans_no;?>
'); return false;" href="#" target="_blank"><?php echo $_smarty_tpl->tpl_vars['o']->value->trans_no;?>
</a>
						<?php } elseif ($_smarty_tpl->tpl_vars['o']->value->type=='DS') {?>
							<a onclick="popitup('../../gl/view/gl_deposit_view.php?trans_no=<?php echo $_smarty_tpl->tpl_vars['o']->value->trans_no;?>
'); return false;" href="#" target="_blank"><?php echo $_smarty_tpl->tpl_vars['o']->value->trans_no;?>
</a>
						<?php } elseif ($_smarty_tpl->tpl_vars['o']->value->type=='CCN') {?>
							<a onclick="popitup('../../sales/view/view_credit.php?trans_type=11&trans_no=<?php echo $_smarty_tpl->tpl_vars['o']->value->trans_no;?>
'); return false;" href="#" target="_blank"><?php echo $_smarty_tpl->tpl_vars['o']->value->trans_no;?>
</a>

						<?php } else { ?>
							<?php echo $_smarty_tpl->tpl_vars['o']->value->trans_no;?>

						<?php }?>
					</td>
					<td><?php echo $_smarty_tpl->tpl_vars['o']->value->reference;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['o']->value->currence;?>
</td>
					<td><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['o']->value->curr_rate),$_smarty_tpl);?>
</td>
					<td>
						<?php if ($_smarty_tpl->tpl_vars['o']->value->item_code) {?><i><?php echo $_smarty_tpl->tpl_vars['o']->value->item_code;?>
</i><br><?php }?>
						<?php if ($_smarty_tpl->tpl_vars['o']->value->item_name) {
echo $_smarty_tpl->tpl_vars['o']->value->item_name;
}?>
						<?php if (($_smarty_tpl->tpl_vars['o']->value->type=='BP'||$_smarty_tpl->tpl_vars['o']->value->type=='DS'||$_smarty_tpl->tpl_vars['o']->value->type=='P')&&isset($_smarty_tpl->tpl_vars['o']->value->comment)) {?>
							<br><?php echo $_smarty_tpl->tpl_vars['o']->value->comment;?>

						<?php }?>
					</td>
					<td><?php if (isset($_smarty_tpl->tpl_vars['o']->value->customername)) {
echo $_smarty_tpl->tpl_vars['o']->value->customername;
} elseif (isset($_smarty_tpl->tpl_vars['o']->value->supp_name)) {
echo $_smarty_tpl->tpl_vars['o']->value->supp_name;
}?></td>
					<td class="textright"><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['price_base']->value,'absolute'=>$_smarty_tpl->tpl_vars['abs_value']->value),$_smarty_tpl);?>
 <span class="txtblue textbold"><?php echo $_smarty_tpl->tpl_vars['o']->value->type;?>
</span></td>
					<td class="textright"><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['tax_base']->value,'absolute'=>$_smarty_tpl->tpl_vars['abs_value']->value),$_smarty_tpl);?>
</td>

					<td class="textright"><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['sale_base']->value,'absolute'=>$_smarty_tpl->tpl_vars['abs_value']->value),$_smarty_tpl);?>
</td>
					<td class="textright"><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['sale_gst']->value,'absolute'=>$_smarty_tpl->tpl_vars['abs_value']->value),$_smarty_tpl);?>
</td>

					<td class="textright"><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['purchase_base']->value,'absolute'=>$_smarty_tpl->tpl_vars['abs_value']->value),$_smarty_tpl);?>
</td>
					<td class="textright"><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['purchase_gst']->value,'absolute'=>$_smarty_tpl->tpl_vars['abs_value']->value),$_smarty_tpl);?>
</td>

					<?php if ($_smarty_tpl->tpl_vars['sum_col']->value) {?>
					<td class="textright">
						<?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['gst_each']->value),$_smarty_tpl);?>


					</td>
					<?php }?>
				</tr>



				<?php $_smarty_tpl->tpl_vars['number'] = new Smarty_variable($_smarty_tpl->tpl_vars['number']->value+1, null, 0);?>
				

   				<?php $_smarty_tpl->tpl_vars['sale_base_total'] = new Smarty_variable($_smarty_tpl->tpl_vars['sale_base_total']->value+$_smarty_tpl->tpl_vars['sale_base']->value, null, 0);?>
				<?php $_smarty_tpl->tpl_vars['sale_gst_total'] = new Smarty_variable($_smarty_tpl->tpl_vars['sale_gst_total']->value+$_smarty_tpl->tpl_vars['sale_gst']->value, null, 0);?>
				<?php $_smarty_tpl->tpl_vars['purchase_base_total'] = new Smarty_variable($_smarty_tpl->tpl_vars['purchase_base_total']->value+$_smarty_tpl->tpl_vars['purchase_base']->value, null, 0);?>
				<?php $_smarty_tpl->tpl_vars['purchase_gst_total'] = new Smarty_variable($_smarty_tpl->tpl_vars['purchase_gst_total']->value+$_smarty_tpl->tpl_vars['purchase_gst']->value, null, 0);?>

			<?php } ?>



			<?php $_smarty_tpl->tpl_vars['sale_base_amount'] = new Smarty_variable($_smarty_tpl->tpl_vars['sale_base_amount']->value+$_smarty_tpl->tpl_vars['sale_base_total']->value, null, 0);?>
			<?php $_smarty_tpl->tpl_vars['sale_gst_amount'] = new Smarty_variable($_smarty_tpl->tpl_vars['sale_gst_amount']->value+$_smarty_tpl->tpl_vars['sale_gst_total']->value, null, 0);?>
			<?php $_smarty_tpl->tpl_vars['purchase_base_amount'] = new Smarty_variable($_smarty_tpl->tpl_vars['purchase_base_amount']->value+$_smarty_tpl->tpl_vars['purchase_base_total']->value, null, 0);?>
			<?php $_smarty_tpl->tpl_vars['purchase_gst_amount'] = new Smarty_variable($_smarty_tpl->tpl_vars['purchase_gst_amount']->value+$_smarty_tpl->tpl_vars['purchase_gst_total']->value, null, 0);?>

			<?php if (abs($_smarty_tpl->tpl_vars['sale_base_total']->value)>0) {?>
				<tr class="tax_footer" >

					<td colspan="9" class="textright textbold bordertop">Sales</td>
					<td class="bordertop textright" ><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['sale_base_total']->value,'absolute'=>$_smarty_tpl->tpl_vars['abs_value']->value),$_smarty_tpl);?>
</td>
					<td class="bordertop textright"><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['sale_gst_total']->value,'absolute'=>$_smarty_tpl->tpl_vars['abs_value']->value),$_smarty_tpl);?>
</td>
					<td class="bordertop textright">0.00</td>
					<td class="bordertop textright">0.00</td>
					<?php if ($_smarty_tpl->tpl_vars['sum_col']->value) {?><td class="bordertop textright"></td><?php }?>

				</tr>
			<?php }?>

			<?php if (abs($_smarty_tpl->tpl_vars['purchase_base_total']->value)>0) {?>
				<tr class="tax_footer" >

					<td colspan="9" class="textright textbold bordertop">Purchase</td>
					<td class="bordertop textright">0.00</td>
					<td class="bordertop textright">0.00</td>
					<td class="bordertop textright" ><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['purchase_base_total']->value,'absolute'=>$_smarty_tpl->tpl_vars['abs_value']->value),$_smarty_tpl);?>
</td>
					<td class="bordertop textright" ><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['purchase_gst_total']->value,'absolute'=>$_smarty_tpl->tpl_vars['abs_value']->value),$_smarty_tpl);?>
</td>
					<?php if ($_smarty_tpl->tpl_vars['sum_col']->value) {?><td class="bordertop textright"></td><?php }?>
				</tr>
			<?php }?>


			<tr class="tax_footer" >

				<td colspan="9" class="textright textbold bordertop"><?php echo $_smarty_tpl->tpl_vars['tax']->value->name;?>
 (<?php echo $_smarty_tpl->tpl_vars['tax']->value->no;?>
)</td>
				<td class="bordertop textright" ><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['sale_base_total']->value,'absolute'=>$_smarty_tpl->tpl_vars['abs_value']->value),$_smarty_tpl);?>
</td>
				<td class="bordertop textright"><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['sale_gst_total']->value,'absolute'=>$_smarty_tpl->tpl_vars['abs_value']->value),$_smarty_tpl);?>
</td>
				<td class="bordertop textright" ><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['purchase_base_total']->value,'absolute'=>$_smarty_tpl->tpl_vars['abs_value']->value),$_smarty_tpl);?>
</td>
				<td class="bordertop textright" ><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['purchase_gst_total']->value,'absolute'=>$_smarty_tpl->tpl_vars['abs_value']->value),$_smarty_tpl);?>
</td>
				<?php if ($_smarty_tpl->tpl_vars['sum_col']->value) {?>
				<td class="bordertop textright" ><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['gst_each']->value),$_smarty_tpl);?>
</td>
				<?php }?>
			</tr>


		<?php }?> <?php } ?> <?php }?>
</tbody>

		<tfoot>
		<tr style="background-color: #eaeaea;">
				<td colspan="9" class="textright textbold">GRAND TOTAL</td>
				<td class="textright textbold" ><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['sale_base_amount']->value,'absolute'=>$_smarty_tpl->tpl_vars['abs_value']->value),$_smarty_tpl);?>
</td>
				<td class="textright textbold"><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['sale_gst_amount']->value,'absolute'=>$_smarty_tpl->tpl_vars['abs_value']->value),$_smarty_tpl);?>
</td>
				<td class="textright textbold" ><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['purchase_base_amount']->value,'absolute'=>$_smarty_tpl->tpl_vars['abs_value']->value),$_smarty_tpl);?>
</td>
				<td class="textright textbold"><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['purchase_gst_amount']->value,'absolute'=>$_smarty_tpl->tpl_vars['abs_value']->value),$_smarty_tpl);?>
</td>
				<?php if ($_smarty_tpl->tpl_vars['sum_col']->value) {?>
				<td class="textright textbold"><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['gst']->value),$_smarty_tpl);?>
</td>
				<?php }?>
		</tr>
		<?php if (@constant('COUNTRY')==60) {?>
		<tr style="background-color: #eaeaea;">
				<td colspan="<?php if ($_smarty_tpl->tpl_vars['sum_col']->value) {?>12<?php } else { ?>11<?php }?>" class="textright textbold">5b (SR,DS,AJS)</td>
				<td colspan="2" class="textright textbold" ><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['5b']->value),$_smarty_tpl);?>
</td>
		</tr>
		<tr style="background-color: #eaeaea;">
				<td colspan="<?php if ($_smarty_tpl->tpl_vars['sum_col']->value) {?>12<?php } else { ?>11<?php }?>" class="textright textbold">6b (TX,IM,TX-E43,TX-RE,AJP)</td>
				<td colspan="2" class="textright textbold" ><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['6b']->value),$_smarty_tpl);?>
</td>
		</tr>
		<tr style="background-color: #eaeaea;">
				<td colspan="<?php if ($_smarty_tpl->tpl_vars['sum_col']->value) {?>12<?php } else { ?>11<?php }?>" class="textright textbold"><?php if (abs($_smarty_tpl->tpl_vars['5b']->value)>abs($_smarty_tpl->tpl_vars['6b']->value)) {?> GST Amount Payable<?php } else { ?> GST Amount Claimable<?php }?></td>
				<td colspan="2" class="textright textbold" ><?php echo pdf_smarty::number_format(array('num'=>abs($_smarty_tpl->tpl_vars['6b']->value)-abs($_smarty_tpl->tpl_vars['5b']->value),'absolute'=>1),$_smarty_tpl);?>
</td>
		</tr>
		<?php }?>
		</tfoot>
</table>
<?php }} ?>
