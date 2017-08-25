<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-09 20:33:30
         compiled from "/var/www/atcore/ci/views/common/table-block.html" */ ?>
<?php /*%%SmartyHeaderCode:8367212185823179a58ec21-05985879%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9cdf7cff53f7c353f6e84e4e262d1bb908b7eef0' => 
    array (
      0 => '/var/www/atcore/ci/views/common/table-block.html',
      1 => 1456125669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8367212185823179a58ec21-05985879',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'class' => 0,
    'table' => 0,
    'title' => 0,
    'items' => 0,
    'limit' => 0,
    'k' => 0,
    'field' => 0,
    'ite' => 0,
    'field_type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5823179a653146_16013611',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5823179a653146_16013611')) {function content_5823179a653146_16013611($_smarty_tpl) {?><table class="table table-striped clearfix <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
">
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
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ite']->key => $_smarty_tpl->tpl_vars['ite']->value) {
$_smarty_tpl->tpl_vars['ite']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['ite']->key;
?>
		<?php if (isset($_smarty_tpl->tpl_vars['limit']->value)&&$_smarty_tpl->tpl_vars['k']->value+1>$_smarty_tpl->tpl_vars['limit']->value) {?> <?php continue 1;?> <?php }?>
		<tr>
		<?php  $_smarty_tpl->tpl_vars['title'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['title']->_loop = false;
 $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['table']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['title']->key => $_smarty_tpl->tpl_vars['title']->value) {
$_smarty_tpl->tpl_vars['title']->_loop = true;
 $_smarty_tpl->tpl_vars['field']->value = $_smarty_tpl->tpl_vars['title']->key;
?>
			<?php $_smarty_tpl->tpl_vars['field_type'] = new Smarty_variable('auto', null, 0);?>
			<?php if (is_array($_smarty_tpl->tpl_vars['title']->value)) {?>
				<?php if (isset($_smarty_tpl->tpl_vars['title']->value[3])) {?>
					<?php $_smarty_tpl->tpl_vars['field_type'] = new Smarty_variable($_smarty_tpl->tpl_vars['title']->value[3], null, 0);?>
				<?php }?>
				<td <?php if (isset($_smarty_tpl->tpl_vars['title']->value[1])) {?> class="<?php echo $_smarty_tpl->tpl_vars['title']->value[1];?>
" <?php }?> style="<?php if (isset($_smarty_tpl->tpl_vars['title']->value[2])) {?> width:<?php echo $_smarty_tpl->tpl_vars['title']->value[2];?>
%; <?php }?> " >


			<?php } else { ?>
				<td>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['field']->value=='gl_date'||$_smarty_tpl->tpl_vars['field']->value=='tran_date'||$_smarty_tpl->tpl_vars['field']->value=='due_date') {?>
				<?php echo form::date_format(array('time'=>$_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['field']->value}),$_smarty_tpl);?>


			<?php } elseif ($_smarty_tpl->tpl_vars['field']->value=='type') {?>
				<?php echo at_smarty::trans_type(array('type'=>$_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['field']->value}),$_smarty_tpl);?>

			<?php } elseif ($_smarty_tpl->tpl_vars['field']->value=='total'||$_smarty_tpl->tpl_vars['field']->value=='remainder') {?>
				<?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['field']->value},'amount'=>1),$_smarty_tpl);?>

			<?php } elseif ($_smarty_tpl->tpl_vars['field']->value=='actions') {?>
				<?php if (isset($_smarty_tpl->tpl_vars['ite']->value->type)&&isset($_smarty_tpl->tpl_vars['ite']->value->trans_no)) {?>

					<a onclick="javascript:openWindow(this.href,this.target); return false;" href="../../gl/view/gl_trans_view.php?type_id=<?php echo $_smarty_tpl->tpl_vars['ite']->value->type;?>
&trans_no=<?php echo $_smarty_tpl->tpl_vars['ite']->value->trans_no;?>
" target="_blank"><img border="0" height="12" title="GL" src="../../themes/template/images/gl.png"></a>

				<?php }?>
			<?php } else { ?>
				<?php if ($_smarty_tpl->tpl_vars['field_type']->value=='number') {?>
					<?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['field']->value},'amount'=>1),$_smarty_tpl);?>

				<?php } else { ?>
					<?php echo $_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['field']->value};?>

				<?php }?>
			<?php }?>
			</td>
		<?php } ?>

		</tr>

	<?php } ?>

	<?php } else { ?>
		<tr><td colspan="<?php echo count($_smarty_tpl->tpl_vars['items']->value);?>
" class="center" >No Items</td> </tr>
	<?php }?>
	</tbody>
</table><?php }} ?>
