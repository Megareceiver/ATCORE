<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-09 22:00:34
         compiled from "/var/www/atcore/ci_module/html/views/form.html" */ ?>
<?php /*%%SmartyHeaderCode:117220718758232c02a555d3-79652084%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd92ed3bafd517edb7b510751a5fc40b40366be1' => 
    array (
      0 => '/var/www/atcore/ci_module/html/views/form.html',
      1 => 1478448537,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117220718758232c02a555d3-79652084',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'form_width' => 0,
    'offset' => 0,
    'fields' => 0,
    'field' => 0,
    'name' => 0,
    'submit' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58232c02ab1147_24060988',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58232c02ab1147_24060988')) {function content_58232c02ab1147_24060988($_smarty_tpl) {?><div class="container" style="margin-top: 10px;">
<div class="row clearfix form-inline">
	<?php $_smarty_tpl->tpl_vars['offset'] = new Smarty_variable(0, null, 0);?>
	<?php $_smarty_tpl->tpl_vars['formSpace'] = new Smarty_variable(12, null, 0);?>
	<?php if ($_smarty_tpl->tpl_vars['form_width']->value>0) {?>
		<?php $_smarty_tpl->tpl_vars['formSpace'] = new Smarty_variable(12-$_smarty_tpl->tpl_vars['form_width']->value, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['offset'] = new Smarty_variable((12-$_smarty_tpl->tpl_vars['form_width']->value)/2, null, 0);?>
	<?php }?>
	<div class="col-md-<?php echo $_smarty_tpl->tpl_vars['form_width']->value;?>
 form <?php if ($_smarty_tpl->tpl_vars['offset']->value>0) {?> col-md-offset-<?php echo $_smarty_tpl->tpl_vars['offset']->value;
}?>">
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
