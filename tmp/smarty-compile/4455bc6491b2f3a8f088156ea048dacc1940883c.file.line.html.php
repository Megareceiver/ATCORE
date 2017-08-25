<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-11 12:30:44
         compiled from "/var/www/atcore/ci/views/reporting/item/line.html" */ ?>
<?php /*%%SmartyHeaderCode:19704912958254974013ab1-74452402%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4455bc6491b2f3a8f088156ea048dacc1940883c' => 
    array (
      0 => '/var/www/atcore/ci/views/reporting/item/line.html',
      1 => 1475207911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19704912958254974013ab1-74452402',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'table' => 0,
    'title' => 0,
    'content_w' => 0,
    'field' => 0,
    'col' => 0,
    'line_class' => 0,
    'item' => 0,
    'amount_w' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_582549740b89d8_67433453',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582549740b89d8_67433453')) {function content_582549740b89d8_67433453($_smarty_tpl) {?><table cellpadding="3" cellspacing="0"  >

	<tr>
	<?php $_smarty_tpl->tpl_vars['col'] = new Smarty_variable(1, null, 0);?>
	<?php  $_smarty_tpl->tpl_vars['title'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['title']->_loop = false;
 $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['table']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['title']->key => $_smarty_tpl->tpl_vars['title']->value) {
$_smarty_tpl->tpl_vars['title']->_loop = true;
 $_smarty_tpl->tpl_vars['field']->value = $_smarty_tpl->tpl_vars['title']->key;
?>
	<td style=" width: <?php echo $_smarty_tpl->tpl_vars['title']->value['w']*$_smarty_tpl->tpl_vars['content_w']->value/100;?>
mm;" class="<?php if ($_smarty_tpl->tpl_vars['field']->value=='item_code'||(isset($_smarty_tpl->tpl_vars['title']->value['boleft'])&&$_smarty_tpl->tpl_vars['title']->value['boleft']==1)||$_smarty_tpl->tpl_vars['col']->value==1) {?>boleft <?php }?>  <?php echo $_smarty_tpl->tpl_vars['line_class']->value;?>
 <?php if (isset($_smarty_tpl->tpl_vars['title']->value['ite_class'])) {
echo $_smarty_tpl->tpl_vars['title']->value['ite_class'];
} elseif (isset($_smarty_tpl->tpl_vars['title']->value['class'])) {
echo $_smarty_tpl->tpl_vars['title']->value['class'];
}?>" >
		<?php if ($_smarty_tpl->tpl_vars['field']->value=='price'||$_smarty_tpl->tpl_vars['field']->value=='unit_price'||$_smarty_tpl->tpl_vars['field']->value=='qty'||$_smarty_tpl->tpl_vars['field']->value=='left_alloc'||$_smarty_tpl->tpl_vars['field']->value=='Total') {?>
			<?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['item']->value->{$_smarty_tpl->tpl_vars['field']->value}),$_smarty_tpl);?>

		<?php } elseif ($_smarty_tpl->tpl_vars['field']->value=='trans_type') {?>
			<?php echo at_smarty::trans_type(array('type'=>$_smarty_tpl->tpl_vars['item']->value->{$_smarty_tpl->tpl_vars['field']->value}),$_smarty_tpl);?>

		<?php } elseif ($_smarty_tpl->tpl_vars['field']->value=='description') {?>
			<?php echo $_smarty_tpl->tpl_vars['item']->value->description;?>

			<?php if (isset($_smarty_tpl->tpl_vars['item']->value->long_description)&&$_smarty_tpl->tpl_vars['item']->value->long_description!='') {?>
				<br><?php echo form::print_address(array('addr'=>$_smarty_tpl->tpl_vars['item']->value->long_description),$_smarty_tpl);?>


			<?php }?>
		<?php } elseif ($_smarty_tpl->tpl_vars['field']->value=='discount_percent') {?>
			<?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['item']->value->{$_smarty_tpl->tpl_vars['field']->value}*100,'dec'=>0),$_smarty_tpl);?>
%
        <?php } elseif ($_smarty_tpl->tpl_vars['field']->value=='trans_type') {?>
            <?php echo at_smarty::trans_type(array('type'=>$_smarty_tpl->tpl_vars['item']->value->{$_smarty_tpl->tpl_vars['field']->value}),$_smarty_tpl);?>

        <?php } elseif ($_smarty_tpl->tpl_vars['field']->value=='tran_date'||$_smarty_tpl->tpl_vars['field']->value=='due_date') {
echo form::date_format(array('time'=>$_smarty_tpl->tpl_vars['item']->value->{$_smarty_tpl->tpl_vars['field']->value}),$_smarty_tpl);?>

		<?php } elseif (isset($_smarty_tpl->tpl_vars['item']->value->{$_smarty_tpl->tpl_vars['field']->value})) {?>
			<?php echo $_smarty_tpl->tpl_vars['item']->value->{$_smarty_tpl->tpl_vars['field']->value};?>


		<?php }?>

		<?php $_smarty_tpl->tpl_vars['col'] = new Smarty_variable($_smarty_tpl->tpl_vars['col']->value+1, null, 0);?>
	</td>

	<?php } ?>

	<td class="textright boleft boright  <?php echo $_smarty_tpl->tpl_vars['line_class']->value;?>
" style="width: <?php echo $_smarty_tpl->tpl_vars['amount_w']->value;?>
mm;"  >
		<?php if (isset($_smarty_tpl->tpl_vars['item']->value->price)&&isset($_smarty_tpl->tpl_vars['item']->value->qty)) {?>
			<?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['item']->value->price*$_smarty_tpl->tpl_vars['item']->value->qty*(1-$_smarty_tpl->tpl_vars['item']->value->discount_percent),'amount'=>1),$_smarty_tpl);?>

		<?php } elseif (isset($_smarty_tpl->tpl_vars['item']->value->line_total)) {?>
			<?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['item']->value->line_total,'amount'=>1),$_smarty_tpl);?>

		<?php }?>


	</td>
	</tr>
</table><?php }} ?>
