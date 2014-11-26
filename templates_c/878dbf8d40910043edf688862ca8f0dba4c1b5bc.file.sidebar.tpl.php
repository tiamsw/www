<?php /* Smarty version Smarty-3.1.13, created on 2014-09-20 15:36:28
         compiled from "/var/www/templates/admin/sidebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1948676941541d9efc389f84-77414845%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '878dbf8d40910043edf688862ca8f0dba4c1b5bc' => 
    array (
      0 => '/var/www/templates/admin/sidebar.tpl',
      1 => 1392316622,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1948676941541d9efc389f84-77414845',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_541d9efc3b1390_69556044',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541d9efc3b1390_69556044')) {function content_541d9efc3b1390_69556044($_smarty_tpl) {?><div class="sidebar-nav">

	<a href="#sidebar_menu_1" class="nav-header collapsed"
		data-toggle="collapse"><i class="icon-th"></i>Gestor de Tickets<i
		class="icon-chevron-up"></i></a>

	<ul id="sidebar_menu_1" class="nav nav-list collapse in">
		<li><a href="<?php echo @constant('WEBSITE_URL');?>
admin/event">Gestor de información de evento</a></li>
		<li><a href="<?php echo @constant('WEBSITE_URL');?>
admin/ticket">Gestor de información de ticket</a></li>
		<li><a href="<?php echo @constant('WEBSITE_URL');?>
admin/ticket">Estadística de ticket</a></li>

	</ul>
	<a href="#sidebar_menu_2" class="nav-header collapsed"
		data-toggle="collapse"><i class="icon-th"></i>Gestor de Usuario<i class="icon-chevron-up"></i></a>

	<ul id="sidebar_menu_2" class="nav nav-list collapse in">
		<li><a href="<?php echo @constant('WEBSITE_URL');?>
admin/adminuser">Administrador</a></li>
		<li><a href="<?php echo @constant('WEBSITE_URL');?>
admin/users">Usuario Registrado</a></li>
		<li><a href="<?php echo @constant('WEBSITE_URL');?>
admin/imgcarousel">Gestor de imagen</a></li>
		<li><a href="<?php echo @constant('WEBSITE_URL');?>
admin/advertising">Gestor de Publicidad</a></li>

	</ul>


</div>

<?php }} ?>