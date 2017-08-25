<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-14 15:28:21
         compiled from "/var/www/atcore/ci/views/cash_gl/vouchers_pdf.html" */ ?>
<?php /*%%SmartyHeaderCode:142888227158296795618336-91429287%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3cce7febf7bd08a65d4c9699711a80b219af96e8' => 
    array (
      0 => '/var/www/atcore/ci/views/cash_gl/vouchers_pdf.html',
      1 => 1475574481,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142888227158296795618336-91429287',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'options' => 0,
    'field' => 0,
    'name' => 0,
    'submit' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_582967956636c3_80512390',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582967956636c3_80512390')) {function content_582967956636c3_80512390($_smarty_tpl) {?><div class="container">
<div class="row clearfix form-inline">
	<div class="col-md-offset-2 col-md-8 form">
<?php if (isset($_smarty_tpl->tpl_vars['options']->value)) {
$_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['options']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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


	<div class="form-actions" >

		<?php if (isset($_smarty_tpl->tpl_vars['submit']->value)) {?>
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
		<?php }?>
		</div>
</div>
</div>

</div>



<?php }} ?>
