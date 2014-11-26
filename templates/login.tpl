<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
{{include file='layouts/title.tpl'}} 
<link href="{{$smarty.const.WEBSITE_URL}}public/style/reset.css" type="text/css" rel="stylesheet" />
<link href="{{$smarty.const.WEBSITE_URL}}public/style/style.css" type="text/css" rel="stylesheet" /> 
<link href="{{$smarty.const.WEBSITE_URL}}public/style/validationEngine.jquery.css" type="text/css" rel="stylesheet" /> 
<link href="{{$smarty.const.WEBSITE_URL}}public/style/func.css" type="text/css" rel="stylesheet" /> 
<link rel="stylesheet" href="{{$smarty.const.WEBSITE_URL}}/public/assets/css/jquery-ui.css" />
<link rel="stylesheet" href="{{$smarty.const.WEBSITE_URL}}/public/assets/css/jquery.ui.datepicker.css" />
<script src="{{$smarty.const.WEBSITE_URL}}public/js/jquery-1.10.1.min.js" type="text/javascript"></script> 
<script src="{{$smarty.const.WEBSITE_URL}}/public/assets/js/jquery-ui.js"></script>
<script src="{{$smarty.const.WEBSITE_URL}}/public/assets/js/jquery.ui.datepicker.js"></script>
<script src="{{$smarty.const.WEBSITE_URL}}/public/js/searchform.js"></script>

<script src="{{$smarty.const.WEBSITE_URL}}/public/js/oauth/oauth.js"></script>
<script src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script> 
</head> 
<body> 
{{include file='layouts/headerandsearch.tpl'}} 
<div class="mian">
    <div class="content">
    	<div class="login-l login">
    	    <input type="hidden" id="addUser4FaceBook" value="{{$smarty.const.WEBSITE_URL}}register/addUser4FaceBook">
        	<input type="hidden" id="url" value="{{$smarty.const.WEBSITE_URL}}">
        	<h6>ENTRAR</h6>
        	{{$errortip}}
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
                    <td><span>Únete a Buscatickets...</span><a href="{{$smarty.const.WEBSITE_URL}}register" class="input-style1">Registro</a></td> 
                </tr> 
                <tr><td height="30"></td></tr>
            </table>     
             <h6>SI PREFIERES.....</h6>
            <table class="bor-none"> 
				<tr>
                    <td><a href="javascript:void(0);" class="btn btn-blue btn-Calendar" ><img src="{{$smarty.const.WEBSITE_URL}}public/images/fb_iocn.gif" /> Login con Facebook</a></td> 
                </tr>
                <tr>
                    <td><a href="javascript:void(0);" class="btn btn-lc btn-Calendar" ><img src="{{$smarty.const.WEBSITE_URL}}public/images/in_iocn.gif" /> Login con google+</a></td> 
                </tr>
                
            </table>       
        </div>
    </div>
	<div class="h-blackbg"></div>
</div>
<script src="{{$smarty.const.WEBSITE_URL}}public/js/jquery.validationEngine-en.js" type="text/javascript"></script>
<script src="{{$smarty.const.WEBSITE_URL}}public/js/jquery.validationEngine.js" type="text/javascript"></script> 


	
<script type="text/javascript"> 
$(document).ready(function(){
	// binds form submission and fields to the validation engine
	$("#loginform").validationEngine();
}); 
</script>
{{include file='layouts/footer.tpl'}} 