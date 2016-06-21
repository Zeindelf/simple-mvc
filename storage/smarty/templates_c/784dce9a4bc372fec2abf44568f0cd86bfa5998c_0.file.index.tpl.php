<?php
/* Smarty version 3.1.29, created on 2016-06-21 20:04:43
  from "C:\wamp\www\Projects\simple-mvc\resources\views\templates\index\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5769c80b17b554_97199862',
  'file_dependency' => 
  array (
    '784dce9a4bc372fec2abf44568f0cd86bfa5998c' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\simple-mvc\\resources\\views\\templates\\index\\index.tpl',
      1 => 1466550281,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/index-header.tpl' => 1,
    'file:partials/index-footer.tpl' => 1,
  ),
),false)) {
function content_5769c80b17b554_97199862 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars['message'] = new Smarty_Variable(Message::get('success','Uma mensagem qualquer'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'message', 0);?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/index-header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<div class="main__content">
		<div class="container">

			<h1 class="main__title"><?php echo $_smarty_tpl->tpl_vars['variables']->value['indexTitle'];?>
</h1>

			<?php echo $_smarty_tpl->tpl_vars['message']->value;?>


		</div><!-- /.container -->
	</div><!-- /.main__content -->

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/index-footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
