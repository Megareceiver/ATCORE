<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-02-26 15:47:28
         compiled from "/var/www/atcore/ci//views/layout/error_popup.html" */ ?>
<?php /*%%SmartyHeaderCode:104542127858b28810def092-25480461%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d0fd393892b5757b086e37a3397bc0d0c727122' => 
    array (
      0 => '/var/www/atcore/ci//views/layout/error_popup.html',
      1 => 1457468158,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104542127858b28810def092-25480461',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'class' => 0,
    'title' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58b28810e46b16_15879973',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58b28810e46b16_15879973')) {function content_58b28810e46b16_15879973($_smarty_tpl) {?><div id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"  class="<?php echo ($_smarty_tpl->tpl_vars['class']->value).(' fade modal');?>
">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h4>
			</div>
			<div class="modal-body"><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</div>
			<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
		</div>
	</div>
</div><?php }} ?>
