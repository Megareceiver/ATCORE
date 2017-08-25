<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-25 14:35:27
         compiled from "E:\xampp\htdocs\atcore\ci_module\purchases\views\inquiry\filter-control.html" */ ?>
<?php /*%%SmartyHeaderCode:20227599fc52f2ddc47-88372260%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e52162d9e840a4fc949446be29cde00031c9652f' => 
    array (
      0 => 'E:\\xampp\\htdocs\\atcore\\ci_module\\purchases\\views\\inquiry\\filter-control.html',
      1 => 1477975258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20227599fc52f2ddc47-88372260',
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
  'unifunc' => 'content_599fc52f4cde37_27885860',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_599fc52f4cde37_27885860')) {function content_599fc52f4cde37_27885860($_smarty_tpl) {?><div class="row borderall" style="margin-bottom: 10px;">
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
