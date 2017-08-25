<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-13 10:26:23
         compiled from "/var/www/atcore/ci/views/common/form.html" */ ?>
<?php /*%%SmartyHeaderCode:17095015645827cf4f262cc5-02968283%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a808a999e4acd0d957e9fcb4e7753002f84576ff' => 
    array (
      0 => '/var/www/atcore/ci/views/common/form.html',
      1 => 1456294248,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17095015645827cf4f262cc5-02968283',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'formclass' => 0,
    'items' => 0,
    'field' => 0,
    'name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5827cf4f299684_13399418',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5827cf4f299684_13399418')) {function content_5827cf4f299684_13399418($_smarty_tpl) {?><div class="row clearfix form-inline <?php echo $_smarty_tpl->tpl_vars['formclass']->value;?>
 ">
<?php if (isset($_smarty_tpl->tpl_vars['items']->value)) {
$_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->_loop = true;
 $_smarty_tpl->tpl_vars['name']->value = $_smarty_tpl->tpl_vars['field']->key;
?>

<?php if ($_smarty_tpl->tpl_vars['field']->value['type']!='HIDDEN') {?>
<div class="form-group">
    <label for="exampleInputEmail1"><?php echo $_smarty_tpl->tpl_vars['field']->value['title'];?>
</label>
    <?php echo form::formInput(array('type'=>$_smarty_tpl->tpl_vars['field']->value['type'],'name'=>$_smarty_tpl->tpl_vars['name']->value,'field'=>$_smarty_tpl->tpl_vars['field']->value),$_smarty_tpl);?>

</div>
<?php } else { ?>
	<?php echo form::formInput(array('type'=>$_smarty_tpl->tpl_vars['field']->value['type'],'name'=>$_smarty_tpl->tpl_vars['name']->value,'field'=>$_smarty_tpl->tpl_vars['field']->value),$_smarty_tpl);?>

<?php }?>
<?php }
}?>
</div><?php }} ?>
