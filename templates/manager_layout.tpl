<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>gigs_login</title>
<link href="style/reset.css" type="text/css" rel="stylesheet" />
<link href="style/style.css" type="text/css" rel="stylesheet" />
</head>

<body>
<div id="head">
	<div>
        <span class="index-manage"><a href="#"><font color="f7931d">Organiza</font> tu agenda +</a></span>
        <ul>
            <li>
                <a href="#" class="input-style1">Registrar</a>
                <a href="#" class="input-style1">Entrar</a>
            </li>
            <li class="navlist">
                <a href="#">
                    TU &nbsp; CALENDARIO<br /> 
                    <font>Programa  &nbsp; tus  &nbsp; Eventos</font>
                </a>
            </li>
            <li class="navlist">
                <a href="#">
                    EVENTOS<br /> 
                    <font>Descúbrelos</font>
                </a>
            </li>
            <li class="navlogo">
                <a href="#"><img src="images/logo.png" class="index-logo" /></a>
            </li>
        </ul>
    </div>
</div>
<div class="search">
	<div>
    	<div>
            <form>
                <table>
                    <tr>
                       <td><font class="fontstyle">Busca&nbsp;&nbsp;un&nbsp;&nbsp;evento</font></td>
                    	<td><input type="text" placeholder="¿Qué Evento?" name="keyword" id="keyword" value="{{$keyword}}" class="searchinput textinput-w" tabindex=3 /></td>
                        <td><input type="text" placeholder="Localización" name="location" id="location" value="{{$location}}" class="searchinput textinput-w" tabindex=4/></td>
                        <td><font class="fontstyle">Fecha</font></td>
						<td><input type="text" placeholder="Desde" name="fromDate" id="fromDate" value="{{$fromDate}}" onchange="setting()" readonly="readonly" class="searchinput textinput-w2" tabindex=5/></td>
                        <td><input type="text" placeholder="Hasta" name="toDate" id="toDate" value="{{$toDate}}" onchange="setting()" readonly="readonly" class="searchinput textinput-w2" tabindex=6/></td>
                        <td><input type="submit"   value="BuscaTickets" onclick="check(this)" class="input-style2" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<div class="mian"> 
    <div class="content">
    	<div class="layer">
            <span class="layertitle">Manage Layers</span>
            <table>
                <tr>
                    <td width="46">Layer</td>
                    <td width="365">
                        <select id="id_birthdate_0" name="birthdate_0">
                        <option selected="selected" value="">-----------</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option> 
                        </select>
                    </td>
                    <td width="155">
                        colour<div class="layercolour"><span class="colour_bg">&nbsp;</span><a href="#"><img src="images/layer-ioc.png" /></a></div>
                    </td>
                    <td>
                        <a href="#">Borrar</a>
                    </td>
                </tr>
                 <tr>
                    <td width="46">Layer</td>
                    <td width="365">
                        <select id="id_birthdate_0" name="birthdate_0">
                        <option selected="selected" value="">-----------</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option> 
                        </select>
                    </td>
                    <td width="155">
                        colour<div class="layercolour"><span class="colour_bg">&nbsp;</span><a href="#"><img src="images/layer-ioc.png" /></a></div>
                    </td>
                    <td>
                        <a href="#">Borrar</a>
                    </td>
                </tr>
                 <tr>
                    <td width="46">Layer</td>
                    <td width="365">
                        <select id="id_birthdate_0" name="birthdate_0">
                        <option selected="selected" value="">-----------</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option> 
                        </select>
                    </td>
                    <td width="155">
                        colour<div class="layercolour"><span class="colour_bg">&nbsp;</span><a href="#"><img src="images/layer-ioc.png" /></a></div>
                    </td>
                    <td>
                        <a href="#">Borrar</a>
                    </td>
                </tr>
                 <tr>
                    <td width="46">Layer</td>
                    <td width="365">
                        <select id="id_birthdate_0" name="birthdate_0">
                        <option selected="selected" value="">-----------</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option> 
                        </select>
                    </td>
                    <td width="155">
                        colour<div class="layercolour"><span class="colour_bg">&nbsp;</span><a href="#"><img src="images/layer-ioc.png" /></a></div>
                    </td>
                    <td>
                        <a href="#">Borrar</a>
                    </td>
                </tr>
            </table> 
            <div class="mt15">
            	<a class="btn btn-black-2" href="#">Añadir otra</a>&nbsp;&nbsp; 
                <a href="#" class="btn btn-blue btn-Calendar">Enviar Layers</a>
            </div>
        </div>
    </div>
	<div class="h-blackbg"></div>
</div>
<div class="footer">
	<div>
    	<a href="#">Guía de Usuario</a>  |  
        <a href="#">Quienes Somos</a>  |  
        <a  href="#">Política de Cookies</a>  |  
        <a href="#">Política de Privacidad</a>  |  
        <a href="#">Términos y Condiciones</a>
    </div>
</div>
</body>
</html>     