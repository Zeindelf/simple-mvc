<?php
/* Smarty version 3.1.29, created on 2016-06-17 23:24:33
  from "C:\wamp\www\Projects\simple-mvc\resources\views\templates\_partials\index-footer.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5764b0e1933ed4_87893078',
  'file_dependency' => 
  array (
    '713e1106da79e5a2713fc429406b22fbbdd7b81b' => 
    array (
      0 => 'C:\\wamp\\www\\Projects\\simple-mvc\\resources\\views\\templates\\_partials\\index-footer.tpl',
      1 => 1466203545,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5764b0e1933ed4_87893078 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\wamp\\www\\Projects\\simple-mvc\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.date_format.php';
?>
<div class="main__footer">
	<div class="container">

		<p>Main Footer &copy <?php echo smarty_modifier_date_format(time(),"%Y");?>
</p>

	</div><!-- /.container -->
</div><!-- /.main__footer --><?php }
}
