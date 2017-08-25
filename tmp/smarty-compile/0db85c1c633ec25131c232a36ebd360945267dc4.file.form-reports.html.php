<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-10 00:21:01
         compiled from "/var/www/atcore/ci_module/report/views/form-reports.html" */ ?>
<?php /*%%SmartyHeaderCode:49993308258234cedbc8782-58468441%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0db85c1c633ec25131c232a36ebd360945267dc4' => 
    array (
      0 => '/var/www/atcore/ci_module/report/views/form-reports.html',
      1 => 1478448537,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '49993308258234cedbc8782-58468441',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fields' => 0,
    'field' => 0,
    'name' => 0,
    'submit' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58234cedc26cc6_95428324',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58234cedc26cc6_95428324')) {function content_58234cedc26cc6_95428324($_smarty_tpl) {?><div class="container">
<div class="row clearfix form-inline">
	<div class="col-md-offset-2 col-md-8 form">
	<?php if (isset($_smarty_tpl->tpl_vars['fields']->value)) {
$_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->_loop = true;
 $_smarty_tpl->tpl_vars['name']->value = $_smarty_tpl->tpl_vars['field']->key;
?>

		<?php if ($_smarty_tpl->tpl_vars['field']->value['type']!='HIDDEN') {?>

		<?php echo form::formInputGroup(array('field'=>$_smarty_tpl->tpl_vars['field']->value,'name'=>$_smarty_tpl->tpl_vars['name']->value),$_smarty_tpl);?>


		
		<?php } else { ?>
		<?php echo form::formInput(array('type'=>$_smarty_tpl->tpl_vars['field']->value['type'],'name'=>$_smarty_tpl->tpl_vars['name']->value,'field'=>$_smarty_tpl->tpl_vars['field']->value),$_smarty_tpl);?>

		<?php }?>
		<?php } ?>
	<?php }?>


	<?php if (isset($_smarty_tpl->tpl_vars['submit']->value)) {?>
	<div class="form-actions" >
		<?php  $_smarty_tpl->tpl_vars['title'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['title']->_loop = false;
 $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['submit']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['title']->key => $_smarty_tpl->tpl_vars['title']->value) {
$_smarty_tpl->tpl_vars['title']->_loop = true;
 $_smarty_tpl->tpl_vars['name']->value = $_smarty_tpl->tpl_vars['title']->key;
?>
			<?php if (is_array($_smarty_tpl->tpl_vars['title']->value)) {?>
				<?php echo form::submit_button(array('name'=>$_smarty_tpl->tpl_vars['name']->value,'title'=>$_smarty_tpl->tpl_vars['title']->value[0],'atype'=>$_smarty_tpl->tpl_vars['title']->value[1]),$_smarty_tpl);?>

			<?php } else { ?>
				<?php echo form::submit_button(array('name'=>$_smarty_tpl->tpl_vars['name']->value,'title'=>$_smarty_tpl->tpl_vars['title']->value,'atype'=>1),$_smarty_tpl);?>

			<?php }?>

		<?php } ?>
	</div>
	<?php }?>
	</div>

</div>

</div><?php }} ?>
