<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-10 09:59:51
         compiled from "/var/www/atcore/ci/views/reporting/footer/statement.html" */ ?>
<?php /*%%SmartyHeaderCode:10116353215823d4975af437-33289196%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5bc90ec5d83ea21f6d98464350057e3f7434d5c8' => 
    array (
      0 => '/var/www/atcore/ci/views/reporting/footer/statement.html',
      1 => 1471337542,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10116353215823d4975af437-33289196',
  'function' => 
  array (
    'showMonthValue' => 
    array (
      'parameter' => 
      array (
        'val' => 1,
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'val' => 0,
    'detail' => 0,
    'balance_word' => 0,
    'curr_symbol' => 0,
    'balance' => 0,
    'details' => 0,
    'showdetail' => 0,
    'dettal' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5823d4975ea550_84431091',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5823d4975ea550_84431091')) {function content_5823d4975ea550_84431091($_smarty_tpl) {?>
<?php if (!function_exists('smarty_template_function_showMonthValue')) {
    function smarty_template_function_showMonthValue($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['showMonthValue']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>

	<?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['detail']->value[('month').(($_smarty_tpl->tpl_vars['val']->value))]),$_smarty_tpl);?>

<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

<div class="container wrapper">

	<table class="" cellpadding="3" cellspacing="0" >
		<tr>
			<td width="78%"><?php echo $_smarty_tpl->tpl_vars['balance_word']->value;?>
</td>
			<td width="5%" class="textright" ><?php echo $_smarty_tpl->tpl_vars['curr_symbol']->value;?>
:</td>
			<td width="15%" class="textright" ><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['balance']->value),$_smarty_tpl);?>
</td>
		</tr>
	</table>

	<table class="statement_footer borderall" cellpadding="3" cellspacing="0">
		<tr class="color_header" >
			<td>CURRENT</td>
			<td>1 MONTH</td>
			<td>2 MONTHs</td>
			<td>3 MONTHs</td>
			<td>4 MONTHs</td>
			<td>5 MONTHs</td>
		</tr>

		<tr>

		<?php $_smarty_tpl->tpl_vars['showdetail'] = new Smarty_variable(0, null, 0);?>
		<?php  $_smarty_tpl->tpl_vars['dettal'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dettal']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['details']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dettal']->key => $_smarty_tpl->tpl_vars['dettal']->value) {
$_smarty_tpl->tpl_vars['dettal']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['dettal']->key;
?>
			<?php if ($_smarty_tpl->tpl_vars['showdetail']->value<6) {?>
			<?php $_smarty_tpl->tpl_vars['showdetail'] = new Smarty_variable($_smarty_tpl->tpl_vars['showdetail']->value+1, null, 0);?>
		    <td><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['dettal']->value,'amount'=>1),$_smarty_tpl);?>
</td>

		    <?php }?>
		<?php } ?>

		</tr>
		<tr><td colspan="6"></td></tr>
		<tr class="color_header" >
			<td>6 MONTHs</td>
			<td>7 MONTH</td>
			<td>8 MONTHs</td>
			<td>9 MONTHs</td>
			<td>10 MONTHs</td>
			<td>11 & OVER</td>
		</tr>
		<tr>

		<?php  $_smarty_tpl->tpl_vars['dettal'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dettal']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['details']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dettal']->key => $_smarty_tpl->tpl_vars['dettal']->value) {
$_smarty_tpl->tpl_vars['dettal']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['dettal']->key;
?>
			<?php if ($_smarty_tpl->tpl_vars['showdetail']->value>=12) {?>
		    <td><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['dettal']->value,'amount'=>1),$_smarty_tpl);?>
</td>
	    	<?php }?>
			<?php $_smarty_tpl->tpl_vars['showdetail'] = new Smarty_variable($_smarty_tpl->tpl_vars['showdetail']->value+1, null, 0);?>
	    <?php } ?>
		</tr>
	</table>

	<p>We shall be grateful if you will let us have payment as soon as possible. Any discrepancy in this statement must be reported to us in writing within 10 days</p>
</div><?php }} ?>
