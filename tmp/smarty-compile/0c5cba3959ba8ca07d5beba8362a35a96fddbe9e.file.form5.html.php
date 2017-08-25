<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-21 05:41:41
         compiled from "/var/www/atcore/ci/views/gst_check/gst_form5/form5.html" */ ?>
<?php /*%%SmartyHeaderCode:11637540045832189562ef22-68281267%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c5cba3959ba8ca07d5beba8362a35a96fddbe9e' => 
    array (
      0 => '/var/www/atcore/ci/views/gst_check/gst_form5/form5.html',
      1 => 1456125670,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11637540045832189562ef22-68281267',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'company' => 0,
    'date_from' => 0,
    'date_to' => 0,
    'f1' => 0,
    'f2' => 0,
    'f3' => 0,
    'f5' => 0,
    'f6' => 0,
    'f7' => 0,
    'f8' => 0,
    'f9' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5832189574c0e4_30741841',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5832189574c0e4_30741841')) {function content_5832189574c0e4_30741841($_smarty_tpl) {?><style>
 .row { margin-top: 5px; }
 input.num { text-align : right; width: 93%;}
</style>

<div id="gstform5" style="width: 21cm; margin: 0 auto; border: 1px solid #000;" >

	<div class="" style="background-color: black; color: #fff; text-align: center; font-size: 150%">
		<p style="font-weight: bold;" >GOODS AND SERVICES TAX RETURN</p>
		<p>Goods and Services Tax Act 1993</p>
	</div>

	<div class="row" style="margin-top: 5px;">
		<div class="col-md-6" style="border: 1px solid #000; padding: 5px; margin-left: 5px; width: 49%;">
			<p><?php echo $_smarty_tpl->tpl_vars['company']->value['coy_name'];?>
</p>
			<p style="height: 82px;"><?php echo $_smarty_tpl->tpl_vars['company']->value['postal_address'];?>
</p>
			<p style="font-weight: bold;" >GST Reg No. <?php echo $_smarty_tpl->tpl_vars['company']->value['gst_no'];?>
</p>
		</div>
		<div class="col-md-6" >
			<p style="text-align: justify;" >Kindly complete this Return after the end of your accounting period. The date for submission is one month after the end of the accounting period. Penalties will be imposed if you do not submit your Return and make payment by the due date.</p>

			<div style="border: 1px solid #000; padding: 5px;" class="row" >
				<p style="padding-left: 15px;" >Period Covered by this return</p>
				<div class="col-lg-7 col-xs-7"><span style="text-align: right;">From : </span><?php echo $_smarty_tpl->tpl_vars['date_from']->value;?>
</div>
				<div class="col-lg-5 col-xs-5"><span style="text-align: right;">To : </span><?php echo $_smarty_tpl->tpl_vars['date_to']->value;?>
</div>
			</div>
		</div>

		<h3 class="col-md-12" style="background-color: black; color: #fff;" >SUPPLIES</h3>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-5">Total value of standard-rated supplies</div>
			<div class="col-md-5">
				<input class="num" value="<?php echo $_smarty_tpl->tpl_vars['f1']->value;?>
">.00
			</div>
			<div class="col-md-1">[1]</div>
		</div>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-5">Total value of zero-rated supplies</div>
			<div class="col-md-5">
				<input class="num" value="<?php echo $_smarty_tpl->tpl_vars['f2']->value;?>
">.00
			</div>
			<div class="col-md-1">[2]</div>
		</div>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-5">Total value of exempt supplies</div>
			<div class="col-md-5">
				<input class="num" value="<?php echo $_smarty_tpl->tpl_vars['f3']->value;?>
">.00
			</div>
			<div class="col-md-1">[3]</div>
		</div>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-5">Total value (1) + (2) + (3)</div>
			<div class="col-md-5">
				<input class="num" value="<?php echo $_smarty_tpl->tpl_vars['f1']->value+$_smarty_tpl->tpl_vars['f2']->value+$_smarty_tpl->tpl_vars['f3']->value;?>
">.00
			</div>
			<div class="col-md-1">[4]</div>
		</div>



		<h3 class="col-md-12" style="background-color: black; color: #fff;" >PURCHASES </h3>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-5">Total value </div>
			<div class="col-md-5">
				<input class="num" value="<?php echo $_smarty_tpl->tpl_vars['f5']->value;?>
">.00
			</div>
			<div class="col-md-1">[5]</div>
		</div>


		<h3 class="col-md-12" style="background-color: black; color: #fff;">TAXES </h3>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-5">Output Tax Due</div>
			<div class="col-md-5">
				<input class="num" value="<?php echo $_smarty_tpl->tpl_vars['f6']->value;?>
" >.00
			</div>
			<div class="col-md-1"  > [6]</div>
		</div>

		<div class="row">
			<div class="col-md-1">Less:</div>
			<div class="col-md-5">Input Tax and Refunds claimed</div>
			<div class="col-md-5">
				<input class="num" value="<?php echo $_smarty_tpl->tpl_vars['f7']->value;?>
"  >.00
			</div>
			<div class="col-md-1">[7]</div>
		</div>
		<div class="row">
			<div class="col-md-1">Equals:</div>
			<div class="col-md-5">Net GST to be paid to IRAS or Net GST to be claimed from IRAS</div>
			<div class="col-md-5">
				<input class="num" value="<?php echo $_smarty_tpl->tpl_vars['f8']->value;?>
">.00
			</div>
			<div class="col-md-1"   >[8]</div>
		</div>

		<h3 class="col-md-12" style="margin-bottom: 0; background-color: black; color: #fff;">APPLICABLE TO TAXABLE PERSONS UNDER MAJOR EXPORTER SCHEME / APPROVED 3RD PARTY</h3>
		<p class="col-md-12" style="margin: 0;" >LOGISTICS COMPANY / OTHER APPROVED SCHEMES ONLY</p>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-5">Total value of goods imported under this scheme</div>
			<div class="col-md-5">
				<input class="num" value="<?php echo $_smarty_tpl->tpl_vars['f9']->value;?>
">.00
			</div>
			<div class="col-md-1">[9]</div>
		</div>

		<h3 class="col-md-12" style="background-color: black; color: #fff;">REVENUE</h3>
		<div class="row" style="padding-bottom: 10px;">
			<div class="col-md-1"></div>
			<div class="col-md-5">Revenue for the accounting period</div>
			<div class="col-md-5">
				<input class="num" >.00
				
			</div>
			<div class="col-md-1">[13]</div>
		</div>
	</div>
</div>
<p style="width: 21cm; margin: 0 auto; ">**Not for partially-exempt traders</p><?php }} ?>
