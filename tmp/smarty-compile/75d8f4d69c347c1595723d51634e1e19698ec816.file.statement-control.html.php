<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-10 13:17:48
         compiled from "/var/www/atcore/ci_module/bank/views/inquiry/statement-control.html" */ ?>
<?php /*%%SmartyHeaderCode:101259668582402fce82254-74481486%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75d8f4d69c347c1595723d51634e1e19698ec816' => 
    array (
      0 => '/var/www/atcore/ci_module/bank/views/inquiry/statement-control.html',
      1 => 1477975258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '101259668582402fce82254-74481486',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'bank_account' => 0,
    'date_from' => 0,
    'date_to' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_582402fcea59a0_48994535',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582402fcea59a0_48994535')) {function content_582402fcea59a0_48994535($_smarty_tpl) {?><div class="row borderall" style="margin-bottom: 10px;">
	<div class="col-md-5">
		<?php echo form::formInputGroup(array('field'=>$_smarty_tpl->tpl_vars['bank_account']->value,'name'=>'bank_account'),$_smarty_tpl);?>

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
