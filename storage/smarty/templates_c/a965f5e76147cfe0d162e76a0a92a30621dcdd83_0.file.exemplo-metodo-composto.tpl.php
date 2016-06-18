<?php
/* Smarty version 3.1.29, created on 2016-06-18 03:24:10
  from "C:\wamp\www\Projects\simple-mvc\resources\views\templates\exemplo-url-composta\exemplo-metodo-composto.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5764e90a995ee5_02736010',
  'file_dependency' => 
  array (
    'a965f5e76147cfe0d162e76a0a92a30621dcdd83' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\simple-mvc\\resources\\views\\templates\\exemplo-url-composta\\exemplo-metodo-composto.tpl',
      1 => 1466231023,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/index-header.tpl' => 1,
    'file:partials/index-footer.tpl' => 1,
  ),
),false)) {
function content_5764e90a995ee5_02736010 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/index-header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<div class="main__content">
		<div class="container">

			<h1 class="main__title"><?php echo $_smarty_tpl->tpl_vars['variables']->value['titleMetodoComposto'];?>
</h1>
			<p>Acessada por: <b><?php echo $_smarty_tpl->tpl_vars['variables']->value['exemploMetodoComposto'];?>
</b></p>

		</div><!-- /.container -->
	</div><!-- /.main__content -->

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/index-footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
