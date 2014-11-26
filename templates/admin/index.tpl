{{include file ="admin/header.tpl"}}
{{include file ="admin/navibar.tpl"}}
{{include file ="admin/sidebar.tpl"}}
 <!--- 以上为左侧菜单栏 sidebar --->
	 
<div class="content">
        
        <div class="header">
            <div class="stats">
			<p class="stat"><!--span class="number"></span--></p>
			</div>

            <h1 class="page-title">Admin Index</h1>
        </div>
        
		<ul class="breadcrumb">
            <li><a href="<{$smarty.const.ADMIN_URL}><{$content_header.module_url}>">index </a> <span class="divider">/</span></li> 
			<li class="active"><a href="<{$smarty.const.ADMIN_URL}><{$content_header.father_menu_url}>">Acceso Directo a Menú</a> <span class="divider">/</span></li> 
        </ul>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="bb-alert alert alert-info" style="display: none;">
			<span>éxito</span>
		</div>
<!--- START 以上内容不需更改，保证该TPL页内的标签匹配即可 --->

{{$admin_action_alert}}
{{$admin_quick_note}}

	<div class="block">
        <a href="#page-menu" class="block-heading" data-toggle="collapse">Shortcut menu</a>
        <div id="page-menu" class="block-body collapse in">
		<h3>
		 
			<span>
				<a href="{{$smarty.const.WEBSITE_URL}}admin/ticket">
				Detalles de tickets
				</a>
			</span>&nbsp; 
			 
		</h3>
		</div> 
    </div>
	
	<div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">información de Usuario</a>
        <div id="page-stats" class="block-body collapse in">
			
               <table class="table table-striped">  
						     
							 <tr>
						        <td>user name</td>
						        <td>name</td>
						        <td>phone</td>
						        <td>Email</td>
						        <td>login time</td>
						        <td>login IP</td>
					          </tr>
						      <tr>
						        <td>{{$user_info.user_name}}</td>
						        <td>{{$user_info.real_name}}</td>
						        <td>{{$user_info.mobile}}</td>
						        <td>{{$user_info.email}}</td>
						        <td>{{$user_info.login_time}}</td>
						        <td>{{$user_info.login_ip}}</td>
					          </tr>
					        
					      </table>
		</div>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>notice!</strong>Please take good care of your personal information, that an emergency occurs, please contact the administrator password leak.</div>
        </div>
    </div>
	
<!--- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 --->
{{include file="admin/footer.tpl" }}