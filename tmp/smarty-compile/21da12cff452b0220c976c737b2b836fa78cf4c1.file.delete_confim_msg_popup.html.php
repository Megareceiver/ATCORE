<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-16 00:40:50
         compiled from "/var/www/atcore/ci_module/admin/views/delete_confim_msg_popup.html" */ ?>
<?php /*%%SmartyHeaderCode:1428916701587ba6128afec9-68956994%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21da12cff452b0220c976c737b2b836fa78cf4c1' => 
    array (
      0 => '/var/www/atcore/ci_module/admin/views/delete_confim_msg_popup.html',
      1 => 1457495135,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1428916701587ba6128afec9-68956994',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'year' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_587ba6129ba913_05300128',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_587ba6129ba913_05300128')) {function content_587ba6129ba913_05300128($_smarty_tpl) {?><h4>All your data from <i><?php echo form::date_format(array('time'=>$_smarty_tpl->tpl_vars['year']->value->begin),$_smarty_tpl);?>
</i> to <i></i><?php echo form::date_format(array('time'=>$_smarty_tpl->tpl_vars['year']->value->end),$_smarty_tpl);?>
</b> will be purged.</h4>
<h4>DO YOU WANT TO PROCEED?</h4><?php }} ?>
