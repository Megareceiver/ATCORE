<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-11 12:30:43
         compiled from "/var/www/atcore/ci/views/reporting/header.html" */ ?>
<?php /*%%SmartyHeaderCode:186663927758254973a6bf85-87026220%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29d8608c589bdadcb4d23c424a832c2690b78d9e' => 
    array (
      0 => '/var/www/atcore/ci/views/reporting/header.html',
      1 => 1456125669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186663927758254973a6bf85-87026220',
  'function' => 
  array (
    'collumspace' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'company' => 0,
    'collumspace' => 0,
    'title_h' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58254973acbd57_02134934',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58254973acbd57_02134934')) {function content_58254973acbd57_02134934($_smarty_tpl) {?><?php if (!function_exists('smarty_template_function_collumspace')) {
    function smarty_template_function_collumspace($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['collumspace']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
	<td width="15px"></td>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

<?php $_smarty_tpl->tpl_vars['collumspace'] = new Smarty_variable('<td width="15px"></td>', null, 0);?>


<div class="container wrapper">
	<table style="width: 100%;" class="header"  cellpadding="0" cellspacing="0" >
		<tr valign="bottom" >
			<td width="65%;"  >
				<table cellpadding="0" cellspacing="0" >
					<?php if (isset($_smarty_tpl->tpl_vars['company']->value['logo'])) {?>
						<tr><?php smarty_template_function_collumspace($_smarty_tpl,array());?>
<td colspan="2"><img src="<?php echo $_smarty_tpl->tpl_vars['company']->value['logo'];?>
" alt="A2000 solusion" height="50" border="0" ></td></tr>
						<tr><?php smarty_template_function_collumspace($_smarty_tpl,array());?>
<td colspan="2"><b><?php echo $_smarty_tpl->tpl_vars['company']->value['name'];?>
</b><?php if (isset($_smarty_tpl->tpl_vars['company']->value['coy_no'])) {?> -<?php echo $_smarty_tpl->tpl_vars['company']->value['coy_no'];?>
 <?php }?></td></tr>
					<?php } else { ?>
						<tr><?php echo $_smarty_tpl->tpl_vars['collumspace']->value;?>
<td colspan="2"><h2 style="font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['company']->value['name'];?>
</h2></td></tr>
						<?php if (isset($_smarty_tpl->tpl_vars['company']->value['coy_no'])) {?>
						<tr class="textitalic" ><?php smarty_template_function_collumspace($_smarty_tpl,array());?>
<td class="line_title" >Company Number</td><td><?php echo $_smarty_tpl->tpl_vars['company']->value['coy_no'];?>
</td></tr>
						<?php }?>
					<?php }?>

					<?php if (isset($_smarty_tpl->tpl_vars['company']->value['address'])) {?>
						<tr><?php smarty_template_function_collumspace($_smarty_tpl,array());?>
<td colspan="2"><?php echo form::print_address(array('addr'=>$_smarty_tpl->tpl_vars['company']->value['address']),$_smarty_tpl);?>
</td></tr>
					<?php }?>
					<?php if (isset($_smarty_tpl->tpl_vars['company']->value['phone'])) {?>

						<tr class="textitalic" ><?php smarty_template_function_collumspace($_smarty_tpl,array());?>
<td class="line_title" >Phone</td><td><?php echo $_smarty_tpl->tpl_vars['company']->value['phone'];?>
</td></tr>
					<?php }?>
					<?php if (isset($_smarty_tpl->tpl_vars['company']->value['fax'])) {?>
						<tr class="textitalic" ><?php smarty_template_function_collumspace($_smarty_tpl,array());?>
<td class="line_title" >Fax</td><td><?php echo $_smarty_tpl->tpl_vars['company']->value['fax'];?>
</td></tr>
					<?php }?>
					<?php if (isset($_smarty_tpl->tpl_vars['company']->value['email'])&&$_smarty_tpl->tpl_vars['company']->value['email']!='') {?>
						<tr class="textitalic" ><?php smarty_template_function_collumspace($_smarty_tpl,array());?>
<td class="line_title" >Email</td><td><?php echo $_smarty_tpl->tpl_vars['company']->value['email'];?>
</td></tr>
					<?php }?>
					<?php if (isset($_smarty_tpl->tpl_vars['company']->value['gst_no'])) {?>
						<?php $_smarty_tpl->tpl_vars['title_h'] = new Smarty_variable($_smarty_tpl->tpl_vars['title_h']->value+13, null, 0);?>
						<tr class="textitalic" ><?php smarty_template_function_collumspace($_smarty_tpl,array());?>
<td class="line_title" >Our GST No.</td><td><?php echo $_smarty_tpl->tpl_vars['company']->value['gst_no'];?>
</td></tr>
					<?php }?>
				</table>
			</td>
			<td width="35%" >
				<span class="page_title" align="right" style="line-height: 100px;" ><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</span>
			</td>
		</tr>
	</table>
</div>

<?php }} ?>
