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
 
</head>

<body>
{{include file='layouts/headerandsearch.tpl'}} 
<div class="mian">
    <div class="content">
    	<div class="article">
        	<h5>Saltar a la página Comprar Ticket</h5>
            <p>
            	Por favor espera <span id="mes">2</span> segundos ...
            </p>
            
        </div>
    </div>
	<div class="h-blackbg"></div>
</div>
<script type="text/javascript">
var i = 2;
var intervalid;
intervalid = setInterval("fun()", 1000);
function fun() {
    if (i == 0) {
        window.location.href = "{{$ticketurl}}";
        clearInterval(intervalid);
    }
    document.getElementById("mes").innerHTML = i;
    i--; 
}
</script>
{{include file='layouts/footer.tpl'}}  