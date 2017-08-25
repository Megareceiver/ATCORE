<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-11-09 21:08:57
         compiled from "/var/www/atcore/ci_module/gl/views/tran_view.html" */ ?>
<?php /*%%SmartyHeaderCode:21443017058231fe983ed56-22303093%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29cc28822ac55d39e175a5917141ceceff5de22c' => 
    array (
      0 => '/var/www/atcore/ci_module/gl/views/tran_view.html',
      1 => 1471337542,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21443017058231fe983ed56-22303093',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_title' => 0,
    'tran_name' => 0,
    'reference' => 0,
    'tran_date' => 0,
    'person' => 0,
    'repost' => 0,
    'table' => 0,
    'trans' => 0,
    'k' => 0,
    'th' => 0,
    'ite' => 0,
    'credit' => 0,
    'debit' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58231fe98bc191_86003644',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58231fe98bc191_86003644')) {function content_58231fe98bc191_86003644($_smarty_tpl) {?><table class="table">
	<thead>
      <tr>
        <th><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</th>
        <th>Reference</th>
        <th>Date</th>
        <th>Person/Item</th>
      </tr>
    </thead>
    <tbody>
	<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['tran_name']->value;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['reference']->value;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['tran_date']->value;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['person']->value;?>
</td>
	</tr>
    </tbody>
</table>

<?php if (isset($_smarty_tpl->tpl_vars['repost']->value)) {?>
<p style="text-align: right; margin-bottom: 20px;">
	<a  href="<?php echo $_smarty_tpl->tpl_vars['repost']->value;?>
">RE-POST</a>
</p>
<?php } else { ?>
<br>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['table']->value&&isset($_smarty_tpl->tpl_vars['trans']->value)) {?>
<table class="table table-striped">
	<thead><tr>
		<?php  $_smarty_tpl->tpl_vars['th'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['th']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['table']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['th']->key => $_smarty_tpl->tpl_vars['th']->value) {
$_smarty_tpl->tpl_vars['th']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['th']->key;
?>
        <th <?php if ($_smarty_tpl->tpl_vars['k']->value=='credit'||$_smarty_tpl->tpl_vars['k']->value=='debit') {?>class="text-right"<?php }?>><?php echo $_smarty_tpl->tpl_vars['th']->value['title'];?>
</th>
		<?php } ?>
	</tr></thead>
    <tbody>

		<?php $_smarty_tpl->tpl_vars['credit'] = new Smarty_variable(0, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['debit'] = new Smarty_variable(0, null, 0);?>
    	<?php  $_smarty_tpl->tpl_vars['ite'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ite']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['trans']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ite']->key => $_smarty_tpl->tpl_vars['ite']->value) {
$_smarty_tpl->tpl_vars['ite']->_loop = true;
?><tr>
	    	<?php  $_smarty_tpl->tpl_vars['th'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['th']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['table']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['th']->key => $_smarty_tpl->tpl_vars['th']->value) {
$_smarty_tpl->tpl_vars['th']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['th']->key;
?>
	    		<?php if ($_smarty_tpl->tpl_vars['k']->value=='credit'&&$_smarty_tpl->tpl_vars['ite']->value->amount<0) {?>
	    			<td></td>
					<td class="text-right"><?php echo pdf_smarty::number_format(array('num'=>abs($_smarty_tpl->tpl_vars['ite']->value->amount),'amount'=>true),$_smarty_tpl);?>
</td>

					<?php $_smarty_tpl->tpl_vars['credit'] = new Smarty_variable($_smarty_tpl->tpl_vars['credit']->value-$_smarty_tpl->tpl_vars['ite']->value->amount, null, 0);?>
				<?php } elseif ($_smarty_tpl->tpl_vars['k']->value=='debit'&&$_smarty_tpl->tpl_vars['ite']->value->amount>0) {?>

					<td class="text-right"><?php echo pdf_smarty::number_format(array('num'=>abs($_smarty_tpl->tpl_vars['ite']->value->amount),'amount'=>true),$_smarty_tpl);?>
</td>
					<td></td>
					<?php $_smarty_tpl->tpl_vars['debit'] = new Smarty_variable($_smarty_tpl->tpl_vars['debit']->value+$_smarty_tpl->tpl_vars['ite']->value->amount, null, 0);?>
	    		<?php } elseif ($_smarty_tpl->tpl_vars['k']->value!='credit'&&$_smarty_tpl->tpl_vars['k']->value!='debit') {?>
					<td><?php echo $_smarty_tpl->tpl_vars['ite']->value->{$_smarty_tpl->tpl_vars['k']->value};?>
</td>
	    		<?php }?>

	    	<?php } ?>
    	</tr><?php } ?>

    </tbody>
    <tfoot>
    	<tr>
    		<td colspan="2"><strong>Total</strong></td>
    		<td class="text-right" ><strong><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['debit']->value,'amount'=>true),$_smarty_tpl);?>
</strong></td>
    		<td class="text-right"><strong><?php echo pdf_smarty::number_format(array('num'=>$_smarty_tpl->tpl_vars['credit']->value,'amount'=>true),$_smarty_tpl);?>
</strong></td>
    		<td></td>
    	</tr>
    </tfoot>
</table>
<?php }?><?php }} ?>
