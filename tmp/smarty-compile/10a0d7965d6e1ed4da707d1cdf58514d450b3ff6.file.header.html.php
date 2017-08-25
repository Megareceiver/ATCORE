<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-11 12:30:43
         compiled from "/var/www/atcore/ci/views/reporting/item/header.html" */ ?>
<?php /*%%SmartyHeaderCode:184256639958254973a46017-37929372%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10a0d7965d6e1ed4da707d1cdf58514d450b3ff6' => 
    array (
      0 => '/var/www/atcore/ci/views/reporting/item/header.html',
      1 => 1456125669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184256639958254973a46017-37929372',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'table' => 0,
    'title' => 0,
    'content_w' => 0,
    'k' => 0,
    'col' => 0,
    'amount_title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58254973a67e59_87612524',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58254973a67e59_87612524')) {function content_58254973a67e59_87612524($_smarty_tpl) {?><table class="items" cellpadding="3" cellspacing="0" >
		<thead class="" >
			<tr class=" " >
				<?php $_smarty_tpl->tpl_vars['col'] = new Smarty_variable(1, null, 0);?>
				<?php  $_smarty_tpl->tpl_vars['title'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['title']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['table']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['title']->key => $_smarty_tpl->tpl_vars['title']->value) {
$_smarty_tpl->tpl_vars['title']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['title']->key;
?>
				<td style=" width: <?php echo $_smarty_tpl->tpl_vars['title']->value['w']*$_smarty_tpl->tpl_vars['content_w']->value/100;?>
mm;" class="<?php if ($_smarty_tpl->tpl_vars['k']->value=='item_code'||($_smarty_tpl->tpl_vars['title']->value['boleft']==1||$_smarty_tpl->tpl_vars['col']->value==1)) {?>boleft <?php }?>bobottom botop color_header textbold <?php if (isset($_smarty_tpl->tpl_vars['title']->value['class'])) {
echo $_smarty_tpl->tpl_vars['title']->value['class'];
}?>">
					<?php echo $_smarty_tpl->tpl_vars['title']->value['title'];?>

				</td>
				<?php $_smarty_tpl->tpl_vars['col'] = new Smarty_variable($_smarty_tpl->tpl_vars['col']->value+1, null, 0);?>
				<?php } ?>
				<td class="textright borderall color_header" style="width: 27.25mm;" ><b><?php echo $_smarty_tpl->tpl_vars['amount_title']->value;?>
</b></td>
			</tr>
		</thead>
		<tbody>
		</tbody>
</table><?php }} ?>
