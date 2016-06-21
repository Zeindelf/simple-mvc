<?php
/* Smarty version 3.1.29, created on 2016-06-21 20:00:23
  from "C:\wamp\www\Projects\simple-mvc\resources\views\templates\partials\geral\main-header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5769c707e265b3_67529102',
  'file_dependency' => 
  array (
    'd3e4261644756e524928e5541fe636b81d9620d7' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\simple-mvc\\resources\\views\\templates\\partials\\geral\\main-header.tpl',
      1 => 1466549925,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5769c707e265b3_67529102 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<?php if (isset($_smarty_tpl->tpl_vars['variables']->value['headerTitle'])) {?>
			<title><?php echo $_smarty_tpl->tpl_vars['variables']->value['headerTitle'];?>
 | <?php echo @constant('SITE_NAME');?>
</title>
		<?php } else { ?>
			<title><?php echo @constant('SITE_NAME');?>
</title>
		<?php }?>

		<meta name="description" content="<?php echo @constant('SITE_DESC');?>
">

		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo @constant('BASE_CSS');?>
/style.css">
	</head>

	<body><?php }
}
