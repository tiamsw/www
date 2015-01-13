{{include file ="admin/header.tpl"}} {{include file
="admin/navibar.tpl"}} {{include file ="admin/sidebar.tpl"}}


<link rel="stylesheet" type="text/css"
	href="{{$smarty.const.WEBSITE_URL}}/public/assets/lib/jquery-easyui-1.3.4/themes/bootstrap/easyui.css">
<link rel="stylesheet" type="text/css"
	href="{{$smarty.const.WEBSITE_URL}}/public/assets/lib/jquery-easyui-1.3.4/themes/icon.css">
<script type="text/javascript"
	src="{{$smarty.const.WEBSITE_URL}}/public/assets/lib/jquery-easyui-1.3.4/jquery.easyui.min.js"></script>
<script type="text/javascript"
	src="{{$smarty.const.WEBSITE_URL}}public/assets/lib/ajaxupload.js"></script>
<script type="text/javascript">


//文件上传组件处理
jQuery(function () {
	 	var button = jQuery('#selectfile');//绑定事件
	var load = new AjaxUpload(button, {//绑定AjaxUpload
    action: "{{$smarty.const.WEBSITE_URL}}fileupload/fileup",//文件要上传到的处理页面,语言可以PHP,ASP,JSP等
    type:"POST",//提交方式
    data:{//还可以提交的值
        module:"ajaxupload",
        type:jQuery("#__mstype__").attr("value"),
    },
    autoSubmit:true,//选择文件后,是否自动提交.这里可以变成true,自己去看看效果吧.
    name:'msUploadFile',//提交的名字
    onChange:function(file,ext){//当选择文件后执行的方法,ext存在文件后续,可以在这里判断文件格式
		$("#file_show").attr("value",file);
    },
    onSubmit: function (file, ext) {//提交文件时执行的方法
    	if(ext && /^(jpg|jpeg|png|gif)$/.test(ext)){
			//ext是后缀名
    		button.value = "正在上传…";
    		button.disabled = "disabled";
		}else{	
			alert("不支持的文件格式！只能上传jpg|jpeg|png|gif") ;
			return false;
		}
    },
    onComplete: function (file, response) {//文件提交完成后可执行的方法
        button.text('浏览');
        this.enable();
		var data=eval("("+response+")");
		if(data.type==0){
			alert(data.message);
		}else{
			$('#imgname').val(data.filename);
		}
    }
});
//	var submit=jQuery('#subm').click(function(){//触发提交的事件.与autoSubmit的设置有关,是否采用
//		load.submit();
//});
});


	$(document).ready(function(){
		$('#win_add').window('close'); 
	});
	 
	function addWindow(){
		$('#win_add').window('open'); 
		$("#form").form('clear');
	 
				
	}
	function editWindow(){
		var select = getSelect();
		if(select == null || select.length == 0 ){
			$.messager.alert('错误','请选择要修改的记录!');
			return;
		}
		$("#form").form('clear');
		$('#win_add').window('open'); 
		$("input[id='id']").val(select[0].id);
		$("select[id='type']").val(select[0].type);
		$("input[id='url']").val(select[0].url);
		$("input[id='imgname']").val(select[0].location);
		$("input[id='imgurl']").val(select[0].imgurl);
		
		$("textarea[id='desc']").val(select[0].desc);
		$("select[id='index']").val(select[0].index);
	}
	function deleteItem(){

		$.messager.confirm('Confirm','Delete the currently selected record!',function(r){
		    if (r){
		    	var select = getSelect();
				if(select == null || select.length == 0 ){
					$.messager.alert('ERROR','Please select the record!');
					return;
				}
				$.ajax({  
		            type: "POST",  
		            dataType: "json",  
		            url: '{{$smarty.const.WEBSITE_URL}}admin/advertising/delete',
		            data: { id: select[0].id },  
		            success: function (data) {  
		              //  $.messager.alert("消息", "删除成功!", "info");  
		             	$('#grid').datagrid('reload'); 
		            },  
		            error: function () {  
		            }  
		        });  
		    }
		});
		
	}

	
	function addItem(){
		  if(!$('#form').form('validate')){
		        return;
		     }


			var obj = new Object();
			
			 
			 obj.id = $("input[id='id']").val();
			 obj.type= $("#type").val();
			 obj.url=$("input[id='url']").val();
			 obj.location =$("input[id='imgname']").val();
			 obj.desc = $("textarea[id='desc']").val();
			 obj.index = $("#index").val();
			 obj.imgurl =  $("input[id='imgurl']").val(); 
			    $.post(
						'{{$smarty.const.WEBSITE_URL}}admin/advertising/add',
						obj,
						function(data){ 
							win_close();
					    	$('#grid').datagrid('reload'); 
						},
						"json"
			    );
	}
	  
	function win_close(){
		$('#win_add').window('close'); 
	}


	function getSelect(){
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

		<h1 class="page-title">Organizador de Publicidad</h1>
	</div>
	<div class="container-fluid">
		<div class="row-fluid">

			<!--- START 以上内容不需更改，保证该TPL页内的标签匹配即可 --->
			<table id="grid"
				data-options="url:'{{$smarty.const.WEBSITE_URL}}admin/advertising/getpage',fitColumns:true,singleSelect:true"
				class="easyui-datagrid" style="height: 370px"
				toolbar="#toolbar" iconCls="icon-save" pagination="true"
				rownumbers="true">
				<thead>
					<tr>
						<th data-options="field:'id',width:100,checkbox:true"></th>
						<th data-options="field:'type',width:100">site</th>
						<th data-options="field:'url',width:100">LinkURL</th>
						<th data-options="field:'imgurl',width:100">remote img url</th>
						
						<th data-options="field:'location',width:100">Local File</th>
						<th data-options="field:'index',width:100">Index</th>
						<th data-options="field:'desc',width:100">Desc</th>
					</tr>
				</thead>
			</table>

			<div id="toolbar">
				<a href="#" class="easyui-linkbutton" iconCls="icon-add"
					plain="true" onclick="addWindow()">Add</a> <a href="#"
					class="easyui-linkbutton" iconCls="icon-edit" plain="true"
					onclick="editWindow()">Edit</a> <a href="#"
					class="easyui-linkbutton" iconCls="icon-remove" plain="true"
					onclick="deleteItem()">Remove</a>
			</div>

			<div id="win_add" class="easyui-window" title="Add"
				style="height: 425px"
				data-options="iconCls:'icon-save',collapsible:false,minimizable:false,maximizable:false,modal:true">
				<div class="easyui-layout" data-options="fit:true">
					<form id="form" method="post" class="form-horizontal">
						<div class="control-group" hidden="true">
							<input type="text" id="id" name="id" hidden="true"> <input
								type="text" id="imgname" name="imgname" hidden="true">
						</div>
						<div class="control-group">
							<label class="control-label" for="Text input">ad site:</label>
							<div class="controls">
								<select id="type" name="type">
									<option value="search1">search1</option>
									<option value="search2">search2</option>
									<option value="product1">product1</option>
									<option value="product2">product2</option>
									<option value="homeevent">homeevent</option>
								</select>
							</div>
						</div>


						<div class="control-group">
							<label class="control-label" for="Text input">Image:</label>
							<div class="controls">
								<input type="text" id="file_show"
									class="input-style4 textinput-w3" readOnly="true" /> <input
									type="button" class="btn btn-small" id="selectfile"
									value="select image" />
							</div>
						</div>

						<!-- 						<div class="control-group"> -->
						<!-- 							<label class="control-label" for="Text input">ImageName:</label> -->
						<!-- 							<div class="controls"> -->
						<!-- 								<input type="text" class="easyui-validatebox" -->
						<!-- 									data-options="required:true" id="imgname" name="Imgname" -->
						<!-- 									placeholder="input img name!"> -->
						<!-- 							</div> -->
						<!-- 						</div> -->

						<div class="control-group">
							<label class="control-label" for="Text input">Url de imagen remota:</label>
							<div class="controls">
								<input id="imgurl" placeholder="if don't upload file,Picture fill Network Address,Preferred!"  name="imgurl"></input>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="Text input">Link Url:</label>
							<div class="controls">
								<input id="url" name="url"></input>
							</div>
						</div>
						

						<div class="control-group">
							<label class="control-label" for="Text input">Index:</label>
							<div class="controls">
								<select id="index" name="index">
									<option selected="selected">1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
								</select>
							</div>
						</div>
					 
						<div class="control-group">
							<label class="control-label" for="Text input">Desc:</label>
							<div class="controls">
								<textarea rows="2" id="desc" name="desc"></textarea>
							</div>
						</div>
						<div class="form-actions" id="div_add">
							<button type="button" style="width: 100px;"
								class="btn btn-primary" onclick="addItem()">Guardar</button>
							<button type="button" onclick="win_close()" style="width: 100px;"
								class="btn">Cancelar</button>
						</div>

					</form>
				</div>

				<!--- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 --->
				{{include file="admin/footer.tpl" }}