<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>gigs_login</title>
<SCRIPT src="js/tbhb.js" type=text/javascript></SCRIPT>
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
                <a href="#"><img src="images/logo2.png" class="index-logo" /></a>
            </li>
        </ul>
    </div>
</div>
<div class="index_banner">
	<div>
    	<a href="#"><img src="images/topbanner.png" /></a>
    </div>
</div>
<div id="indexsearch" class="search">
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
    <div id="indexcontent" class="content">
    	 <DIV class="main-wrap">
            <DIV id="slide-box">
                <B class="corner"></B>
                <DIV class="slide-content" id="J_slide">
                    <DIV class="wrap">
                        <UL class="ks-switchable-content">
                          <LI><A href="#" target="_blank"><IMG src="photo/photo5.gif"/></A>
                          	<div>
                            	<h3>live  at  the  apollo1</h3>
                                <span class="time">August 25th, 20:00hrs</span>
                                <p>Lorem ipsum dolor sit amet, 
                                    consectetur adipisicing elit, sed 
                                    do eiusmod tempor incididunt
                                </p>
                                <A href="#" class="a-but">Ver Detalles</A>
                            </div>
                          </LI>
                          <LI><A href="#" target="_blank"><IMG src="photo/photo5.gif"/></A>
                          	<div>
                            	<h3>live  at  the  apollo2</h3>
                                <span class="time">August 25th, 20:00hrs</span>
                                <p>Lorem ipsum dolor sit amet, 
                                    consectetur adipisicing elit, sed 
                                    do eiusmod tempor incididunt
                                </p>
                                <A href="#" class="a-but">Ver Detalles</A>
                            </div>
                          </LI>
                          <LI><A href="#" target="_blank"><IMG src="photo/photo5.gif"/></A>
                          	<div>
                            	<h3>live  at  the  apollo3</h3>
                                <span class="time">August 25th, 20:00hrs</span>
                                <p>Lorem ipsum dolor sit amet, 
                                    consectetur adipisicing elit, sed 
                                    do eiusmod tempor incididunt
                                </p>
                                <A href="#" class="a-but">Ver Detalles</A>
                            </div>
                          </LI>
                          <LI><A href="#" target="_blank"><IMG src="photo/photo5.gif"/></A>
                          	<div>
                            	<h3>live  at  the  apollo4</h3>
                                <span class="time">August 25th, 20:00hrs</span>
                                <p>Lorem ipsum dolor sit amet, 
                                    consectetur adipisicing elit, sed 
                                    do eiusmod tempor incididunt
                                </p>
                                <A href="#" class="a-but">Ver Detalles</A>
                            </div>
                          </LI>
                          <LI><A href="#" target="_blank"><IMG src="photo/photo5.gif"/></A>
                          	<div>
                            	<h3>live  at  the  apollo5</h3>
                                <span class="time">August 25th, 20:00hrs</span>
                                <p>Lorem ipsum dolor sit amet, 
                                    consectetur adipisicing elit, sed 
                                    do eiusmod tempor incididunt
                                </p>
                                <A href="#" class="a-but">Ver Detalles</A>
                            </div>
                          </LI>
                          <LI><A href="#" target="_blank"><IMG src="photo/photo5.gif"/></A>
                          	<div>
                            	<h3>live  at  the  apollo6</h3>
                                <span class="time">August 25th, 20:00hrs</span>
                                <p>Lorem ipsum dolor sit amet, 
                                    consectetur adipisicing elit, sed 
                                    do eiusmod tempor incididunt
                                </p>
                                <A href="#" class="a-but">Ver Detalles</A>
                            </div>
                          </LI>
                        </UL>
                    </DIV>
                    <DIV class="ks-switchable-triggers">
                        <A class=prev id="J_prev" href="javascript:void(0);">
                        </A> 
                        <A class=next id="J_next" href="javascript:void(0);">
                        </A>			
                    </DIV>
                </DIV>
                <B class="corner"></B>	
        	</DIV>
        </DIV>
        <div class="row5">
        	<div>
                <h3>live  at  the  apollo6</h3>
                <span class="time">August 25th, 20:00hrs</span>
                <p>Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit, sed 
                    do eiusmod tempor incididunt
                </p>
                <A href="#" class="a-but">Ver Detalles</A>
            </div>
            <div>
                <h3>live  at  the  apollo6</h3>
                <span class="time">August 25th, 20:00hrs</span>
                <p>Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit, sed 
                    do eiusmod tempor incididunt
                </p>
                <A href="#" class="a-but">Ver Detalles</A>
            </div>
            <div>
                <h3>live  at  the  apollo6</h3>
                <span class="time">August 25th, 20:00hrs</span>
                <p>Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit, sed 
                    do eiusmod tempor incididunt
                </p>
                <A href="#" class="a-but">Ver Detalles</A>
            </div>
            <div>
                <h3>live  at  the  apollo6</h3>
                <span class="time">August 25th, 20:00hrs</span>
                <p>Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit, sed 
                    do eiusmod tempor incididunt
                </p>
                <A href="#" class="a-but">Ver Detalles</A>
            </div>
        </div>
        <div class="row6">
        	<div>
                <h3><img src="images/index-ioc01.gif" />Encuentra un evento</h3> 
                <p>Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit, sed 
                    do eiusmod tempor incididunt
                </p>
                <A href="#" class="a-but">Ver Detalles</A>
            </div>
            <div>
                <h3><img src="images/index-ioc02.gif" />Añadir al calendario</h3> 
                <p>Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit, sed 
                    do eiusmod tempor incididunt
                </p>
                <A href="#" class="a-but">Ver Detalles</A>
            </div>
            <div>
                <h3><img src="images/index-ioc03.gif" />Aplicación iphone/Android</h3> 
                <p>Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit, sed 
                    do eiusmod tempor incididunt
                </p>
                <A href="#" class="a-but">Ver Detalles</A>
            </div>
            <div>
                <h3><img src="images/index-ioc04.gif" />Ver  video</h3> 
                <p>Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit, sed 
                    do eiusmod tempor incididunt
                </p>
                <A href="#" class="a-but">Ver Detalles</A>
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
        <a href="#">Términos and Condiciones</a>
    </div>
</div>
<SCRIPT type=text/javascript>
	var D=YAHOO.util.Dom, E=YAHOO.util.Event;

	KISSY().use("*", function(S) {
		var el = D.get('J_slide'),
			activeIndex = parseInt(el.getAttribute('data-active-index')) || 0;

		var carousel = new S.Carousel(el, {
			hasTriggers: false,
			navCls: 'ks-switchable-nav',
			contentCls: 'ks-switchable-content',
			activeTriggerCls: 'current',
			effect: "scrollx",
			steps:1,
			viewSize: [230],
			activeIndex: activeIndex
		});
		
		E.on('J_prev', 'click', carousel.prev, carousel, true);
		E.on('J_next', 'click', carousel.next, carousel, true);
	});

	KISSY().use("*", function(S) {
		var el = D.get('J_shoppingGuide');
		if(!el){
			return;
		}
		var	activeIndex = parseInt(el.getAttribute('data-active-index')) || 0;

		var carousel = new S.Carousel(el, {
			navCls: 'ks-switchable-nav',
			contentCls: 'ks-switchable-content',
			activeTriggerCls: 'current',
			effect: "scrollx",
			steps:4,
			viewSize: [920],
			activeIndex: activeIndex
		});
		
		E.on('J_shoppingGuidePrev', 'click', carousel.prev, carousel, true);
		E.on('J_shoppingGuideNext', 'click', carousel.next, carousel, true);
	});
</SCRIPT> 
</body>
</html>     