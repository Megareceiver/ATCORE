<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-21 05:53:05
         compiled from "/var/www/atcore/ci/views/gl/inquiry/tax.html" */ ?>
<?php /*%%SmartyHeaderCode:182112237958321b41669ea3-22436607%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b0a0c7141bcafa828e93dfb77838bec8cd12ca3' => 
    array (
      0 => '/var/www/atcore/ci/views/gl/inquiry/tax.html',
      1 => 1456125669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '182112237958321b41669ea3-22436607',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'from' => 0,
    'to' => 0,
    'table' => 0,
    'field' => 0,
    'val' => 0,
    'items' => 0,
    'ite' => 0,
    'total' => 0,
    'net' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58321b41765c26_79434712',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58321b41765c26_79434712')) {function content_58321b41765c26_79434712($_smarty_tpl) {?><div class="content_area" >
	<div class="row control">
		<form action="" method="post">
		<div class="col-lg-2 col-md-2 textright" ></div>
		<div class="col-lg-1 col-md-1 textright" >From</div>
		<div class="col-lg-2 col-md-2" >
			<?php echo form::formInput(array('name'=>'date_from','type'=>'DATE','value'=>$_smarty_tpl->tpl_vars['from']->value),$_smarty_tpl);?>

		</div>
		<div class="col-lg-1 col-md-1 textright" >To</div>
		<div class="col-lg-2 col-md-2" >
			<?php echo form::formInput(array('name'=>'date_to','type'=>'DATE','value'=>$_smarty_tpl->tpl_vars['to']->value),$_smarty_tpl);?>

		</div>
		<div class="col-lg-1 col-md-1"><button value="Show" name="Show" type="submit" class="inputsubmit">Show</button></div>
		</form>
	</div>

	<table class="table table-striped" cellpadding=2 cellspacing=3 >
		<thead><tr>
			<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['table']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['field']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
				<?php if ($_smarty_tpl->tpl_vars['field']->value=='collectible'||$_smarty_tpl->tpl_vars['field']->value=='net_input') {?>
				<th class="textright" ><?php echo $_smarty_tpl->tpl_vars['val']->value[1];?>
</th>
				<?php } else { ?>
				<th><?php echo $_smarty_tpl->tpl_vars['val']->value[1];?>
</th>
				<?php }?>

			<?php } ?>

		</tr></thead>
		<tbody>
			<?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable(0, null, 0);?>
			<?php  $_smarty_tpl->tpl_vars['ite'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ite']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ite']->key => $_smarty_tpl->tpl_vars['ite']->value) {
$_smarty_tpl->tpl_vars['ite']->_loop = true;
?>
				<?php if ($_smarty_tpl->tpl_vars['ite']->value->net_input!=0||$_smarty_tpl->tpl_vars['ite']->value->collectible!=0||$_smarty_tpl->tpl_vars['ite']->value->payable!=0) {?>
				<?php $_smarty_tpl->tpl_vars['net'] = new Smarty_variable(($_smarty_tpl->tpl_vars['ite']->value->collectible+$_smarty_tpl->tpl_vars['ite']->value->payable), null, 0);?>
				<?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable($_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['net']->value, null, 0);?>

				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['ite']->value->name;?>
</td>
					<td>Charged on sales (Output Tax)</td>
					<td class="textright"><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['ite']->value->payable),$_smarty_tpl);?>
</td>
					<td class="textright"><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['ite']->value->net_output),$_smarty_tpl);?>
</td>
				</tr>

				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['ite']->value->name;?>
</td>
					<td>Paid on purchases (Input Tax)</td>
					<td class="textright"><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['ite']->value->collectible),$_smarty_tpl);?>
</td>
					<td class="textright"><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['ite']->value->net_input),$_smarty_tpl);?>
</td>
				</tr>

				<tr class="textbold highlight" >

					<td><?php echo $_smarty_tpl->tpl_vars['ite']->value->name;?>
</td>
					<td>Net payable or collectible:</td>
					<td class="textright"><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['net']->value),$_smarty_tpl);?>
</td>
					<td></td>

				</tr>
				<?php }
} ?>
				<tr class="textbold" >

					<td></td>
					<td>Total payable or refund:</td>
					<td class="textright"><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['total']->value),$_smarty_tpl);?>
</td>
					<td></td>

				</tr>

		</tbody>
	</table>
</div><?php }} ?>
