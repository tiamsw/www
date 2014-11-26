{{include file ="admin/header.tpl"}} {{include file
="admin/navibar.tpl"}} {{include file ="admin/sidebar.tpl"}}


<link rel="stylesheet" type="text/css"
	href="{{$smarty.const.WEBSITE_URL}}/public/assets/lib/jquery-easyui-1.3.4/themes/bootstrap/easyui.css">
<link rel="stylesheet" type="text/css"
	href="{{$smarty.const.WEBSITE_URL}}/public/assets/lib/jquery-easyui-1.3.4/themes/icon.css">
<script type="text/javascript"
	src="{{$smarty.const.WEBSITE_URL}}/public/assets/lib/jquery-easyui-1.3.4/jquery.easyui.min.js"></script>

<script type="text/javascript">

	$(document).ready(function(){
		$('#win_add').window('close'); 
	});
	 
	function newUser(){
		$('#win_add').window('open'); 
		$("#div_add").show();
		$("#div_edit").hide();
		$("#form").form('clear');
		$("#user_name").attr("readonly",false);
		
	}
	function editUser(){
		var select = getSelectUser();
		if(select == null || select.length == 0 ){
			$.messager.alert('ERROR','Please select the record!');
			return;
		}

		$('#win_add').window('open'); 
		$("#div_edit").show();
		$("#div_add").hide();
		$("#form").form('clear');
		$("#form").form('load',select[0]);
	
		$("#user_name").attr("readonly",true);
			
	}
	function removeUser(){
		$.messager.confirm('Confirm','Delete the currently selected record!',function(r){
		    if (r){
		    	var select = getSelectUser();
				if(select == null || select.length == 0 ){
					$.messager.alert('ERROR','Please select the record!');
					return;
				}
				$.ajax({  
		            type: "POST",  
		            dataType: "json",  
		            url: '{{$web_root}}user/delete',
		            data: { id: select[0].id },  
		            success: function (data) {  
		                $.messager.alert("Message", "Success!", "info");  
		             	$('#grid').datagrid('reload'); 
		            },  
		            error: function () {  
		            }  
		        });  
		    }
		});
		
	}
	function addNewUser(){

		  if(!$('#form').form('validate')){
		        return;
		     }
		$('#form').form({
		    url:'{{$web_root}}user/add',
		    type: "POST",  
            dataType: "json", 
		    onSubmit: function(){
		        //进行表单验证
		        //如果返回false阻止提交
		    },
		    success:function(data){
			    if(data <0){
			    	$.messager.alert('ERROR','The same user!');
			    	return;
				 }
		    	win_close();
		    	$.messager.alert('Message','Success!');
		    	$('#grid').datagrid('reload'); 
		    	
		    }
		});
		//提交表单
		$('#form').submit();
	}
	function editCurUser(){
		  if(!$('#form').form('validate')){
		        return;
		     }
		  win_close();
		$.ajax({  
            type: "POST",  
            dataType: "json",  
            url: '{{$web_root}}user/editData',
           	data: $("#form").serialize(),
            success: function (data) {  
            	
            	$.messager.alert('Message','Success!');
             	$('#grid').datagrid('reload'); 
            },  
            error: function () {  
            }  
        });  
	}
	function win_close(){
		$('#win_add').window('close'); 
	}


	function getSelectUser(){
		var select  = $("#grid").datagrid('getSelections');
		if(select == null || select.length == 0 ){
			return null;
		}
		return select;
	}
</script>

<div class="content">
	<div class="header">
		<div class="stats">
			<p class="stat">
				<!--span class="number"></span-->
			</p>
		</div>

		<h1 class="page-title">Gestor de Administradores</h1>
	</div>

	<!-- <ul class="breadcrumb">
            <li><a href="{{$smarty.const.WEBSITE_URL}}admin/user">管理列表</a> <span class="divider">/</span></li>  
			 <a title= "移除快捷菜单" href="#"><li class="active"><i class="icon-minus" method="del" url="#"></i></li></a>
	         <a title= "加入快捷菜单" href="#"><li class="active"><i class="icon-plus" method="add" url="#"></i></li></a>
        </ul> -->
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="bb-alert alert alert-info" style="display: none;">
				<span>操作成功</span>
			</div>
			<!--- START 以上内容不需更改，保证该TPL页内的标签匹配即可 --->

		 
			<table id="grid"
				data-options="url:'user/getpage',fitColumns:true,singleSelect:true"
				class="easyui-datagrid" style="height: 350px"
				toolbar="#toolbar" iconCls="icon-save" pagination="true"
				  rownumbers="true">
				<thead>
					<tr>
					<th data-options="field:'passwd',hidden:true"></th>
						<th data-options="field:'id',width:100,checkbox:true"></th>
						<th data-options="field:'user_name',width:100">UserName</th>
						<th data-options="field:'real_name',width:100">RealName</th>
						<th data-options="field:'mobile',width:100">Mobile</th>
						<th data-options="field:'email',width:100">Email</th>
						<th data-options="field:'login_time',width:100">LoginTime</th>
						<th data-options="field:'login_ip',width:100">LoginIP</th>
						<th data-options="field:'user_desc',width:100">Desc</th>


					</tr>
				</thead>
			</table>

			<div id="toolbar">
				<a href="#" class="easyui-linkbutton" iconCls="icon-add"
					plain="true" onclick="newUser()">Add</a> <a href="#"
					class="easyui-linkbutton" iconCls="icon-edit" plain="true"
					onclick="editUser()">Edit</a> <a href="#"
					class="easyui-linkbutton" iconCls="icon-remove" plain="true"
					onclick="removeUser()">Remove</a>
			</div>

			<div id="win_add" class="easyui-window" title="Add"
				style="height: 425px"
				data-options="iconCls:'icon-save',collapsible:false,minimizable:false,maximizable:false,modal:true">
				<div class="easyui-layout" data-options="fit:true">
					<form id="form"  method="post" class="form-horizontal">
						<div class="control-group" hidden="true">
							<input type="text" name="id" hidden="true">
						</div>
						<div class="control-group">
							<label class="control-label" for="Text input">UserName:</label>
							<div class="controls">
								<input type="text" class="easyui-validatebox"
									data-options="required:true" id="user_name" name="user_name"
									placeholder="Input  UserName">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputPassword">Passwd:</label>
							<div class="controls">
								<input type="password" class="easyui-validatebox"
									data-options="required:true" id="passwd" name="passwd"
									placeholder="passwd">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="Text input">RealName:</label>
							<div class="controls">
								<input type="text" id="real_name" name="real_name"
									placeholder="RealName">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="Text input">Mobile:</label>
							<div class="controls">
								<input type="text" id="mobile" name="mobile"
									placeholder="mobile">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputEmail">Email:</label>
							<div class="controls">
								<input type="text" id="email" name="email"
									placeholder="Email">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="Text input">Desc:</label>
							<div class="controls">
								<textarea rows="2" name="user_desc"></textarea>
							</div>
						</div>
						<div class="form-actions" id="div_add">
							<button type="button" 
								class="btn btn-primary" onclick="addNewUser()">Add</button>
							<button type="button" onclick="win_close()"
								class="btn">Cancle</button>
						</div>
						<div class="form-actions" id="div_edit">
							<button type="button" 
								class="btn btn-primary" onclick="editCurUser()">Edit</button>
							<button type="button" onclick="win_close()" 
								class="btn">Cancle</button>
						</div>
					</form>
				</div>
			</div>
			<!--- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 --->
			{{include file="admin/footer.tpl" }}