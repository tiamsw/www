<?php /* Smarty version Smarty-3.1.13, created on 2014-09-17 11:15:18
         compiled from "/var/www/templates/buyticket.tpl" */ ?>
<?php /*%%SmartyHeaderCode:61418050354196d463a5436-95958361%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4bfcb9636112f42bec407365d7ebb087e213e6b3' => 
    array (
      0 => '/var/www/templates/buyticket.tpl',
      1 => 1392316616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '61418050354196d463a5436-95958361',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ticketurl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_54196d46447eb1_14233811',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54196d46447eb1_14233811')) {function content_54196d46447eb1_14233811($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
        	<h5>Saltar a la página Comprar Ticket</h5>
            <p>
            	Por favor espera <span id="mes">2</span> segundos ...
            </p>
            
        </div>
    </div>
	<div class="h-blackbg"></div>
</div>
<script type="text/javascript">
var i = 2;
var intervalid;
intervalid = setInterval("fun()", 1000);
function fun() {
    if (i == 0) {
        window.location.href = "<?php echo $_smarty_tpl->tpl_vars['ticketurl']->value;?>
";
        clearInterval(intervalid);
    }
    document.getElementById("mes").innerHTML = i;
    i--; 
}
</script>
<?php echo $_smarty_tpl->getSubTemplate ('layouts/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
  <?php }} ?>