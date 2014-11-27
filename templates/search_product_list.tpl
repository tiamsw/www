<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
{{include file='layouts/title.tpl'}}
<link href="{{$smarty.const.WEBSITE_URL}}public/style/reset.css"
	type="text/css" rel="stylesheet" />
<link href="{{$smarty.const.WEBSITE_URL}}public/style/style.css"
	type="text/css" rel="stylesheet" />
<link rel="stylesheet"
	href="{{$smarty.const.WEBSITE_URL}}/public/assets/css/jquery-ui.css" />
<link rel="stylesheet"
	href="{{$smarty.const.WEBSITE_URL}}/public/assets/css/jquery.ui.datepicker.css" />

<script
	src="{{$smarty.const.WEBSITE_URL}}/public/assets/lib/jquery-1.8.1.min.js"></script>
<script
	src="{{$smarty.const.WEBSITE_URL}}/public/assets/js/jquery-ui.js"></script>
<script
	src="{{$smarty.const.WEBSITE_URL}}/public/assets/js/jquery.ui.datepicker.js"></script>
<script src="{{$smarty.const.WEBSITE_URL}}/public/js/slideshow.js" type="text/javascript"></script>

<script type="text/javascript"> 
	function buyTickets(pid){
		$.post(
			'{{$smarty.const.WEBSITE_URL}}ticket/buyTickets',
			{'pid':pid},
			function(obj){
				if(obj.res){
					window.location.href = obj.href;
				}else{
					alert("failed");
				}
				
			},
			"json"
		);
	}
	
	function addCalendat(pid){
		//console.log("add calendar");
		$.post(
			'{{$smarty.const.WEBSITE_URL}}ticket/addCalendat',
			{'pid':pid},
			function(obj){
				if(obj.res){
					alert("success");
				}else{
					window.location.href="{{$smarty.const.WEBSITE_URL}}login";
				}
				
			},
			"json"
		);
	} 
	
	function search(url,pageSize){
		var keyword = $("#keyword").val();
		var location = $("#location").val();
		var fromDate = $("#fromDate").val();
		var toDate = $("#toDate").val();
		
		if(keyword == null || keyword == undefined || keyword == "¿Qué Evento?"){
			keyword = "";
		}
		
		if(location == null || location == undefined || "Localización" == location){
			location = "";
		}
		
		if(toDate == null || toDate == undefined || "Hasta" == toDate){
			toDate = "";
		}
		
		if(fromDate == null || fromDate == undefined || "Desde" == fromDate){
			fromDate = "";
		}
		
		window.location.href = url + "&keyword=" + keyword + "&location=" + location + "&fromDate=" + fromDate + "&toDate="+toDate;
	}
 
	var setting = null;
	$(function($) { 
		param={"type":"search1","site":"search1"};
	$.ajax({
		url:"{{$smarty.const.WEBSITE_URL}}ticket/getAdvertising",
		type:"post",
		data:param,
		success:function(data){
			//console.log(data);
		    var divshow = $("#frameHlicAe");
            divshow.text("");// 清空数据
            divshow.append(data);
           // console.log(divshow);
            SlideShow(0);
		//	 document.getElementById("frameHlicAe").innerHTML=data;
		},
		error:function(){
			alert("delete event fail");
		}
		
	});
	 
	param={"type":"search2","site":"search2"};
	$.ajax({
		url:"{{$smarty.const.WEBSITE_URL}}ticket/getAdvertising",
		type:"post",
		data:param,
		success:function(data){
			//console.log(data);
		    var divshow = $("#frameHlicAe2");
            divshow.text("");// 清空数据
            divshow.append(data);
            //console.log(divshow);
            SlideShow2(0);
		//	 document.getElementById("frameHlicAe").innerHTML=data;
		},
		error:function(){
			alert("delete event fail");
		}
		
	});
		setting = function(){
			var toDate = $("#toDate").val();
			var fromDate = $("#fromDate").val();
			
			if(toDate != null && "" != toDate && "Date To" != toDate){
				$('#fromDate').datepicker('option', 'maxDate',toDate);  
			}
			
			if(fromDate != null && "" != fromDate && "Date From" != fromDate){
				$('#toDate').datepicker('option', 'minDate',fromDate);  
			}
			
		}
	
		$.datepicker.regional['zh-CN'] = {dateFormat: 'yy-mm-dd'};
		$.datepicker.setDefaults($.datepicker.regional['zh-CN']);
		$("#fromDate" ).datepicker();
		$("#toDate" ).datepicker();
	      
		     
		var pdata = '{{json_encode($data)}}';
	  //(pdata);
	  var regex = /<\S*\s*[\/]?>/gi; 
	  var regex2 = /\n/gi;
	  pdata = pdata.replace(regex, "");
	  pdata = pdata.replace(regex2, ""); 
		  
	//	alert(pdata)
		// eval("var source ="+pdata); 
		//console.log(source);
		//source  = eval('(' + '{{json_encode($data)}}' + ')');
		//alert(source)
		loadDatas(eval(pdata),"promotional_text");
	});

 
	function productOver(e){
		showCurrentKeyMarker(e);
	}
	</script>
</head>
<body >
	{{include file='layouts/headerandsearch.tpl'}}
	<div class="mian">
		<div class="content">
			<div class="events">
				<div class="sub-nav">
					<span> <a href="{{$smarty.const.WEBSITE_URL}}">Inicio</a> {{if
						$curCat != null and $curCat != "" }} / <a
						href="{{$smarty.const.WEBSITE_URL}}ticket/index/?cat={{$curCat}}">{{$curCategory_name}}</a>
						{{/if}}
					</span>
				</div>
				<div class="events-l mt15">
					<div style="width: 190px; height: 265px;">{{include file="map.tpl"
						}}</div>
				</div>
				<!--        <img src="{{$smarty.const.WEBSITE_URL}}public/photo/photo1.gif" width="160" height="265" class="img-sidebar" /> -->
				<ul id="cat-list" class="gigs-title map">
					<span>Categorías</span> {{foreach $cats as $c}}
					<li><a
						href="javascript:search('{{$smarty.const.WEBSITE_URL}}ticket/index/?cat={{$c['category_id']}}')">{{$c['category_name']}}({{$c['total']}})</a></li>
					{{/foreach}}
				</ul>

			</div>
			<div class="events-c2">
				<div class=" gigs_k map">
					<span class="aigs_k_title" id="totalCounter">Se han encontrado
						{{$totalEvent}} eventos</span> <strong>Ordenado por:</strong> <select
						name="" class="id_3">
						<option>Mejor resultado</option>
					</select>
				</div>
				<table id="list-result" width="100%" border="0" cellspacing="0"
					cellpadding="0">


					{{foreach $data as $d}}

					<tr>
						<td>
							<table width="100%" border="0" cellspacing="0" cellpadding="0"
								class="gigs-table list-tablep">
								<tr>
									<td class="tdC">{{$d['week']}}<br /> <span>{{$d['date']}}&nbsp;{{$d['month']}}</span><br />
										<font>{{$d['time']}}</font> <!-- <a href="#" class="time2">53 Dates</a>  -->
									</td>
									<td><a
										href="{{$smarty.const.WEBSITE_URL}}ticket/info/?id={{$d['aw_product_id']}}">
											<img src="{{$d['aw_thumb_url']}}" width="92" height="92"
											class="btn" />
									</a></td>
									<td>{{$d['category_name']}}<br /> <span> <a
											href="{{$smarty.const.WEBSITE_URL}}ticket/info/?id={{$d['aw_product_id']}}"
											name={{$d[ 'aw_product_id']}} onmouseover='productOver(name)'>
												{{$d['product_name']}} </a>
									</span><br /> {{$d['promotional_text']}} &nbsp;&nbsp;From:
										{{$d['display_price']}}

									</td>
								</tr>
								<tr>
									<td colspan="2">&nbsp;</td>
									<td>
										<p class="mt15">
											<a href="javascript:addCalendat('{{$d['aw_product_id']}}')"
												class="btn btn-range btn-Calendar">Añadir al calendario</a> <a
												href="{{$smarty.const.WEBSITE_URL}}buyticket/index/?pid={{$d['aw_product_id']}}"
												class="back btn btn-black"><strong>Comprar </strong></a>
										</p>
									</td>
								</tr>
							</table>
							<div class="table-xian"></div>
						</td>
					</tr>
					{{/foreach}}
					<tr>
						<td>{{if $totalEvent != 0}}
							<p class="mt15 gigs-fy">

								{{if $pager != 1}} <a
									href="javascript:search('{{$smarty.const.WEBSITE_URL}}ticket/index/?cat={{$curCat}}&pager=1')"
									class="btn-hs btn-Calendar fontcolor">&lt;&lt;</a> <a
									href="javascript:search('{{$smarty.const.WEBSITE_URL}}ticket/index/?cat={{$curCat}}&pager={{$pager-1}}')"
									class="btn-hs btn-Calendar fontcolor">&lt;</a> {{/if}}

								{{foreach from=$pagers item=index}} <a
									href="javascript:search('{{$smarty.const.WEBSITE_URL}}ticket/index/?cat={{$curCat}}&pager={{$index}}')"
									class="btn-hs btn-Calendar">{{$index}}</a> {{/foreach}} {{if
								$pager != $totalPage}} <a
									href="javascript:search('{{$smarty.const.WEBSITE_URL}}ticket/index/?cat={{$curCat}}&pager={{$pager+1}}')"
									class="btn-hs btn-Calendar fontcolor">&gt;</a> <a
									href="javascript:search('{{$smarty.const.WEBSITE_URL}}ticket/index/?cat={{$curCat}}&pager={{$totalPage}}')"
									class="btn-hs btn-Calendar fontcolor">&gt;&gt;</a> {{/if}}


							</p> <span class="fy-size">Showing {{$pager}} of {{$totalPage}}
								pages</span>
						</td> {{/if}}
					</tr>
				</table>
			</div>

			<div class="events-r mt15">
				<div class="r-row rw-bg2">
					<div class="comiis_wrapad" id="slideContainer">
						<div id="frameHlicAe" class="frame cl">
						</div>
					</div> 
				</div>
				<div class="r-row rw-bg2">
					<div class="comiis_wrapad" id="slideContainer2">
						<div id="frameHlicAe2" class="frame cl"> 
						</div>
					</div> 
				</div>
			</div>
		</div>
	</div>
	</div>
	{{include file='layouts/footer.tpl'}}