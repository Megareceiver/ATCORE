<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-09 20:48:53
         compiled from "/var/www/atcore/ci/views/common/table_view.html" */ ?>
<?php /*%%SmartyHeaderCode:44725700358231b35f13372-02509934%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e48d1f98270a092c08552d639f48867adcf6f8dc' => 
    array (
      0 => '/var/www/atcore/ci/views/common/table_view.html',
      1 => 1470390676,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '44725700358231b35f13372-02509934',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'table' => 0,
    'title' => 0,
    'items' => 0,
    'field' => 0,
    'ite' => 0,
    'page_padding' => 0,
    'page' => 0,
    'to_end' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58231b361dd3c0_34525842',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58231b361dd3c0_34525842')) {function content_58231b361dd3c0_34525842($_smarty_tpl) {?><?php if (!is_callable('smarty_function_tempFunction')) include '/var/www/atcore/ci//thirdparty/Smarty-3.1.21/ci/function.tempFunction.php';
?><?php if (isset($_smarty_tpl->tpl_vars['table']->value)) {?>
	<table width=100% cellpadding=2 cellspacing=0 >
	<thead><tr>
	<?php  $_smarty_tpl->tpl_vars['title'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['title']->_loop = false;
 $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['table']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['title']->key => $_smarty_tpl->tpl_vars['title']->value) {
$_smarty_tpl->tpl_vars['title']->_loop = true;
 $_smarty_tpl->tpl_vars['field']->value = $_smarty_tpl->tpl_vars['title']->key;
?>
		<?php if (is_array($_smarty_tpl->tpl_vars['title']->value)) {?>
			<td <?php if (isset($_smarty_tpl->tpl_vars['title']->value[1])) {?> class="<?php echo $_smarty_tpl->tpl_vars['title']->value[1];?>
" <?php }?> style="<?php if (isset($_smarty_tpl->tpl_vars['title']->value[2])) {?> width:<?php echo $_smarty_tpl->tpl_vars['title']->value[2];?>
%; <?php }?>"><?php echo $_smarty_tpl->tpl_vars['title']->value[0];?>
</td>
		<?php } else { ?>
			<td><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</td>
		<?php }?>

	<?php } ?>
	</tr></thead>

	<?php if (count($_smarty_tpl->tpl_vars['items']->value)) {?>
	<tbody>

	<?php  $_smarty_tpl->tpl_vars['ite'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ite']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ite']->key => $_smarty_tpl->tpl_vars['ite']->value) {
$_smarty_tpl->tpl_vars['ite']->_loop = true;
?>
		<tr>
		<?php  $_smarty_tpl->tpl_vars['title'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['title']->_loop = false;
 $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['table']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['title']->key => $_smarty_tpl->tpl_vars['title']->value) {
$_smarty_tpl->tpl_vars['title']->_loop = true;
 $_smarty_tpl->tpl_vars['field']->value = $_smarty_tpl->tpl_vars['title']->key;
?>
			<?php if (is_array($_smarty_tpl->tpl_vars['title']->value)) {?>
				<td <?php if (isset($_smarty_tpl->tpl_vars['title']->value[1])) {?> class="<?php echo $_smarty_tpl->tpl_vars['title']->value[1];?>
" <?php }?> style="<?php if (isset($_smarty_tpl->tpl_vars['title']->value[2])) {?>width:<?php echo $_smarty_tpl->tpl_vars['title']->value[2];?>
%;<?php }?>">

			<?php } else { ?>
				<td>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['field']->value=='items_action') {?>
				<?php echo smarty_function_tempFunction(array('func'=>$_smarty_tpl->tpl_vars['title']->value[2],'item'=>$_smarty_tpl->tpl_vars['ite']->value),$_smarty_tpl);?>

			<?php } elseif (isset($_smarty_tpl->tpl_vars['title']->value[3])&&isset($_smarty_tpl->tpl_vars['title']->value[4])&&isset($_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['title']->value[4]})) {?>

				<?php echo smarty_function_tempFunction(array('func'=>$_smarty_tpl->tpl_vars['title']->value[3],'item'=>$_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['title']->value[4]}),$_smarty_tpl);?>

			<?php } else { ?>
				<?php if (is_array($_smarty_tpl->tpl_vars['title']->value)) {?>
					<?php if (isset($_smarty_tpl->tpl_vars['title']->value[3])&&$_smarty_tpl->tpl_vars['title']->value[3]=='date') {?>
						<?php echo form::date_format(array('time'=>$_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['field']->value}),$_smarty_tpl);?>

					<?php } elseif (isset($_smarty_tpl->tpl_vars['title']->value[3])&&$_smarty_tpl->tpl_vars['title']->value[3]=='number') {?>
						<?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['field']->value},'amount'=>1),$_smarty_tpl);?>

					<?php } elseif (isset($_smarty_tpl->tpl_vars['title']->value[3])&&$_smarty_tpl->tpl_vars['title']->value[3]=='trans_type') {?>
						<?php echo at_smarty::trans_type(array('type'=>$_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['field']->value}),$_smarty_tpl);?>

					<?php } else { ?>
						<?php echo $_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['field']->value};?>

					<?php }?>
				<?php } else { ?>
					<?php echo $_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['field']->value};?>

				<?php }?>
			<?php }?>

			</td>
		<?php } ?>

		</tr>

	<?php } ?>

	<?php } else { ?>
		<tr><td colspan="<?php echo count($_smarty_tpl->tpl_vars['table']->value);?>
" class="center" >No Items</td> </tr>
	<?php }?>
	</tbody>
	<?php if (count($_smarty_tpl->tpl_vars['items']->value)>0&&$_smarty_tpl->tpl_vars['page_padding']->value) {?>
	<tfoot><tr>
		<td colspan="3">
			<?php $_smarty_tpl->tpl_vars['to_end'] = new Smarty_variable($_smarty_tpl->tpl_vars['page']->value*@constant('page_padding_limit'), null, 0);?>
			Records <?php echo ($_smarty_tpl->tpl_vars['page']->value-1)*@constant('page_padding_limit')+1;?>
- <?php if ($_smarty_tpl->tpl_vars['to_end']->value>$_smarty_tpl->tpl_vars['total']->value) {
echo $_smarty_tpl->tpl_vars['total']->value;
} else {
echo $_smarty_tpl->tpl_vars['to_end']->value;
}?> of <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</td>
		<td class="textright" colspan="<?php echo count($_smarty_tpl->tpl_vars['table']->value)-3;?>
"><?php echo form_smarty::table_page_padding(array('ajax'=>1,'page'=>$_smarty_tpl->tpl_vars['page']->value),$_smarty_tpl);?>
</td>
	</tr></tfoot>
	<?php }?>
	</table>
<?php }?><?php }} ?>
