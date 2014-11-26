<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
{{include file='layouts/title.tpl'}} 
<link href="style/reset.css" type="text/css" rel="stylesheet" />
<link href="style/style.css" type="text/css" rel="stylesheet" />
<SCRIPT type="text/javascript">
function selectTag(showContent,selfObj){
	// 操作标签
	var tag = document.getElementById("tags").getElementsByTagName("li");
	var taglength = tag.length;
	for(i=0; i<taglength; i++){
		tag[i].className = "";
	}
	selfObj.parentNode.className = "selectTag";
	// 操作内容
	for(i=0; j=document.getElementById("tagContent"+i); i++){
		j.style.display = "none";
	}
	document.getElementById(showContentv).style.display = "block";
	
	
}
</SCRIPT>
</head>

<body>
<div id="tcbox">
  <div id="tccontent">
    <div class="row3 map gigs_tck"><span class="fl pl">Detalles del Evento</span><a href="#" class="fr pr">X</a></div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="gigs-tck-table mt15 ">
      <tr>
        <td><img src="photo/photo3.gif" width="111" height="124" class="btn" /></td>
        <td align="left">Entertainment; Local Events<br />
          <h1>The Big Guns</h1>
          <h2>Princes Hall,Princes Way,Aldershot,GU11 1NX</h2>
          <h3>Saturday,31 Aug 2013 19:30</h3>
          <a href="#"><h4>Add a Note</h4></a>
       </td>
      </tr>
    </table>
    <div id="con">
      <ul id="tags">
        <li><a onClick="selectTag('tagContent0',this)"  href="javascript:void(0)">Mapa</a> </li>
        <li class=selectTag><a onClick="selectTag('tagContent1',this)" href="javascript:void(0)">Direcciones</a> </li>
      </ul>
      <div id="tagContent">
        <div class="tagContent selectTag" id="tagContent0"><img src="photo/photo4.gif" width="431" height="184" /></div>
        <div class="tagContent " id="tagContent1"><img src="photo/photo4.gif" width="431" height="184" /></div>
      </div>
    </div>
    <div class="row3 map gigs_top">
    <span class="fl"><a href="#" class="btn btn-blue btn-Calendar ml15">Editar</a><font><a href="#" class="cancel">Cancelar</a></font></span>
    <span class="fr pr"><a href="#" class="btn btn-red btn-Calendar">Borrar</a></span></div>
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
      <div class="gigs-1"> <span> <a href="#" class="fl btn btn-black-2">Nueva Entrada en Calendario</a> <a href="#" class="fl btn btn-black-3">Export your Calendar</a></span>
        <p class=" mt15 gigs-top-xx fr"> <a href="#" class="btn-hs2 btn-Calendar left-by">Dia</a> <a href="#" class="btn-hs2 btn-Calendar by-hover">Semana</a> <a href="#" class="btn-hs2 btn-Calendar">Mes</a> <a href="#" class="btn-hs2 btn-Calendar right-by">Agenda</a> </p>
      </div>
      <div class="mt15"><img src="images/gigs_img1.jpg" /></div>
      <table class="gigs-u-l map">
        <tr>
          <td valign="center"><b>Legenda:</b></td>
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
