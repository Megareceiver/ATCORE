<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-10 09:59:51
         compiled from "/var/www/atcore/ci_module/customer/views/printing/statement_header.html" */ ?>
<?php /*%%SmartyHeaderCode:9918176875823d4970d84f8-47340499%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34fc169746ad67db24e7dfe2f0343b66c07e1b81' => 
    array (
      0 => '/var/www/atcore/ci_module/customer/views/printing/statement_header.html',
      1 => 1471507844,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9918176875823d4970d84f8-47340499',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'company' => 0,
    'order' => 0,
    'address' => 0,
    'page_number' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5823d4971297c5_36536094',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5823d4971297c5_36536094')) {function content_5823d4971297c5_36536094($_smarty_tpl) {?><div class="container wrapper">

	<p class="textcenter page_statement" ><?php echo $_smarty_tpl->tpl_vars['company']->value['name'];?>
 <?php if (isset($_smarty_tpl->tpl_vars['company']->value['coy_no'])) {?> <span>- <?php echo $_smarty_tpl->tpl_vars['company']->value['coy_no'];?>
</span> <?php }?></p>
	<?php if (isset($_smarty_tpl->tpl_vars['company']->value['address'])&&$_smarty_tpl->tpl_vars['company']->value['address']!='') {?> <p class="textcenter" ><?php echo $_smarty_tpl->tpl_vars['company']->value['address'];?>
</p> <?php }?>
	<p class="textcenter font13" >Tel: <?php echo $_smarty_tpl->tpl_vars['company']->value['phone'];?>
  Fax: <?php echo $_smarty_tpl->tpl_vars['company']->value['fax'];?>
</p>
	
	<table style="width: 100%;" cellpadding="3" cellspacing="0" >
		<tr>
			<td>
				<table cellpadding="3" cellspacing="0" style="width: 7cm;">
					<tr><td width="25%" class="textright" ><b>A/C No.</b>:</td><td><?php echo $_smarty_tpl->tpl_vars['order']->value['debtor_no'];?>
</td></tr>
					<tr><td width="25%" class="textright" ><b>Debtor</b>:</td><td><?php echo $_smarty_tpl->tpl_vars['order']->value['debtor'];?>
</td></tr>
					<tr><td width="25%" class="textright" ><b>Address</b>:</td><td><?php if (isset($_smarty_tpl->tpl_vars['address']->value)) {
echo $_smarty_tpl->tpl_vars['address']->value;
}?></td></tr>
				</table>

			</td>
			<td width="35%">
				<table cellpadding="3" cellspacing="0">
					<tr><td></td></tr>
					<tr><td class="textcenter" style="font-size: 150%; font-weight: bold;">Statement Of Account</td></tr>
					<tr><td></td></tr>
				</table>
			</td>
			<td>
				<table cellpadding="3" cellspacing="0" style="width: 6cm;" >
					<tr><td width="50%" class="textright" ><b>Statement Date</b>:</td><td><?php echo $_smarty_tpl->tpl_vars['order']->value['date'];?>
</td></tr>
					<tr><td width="50%" class="textright" ><b>Terms</b>:</td><td>30 days</td></tr>
					<tr><td width="50%" class="textright" ><b>Page</b>:</td><td><?php echo $_smarty_tpl->tpl_vars['page_number']->value;?>
</td></tr>
				</table>

			</td>

		</tr>
	</table>
</div><?php }} ?>
