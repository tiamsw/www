{{include file ="admin/header.tpl"}}
{{include file ="admin/navibar.tpl"}}
{{include file ="admin/sidebar.tpl"}} 

<div class="content">
        
        <div class="header">
            <div class="stats">
			<p class="stat"><!--span class="number"></span--></p>
			</div>

            <h1 class="page-title">Gestor de Usuarios registrados</h1>
        </div>
        
	
<div class="container-fluid">
	<div class="row-fluid">
		<div class="bb-alert alert alert-info" style="display: none;">
			<span>操作成功</span>
		</div>
<!--- START 以上内容不需更改，保证该TPL页内的标签匹配即可 --->
 
</div>
    <div class="block">
        
          <table id="grid"
				data-options="url:'users/getpage',fitColumns:true,singleSelect:true"
				class="easyui-datagrid" style="height: 350px"
				  iconCls="icon-save" pagination="true"
				  　>
				<thead>
					<tr>
						<th data-options="field:'userid',hidden:true,width:100"></th>
						<th data-options="field:'username',width:100">Username</th>
						<th data-options="field:'email',width:100">Email</th>
						<th data-options="field:'firstname',width:100">Firstname</th>
						<th data-options="field:'lastname',width:100">Lastname</th>
						<th data-options="field:'birthdate',width:120" ,formatter="dateTimeFormat">Birthdate</th>
						<th data-options="field:'desc',width:100">Desc</th>


					</tr>
				</thead>
			</table>
				<!--- START 分页模板 --->
			 
					
			   <!--- END --->
        </div>
        
 
    </div>

 
<!--- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 --->
{{include file="admin/footer.tpl" }}
<script type="text/javascript">
  function  dateTimeFormat(value, rec, index) {
    if (value == undefined) {
        return "";
    }
    return value.format("yyyy-mm-dd");
}
var Common = {

	    //EasyUI用DataGrid用日期格式化
	    TimeFormatter: function (value, rec, index) {
	        if (value == undefined) {
	            return "";
	        }
	        /*json格式时间转js时间格式*/
	        value = value.substr(1, value.length - 2);
	        var obj = eval('(' + "{Date: new " + value + "}" + ')');
	        var dateValue = obj["Date"];
	        if (dateValue.getFullYear() < 1900) {
	            return "";
	        }
	        var val = dateValue.format("yyyy-mm-dd HH:MM");
	        return val.substr(11, 5);
	    },
	    DateTimeFormatter: function (value, rec, index) {
	        if (value == undefined) {
	            return "";
	        }
	        /*json格式时间转js时间格式*/
	        value = value.substr(1, value.length - 2);
	        var obj = eval('(' + "{Date: new " + value + "}" + ')');
	        var dateValue = obj["Date"];
	        if (dateValue.getFullYear() < 1900) {
	            return "";
	        }

	        return dateValue.format("yyyy-mm-dd HH:MM");
	    },

	    //EasyUI用DataGrid用日期格式化
	    DateFormatter: function (value, rec, index) {
	        if (value == undefined) {
	            return "";
	        }
	        /*json格式时间转js时间格式*/
	        value = value.substr(1, value.length - 2);
	        var obj = eval('(' + "{Date: new " + value + "}" + ')');
	        var dateValue = obj["Date"];
	        if (dateValue.getFullYear() < 1900) {
	            return "";
	        }

	        return dateValue.format("yyyy-mm-dd");
	    }
	};
</script>
