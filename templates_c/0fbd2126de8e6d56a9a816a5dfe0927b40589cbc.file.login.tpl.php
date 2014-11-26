<?php /* Smarty version Smarty-3.1.13, created on 2014-09-18 09:55:40
         compiled from "/var/www/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:207265834541aac1c02f054-92783308%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0fbd2126de8e6d56a9a816a5dfe0927b40589cbc' => 
    array (
      0 => '/var/www/templates/login.tpl',
      1 => 1392316617,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207265834541aac1c02f054-92783308',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errortip' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_541aac1c0cf6b5_50181231',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541aac1c0cf6b5_50181231')) {function content_541aac1c0cf6b5_50181231($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

<script src="<?php echo @constant('WEBSITE_URL');?>
/public/js/oauth/oauth.js"></script>
<script src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script> 
</head> 
<body> 
<?php echo $_smarty_tpl->getSubTemplate ('layouts/headerandsearch.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
<div class="mian">
    <div class="content">
    	<div class="login-l login">
    	    <input type="hidden" id="addUser4FaceBook" value="<?php echo @constant('WEBSITE_URL');?>
register/addUser4FaceBook">
        	<input type="hidden" id="url" value="<?php echo @constant('WEBSITE_URL');?>
">
        	<h6>ENTRAR</h6>
        	<?php echo $_smarty_tpl->tpl_vars['errortip']->value;?>

        	<form id="loginform" name="loginform" method="post">
            <table> 
				<tr>
                    <td><span>Nombre de Usuario</span><input type="text" class="input-style3 validate[required] text-input"   autofocus="true" name="user_name" tabindex=1 /></td> 
                </tr>
				<tr>
                    <td><span>Contraseña<a href="#">¿Has olvidado tu contraseña?</a></span><input type="password" class="input-style3 validate[required] text-input " name="password" tabindex=2/></td>  
                </tr>
                <tr>
                    <td><span><input type="checkbox" name="remember" value="1"/><font>Recordarme</font></span></td>  
                </tr>
                <tr>
                    <td><input type="submit" class="input-style1" value="entrar" /></td>  
                </tr>
            </table>          
            </form>
        </div>
        <div class="login-r login">
        	<h6>¿ERES&nbsp;&nbsp;UN&nbsp;&nbsp;NUEVO&nbsp;&nbsp;USUARIO?</h6>
            <table> 
				<tr>
                    <td><span>Únete a Buscatickets...</span><a href="<?php echo @constant('WEBSITE_URL');?>
register" class="input-style1">Registro</a></td> 
                </tr> 
                <tr><td height="30"></td></tr>
            </table>     
             <h6>SI PREFIERES.....</h6>
            <table class="bor-none"> 
				<tr>
                    <td><a href="javascript:void(0);" class="btn btn-blue btn-Calendar" ><img src="<?php echo @constant('WEBSITE_URL');?>
public/images/fb_iocn.gif" /> Login con Facebook</a></td> 
                </tr>
                <tr>
                    <td><a href="javascript:void(0);" class="btn btn-lc btn-Calendar" ><img src="<?php echo @constant('WEBSITE_URL');?>
public/images/in_iocn.gif" /> Login con google+</a></td> 
                </tr>
                
            </table>       
        </div>
    </div>
	<div class="h-blackbg"></div>
</div>
<script src="<?php echo @constant('WEBSITE_URL');?>
public/js/jquery.validationEngine-en.js" type="text/javascript"></script>
<script src="<?php echo @constant('WEBSITE_URL');?>
public/js/jquery.validationEngine.js" type="text/javascript"></script> 


	
<script type="text/javascript"> 
$(document).ready(function(){
	// binds form submission and fields to the validation engine
	$("#loginform").validationEngine();
}); 
</script>
<?php echo $_smarty_tpl->getSubTemplate ('layouts/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 <?php }} ?>