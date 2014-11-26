{{include file ="admin/header.tpl"}} {{include file
="admin/navibar.tpl"}} {{include file ="admin/sidebar.tpl"}}

<div class="content">
	<div class="header">
		<div class="stats">
			<p class="stat">
				<!--span class="number"></span-->
			</p>
		</div>

		<h1 class="page-title">Detalles de eventos</h1>
	</div>

	<!-- <ul class="breadcrumb">
            <li><a href="{{$smarty.const.WEBSITE_URL}}admin/user">管理列表</a> <span class="divider">/</span></li>  
			 <a title= "移除快捷菜单" href="#"><li class="active"><i class="icon-minus" method="del" url="#"></i></li></a>
	         <a title= "加入快捷菜单" href="#"><li class="active"><i class="icon-plus" method="add" url="#"></i></li></a>
        </ul> -->
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="bb-alert alert alert-info" style="display: none;">
				<span>éxito</span>
			</div>
			<hr>
	<table id="grid"></table>
	<div clsss='a' id="gridPager"></div>
	
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    		<h3 id="myModalLabel">Modificar descripción del evento</h3>
 		</div>
  		<div class="modal-body">
  			<input id="eventId" name="eventId" type="hidden"/>
<!-- 
    		<textarea id="eventDesc" name="eventDesc" class="input-xxlarge" rows="6" ></textarea>
 -->
    		<textarea id="eventDesc" name="eventDesc" rows="8" style="width:97%;height:100%" ></textarea>
 
  		</div>
  		<div class="modal-footer">
    		<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    		<button id="saveDesc" class="btn btn-primary">Guardar</button>
  		</div>
	</div>
	
	<script type="text/javascript">

	$("#saveDesc").click(function(){
		
		var eventId = $("#eventId").val();
		
		var eventDesc = $("#eventDesc").val();
		$.post(
			'{{$smarty.const.WEBSITE_URL}}admin/event/updateEvent',
			{'eventId':eventId,'eventDesc':eventDesc},
			function(obj){
				if(obj.success){
					$('#myModal').modal('hide');
					$("#grid").trigger("reloadGrid");//执行reload
				}
			},
			"json"
		);
		
	});

	function buildSelect(str){
		eval("var obj = "+str);
		var result = "<select>";
		
		result +="<option value=''>Please select...</option>";
		
		for(var key = 0;key < obj.length;key++){
			result +="<option value='"+obj[key].id+"'>"+obj[key].value+"</option>";
		}
		result += "</select>";
		return result;
	}
	
	jQuery("#grid").jqGrid({
		url:'{{$smarty.const.WEBSITE_URL}}admin/event/queryEvent',
		datatype: "json",
		mtype: "POST",	
		height: '100%',
		width:1000,
		rowNum: 20,
		rowList: [10,20,30],
		colNames:['event id','event name','category name',"description","operation"],
		colModel:[
			{name:'event_id',index:'events.event_id', width:100,hidden:true,search:false,searchoptions:{sopt: ['cn','eq', 'ne']}},
			{name:'event_name',index:'events.event_name', width:80,search:true,searchoptions:{sopt: ['cn','eq', 'ne']}},
			{name:'category_name',index:'event_category.category_id', width:80 ,search:true,stype:'select',
				searchoptions:{
					sopt: [ 'eq', 'ne'],
					dataUrl:'{{$smarty.const.WEBSITE_URL}}admin/event/queryCategory',
					buildSelect:function(str){
						eval(" var obj = " + str);
						var result = "<select><option value=''>Please select... ...</option>";
						for(var i = 0 ; i < obj.length; i++){
							result += "<option value='" + obj[i][0] + "'>" + obj[i][1] + "</option>";		
						}		
						result += "</select>";
						return result;
					}
				}
			},
			{name:'description',index:'events.description', width:80,search:true,searchoptions:{sopt: ['cn','eq', 'ne']}},
			{name:'op',index:'op', width:80,search:false,sortable:false,
				formatter:function(cellvalue, options, rowObject){
					var res =  "<a href=\"{{$smarty.const.WEBSITE_URL}}admin/ticket/index/?event="+cellvalue+"\">more products</a> | ";
					
					res += "<a href=\"#\"   onclick=\"mdfdesc('"+cellvalue+"');\">modify event description</a>";
					
					return res ;
				}
			}
		],
		//sortname:"products.specifications",
		//sortorder:'desc',
		pager: "#gridPager",
		viewrecords: true,
		caption: "event display" 
	});
	
	
	//jQuery("#grid").jqGrid('navGrid','#gridPager',{del:false,add:false,edit:false},{},{},{},{multipleSearch:false});
		
	jQuery("#grid").jqGrid('filterToolbar',{searchOperators :true,stringResult: true,searchOnEnter : true
	});
	function mdfdesc(id){
		console.log(id);
		$("#eventId").val(id);
		$.post(
			'{{$smarty.const.WEBSITE_URL}}admin/event/queryEventById',
			{'eventId':id},
			function(obj){
				if(obj.success){
					$('#myModal').modal('hide');
					$("#grid").trigger("reloadGrid"); 
					
					//
					$("#eventDesc").val(obj.description);
					$('#myModal').modal('show');
				}
			},
			"json"
		);
		
		
	 };
	</script>
 </div> 
 </div>
 </div>
	<!--- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 --->
			{{include file="admin/footer.tpl" }}