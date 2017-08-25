<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-02-13 11:52:46
         compiled from "/var/www/atcore/ci_module/admin/views/purgin_confim_msg_popup.html" */ ?>
<?php /*%%SmartyHeaderCode:48681319658a12d8e7a55e9-06724179%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e9d17970b156d55bd1866effd1479af676050e2' => 
    array (
      0 => '/var/www/atcore/ci_module/admin/views/purgin_confim_msg_popup.html',
      1 => 1457668530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48681319658a12d8e7a55e9-06724179',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58a12d8e9bf6f6_50821277',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58a12d8e9bf6f6_50821277')) {function content_58a12d8e9bf6f6_50821277($_smarty_tpl) {?>
<div class="form-group">
    <label for="">By User</label>
    <span><?php echo $_SESSION['wa_current_user']->username;?>
</span>
</div>
<div class="form-group">
    <label for="">I/P Address</label>
    <span><?php echo $_SERVER['REMOTE_ADDR'];?>
</span>
</div>
<div class="form-group">
    <label for="">Date</label>
    <span><?php echo form::datetime_format(array(),$_smarty_tpl);?>
</span>
</div><?php }} ?>
