<?php
/* Smarty version 3.1.29, created on 2016-06-22 13:44:05
  from "C:\wamp\www\Projects\simple-mvc\resources\views\templates\partials\geral\main-footer.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576ac055c71384_68663286',
  'file_dependency' => 
  array (
    'dd7e41c4caa18110cabe3ce929c183058e2d1cea' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\simple-mvc\\resources\\views\\templates\\partials\\geral\\main-footer.tpl',
      1 => 1466613763,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576ac055c71384_68663286 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars['baseJs'] = new Smarty_Variable(Config::get('html.baseJs'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'baseJs', 0);?>

		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseJs']->value;?>
/jquery.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseJs']->value;?>
/functions.js"><?php echo '</script'; ?>
>
	</body>
</html><?php }
}
