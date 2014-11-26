  <body class=""> 
  <!--<![endif]-->
<div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                    <!-- li><a href="#" class="hidden-phone visible-tablet visible-desktop" role="button">Style Template</a></li 
					 
				 
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-cog"></i>设置< class="icon-caret-down"></i>
						</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{$smarty.const.WEBSITE_URL}}/admin/index/setting">系统设置</a></li>
                        </ul>
                    </li>
				 -->
					
					<li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Estilo de Plantilla
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="{{$smarty.const.WEBSITE_URL}}admin/set/index/?t=default">Defecto</li>
                            <li><a href="{{$smarty.const.WEBSITE_URL}}admin/set/index/?t=blacktie">Negra</a></li>
                            <li><a href="{{$smarty.const.WEBSITE_URL}}admin/set/index/?t=wintertide">Gris</a></li>
							<li><a href="{{$smarty.const.WEBSITE_URL}}admin/set/index/?t=schoolpainting">Verde</a></li>
                        </ul>
                    </li>
					
					<li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> {{$smarty.session.aduser->user_name}}
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            
                            <li><a tabindex="-1" href="{{$smarty.const.WEBSITE_URL}}logout.php">Salir<a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="{{$smarty.const.WEBSITE_URL}}/index.php"><span class="first"></span> <span class="second">{{$smarty.const.ADMIN_TITLE}}</span></a>
        </div>
</div>