<?php
/* Smarty version 3.1.29, created on 2016-06-17 23:24:33
  from "C:\wamp\www\Projects\simple-mvc\resources\views\templates\_partials\index-nav.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5764b0e18ffb98_83669056',
  'file_dependency' => 
  array (
    'a4aa9b43ee176fe3a12796120b6ee2e15d5d50fa' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\simple-mvc\\resources\\views\\templates\\_partials\\index-nav.tpl',
      1 => 1466203545,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5764b0e18ffb98_83669056 ($_smarty_tpl) {
?>
<nav class="main__nav">
	<ul>
		<li><a href="<?php echo @constant('BASE_URL');?>
">Home</a></li>
		<li><a href="<?php echo @constant('BASE_URL');?>
/exemplo-url-composta">URL Composta</a></li>
		<li><a href="<?php echo @constant('BASE_URL');?>
/exemplo-url-composta/exemplo-metodo-composto">Método Composto</a></li>
		<li><a href="<?php echo @constant('BASE_URL');?>
/exemplo-url-composta/exemplo-redirect">Redirecionamento</a></li>
		<li><a href="<?php echo @constant('BASE_URL');?>
/demo">Demo</a></li>
		<li><a href="<?php echo @constant('BASE_URL');?>
/error">Erro 404</a></li>
	</ul>
</nav><?php }
}
