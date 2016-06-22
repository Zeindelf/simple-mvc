<?php
/* Smarty version 3.1.29, created on 2016-06-22 13:53:23
  from "C:\wamp\www\Projects\simple-mvc\resources\views\templates\partials\index-header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576ac283c16d92_78006361',
  'file_dependency' => 
  array (
    'cdcf8303998e98329d554ab8fe1c50ab44b43696' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\simple-mvc\\resources\\views\\templates\\partials\\index-header.tpl',
      1 => 1466614387,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/index-nav.tpl' => 1,
  ),
),false)) {
function content_576ac283c16d92_78006361 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars['siteName'] = new Smarty_Variable(Config::get('html.siteName'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'siteName', 0);
$_smarty_tpl->tpl_vars['baseUrl'] = new Smarty_Variable(Config::get('html.baseUrl'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'baseUrl', 0);?>

<div class="main__header">
	<header class="container header__container">
		<div class="header__title">
			<a title="<?php echo $_smarty_tpl->tpl_vars['siteName']->value;?>
" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
">
				<h1><?php echo $_smarty_tpl->tpl_vars['siteName']->value;?>
</h1>
				<p>Main Header</p>
			</a>
		</div><!-- /.header__title -->

		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:partials/index-nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	</header>
</div><!-- /.main__header --><?php }
}
