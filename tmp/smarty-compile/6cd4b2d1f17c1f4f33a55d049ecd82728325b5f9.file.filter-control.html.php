<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-24 05:51:10
         compiled from "/var/www/atcore/ci_module/documents/views/inquiry/filter-control.html" */ ?>
<?php /*%%SmartyHeaderCode:1753574046582c293d33f3d8-05145492%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6cd4b2d1f17c1f4f33a55d049ecd82728325b5f9' => 
    array (
      0 => '/var/www/atcore/ci_module/documents/views/inquiry/filter-control.html',
      1 => 1484991901,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1753574046582c293d33f3d8-05145492',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_582c293d374e37_31078544',
  'variables' => 
  array (
    'tran_type' => 0,
    'date_from' => 0,
    'date_to' => 0,
    'status' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582c293d374e37_31078544')) {function content_582c293d374e37_31078544($_smarty_tpl) {?><div class="row borderall" style="margin-bottom: 10px;">
	<div class="col-md-5">
		<?php echo form::formInputGroup(array('field'=>$_smarty_tpl->tpl_vars['tran_type']->value,'name'=>'tran_type','colunm'=>'4-8'),$_smarty_tpl);?>

	</div>
	<div class="col-md-2">
		<?php echo form::formInputGroup(array('field'=>$_smarty_tpl->tpl_vars['date_from']->value,'name'=>'date_from'),$_smarty_tpl);?>

	</div>
	<div class="col-md-2">
		<?php echo form::formInputGroup(array('field'=>$_smarty_tpl->tpl_vars['date_to']->value,'name'=>'date_to'),$_smarty_tpl);?>

	</div>
	<div class="col-md-2">
		<?php echo form::formInputGroup(array('field'=>$_smarty_tpl->tpl_vars['status']->value,'name'=>'status','colunm'=>'0-12'),$_smarty_tpl);?>

	</div>
	<div class="col-md-1"><div class="form-group"><?php echo form::submit_button(array('title'=>"Show",'atype'=>1),$_smarty_tpl);?>
</div>

	</div>
</div><?php }} ?>
