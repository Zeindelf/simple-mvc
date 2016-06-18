<?php
/* Smarty version 3.1.29, created on 2016-06-17 23:24:36
  from "C:\wamp\www\Projects\simple-mvc\resources\views\templates\exemplo-url-composta\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5764b0e47535f8_86937462',
  'file_dependency' => 
  array (
    '4f754f3ef8f2104f52c49eacba00aac651b8d7df' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\simple-mvc\\resources\\views\\templates\\exemplo-url-composta\\index.tpl',
      1 => 1466203545,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_partials/geral/main-header.tpl' => 1,
    'file:_partials/index-header.tpl' => 1,
    'file:_partials/index-footer.tpl' => 1,
    'file:_partials/geral/main-footer.tpl' => 1,
  ),
),false)) {
function content_5764b0e47535f8_86937462 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:_partials/geral/main-header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:_partials/index-header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<div class="main__content">
		<div class="container">

			<h1 class="main__title"><?php echo $_smarty_tpl->tpl_vars['variables']->value['titleUrlComposta'];?>
</h1>
			<p>Acessada por: <b><?php echo $_smarty_tpl->tpl_vars['variables']->value['exemploUrlComposta'];?>
</b></p>

		</div><!-- /.container -->
	</div><!-- /.main__content -->

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:_partials/index-footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:_partials/geral/main-footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
