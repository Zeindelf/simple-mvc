<?php
/* Smarty version 3.1.29, created on 2016-06-18 02:50:03
  from "C:\wamp\www\Projects\simple-mvc\resources\views\templates\partials\index-footer.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5764e10b8ef429_51874637',
  'file_dependency' => 
  array (
    '70c583edc6f11b0f77d6e525dbc64cb5cbea9822' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\simple-mvc\\resources\\views\\templates\\partials\\index-footer.tpl',
      1 => 1466219662,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5764e10b8ef429_51874637 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\wamp\\www\\Projects\\simple-mvc\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.date_format.php';
?>
<div class="main__footer">
	<div class="container">

		<p>Main Footer &copy <?php echo smarty_modifier_date_format(time(),"%Y");?>
</p>

	</div><!-- /.container -->
</div><!-- /.main__footer --><?php }
}
