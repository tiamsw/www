{{include file ="admin/header.tpl"}} {{include file
="admin/navibar.tpl"}} {{include file ="admin/sidebar.tpl"}}

<div class="content">
	<div class="header">
		<div class="stats">
			<p class="stat">
				<!--span class="number"></span-->
			</p>
		</div>

		<h1 class="page-title">Detalles de tickets</h1>
	</div>
	 
 
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Detalles de tickets</h3>
  </div>
  <div class="modal-body">
    <p><table class='table' id="producttable">
	    		 <thead><tr><td>Nombre de la propiedades</td><td>valor de las propiedades</td></tr></thead>
	    		  <tbody id="mybody">     
	            </tbody>  
	    		</table></p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    <button class="btn btn-primary">Guardar</button>
  </div>
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
	

	
	<script type="text/javascript">
	function currencyFmatter(cellvalue, options, rowObject) { 
	    return "<button class='btn' id='showdesc' onclick='showdesc(\""+rowObject[0]+"\");'>more detail<buttton>";
	}
	function showdesc(id){
		$.post(
				'{{$smarty.const.WEBSITE_URL}}admin/ticket/showproductinfo',
				{'id':id},
				function(obj){
					var i =0;
					$("#mybody").html("");    
					 
					for(attribute in obj){  
						i++;
						  //添加一行 
						 var mytable = document.getElementById("mybody");    
						 var trlength= $("#producttable").find("tr").length
						 console.log(trlength); 
				          var newTr = mytable.insertRow(trlength-1);     
				          newTr.setAttribute("id","tr"+i);   
				        //添加两列
				        var newTd0 = newTr.insertCell();
				        var newTd1 = newTr.insertCell();
				        //设置列内容和属性
				        newTd1.innerText = attribute; 
				        newTd0.innerText= obj[attribute];
					} 
				},
				"json"
			);
		$('#myModal').modal('show');
	}
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
		url:'{{$smarty.const.WEBSITE_URL}}admin/ticket/queryTicket',
		postData:{'event_id':'{{$event_id}}'},
		datatype: "json",
		mtype: "POST",	
		height: '100%',
		width:1000,
		rowNum: 20,
		rowList: [10,20,30],
		colNames:['product id','product name','product type',"thumb","price","promotional text","specifications","operation"],
		colModel:[
			{name:'aw_product_id',index:'aw_product_id', width:50,hidden:true,search:true,searchoptions:{sopt: ['cn','eq', 'ne']}},
			{name:'product_name',index:'products.product_name', width:80,search:true,searchoptions:{sopt: ['cn','eq', 'ne']}},
			{name:'category_name',index:'event_category.category_id', width:80 ,search:true,stype:'select',
				searchoptions:{
					sopt: [ 'eq', 'ne'],
					dataUrl:'{{$smarty.const.WEBSITE_URL}}admin/ticket/queryCategory',
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
			} ,
			{name:'aw_thumb_url',index:'aw_thumb_url', width:30 ,search:false,hidden:true,searchoptions:{sopt: ['cn','eq', 'ne' ]}} ,
			{name:'display_price',index:'products.display_price', align:"right",sorttype:"float",width:40 ,search:true,searchoptions:{sopt: ['lt','le', 'eq','gt','ge' ]}} ,
			{name:'promotional_text',index:'products.promotional_text', width:80 ,search:true,searchoptions:{sopt: ['cn','eq', 'ne']}} , 
			{name:'specifications',index:'products.specifications', sorttype:"date", formatter:"date", width:50 ,search:true,searchoptions:{sopt: ['lt','eq','gt','ne'],dataInit:function(elem){  
				$.datepicker.regional['zh-CN'] = {dateFormat: 'yy-mm-dd'};
				$.datepicker.setDefaults($.datepicker.regional['zh-CN']);
				jQuery(elem).datepicker();
			}},formatoptions: {srcformat:'Y-m-d H:i:s',newformat:'Y-m-d H:i:s'}},
			{name:'aw_product_id',index:'aw_product_id', width:50,search:false,formatter:currencyFmatter}
		
		],
		sortname:"products.specifications",
		sortorder:'desc',
		pager: "#gridPager",
		viewrecords: true,
		caption: "tickets display" 
	});
	
	
	//jQuery("#grid").jqGrid('navGrid','#gridPager',{del:false,add:false,edit:false},{},{},{},{multipleSearch:false});
		
	jQuery("#grid").jqGrid('filterToolbar',{searchOperators :true,stringResult: true,searchOnEnter : true});
	
	</script>
 </div> 
 </div>
 </div>
	<!--- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 --->
			{{include file="admin/footer.tpl" }}