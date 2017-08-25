<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-09 18:43:53
         compiled from "/var/www/atcore/ci_module/gl/views/inquiry/gl_account_inquiry_filter.html" */ ?>
<?php /*%%SmartyHeaderCode:19795764065822fde923aff4-68859405%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0661591989c4cc277c5bb5c3bfe24bd2657c2c3b' => 
    array (
      0 => '/var/www/atcore/ci_module/gl/views/inquiry/gl_account_inquiry_filter.html',
      1 => 1478688122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19795764065822fde923aff4-68859405',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'account' => 0,
    'date_to' => 0,
    'check_incorrect' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5822fde92a77d7_45666283',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5822fde92a77d7_45666283')) {function content_5822fde92a77d7_45666283($_smarty_tpl) {?><div class="row borderall" style="margin-bottom: 10px;">
	<div class="col-md-5">
		<?php echo form::formInputGroup(array('field'=>$_smarty_tpl->tpl_vars['account']->value,'name'=>'account'),$_smarty_tpl);?>

	</div>
	<div class="col-md-3">
		<?php echo form::formInputGroup(array('name'=>'date_from'),$_smarty_tpl);?>

	</div>
	<div class="col-md-3">
		<?php echo form::formInputGroup(array('field'=>$_smarty_tpl->tpl_vars['date_to']->value,'name'=>'date_to'),$_smarty_tpl);?>

	</div>

<div class="col-md-12 linebreak"></div>

	<div class="col-md-4">
		<?php echo form::formInputGroup(array('name'=>'amount_min','colunm'=>'6-6'),$_smarty_tpl);?>

	</div>
	<div class="col-md-4">
		<?php echo form::formInputGroup(array('name'=>'amount_max','colunm'=>'6-6'),$_smarty_tpl);?>

	</div>

	<div class="col-md-1">
		<div class="form-group clearfix" style="display: block; padding-top: 5px">
			<label style="display: inline;">Check </label>
			<?php echo form::formInput(array('name'=>'check_incorrect','type'=>$_smarty_tpl->tpl_vars['check_incorrect']->value['type'],'value'=>$_smarty_tpl->tpl_vars['check_incorrect']->value['value']),$_smarty_tpl);?>

		</div>
	</div>
	<div class="col-md-1"><div class="form-group"><?php echo form::submit_button(array('title'=>"Show",'atype'=>1),$_smarty_tpl);?>
</div>

	</div>
</div><?php }} ?>
