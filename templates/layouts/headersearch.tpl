<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>index</title>
	<link href="{{$smarty.const.WEBSITE_URL}}public/style/reset.css" type="text/css" rel="stylesheet" />
	<link href="{{$smarty.const.WEBSITE_URL}}public/style/style.css" type="text/css" rel="stylesheet" /> 
	<link rel="stylesheet" href="{{$smarty.const.WEBSITE_URL}}/public/assets/css/jquery-ui.css" />
	<link rel="stylesheet" href="{{$smarty.const.WEBSITE_URL}}/public/assets/css/jquery.ui.datepicker.css" />
	
	<script src="{{$smarty.const.WEBSITE_URL}}/public/assets/lib/jquery-1.8.1.min.js" ></script>
	<script src="{{$smarty.const.WEBSITE_URL}}/public/assets/js/jquery-ui.js"></script>
	<script src="{{$smarty.const.WEBSITE_URL}}/public/assets/js/jquery.ui.datepicker.js"></script>
	
	<script  type="text/javascript">
	
	var setting = null;
	
	$(function($) {
	
		 setting = function(){
			var toDate = $("#toDate").val();
			var fromDate = $("#fromDate").val();
			
			if(toDate != null && "" != toDate && "Hasta" != toDate){
				$('#fromDate').datepicker('option', 'maxDate',toDate);  
			}
			
			if(fromDate != null && "" != fromDate && "Desde" != fromDate){
				$('#toDate').datepicker('option', 'minDate',fromDate);  
			}
			
		}
		
		$.datepicker.regional['es-ES'] = {dateFormat: 'dd-mm-yyyy'};
		$.datepicker.setDefaults($.datepicker.regional['es-ES']);

		$("#fromDate" ).datepicker();
		$("#toDate" ).datepicker();
	});
	function check( ){
		var keyword = $("#keyword").val();
		var location = $("#location").val();
		var fromDate = $("#fromDate").val();
		var toDate = $("#toDate").val();
		
		if(keyword == "¿Qué Evento?"){
			$("#keyword").val("");
		}
		
		if("Localización" == location){
			$("#location").val("");
		}
		
		if("Desde" == fromDate){
			$("#fromDate").val("");
		}
		
		if("Hasta" == toDate){
			$("#toDate").val("");
		}
		
		return true;
	}
	</script>
	
</head>

<body>
<div id="head">
	<div>
        <span class="index-manage"><a href="#"><font color="f7931d">Organiza</font> tu agenda +</a></span>
        <ul>
            {{if empty($smarty.session.user) }}
            <li>
                <a href="{{$smarty.const.WEBSITE_URL}}register" class="input-style">Registro</a>
                <a href="{{$smarty.const.WEBSITE_URL}}login" class="input-style1">Entrar</a>
            </li>
            {{else}}
          <li class="navuserlogin">
                <span class="username"><div>{{$smarty.session.user->username}}</div><span>0</span></span>
                <a href="{{$smarty.const.WEBSITE_URL}}login/loginout"  class="btn btn-range btn-Calendar out">Salir</a> 
            </li>
            {{/if}}
            <li class="navlist">
                <a href="#">
                    TU &nbsp; CALENDARIO<br /> 
                    <font>Programa  &nbsp; tus  &nbsp; Eventos</font>
                </a>
            </li>
            <li class="navlist">
                <a href="#">
                    EVENTOS<br /> 
                    <font>&iexcl;Descubrelos!</font>
                </a>
            </li>
            <li class="navlogo">
                <a href="#"><img src="{{$smarty.const.WEBSITE_URL}}public/images/logo.png" class="index-logo" /></a>
            </li>
        </ul>
    </div>
</div>
<div id="indexsearch" class="search">
	<div>
    	<div>
        	<form action="{{$smarty.const.WEBSITE_URL}}ticket" method="post">
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