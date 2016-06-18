<?php
/* Smarty version 3.1.29, created on 2016-06-17 23:15:48
  from "C:\wamp\www\Projects\simple-mvc\resources\views\templates\_partials\index-header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5764aed4195c32_00970311',
  'file_dependency' => 
  array (
    '01256d2a83572cd75e8b3cb61c791fb8900286e1' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\simple-mvc\\resources\\views\\templates\\_partials\\index-header.tpl',
      1 => 1466203545,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_partials/index-nav.tpl' => 1,
  ),
),false)) {
function content_5764aed4195c32_00970311 ($_smarty_tpl) {
?>
<div class="main__header">
	<header class="container header__container">
		<div class="header__title">
			<a title="<?php echo @constant('SITE_NAME');?>
" href="<?php echo @constant('BASE_URL');?>
">
				<h1><?php echo @constant('SITE_NAME');?>
</h1>
				<p>Main Header</p>
			</a>
		</div><!-- /.header__title -->

		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:_partials/index-nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	</header>
</div><!-- /.main__header --><?php }
}
