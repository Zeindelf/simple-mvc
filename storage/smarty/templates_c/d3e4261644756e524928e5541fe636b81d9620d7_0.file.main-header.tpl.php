<?php
/* Smarty version 3.1.29, created on 2016-06-22 13:53:23
  from "C:\wamp\www\Projects\simple-mvc\resources\views\templates\partials\geral\main-header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576ac283ba06e5_19854937',
  'file_dependency' => 
  array (
    'd3e4261644756e524928e5541fe636b81d9620d7' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\simple-mvc\\resources\\views\\templates\\partials\\geral\\main-header.tpl',
      1 => 1466614370,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576ac283ba06e5_19854937 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<?php $_smarty_tpl->tpl_vars['baseCss'] = new Smarty_Variable(Config::get('html.baseCss'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'baseCss', 0);?>
		<?php $_smarty_tpl->tpl_vars['siteName'] = new Smarty_Variable(Config::get('html.siteName'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'siteName', 0);?>
		<?php $_smarty_tpl->tpl_vars['siteDesc'] = new Smarty_Variable(Config::get('html.siteDesc'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'siteDesc', 0);?>

		<?php if (isset($_smarty_tpl->tpl_vars['variables']->value['headerTitle'])) {?>
			<title><?php echo $_smarty_tpl->tpl_vars['variables']->value['headerTitle'];?>
 | <?php echo $_smarty_tpl->tpl_vars['siteName']->value;?>
</title>
		<?php } else { ?>
			<title><?php echo $_smarty_tpl->tpl_vars['siteName']->value;?>
</title>
		<?php }?>

		<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['siteDesc']->value;?>
">

		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['baseCss']->value;?>
/style.css">
	</head>

	<body><?php }
}
