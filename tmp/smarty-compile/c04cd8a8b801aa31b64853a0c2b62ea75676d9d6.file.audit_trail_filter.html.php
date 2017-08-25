<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-14 18:09:37
         compiled from "/var/www/atcore/ci_module/admin/views/audit_trail_filter.html" */ ?>
<?php /*%%SmartyHeaderCode:191013534058298d6197bcd1-39221700%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c04cd8a8b801aa31b64853a0c2b62ea75676d9d6' => 
    array (
      0 => '/var/www/atcore/ci_module/admin/views/audit_trail_filter.html',
      1 => 1466414227,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191013534058298d6197bcd1-39221700',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fillter_title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58298d61996c44_64703934',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58298d61996c44_64703934')) {function content_58298d61996c44_64703934($_smarty_tpl) {?>
<div class="row form-inline table_fillter ">
  <div class="col-md-4">
	  <div class="form-group">
	    <label>Type</label>
	    <?php echo form::formInput(array('type'=>'trans_type','name'=>'type','value'=>$_smarty_tpl->tpl_vars['fillter_title']->value),$_smarty_tpl);?>

	  </div>
  </div>
  <div class="col-md-3"></div>
</div>
<?php }} ?>
