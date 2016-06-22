<?php
/* Smarty version 3.1.29, created on 2016-06-22 13:45:32
  from "C:\wamp\www\Projects\simple-mvc\resources\views\templates\partials\index-nav.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576ac0ac0b2364_21188682',
  'file_dependency' => 
  array (
    '9c64849f34100ae373ed96c43c5177caedb50819' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\simple-mvc\\resources\\views\\templates\\partials\\index-nav.tpl',
      1 => 1466613929,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576ac0ac0b2364_21188682 ($_smarty_tpl) {
?>
<nav class="main__nav">
	<ul>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
">Home</a></li>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/exemplo-url-composta">URL Composta</a></li>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/exemplo-url-composta/exemplo-metodo-composto">Método Composto</a></li>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/exemplo-url-composta/exemplo-redirect">Redirecionamento</a></li>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/demo">Demo</a></li>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/error404">Erro 404</a></li>
	</ul>
</nav><?php }
}
