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
    	<div class="events">
        	<div class="sub-nav">
            	<span><a href="#">Inicio</a>  /  <a href="#">Buscar</a>  /  The Big Guns</a></span>
                <a href="#" class="back btn btn-black">&lt;&lt;Resultado de búsqueda</a>
            </div>
        	<div class="events-l mt15">
            	<img src="photo/photo.gif" width="160" height="265" class="img-sidebar" />
                <ul class="share">
                	<li><a href="#"><img src="images/ioc01.gif" /></a></li>
                    <li><a href="#"><img src="images/ioc02.gif" /></a></li>
                    <li><a href="#"><img src="images/ioc03.gif" /></a></li>
                    <li><a href="#"><img src="images/ioc04.gif" /></a></li>
                    <li><a href="#"><img src="images/ioc05.gif" /></a></li>
                    <li><a href="#"><img src="images/ioc06.gif" /></a></li>
                </ul>
            </div>
            <div class="events-c">
            	<div class="row">
            		<h1>The Big Guns</h1>
                    <p class="add">Princes Hall, Princes Way, Aldershot, GU11 1NX, Hampshire, UK</p>
                    <p class="time">Saturday, 31 Aug 2013 19:30 BST <a href="#">+ 1 more dates</a></p>
                    <p class="mt15"><a href="#" class="btn btn-range">Añadir Calendario</a></p>
                </div>
                <div class="hr mt15"></div>
                <div class="row2 mt15"> 
                    <font>Featuring</font>: Wade, Van Gerwen, Hankey, Nicholson, George, Joplin.<br />
                    <font>Tickets disponibles desde:</font>: Modus Darts on <font>08450 180 180</font> 
                    <table cellpadding="0" cellspacing="0" class="mt15">
                        <tr>
                            <td width="140"><font>Duración</font></td>
                            <td>120mins</td>
                        </tr>
                        <tr>
                            <td width="140"><font>Precios</font></td>
                            <td>VIPs - £50, Terraza £25, Balcon - 20</td>
                        </tr>
                    </table>
                </div>
                <div class="row3 map">
                	<span>Ver Mapa</span>
                    <div class="mt15">
                    	<img src="photo/mapphoto.png" />
                    </div>
                </div>
            </div>
            <div class="events-r mt15">
            	<div class="r-row rw-bg2">
                	<br />&nbsp;
                    <br />&nbsp;
                    <br />&nbsp;
                    <br />&nbsp;
                    <br />&nbsp;
                    <br />&nbsp;
                </div>
                <div class="r-row rw-bg2">
                	<br />&nbsp;
                    <br />&nbsp;
                    <br />&nbsp;
                    <br />&nbsp;
                    <br />&nbsp;
                    <br />&nbsp;
                </div>
            </div>
        </div> 
    </div> 
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