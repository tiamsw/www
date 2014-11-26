{{include file ="admin/header.tpl"}}
{{include file ="admin/navibar.tpl"}}
{{include file ="admin/sidebar.tpl"}}
<style type="text/css">
.ui-pg-input{
	width:20px;
}
.ui-pg-selbox {
	width:60px;
    height:30px;
}
</style>
 
 <script type="text/javascript">
$(function () {
    jQuery("#list2").jqGrid({
   	url:'{{$smarty.const.WEBSITE_URL}}admin/userLog/getUserLog',
   	
	datatype: "json",
	mtype: 'POST',
   	colNames:['编号','会员卡号',  '登录时间'],
   	colModel:[
   		{name:'id',index:'id', width:100},
   		{name:'cardno',index:'cardno', width:150},
   		{name:'login_time',index:'login_time', width:250, align:"left"}
   	],
   	rowNum:30, 
   	pager: '#pager2',
    viewrecords: true,
    caption:"用户日志"
});
jQuery("#list2").jqGrid('navGrid','#pager2',{find:false,edit:false,add:false,del:false,excel:true},{},
{},
{},
{multipleSearch:true, multipleGroup:true});

jQuery("#list2").jqGrid('navButtonAdd','#pager2',{
                    caption:"Export", 
                    buttonicon:"ui-icon-save",
                    onClickButton : function () { 
						var condition = getTimeCondition();
                        //window.location.href = "{{$smarty.const.WEBSITE_URL}}admin/userLog/exportExcel";
                   		window.location.href = "{{$smarty.const.WEBSITE_URL}}service/admin/exportuserlog.php?"+condition;
                    } 
                });
}); 

function gridReload(){
	jQuery("#list2").jqGrid('setGridParam',{url:"{{$smarty.const.WEBSITE_URL}}admin/userLog/getUserLog/"+getTimeCondition(),page:1}).trigger("reloadGrid");
}

function getTimeCondition(){
	var starttime = jQuery("#datepicker1").val();
	var endtime = jQuery("#datepicker2").val();
	return ("starttime="+starttime+"&endtime="+endtime);
}

function cleartime(){
	jQuery("#datepicker1").val("");
	jQuery("#datepicker2").val("");
}

</script>
 
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
	
	<div id="myTabContent" class="tab-content">
		  <div class="tab-pane active in" id="home">
		  <div>
		  	<input type="text" id="datepicker1" class="uneditable-input" placeholder="开始时间" onClick="WdatePicker()">
  			<input type="text" id="datepicker2" class="uneditable-input" placeholder="结束时间" onClick="WdatePicker()">
			<button onclick="gridReload()" id="submitButton" class="btn btn-primary">搜索</button>
			<button onclick="cleartime()" id="clearButton" class="btn">清空时间</button>
		  </div>
			<table id="list2"></table>
			<div id="pager2"></div>
           
        </div>
    </div>
</div>
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
{{include file="admin/footer.tpl" }}