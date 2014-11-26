<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>gigs_login</title>
<link href="style/reset.css" type="text/css" rel="stylesheet" />
<link href="style/style.css" type="text/css" rel="stylesheet" /> 
</head>

<body>
<div id="tcbox">
  <div id="tccontent">
    <div class="row3 map gigs_tck"><span class="fl pl">Editar Entrada</span><a href="#" class="fr pr">X</a></div>
    <form>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-edit mt15" style="border:none;">
      <tr>
        <td width="77" align="right" valign="middle">Título&nbsp;&nbsp;</td>
        <td align="left">
        	<span class="inputborder"><input type="text" class="input-style4 textinput-w3" /></span>
        </td>
      </tr>
       <tr>
        <td width="77" align="right" valign="middle">&nbsp;</td>
        <td align="left">
        	<input type="checkbox" align="middle"><span class="fontsize12">&nbsp;&nbsp;&nbsp;Todo el día</span>
        </td>
      </tr> 
       <tr>
        <td width="77" align="right" valign="middle">Desde&nbsp;&nbsp;</td>
        <td align="left">
        	<span class="inputborder"><input type="text" class="input-style4 textinput-w4" /><a href="#"><img src="images/calendar-iocx.gif" /></a></span>
            <span class="inputborder"><input type="text" class="input-style4 textinput-w4" /><a href="#"><img src="images/time-iocx.gif" /></a></span>
        </td>
      </tr> 
       <tr>
        <td width="77" align="right" valign="middle">Hasta&nbsp;&nbsp;</td>
        <td align="left">
        	<span class="inputborder"><input type="text" class="input-style4 textinput-w4" /><a href="#"><img src="images/calendar-iocx.gif" /></a></span>
            <span class="inputborder"><input type="text" class="input-style4 textinput-w4" /><a href="#"><img src="images/time-iocx.gif" /></a></span>
        </td>
      </tr> 
       <tr>
        <td width="77" align="right" valign="middle">Localización&nbsp;&nbsp;</td>
        <td align="left">
        		<span class="inputborder"><input type="text" class="input-style4 textinput-w3" /></span>
        </td>
      </tr> 
       <tr>
        <td width="77" align="right" valign="middle">Nota&nbsp;&nbsp;</td>
        <td align="left">
        		  <input type="button" runat="server" value="" id="file" /><span class="fontsize12">&nbsp;&nbsp;&nbsp;Ningún archivo seleccionado</span>
        </td>
      </tr> 
       <tr>
        <td width="77" align="right" valign="middle">Nota&nbsp;&nbsp;</td>
        <td align="left">
        		<span class="inputborder"><textarea style="height:80px" class="input-style4 textinput-w3"></textarea></span>
        </td>
      </tr> 
       <tr>
        <td width="77" align="right" valign="middle">&nbsp;</td>
        <td align="left">
        	<input type="checkbox" align="middle"><span class="fontsize12">&nbsp;&nbsp;&nbsp;Aviso de Email</span>
        </td>
      </tr> 
    </table> 
    </form> 
    <div class="row3 map gigs_top">
        <span class="fl"><a href="#" class="btn btn-black-2 btn-Calendar ml15">Guardar</a><font><a href="#" class="cancel">Cancelar</a></font></span> 
    </div>
  </div>
</div>



<div id="head">
  <div> <span class="index-manage"><a href="#"><font color="f7931d">Organiza</font> tu agenda +</a></span>
    <ul>
      <li> <a href="#" class="input-style1">Registrarse</a> <a href="#" class="input-style1">Entrar</a> </li>
      <li class="navlist"> <a href="#"> TU &nbsp; CALENDARIO<br />
        <font>Administra tu calendario de eventos</font> </a> </li>
      <li class="navlist"> <a href="#"> EVENTOS<br />
        <font>What's on?</font> </a> </li>
      <li class="navlogo"> <a href="#"><img src="images/logo.png" class="index-logo" /></a> </li>
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
      <div class="gigs-1"> 
      	<span> <a href="#" class="fl btn btn-black-2">Nueva entrada del Calendario</a> <a href="#" class="fl btn btn-black-3">Exportar tu Calendario</a></span>
        <p class=" mt15 gigs-top-xx fr"> 
            <a href="#" class="btn-hs2 btn-Calendar left-by">Día</a> <a href="#" class="btn-hs2 btn-Calendar by-hover">Semana</a> 
            <a href="#" class="btn-hs2 btn-Calendar">Mes</a> <a href="#" class="btn-hs2 btn-Calendar right-by">Agenda</a> 
        </p>
      </div>
      <div class="mt15"><img src="images/gigs_img1.jpg" /></div>
      <table class="gigs-u-l map">
        <tr>
          <td valign="center"><b>Leyenda:</b></td>
          <td><a href="#" class="btn btn-range btn-Calendar">Evento de BuscaTickets</a></td>
          <td><a href="#" class="btn btn-blue btn-Calendar">Evento Privado</a></td>
          <td valign="center">Manage Layers</td>
        </tr>
      </table>
    </div>
  </div>
</div>
<div class="footer">
  <div> <a href="#">Guia del Usuario</a> | <a href="#">Quienes Somos</a> | <a  href="#">Política de Cookies</a> | <a href="#">Política de Privacidad</a> | <a href="#">Términos y Condiciones</a> </div>
</div>
</body>
</html>
