<?php
/* Smarty version 3.1.29, created on 2016-06-18 03:24:04
  from "C:\wamp\www\Projects\simple-mvc\resources\views\templates\partials\index-nav.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5764e9043ea012_94445390',
  'file_dependency' => 
  array (
    '9c64849f34100ae373ed96c43c5177caedb50819' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\simple-mvc\\resources\\views\\templates\\partials\\index-nav.tpl',
      1 => 1466231041,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5764e9043ea012_94445390 ($_smarty_tpl) {
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
/error404">Erro 404</a></li>
	</ul>
</nav><?php }
}
