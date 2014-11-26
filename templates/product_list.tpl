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
  <div> <span class="index-manage"><a href="#"><font color="f7931d">Organiza</font> tu agenda +</a></span>
    <ul>
      <li>                 
        <a href="#" class="input-style1">Registrar</a>
        <a href="#" class="input-style1">Entrar</a> </li>


      <li class="navlist"> <a href="#"> TU &nbsp; CALENDARIO<br />
        <font>Programa  &nbsp; tus  &nbsp; Eventos</font> </a> </li>
      <li class="navlist"> <a href="#"> EVENTOS<br />
        <font>Descúbrelos</font> </a> </li>
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
      <div class="sub-nav"> <span><a href="#">Inicio</a>  /  <a href="#">Buscar</a>  /  The Big Guns</a></span></div>
      <div class="events-l mt15"> <img src="photo/photo1.gif" width="160" height="265" class="img-sidebar" />
        <ul class="gigs-title map">
          <span>Categorías</span>
          <li><a href="#">Todas las Categorías(44)</a></li>
          <li><a href="#">Cultura(31)</a></li>
          <li><a href="#">Entretenimiento(10)</a></li>
          <li><a href="#">Familia(23)</a></li>
          <li><a href="#">General(9)</a></li>
          <li><a href="#" class="act">Sport& Outdoor(24)</a>
          <ul class="gigs-ti-2">
            <li><a href="#">Futbol</a></li>
            <li><a href="#" class="act2">Tenis</a></li>
            <li><a href="#">Golf</a></li>
            <li><a href="#">Ciclismo</a></li>
          </ul></li>
        </ul>
      </div>
      <div class="events-c2">
        <div class=" gigs_k map"> <span class="aigs_k_title">Se han encontrado 18,278 eventos</span> <strong>Ordenado por: </strong>
          <select name="" class="id_3">
            <option>Mejor resultado</option>
          </select>
        </div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>
            	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="gigs-table list-tablep">
                    <tr>
                      <td class="tdC">Miercoles<br />
                        <span>30 OCT</span><br />
                        <font>20.00</font></td>
                      <td><img src="photo/photo2.gif" width="92" height="92" class="btn" /></td>
                      <td>Entretenimiento > Comedia<br />
                        <span>Jason Manford</span><br />
                        Bournemouth lnternational Center,Exeter Road, Bournemouth. BH2 5BH,Dorset UK.</td>
                    </tr>
                	<tr>
                      <td colspan="2">&nbsp;</td>
                      <td><p class="mt15"><a href="#" class="btn btn-range btn-Calendar">Añadir al calendario</a><a href="#" class="back btn btn-black"><strong>Comprar Tickets</strong></a></p></td>
                    </tr> 
              </table>
              <div class="table-xian"></div>
            </td>
          </tr>
          <tr>
            <td>
            	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="gigs-table list-tablep">
                    <tr>
                      <td class="tdC">Miercoles<br />
                        <span>30 OCT</span><br />
                        <font>20.00</font></td>
                      <td><img src="photo/photo2.gif" width="92" height="92" class="btn" /></td>
                      <td>Entretenimiento > Comedia<br />
                        <span>Jason Manford</span><br />
                        Bournemouth lnternational Center,Exeter Road, Bournemouth. BH2 5BH,Dorset UK.</td>
                    </tr>
                	<tr>
                      <td colspan="2">&nbsp;</td>
                      <td><p class="mt15"><a href="#" class="btn btn-range btn-Calendar">Añadir al calendario</a><a href="#" class="back btn btn-black"><strong>Comprar Tickets</strong></a></p></td>
                    </tr> 
              </table>
              <div class="table-xian"></div>
            </td>
          </tr>
          <tr>
            <td>
            	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="gigs-table list-tablep">
                    <tr>
                      <td class="tdC">Miercoles<br />
                        <span>30 OCT</span><br />
                        <font>20.00</font></td>
                      <td><img src="photo/photo2.gif" width="92" height="92" class="btn" /></td>
                      <td>Entretenimiento > Comedia<br />
                        <span>Jason Manford</span><br />
                        Bournemouth lnternational Center,Exeter Road, Bournemouth. BH2 5BH,Dorset UK.</td>
                    </tr>
                	<tr>
                      <td colspan="2">&nbsp;</td>
                      <td><p class="mt15"><a href="#" class="btn btn-range btn-Calendar">Añadir al calendario</a><a href="#" class="back btn btn-black"><strong>Comprar Tickets</strong></a></p></td>
                    </tr> 
              </table>
              <div class="table-xian"></div>
            </td>
          </tr>
          <tr>
            <td>
            	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="gigs-table list-tablep">
                    <tr>
                      <td class="tdC">Miercoles<br />
                        <span>30 OCT</span><br />
                        <font>20.00</font></td>
                      <td><img src="photo/photo2.gif" width="92" height="92" class="btn" /></td>
                      <td>Entretenimiento > Comedia<br />
                        <span>Jason Manford</span><br />
                        Bournemouth lnternational Center,Exeter Road, Bournemouth. BH2 5BH,Dorset UK.</td>
                    </tr>
                	<tr>
                      <td colspan="2">&nbsp;</td>
                      <td><p class="mt15"><a href="#" class="btn btn-range btn-Calendar">Añadir al calendario</a><a href="#" class="back btn btn-black"><strong>Comprar Tickets</strong></a></p></td>
                    </tr> 
              </table>
              <div class="table-xian"></div>
            </td>
          </tr>
          <tr>
            <td>
            	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="gigs-table list-tablep">
                    <tr>
                      <td class="tdC">Miercoles<br />
                        <span>30 OCT</span><br />
                        <font>20.00</font></td>
                      <td><img src="photo/photo2.gif" width="92" height="92" class="btn" /></td>
                      <td>Entretenimiento > Comedia<br />
                        <span>Jason Manford</span><br />
                        Bournemouth lnternational Center,Exeter Road, Bournemouth. BH2 5BH,Dorset UK.</td>
                    </tr>
                	<tr>
                      <td colspan="2">&nbsp;</td>
                      <td><p class="mt15"><a href="#" class="btn btn-range btn-Calendar">Añadir al calendario</a><a href="#" class="back btn btn-black"><strong>Comprar Tickets</strong></a></p></td>
                    </tr> 
              </table>
              <div class="table-xian"></div>
            </td>
          </tr>
          <tr>
            <td>{{$cccc}}
            <p class="mt15 gigs-fy"> 
            <a href="#" class="btn-hs btn-Calendar">1</a> 
            <a href="#" class="btn-hs btn-Calendar">2</a> 
            <a href="#" class="btn-hs btn-Calendar">3</a> 
            <a href="#" class="btn-hs btn-Calendar">4</a> 
            <a href="#" class="btn-hs btn-Calendar">5</a> 
            <a href="#" class="btn-hs btn-Calendar">6</a> 
            <a href="#" class="btn-hs btn-Calendar fontcolor">&gt;</a> 
            <a href="#" class="btn-hs btn-Calendar fontcolor">&gt;&gt;</a>
            </p> <span class="fy-size">Showing 1 of 18,098 pages</span> </td>
          </tr><br />
				<br />

        </table>
      </div>
      <div class="events-r mt15">
        <div class="r-row rw-bg2"> <br />
          &nbsp; <br />
          &nbsp; <br />
          &nbsp; <br />
          &nbsp; <br />
          &nbsp; <br />
          &nbsp; </div>
        <div class="r-row rw-bg2"> <br />
          &nbsp; <br />
          &nbsp; <br />
          &nbsp; <br />
          &nbsp; <br />
          &nbsp; <br />
          &nbsp; </div>
      </div>
    </div>
  </div>
</div>
{{include file='layouts/footer.tpl'}} 
