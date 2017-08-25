<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-09 20:52:28
         compiled from "/var/www/atcore/ci_module/maintenance/views/customer_form.html" */ ?>
<?php /*%%SmartyHeaderCode:14396332158231c0c867ca9-79805545%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cdbeed2349d648725380c8702e0582d613da632e' => 
    array (
      0 => '/var/www/atcore/ci_module/maintenance/views/customer_form.html',
      1 => 1456125653,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14396332158231c0c867ca9-79805545',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'type' => 0,
    'customer' => 0,
    'branch' => 0,
    'id' => 0,
    'tran_date' => 0,
    'ref' => 0,
    'currency' => 0,
    'curr_rate' => 0,
    'debit' => 0,
    'credit' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58231c0c8ef1b2_48554671',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58231c0c8ef1b2_48554671')) {function content_58231c0c8ef1b2_48554671($_smarty_tpl) {?><div class="row clearfix form-horizontal form-group-at">
	<div class="col-md-6 border-h-r">
		<?php if (isset($_smarty_tpl->tpl_vars['type']->value)&&$_smarty_tpl->tpl_vars['type']->value=='customer') {?>

		<?php echo form::formInputGroup(array('type'=>'CUSTOMER','name'=>'customer','title'=>"Customer Name",'field'=>$_smarty_tpl->tpl_vars['customer']->value,'class'=>"autosubmit"),$_smarty_tpl);?>

		<?php echo form::formInputGroup(array('type'=>'BRANCH','name'=>'branch','title'=>"Branch",'field'=>$_smarty_tpl->tpl_vars['branch']->value),$_smarty_tpl);?>


		<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['type']->value=='supplier') {?>
		<?php echo form::formInputGroup(array('type'=>'SUPPLIER','name'=>'customer','title'=>"Supplier Name",'field'=>$_smarty_tpl->tpl_vars['customer']->value),$_smarty_tpl);?>


		<?php }?>



		<?php echo form::inputHidden(array('name'=>'id','value'=>$_smarty_tpl->tpl_vars['id']->value['value']),$_smarty_tpl);?>


	</div>
	<div class="col-md-6">

		<?php echo form::formInputGroup(array('type'=>'qdate','name'=>'tran_date','title'=>"Date",'value'=>$_smarty_tpl->tpl_vars['tran_date']->value['value']),$_smarty_tpl);?>


		


		<?php echo form::formInputGroup(array('type'=>'NUMBER','name'=>'ref','title'=>"Reference",'value'=>$_smarty_tpl->tpl_vars['ref']->value['value']),$_smarty_tpl);?>



		
	</div>
</div>

<?php if (isset($_smarty_tpl->tpl_vars['currency']->value)) {?>
<div class="row clearfix form-horizontal form-group-at">
	<div class="col-md-6"><?php echo form::formInputGroup(array('type'=>'currency','name'=>'currency','title'=>"Currency",'field'=>$_smarty_tpl->tpl_vars['currency']->value,'class'=>"autosubmit"),$_smarty_tpl);?>
</div>
	<div class="col-md-6"><?php echo form::formInputGroup(array('type'=>'NUMBER','name'=>'curr_rate','title'=>"Rate",'field'=>$_smarty_tpl->tpl_vars['curr_rate']->value),$_smarty_tpl);?>
</div>
</div>
<?php }?>

<div class="row clearfix form-horizontal form-group-at">
	<div class="col-md-5"><?php echo form::formInputGroup(array('type'=>'NUMBER','name'=>'debit','title'=>"Debit",'field'=>$_smarty_tpl->tpl_vars['debit']->value),$_smarty_tpl);?>
</div>


	<div class="col-md-7"><?php echo form::formInputGroup(array('type'=>'NUMBER','name'=>'','value'=>round(($_smarty_tpl->tpl_vars['debit']->value['value']*$_smarty_tpl->tpl_vars['curr_rate']->value['value']),"2"),'title'=>"Debit (Base Currency)",'colunm'=>'4-8','disabled'=>1,'attr'=>'class="form-control debit_base"'),$_smarty_tpl);?>
</div>

	<div class="col-md-5"><?php echo form::formInputGroup(array('type'=>'NUMBER','name'=>'credit','title'=>"Credit",'field'=>$_smarty_tpl->tpl_vars['credit']->value),$_smarty_tpl);?>
</div>
	<div class="col-md-7"><?php echo form::formInputGroup(array('type'=>'NUMBER','name'=>'','value'=>round(($_smarty_tpl->tpl_vars['credit']->value['value']*$_smarty_tpl->tpl_vars['curr_rate']->value['value']),"2"),'title'=>"Credit (Base Currency)",'colunm'=>'4-8','disabled'=>1,'attr'=>'class="form-control credit_base"'),$_smarty_tpl);?>
</div>
</div>
<?php }} ?>
