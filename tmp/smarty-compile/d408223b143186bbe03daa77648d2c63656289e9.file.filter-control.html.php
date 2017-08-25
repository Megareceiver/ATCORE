<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-11 22:32:01
         compiled from "/var/www/atcore/ci_module/purchases/views/inquiry/filter-control.html" */ ?>
<?php /*%%SmartyHeaderCode:10490121955825d66179e624-07020988%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd408223b143186bbe03daa77648d2c63656289e9' => 
    array (
      0 => '/var/www/atcore/ci_module/purchases/views/inquiry/filter-control.html',
      1 => 1477975258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10490121955825d66179e624-07020988',
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
  'unifunc' => 'content_5825d6617cb694_16936220',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5825d6617cb694_16936220')) {function content_5825d6617cb694_16936220($_smarty_tpl) {?><div class="row borderall" style="margin-bottom: 10px;">
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
