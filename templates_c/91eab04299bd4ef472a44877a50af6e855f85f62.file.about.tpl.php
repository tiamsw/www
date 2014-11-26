<?php /* Smarty version Smarty-3.1.13, created on 2014-09-17 06:12:48
         compiled from "/var/www/templates/about.tpl" */ ?>
<?php /*%%SmartyHeaderCode:212886373854192660034699-83039533%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91eab04299bd4ef472a44877a50af6e855f85f62' => 
    array (
      0 => '/var/www/templates/about.tpl',
      1 => 1392316616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212886373854192660034699-83039533',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_541926600d0fb2_33184321',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541926600d0fb2_33184321')) {function content_541926600d0fb2_33184321($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo $_smarty_tpl->getSubTemplate ('layouts/title.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
<link href="<?php echo @constant('WEBSITE_URL');?>
public/style/reset.css" type="text/css" rel="stylesheet" />
<link href="<?php echo @constant('WEBSITE_URL');?>
public/style/style.css" type="text/css" rel="stylesheet" /> 
<link href="<?php echo @constant('WEBSITE_URL');?>
public/style/validationEngine.jquery.css" type="text/css" rel="stylesheet" /> 
<link href="<?php echo @constant('WEBSITE_URL');?>
public/style/func.css" type="text/css" rel="stylesheet" /> 
<link rel="stylesheet" href="<?php echo @constant('WEBSITE_URL');?>
/public/assets/css/jquery-ui.css" />
<link rel="stylesheet" href="<?php echo @constant('WEBSITE_URL');?>
/public/assets/css/jquery.ui.datepicker.css" />
<script src="<?php echo @constant('WEBSITE_URL');?>
public/js/jquery-1.10.1.min.js" type="text/javascript"></script> 
<script src="<?php echo @constant('WEBSITE_URL');?>
/public/assets/js/jquery-ui.js"></script>
<script src="<?php echo @constant('WEBSITE_URL');?>
/public/assets/js/jquery.ui.datepicker.js"></script>
<script src="<?php echo @constant('WEBSITE_URL');?>
/public/js/searchform.js"></script>
 
</head>

<body>
<?php echo $_smarty_tpl->getSubTemplate ('layouts/headerandsearch.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
<div class="mian">
    <div class="content">
    	<div class="article">
        		<h5>QUIENES SOMOS</h5>
            <p>
                ¡En Buscatickets nuestra misión es realizar tu búsqueda de eventos o tickets mucho más fácil que nunca! Buscatickets te ayudará a encontrar los últimos conciertos, tickets o eventos, y además, podrás guardar cualquier evento en tu calendario así que no habrá excusas para perderte algún show otra vez. 
            </p>
            <p>
            	Buscatickets tiene una base de datos con alrededor de medio millón de eventos en todo el planeta para que siempre puedas encontrar algo que te guste. 
            </p> 
            <p>
                Cuando te registres en Buscatickets recibirás notificaciones sobre tus eventos favoritos seleccionados a partir de tus lugares, artistas o eventos elegidos para que no vuelvas a perderte un evento otra vez. 
            </p>
            <p>
            	Algunas de las increíbles características incluidas en Buscatickets son:
            </p>
            <ul>
            	<li>
                	Masiva base de datos de eventos alrededor del mundo.
                </li>
      			<li>
                	Incluye tus eventos favoritos a tu calendario y establece avisos.
                </li>
                <li>
                	Mapas incluyendo todas las localizaciones geográficas.
                </li>
                <li>
                	Capacidad de comprar tickets y comparar preciosentre distintos distribuidores. 
                </li>
            </ul>
        </div>
    </div>
	<div class="h-blackbg"></div>
</div>



<?php echo $_smarty_tpl->getSubTemplate ('layouts/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
  <?php }} ?>