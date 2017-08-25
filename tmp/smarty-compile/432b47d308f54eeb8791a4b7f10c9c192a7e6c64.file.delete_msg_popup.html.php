<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-02-26 15:47:28
         compiled from "/var/www/atcore/ci_module/admin/views/delete_msg_popup.html" */ ?>
<?php /*%%SmartyHeaderCode:90397718658b28810db2489-28866728%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '432b47d308f54eeb8791a4b7f10c9c192a7e6c64' => 
    array (
      0 => '/var/www/atcore/ci_module/admin/views/delete_msg_popup.html',
      1 => 1457468158,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '90397718658b28810db2489-28866728',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58b28810de9bc0_03515441',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58b28810de9bc0_03515441')) {function content_58b28810de9bc0_03515441($_smarty_tpl) {?><p style="padding-bottom: 15px;" >
	You can delete fiscal year with the fllowing conditions:
</p>
<ul>
	<li>The latest fiscal year must be deleted first before older fiscal year can be deleted. For example if there are 2014,2015 & 2016 in the system, them 2016 first be deleted before you can delete 2015</li>
    <li>The fiscal year to be deleted must be closed if transactions exist</li>
    <li>If the fiscal year does not have any transaction, the deletion will be permitted regardless of being closed or not.</li>
</ul><?php }} ?>
