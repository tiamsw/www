{{include file ="admin/header.tpl"}}
{{include file ="admin/navibar.tpl"}}
{{include file ="admin/sidebar.tpl"}}
 
<div class="content">
        
        <div class="header">
            <div class="stats">
			<p class="stat"><!--span class="number"></span--></p>
			</div>

            <h1 class="page-title">后台管理员管理</h1>
        </div>
        
		<ul class="breadcrumb">
            <li><a href="{{$smarty.const.WEBSITE_URL}}admin/user">管理列表</a> <span class="divider">/</span></li>  
			 <a title= "移除快捷菜单" href="#"><li class="active"><i class="icon-minus" method="del" url="#"></i></li></a>
	         <a title= "加入快捷菜单" href="#"><li class="active"><i class="icon-plus" method="add" url="#"></i></li></a>
			 
			
        </ul>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="bb-alert alert alert-info" style="display: none;">
			<span>操作成功</span>
		</div>
 
{{$admin_action_alert}}
{{$admin_quick_note}}
    
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">请填写账号资料</a></li>
    </ul>	
	
	<div id="myTabContent" class="tab-content">
		  <div class="tab-pane active in" id="home">

           <form id="tab" method="post" action="" autocomplete="off">
				<label>登录名</label>
				<input type="text" name="user_name" value="{{$_POST.user_name}}" class="input-xlarge" autofocus="true" required="true" >
				<label>密码</label>
				<input type="password" name="password" value="{{$_POST.password}}" class="input-xlarge" required="true" >
				<label>姓名</label>
				<input type="text" name="real_name" value="{{$_POST.real_name}}" class="input-xlarge" required="true" >
				<label>手机</label>
				<input type="text" name="mobile" value="{{$_POST.mobile}}" class="input-xlarge" required pattern="\d{11}">
				<label>邮件</label>
				<input type="email" name="email" value="{{$_POST.email}}"  class="input-xlarge" required="true" >
				<label>描述</label>
				<textarea name="user_desc" rows="3" class="input-xlarge">{{$_POST.user_desc}}</textarea>
				
			<div class="btn-toolbar">
				<button type="submit" class="btn btn-primary"><strong>提交</strong></button>
				<div class="btn-group"></div>
			</div>
			</form>
        </div>
    </div>
</div>
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
{{include file="admin/footer.tpl" }}