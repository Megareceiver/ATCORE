<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-10 13:22:15
         compiled from "/var/www/atcore/ci_module/sales/views/inquiry/filter-control.html" */ ?>
<?php /*%%SmartyHeaderCode:15039513935824040768ee22-50759962%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3b269ef598c0c3035f52a5d763a3618d173756d' => 
    array (
      0 => '/var/www/atcore/ci_module/sales/views/inquiry/filter-control.html',
      1 => 1477975258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15039513935824040768ee22-50759962',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'debtor_no' => 0,
    'date_from' => 0,
    'date_to' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_582404076b3b83_33886707',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582404076b3b83_33886707')) {function content_582404076b3b83_33886707($_smarty_tpl) {?><div class="row borderall" style="margin-bottom: 10px;">
	<div class="col-md-5">
		<?php echo form::formInputGroup(array('field'=>$_smarty_tpl->tpl_vars['debtor_no']->value,'name'=>'debtor_no'),$_smarty_tpl);?>

	</div>
	<div class="col-md-3">
		<?php echo form::formInputGroup(array('field'=>$_smarty_tpl->tpl_vars['date_from']->value,'name'=>'date_from'),$_smarty_tpl);?>

	</div>
	<div class="col-md-3">
		<?php echo form::formInputGroup(array('field'=>$_smarty_tpl->tpl_vars['date_to']->value,'name'=>'date_to'),$_smarty_tpl);?>

	</div>

	<div class="col-md-1"><div class="form-group"><?php echo form::submit_button(array('title'=>"Show",'atype'=>1),$_smarty_tpl);?>
</div>

	</div>
</div><?php }} ?>
