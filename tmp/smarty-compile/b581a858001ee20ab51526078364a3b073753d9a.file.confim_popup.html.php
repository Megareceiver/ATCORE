<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-16 00:40:50
         compiled from "/var/www/atcore/ci//views/layout/confim_popup.html" */ ?>
<?php /*%%SmartyHeaderCode:105855322587ba6129c2720-71872914%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b581a858001ee20ab51526078364a3b073753d9a' => 
    array (
      0 => '/var/www/atcore/ci//views/layout/confim_popup.html',
      1 => 1457668530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105855322587ba6129c2720-71872914',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'class' => 0,
    'title' => 0,
    'content' => 0,
    'button_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_587ba6129e4295_82851443',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_587ba6129e4295_82851443')) {function content_587ba6129e4295_82851443($_smarty_tpl) {?><div id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
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
			<div class="modal-footer"><button type="submit" class="btn btn-submit" value="1" name="<?php echo $_smarty_tpl->tpl_vars['button_name']->value;?>
" >Accept</button><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button></div>
		</div>
	</div>
</div>
<?php }} ?>
