<?php /* Smarty version Smarty-3.1.13, created on 2014-09-17 03:38:22
         compiled from "/var/www/templates/layouts/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1564361121541901aeb6b439-64500249%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '313b9255c1d0b700b0f6d0b38c4bd342a20ad8f1' => 
    array (
      0 => '/var/www/templates/layouts/header.tpl',
      1 => 1410925096,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1564361121541901aeb6b439-64500249',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_541901aebedb75_38551004',
  'variables' => 
  array (
    'keyword' => 0,
    'location' => 0,
    'fromDate' => 0,
    'toDate' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541901aebedb75_38551004')) {function content_541901aebedb75_38551004($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Buscatickets – Música, tickets y eventos culturales en tu calendario.</title>
<meta name="description" content="Search4gigs – Search and find tickets for all types of events. Search and add sport, music or cultural events to your calendar." />
<meta name="keywords" content="Search4gigs, events, sport events, music events, cultural events, manage calendar, music tickets, online tickets." />
<meta name="verification" content="1509506379c80ef76557d9c59747dc66" />
	<link href="<?php echo @constant('WEBSITE_URL');?>
public/style/reset.css" type="text/css" rel="stylesheet" />
	<link href="<?php echo @constant('WEBSITE_URL');?>
public/style/style.css" type="text/css" rel="stylesheet" /> 
	<link rel="stylesheet" href="<?php echo @constant('WEBSITE_URL');?>
/public/assets/css/jquery-ui.css" />
	<link rel="stylesheet" href="<?php echo @constant('WEBSITE_URL');?>
/public/assets/css/jquery.ui.datepicker.css" />
	
	<script src="<?php echo @constant('WEBSITE_URL');?>
/public/assets/lib/jquery-1.8.1.min.js" ></script>
	<script src="<?php echo @constant('WEBSITE_URL');?>
/public/assets/js/jquery-ui.js"></script>
	<script src="<?php echo @constant('WEBSITE_URL');?>
/public/assets/js/jquery.ui.datepicker.js"></script>
	
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
		
		
		$.datepicker.regional['zh-CN'] = {dateFormat: 'yy-mm-dd'};
		$.datepicker.setDefaults($.datepicker.regional['zh-CN']);

		$("#fromDate" ).datepicker();
		$("#toDate" ).datepicker();
		
			
		function mouseEvent(objId,objVal){
	
			var foucusFun = function(){
				if($("#"+objId).val() == objVal){
					$("#"+objId).val("");
				}
			}
			
			$("#"+objId).focus(foucusFun);
				
			$("#"+objId).blur(function(){
				if("" == $("#"+objId).val()){
					$("#"+objId).val(objVal);
				}
			});
		}
		
		mouseEvent("keyword","¿Qué Evento?");
		mouseEvent("location","Localización");
		mouseEvent("fromDate","Desde");
		mouseEvent("toDate","Hasta");
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
        <span class="index-manage"><a href="<?php echo @constant('WEBSITE_URL');?>
carlendar"><font color="f7931d">Organiza</font> tu agenda +</a></span>
        <ul>
            <?php if (empty($_SESSION['user'])){?>
            <li>
                <a href="<?php echo @constant('WEBSITE_URL');?>
register" class="input-style">Registro<?php echo $_SESSION['user']->username;?>
 </a>
                <a href="<?php echo @constant('WEBSITE_URL');?>
login" class="input-style1">Entrar</a>
            </li>
            <?php }else{ ?>
          <li class="navuserlogin">
                <span class="username"><div><?php echo $_SESSION['user']->username;?>
</div><span>0</span></span>
                <a href="<?php echo @constant('WEBSITE_URL');?>
login/loginout"  class="btn btn-range btn-Calendar out">Salir</a> 
            </li>
            <?php }?>
            <li class="navlist">
                <a href="<?php echo @constant('WEBSITE_URL');?>
carlendar">
                    TU &nbsp; CALENDARIO<br /> 
                    <font>Programa  &nbsp; tus  &nbsp; Eventos</font>
                </a>
            </li>
            <li class="navlist">
                <a href="<?php echo @constant('WEBSITE_URL');?>
ticket">
                    EVENTOS<br /> 
                   <font>&iexcl;Descubrelos!</font>
                </a>
            </li>
            <li class="navlogo">
                <a href="<?php echo @constant('WEBSITE_URL');?>
"><img src="<?php echo @constant('WEBSITE_URL');?>
public/images/logo.png" class="index-logo" /></a>
            </li>
        </ul>
    </div>
</div>
<div class="index_banner">
	<div>
    	<a href="#"><img src="<?php echo @constant('WEBSITE_URL');?>
public/images/topbanner.png" /></a>
    </div>
</div>
<div id="indexsearch" class="search">
	<div>
    	<div>
        	<form action="<?php echo @constant('WEBSITE_URL');?>
ticket/index/" method="get" class="clase_tabla">
            	<table>
                	<tr>
                    	<td><font class="fontstyle">Busca&nbsp;&nbsp;un&nbsp;&nbsp;evento</font></td>
                    	<td><input type="text" placeholder="¿Qué Evento?" name="keyword" id="keyword" value="<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
" class="searchinput textinput-w" tabindex=3 /></td>
                        <td><input type="text" placeholder="Localización" name="location" id="location" value="<?php echo $_smarty_tpl->tpl_vars['location']->value;?>
" class="searchinput textinput-w" tabindex=4/></td>
                        <td><font class="fontstyle">Fecha</font></td>
						<td><input type="text" placeholder="Desde" name="fromDate" id="fromDate" value="<?php echo $_smarty_tpl->tpl_vars['fromDate']->value;?>
" onchange="setting()" readonly="readonly" class="searchinput textinput-w2" tabindex=5/></td>
                        <td><input type="text" placeholder="Hasta" name="toDate" id="toDate" value="<?php echo $_smarty_tpl->tpl_vars['toDate']->value;?>
" onchange="setting()" readonly="readonly" class="searchinput textinput-w2" tabindex=6/></td>
                        <td><input type="submit"   value="BuscaTickets" onclick="check(this)" class="input-style2" /></td>
						
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php }} ?>