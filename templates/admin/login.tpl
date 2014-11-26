{{include file = "admin/simple_header.tpl"}}
  <body class="simple_body"> 
  <!--<![endif]-->
    
    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                </ul>
                <a class="brand" href="{{$smarty.const.WEBSITE_URL}}/index.php"><span class="first"></span> <span class="second">{{$smarty.const.PROJECT_NAME}}</span></a>
        </div>
    </div>
<div>
<div class="container-fluid">	    
    <div class="row-fluid">	
	
    <div class="dialog">
		{{$admin_action_alert}}	
        <div class="block">
            <p class="block-heading">login in</p>
            <div class="block-body">
                <form name="loginForm" method="post" action="">
                    <label>Account</label>
                    <input type="text" class="span12" name="user_name" value="{{$_POST.user_name}}" required="true" autofocus="true">
                    <label>Contraseña</label>
                    <input type="password" class="span12" name="password" value = "{{$_POST.password}}" required="true" >
                    
                     <label>Código de verificación</label>
					<input type="text" name="verify_code" class="span4" placeholder="input verification code" autocomplete="off" required="required">
					<a href="#"><img title="Verification code" id="verify_code" src="{{$smarty.const.WEBSITE_URL}}/framework/util/verify_code_cn.php" style="vertical-align:top"></a>
					<div class="clearfix"><input type="checkbox" name="remember" value="remember-me"> Recordarme
					<span class="label label-info">No tienes que volver a identificarte en un mes</span>
					<input type="submit" class="btn btn-primary pull-right" name="loginSubmit" value="login"/></div>
					
                </form>
            </div>
        </div>
     
    </div>
<script type="text/javascript">
$("#verify_code").click(function(){
	var d = new Date()
	var hour = d.getHours(); 
	var minute = d.getMinutes();
	var sec = d.getSeconds();
    $(this).attr("src","{{$smarty.const.WEBSITE_URL}}/framework/util/verify_code_cn.php?"+hour+minute+sec);
});
</script>

{{include file = "admin/footer.tpl"}}


