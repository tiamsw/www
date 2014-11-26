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
     <div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">会员专享活动</a>
        <div id="page-stats" class="block-body collapse in">
        <h1> <button type="button" class="btn btn-primary"  onclick="javascript:window.location='{{$smarty.const.WEBSITE_URL}}admin/activities/add'">添加活动</button></h1>
            <table class="table table-striped">
              <thead>
                <tr>
					<th style="width:20px">#</th>
					<th style="width:80px">活动名称</th>  
					<th style="width:100px">活动类型</th>
					<th style="width:100px">更新时间</th> 
					<th style="width:80px">操作</th>
                </tr>
              </thead>
              <tbody>							  
               
                {{foreach $activitis as $key=>$activity}}
					<tr>
					<td>{{$activity->id}}</td>
					<td>{{$activity->acti_name}}</td> 
					
				    <td> 
				    {{if $activity->acti_type == 1}}
				        图片信息
 					{{else}}
	 	 		       视频信息
				    {{/if}}
				    </td>
				    <td>{{$activity->uptime}}</td> 
					<td>
					<a href="{{$smarty.const.WEBSITE_URL}}admin/activities/updateactivity/?activi={{$activity->id}}" title= "修改" ><i class="icon-pencil"></i></a> 
					<a href="{{$smarty.const.WEBSITE_URL}}admin/activities/delactivity/?activi={{$activity->id}}" title= "删除" ><i class="icon-remove"></i></a> 
					</td>
					</tr>
				{{/foreach}}
              </tbody>
            </table> 
				<!--- START 分页模板 --->
				
               {{$page_html}}
					
			   <!--- END --->
        </div>
    </div>
	   
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
{{include file="admin/footer.tpl" }}