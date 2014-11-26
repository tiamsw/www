<?php /* Smarty version Smarty-3.1.13, created on 2014-09-17 08:31:37
         compiled from "/var/www/templates/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:222962254541946e9e02409-37128814%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5ba5ad8a7426e03e1626dbc4e607c166a9f334d' => 
    array (
      0 => '/var/www/templates/register.tpl',
      1 => 1392316618,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '222962254541946e9e02409-37128814',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errortip' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_541946ea01c188_44725084',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541946ea01c188_44725084')) {function content_541946ea01c188_44725084($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro Buscatickets – Música, tickets y eventos culturales en tu calendario.</title>
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
        	<h6>REGISTRAR&nbsp;&nbsp;EN&nbsp;&nbsp;BUSCATICKETS</h6>
        	<?php echo $_smarty_tpl->tpl_vars['errortip']->value;?>

        	<form  id="registerform" action="<?php echo @constant('WEBSITE_URL');?>
register" method="post">
            <table> 
				<tr>
                    <td><span>Nombre de Usuario</span><input type="text" class="input-style3 validate[required] text-input"  name="username"   autofocus="true" tabindex=11 /></td> 
                </tr>
                <tr>
                    <td><span>Correo Electrónico</span><input type="text" class="input-style3 validate[required,custom[email]] text-input" name="email" tabindex=12/></td> 
                </tr>
				<tr>
                    <td><span>Contraseña</span><input type="password" class="input-style3 validate[required,minSize[6]] text-input" id="password" name="password" tabindex=13/></td>  
                </tr>
                <tr>
                    <td><span>Confirmación de Contraseña</span><input type="password" class="input-style3 validate[required,equals[password],minSize[6]] text-input" name="repassword" tabindex=14/></td>  
                </tr>
                <tr>
                    <td><span>Nombre</span><input type="text" class="input-style3 validate[required] text-input" name="firstname" tabindex=15/></td>  
                </tr>
                <tr>
                    <td><span>Apellido</span><input type="text" class="input-style3 validate[required] text-input" name="lastname" tabindex=16/></td>  
                </tr>
                <tr>
                    <td><span>Fecha de Nacimiento</span>
                    	<div class="controls">
							<select id="id_birthdate_0" name="day" class="validate[required]" tabindex=17 >
                            <option selected="selected" value="">Día</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            </select>
                            <select id="id_birthdate_1" class="validate[required]" name="month" tabindex=18>
                            <option selected="selected" value="" >Mes</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            </select>
                            <select id="id_birthdate_2"  class="validate[required]" name="year" tabindex=19>
                            <option selected="selected" value="">Año</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                            <option value="1999">1999</option>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                            <option value="1995">1995</option>
                            <option value="1994">1994</option>
                            <option value="1993">1993</option>
                            <option value="1992">1992</option>
                            <option value="1991">1991</option>
                            <option value="1990">1990</option>
                            <option value="1989">1989</option>
                            <option value="1988">1988</option>
                            <option value="1987">1987</option>
                            <option value="1986">1986</option>
                            <option value="1985">1985</option>
                            <option value="1984">1984</option>
                            <option value="1983">1983</option>
                            <option value="1982">1982</option>
                            <option value="1981">1981</option>
                            <option value="1980">1980</option>
                            <option value="1979">1979</option>
                            <option value="1978">1978</option>
                            <option value="1977">1977</option>
                            <option value="1976">1976</option>
                            <option value="1975">1975</option>
                            <option value="1974">1974</option>
                            <option value="1973">1973</option>
                            <option value="1972">1972</option>
                            <option value="1971">1971</option>
                            <option value="1970">1970</option>
                            <option value="1969">1969</option>
                            <option value="1968">1968</option>
                            <option value="1967">1967</option>
                            <option value="1966">1966</option>
                            <option value="1965">1965</option>
                            <option value="1964">1964</option>
                            <option value="1963">1963</option>
                            <option value="1962">1962</option>
                            <option value="1961">1961</option>
                            <option value="1960">1960</option>
                            <option value="1959">1959</option>
                            <option value="1958">1958</option>
                            <option value="1957">1957</option>
                            <option value="1956">1956</option>
                            <option value="1955">1955</option>
                            <option value="1954">1954</option>
                            <option value="1953">1953</option>
                            <option value="1952">1952</option>
                            <option value="1951">1951</option>
                            <option value="1950">1950</option>
                            <option value="1949">1949</option>
                            <option value="1948">1948</option>
                            <option value="1947">1947</option>
                            <option value="1946">1946</option>
                            <option value="1945">1945</option>
                            <option value="1944">1944</option>
                            <option value="1943">1943</option>
                            <option value="1942">1942</option>
                            <option value="1941">1941</option>
                            <option value="1940">1940</option>
                            <option value="1939">1939</option>
                            <option value="1938">1938</option>
                            <option value="1937">1937</option>
                            <option value="1936">1936</option>
                            <option value="1935">1935</option>
                            <option value="1934">1934</option>
                            <option value="1933">1933</option>
                            <option value="1932">1932</option>
                            <option value="1931">1931</option>
                            <option value="1930">1930</option>
                            <option value="1929">1929</option>
                            <option value="1928">1928</option>
                            <option value="1927">1927</option>
                            <option value="1926">1926</option>
                            <option value="1925">1925</option>
                            <option value="1924">1924</option>
                            <option value="1923">1923</option>
                            <option value="1922">1922</option>
                            <option value="1921">1921</option>
                            <option value="1920">1920</option>
                            <option value="1919">1919</option>
                            <option value="1918">1918</option>
                            <option value="1917">1917</option>
                            <option value="1916">1916</option>
                            <option value="1915">1915</option>
                            <option value="1914">1914</option>
                            <option value="1913">1913</option>
                            </select> 
						</div>
                    </td>  
                </tr>
                <tr>
                    <td><span><input type="checkbox" name="letter" value="1" checked/><font>Quiero recibir información sobre eventos en mi mail</font></span></td>  
                </tr>
                <tr>
                    <td><span><input class="validate[required] checkbox" type="checkbox" id="agree" name="agree" checked/>
                    
                    <font>Estoy de acuerdo con <a href="#" class="link_style01">Términos y Condiciones, Política de Privacidad</a> y 
                    <a href="#" class="link_style01">Política de Cookies</a> *</font></span></td>  
                </tr>
                <tr>
                    <td><input type="submit" class="input-style1 submit" value="REGISTRARSE" tabindex=20/></td>  
                </tr>
            </table>          
            </form>
        </div>
        <div class="login-r login">
        	<h6>¿ERES&nbsp;&nbsp;YA&nbsp;&nbsp;UN&nbsp;&nbsp;USUARIO?</h6>
            <table> 
				<tr>
                    <td><span>Entra en Buscatickets...</span><a href="<?php echo @constant('WEBSITE_URL');?>
login" class="input-style1">ENTRAR</a></td> 
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
</div>

<script src="<?php echo @constant('WEBSITE_URL');?>
public/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="<?php echo @constant('WEBSITE_URL');?>
public/js/jquery.validationEngine-en.js" type="text/javascript"></script>
<script src="<?php echo @constant('WEBSITE_URL');?>
public/js/jquery.validationEngine.js" type="text/javascript"></script>
<script type="text/javascript"> 
$(document).ready(function(){
	// binds form submission and fields to the validation engine
	$("#registerform").validationEngine();
}); 
</script>
<?php echo $_smarty_tpl->getSubTemplate ('layouts/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 <?php }} ?>