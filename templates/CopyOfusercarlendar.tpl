<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Organizador de agenda</title>

<link href="{{$smarty.const.WEBSITE_URL}}public/style/reset.css"
	type="text/css" rel="stylesheet" />
<link href="{{$smarty.const.WEBSITE_URL}}public/style/style.css"
	type="text/css" rel="stylesheet" />
<link
	href="{{$smarty.const.WEBSITE_URL}}public/assets/css/jquery.ui.datepicker.css"
	type="text/css" rel="stylesheet" />
<link
	href='{{$smarty.const.WEBSITE_URL}}public/fullcalendar/fullcalendar.css'
	rel='stylesheet' />
<link
	href='{{$smarty.const.WEBSITE_URL}}public/fullcalendar/fullcalendar.print.css'
	rel='stylesheet' media='print' />
<link
	href="{{$smarty.const.WEBSITE_URL}}public/assets/css/jquery-ui.css"
	type="text/css" rel="stylesheet" />
<link
	href="{{$smarty.const.WEBSITE_URL}}public/assets/css/jquery.timepicker.css"
	type="text/css" rel="stylesheet" />
<script
	src="{{$smarty.const.WEBSITE_URL}}public/js/jquery-1.10.1.min.js"
	type="text/javascript"></script>
<script
	src='{{$smarty.const.WEBSITE_URL}}public/jquery/jquery-ui-1.10.2.custom.min.js'></script>
<script src='{{$smarty.const.WEBSITE_URL}}public/js/usercalendar.js'></script>
<script
	src='{{$smarty.const.WEBSITE_URL}}public/fullcalendar/fullcalendar.min.js'></script>

<script src='{{$smarty.const.WEBSITE_URL}}public/assets/js/jquery-ui.js'></script>

<script
	src='{{$smarty.const.WEBSITE_URL}}public/assets/js/jquery.timepicker.js'></script>
<link rel="stylesheet"
	href="{{$smarty.const.WEBSITE_URL}}/public/assets/css/jquery-ui.css" />
<link rel="stylesheet"
	href="{{$smarty.const.WEBSITE_URL}}/public/assets/css/jquery.ui.datepicker.css" />
<script src="{{$smarty.const.WEBSITE_URL}}/public/js/searchform.js"></script>
<script type="text/javascript" src="{{$smarty.const.WEBSITE_URL}}public/assets/lib/ajaxupload.js"></script>

<script>  
	$(document).ready(function() {
        var calendar;
		$("#tcbox").hide();
		$("#tcbox_addentity").hide();
        $("#newcaledar").click(function(){$("#tcbox_addentity").show();clearWinData();$("#saveEvent").removeAttr('un')});
        $("#saveEvent").bind('click',submitEvent);
		displayevent();
		
		$("#fromdate").datepicker({dateFormat:'yy-mm-dd'});  
		$("#todate").datepicker({dateFormat:'yy-mm-dd'});
		
		$('#fromtime').timepicker({'timeFormat': 'H:i:s' });
		$('#totime').timepicker({'timeFormat': 'H:i:s' });
		
		$('.updateBtn').click(function(){
		    closewin('tcbox');
		    clearWinData();
			popUpdateWin(currentCalEvent);
		});
		
		$("#delBtn").bind('click',deleteCalEvent);
	});
	
	var currentCalEvent;
	
	function closewin(winname){
		  $("#"+winname).hide();
	}
	
	function displayevent(){
		
		calendar = $('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			editable: true,
			selectable: true,
			events: "{{$smarty.const.WEBSITE_URL}}carlendar/getUserCalEvent",
			eventClick: function(calEvent, jsEvent, view) {
				popupDetailWin(calEvent);
		        //alert('Event: ' + calEvent.title+"--"+calEvent.start+"--"+calEvent.end+"--"+calEvent.entrynote);
		
				//change color
		        $(this).css('border-color', 'red');
		
		    },
			select: function(start, end, allDay) {
				clickCalendarItem(start, end, allDay);
			//	  var title = prompt('Event Title:');
			//	if (title) {
			//		calendar.fullCalendar('renderEvent',
			//			{
			//				title: title,
			//				start: start,
			//				end: end,
			//				allDay: allDay
			//			},
			//			true // make the event "stick"
			//		);
			//	}  
				calendar.fullCalendar('unselect');
			},
			eventDragStart:function(event,jsEvent,ui,view) { 
			//	if(event)
			},
			eventDragStop:function( event, jsEvent, ui, view ) { 
				calendar.fullCalendar('renderEvent',event);
			 }
		});
	
}

function submitEvent(){
	var title = $("#title").val();
	
	var allday = $("#allday").prop("checked");
	var fromdate = $("#fromdate").val();
	var fromtime = $("#fromtime").val();
	var todate = $("#todate").val();
	var totime = $("#totime").val();
	var note = $("#note").val();
	var rember = $("#rember").prop("checked")==true?'1':'2';
	var location = $("#location").val();
	var from = fromdate;
	var to = todate;
	if(allday==true){
		if($.trim(fromdate).length<1){
			from = new Date();
			from.setHours(0);
			from.setMinutes(0);
			from.setSeconds(0);
			
			from = from.pattern("yyyy-MM-dd HH:mm:ss");
	        to = "";
		}else{
			//from = fromdate+" 00:00:00";
			from = fromdate;
			to = todate;
		}
	}else{
		if($.trim(fromdate).length<0){
			alert("请填写起始时间");
			return ;
		}
		if(fromtime.length<1){
			fromtime = "00:00:00";
		}
		from = fromdate+" "+fromtime;
		if(totime.length<1){
			totime = "00:00:00";
		}
		if(todate.length<1){
			to = todate;
		}else{
			to = todate+" "+totime;
		}
		
	}
	
	
	var entry = {};
	entry.entrytitle = title;
	entry.entryfrom = $.trim(from);
	entry.entryto = $.trim(to);
	entry.entrylocation = location;
	entry.entrynote = note;
	entry.emailreminder = rember==true?'1':'2';
	var entryid = $("#saveEvent").attr("un");
	
	var url;
	if(entryid!=null){
		entry.entryid = entryid;
		url = "{{$smarty.const.WEBSITE_URL}}carlendar/updateCustomEventById";
	}else{
		url = "{{$smarty.const.WEBSITE_URL}}carlendar/addEvent";
	}
	var param = {"entry":entry,"type":1};
	
	$.ajax({
		url:url,
		type:"post",
		data:param,
		success:function(data){
			console.log(data);
			//新增数据成功，关闭窗口，将事件显示在日历上
			closewin('tcbox_addentity');
			if(entryid!=null){
				calendar.fullCalendar("removeEvents",currentCalEvent.id);
				calendar.fullCalendar("rerenderEvents");
			}
		
			calendar.fullCalendar('renderEvent',
					{
						id:data,
						title: title,
						start: new Date(from),
						end: to.length<1?null:new Date(to),
						allDay:allday,
						entrynote:note
					},
					true // make the event "stick"
				);

			fileupload();
		
		},
		error:function(){
			alert("update event fail");
		}
		
	});
}

function fileupload(){

	$("fileloadform").submit();
}


function clickCalendarItem(start,end,allday){
	clearWinData();
	$("#tcbox_addentity").show();
	$("#allday").prop("checked",allday);
	$("#fromdate").val(start.pattern("yyyy-MM-dd"));
	$("#todate").val(start.pattern("yyyy-MM-dd"));
	if(allday){
		$("#fromtime").val("");
		$("#totime").val("");
	}else{
		$("#fromtime").val(start.pattern("HH:mm"));
		$("#totime").val(end.pattern("HH:mm"));
	}
	alert($("#location").val());
}

function clearWinData(){
	$("#title").val("");
	$("#allday").prop("checked",false);
	$("#fromdate").val("");
	$("#fromtime").val("");
	$("#todate").val("");
	$("#totime").val("");
	$("#note").val("");
	$("#location").val("");
	$("#rember").prop("checked",false);
}


function popupDetailWin(calEvent){

  	$("#tcbox").show();
	$(".eventname").html(calEvent.title);
	var from;
	var to ;
	if(calEvent.end!=null){
		var fromtime = calEvent.start.pattern("HH:mm");
		var totime = calEvent.end.pattern("HH:mm");
		if(fromtime=="00:00"&&fromtime==totime){
			from = calEvent.start.toDateString();
			to = calEvent.end.toDateString();
		}else if(totime!="00:00"){
			to = calEvent.end.toString();
			from = calEvent.start.toString();
		}
		$("#fromtime").val(calEvent.start.pattern("HH:mm"));
		
		$("#todate").val(calEvent.end.pattern("yyyy-MM-dd"));
		$("#totime").val(calEvent.end.pattern("HH:mm"));
		
	}else{
		from = calEvent.start.toDateString();
	}
	var timeduration ;
	if(to!=null){
		timeduration = from+" - "+to;
	}else{
		timeduration = from;
	}
	$("#timeduration").html(timeduration);
	$("#note_show").val(calEvent.entrynote);
	currentCalEvent = calEvent;
}

function popUpdateWin(calEvent){
	$("#tcbox_addentity").show();
	$("#title").val(calEvent.title);
	$("#allday").prop("checked",false);
	$("#fromdate").val(calEvent.start.pattern("yyyy-MM-dd"));
	if(calEvent.end!=null){
		var fromtime = calEvent.start.pattern("HH:mm");
		var totime = calEvent.end.pattern("HH:mm");
		
		if(fromtime=="00:00"&&totime==fromtime){
			$("#allday").prop("checked",true);
		}else{
			$("#fromtime").val(calEvent.start.pattern("HH:mm"));
			$("#totime").val(calEvent.end.pattern("HH:mm"));
		}
		$("#todate").val(calEvent.end.pattern("yyyy-MM-dd"));
	}else{
		$("#allday").prop("checked",true);
	}
	$("#note").val(calEvent.entrynote);
	var reminder = calEvent.emailreminder;
	$("#rember").prop("checked",reminder=='1'?true:false);
	$("#location").val(calEvent.entrylocation);
	
	$("#saveEvent").attr("un",calEvent.id);
}

function deleteCalEvent(){
	
	var param={"type":1,"entryid":currentCalEvent.id};
	$.ajax({
		url:"{{$smarty.const.WEBSITE_URL}}carlendar/deleteEventById",
		type:"post",
		data:param,
		success:function(data){
		    closewin('tcbox');
			calendar.fullCalendar("removeEvents",currentCalEvent.id);
			calendar.fullCalendar("rerenderEvents");
		
		},
		error:function(){
			alert("delete event fail");
		}
		
	});
	
}

function openBrowse(){ 
	//$("#fileSel").click();
	document.getElementById("fileSel").click();
	var filename = $("#fileSel").val();
	if(filename==null){
		filename = "&nbsp;&nbsp;&nbsp;No File Chosen";
	}else{
		filename = "&nbsp;&nbsp;&nbsp;"+filename;
	}
	$("#filename").html(filename);
} 


/**
日期格式化
 *  yyyy-MM-dd hh:mm:ss
 *	(new Date()).pattern("yyyy-MM-dd hh:mm:ss.S")==> 2006-07-02 08:09:04.423      
 * (new Date()).pattern("yyyy-MM-dd E HH:mm:ss") ==> 2009-03-10 二 20:09:04      
 * (new Date()).pattern("yyyy-MM-dd EE hh:mm:ss") ==> 2009-03-10 周二 08:09:04      
 * (new Date()).pattern("yyyy-MM-dd EEE hh:mm:ss") ==> 2009-03-10 星期二 08:09:04      
 * (new Date()).pattern("yyyy-M-d h:m:s.S") ==> 2006-7-2 8:9:4.18
*/
Date.prototype.pattern=function(fmt) {         
    var o = {         
    "M+" : this.getMonth()+1, //月份         
    "d+" : this.getDate(), //日         
    "h+" : this.getHours()%12 == 0 ? 12 : this.getHours()%12, //小时         
    "H+" : this.getHours(), //小时         
    "m+" : this.getMinutes(), //分         
    "s+" : this.getSeconds(), //秒         
    "q+" : Math.floor((this.getMonth()+3)/3), //季度         
    "S" : this.getMilliseconds() //毫秒         
    };         
    var week = {         
    "0" : "/u65e5",         
    "1" : "/u4e00",         
    "2" : "/u4e8c",         
    "3" : "/u4e09",         
    "4" : "/u56db",         
    "5" : "/u4e94",         
    "6" : "/u516d"        
    };         
    if(/(y+)/.test(fmt)){         
        fmt=fmt.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length));         
    }         
    if(/(E+)/.test(fmt)){         
        fmt=fmt.replace(RegExp.$1, ((RegExp.$1.length>1) ? (RegExp.$1.length>2 ? "/u661f/u671f" : "/u5468") : "")+week[this.getDay()+""]);         
    }         
    for(var k in o){         
        if(new RegExp("("+ k +")").test(fmt)){         
            fmt = fmt.replace(RegExp.$1, (RegExp.$1.length==1) ? (o[k]) : (("00"+ o[k]).substr((""+ o[k]).length)));         
        }         
    }         
    return fmt;         
}

</script>
</head>

<body>
	{{include file='layouts/headerandsearch.tpl'}}

	<div class="mian">
		<div class="content">
			<div class="events">
				<div class="gigs-1">
					<span> <a href="javascript:void(0);" class="fl btn btn-black-2"
						id="newcaledar">Nueva Entrada de Calendario</a> <a href="#"
						class="fl btn btn-black-3">Exporta tu Calendario</a>
					</span>
					<p class=" mt15 gigs-top-xx fr">

						<a href="{{$smarty.const.WEBSITE_URL}}userevent"
							class="btn-hs2 btn-Calendar right-by">Agenda</a>
					</p>
				</div>
				<div class="mt15">
					<div id='calendar'></div>
				</div>
				<table class="gigs-u-l" style="margin: 0;">
					<tr>
						<td valign="center"><b>Leyenda:</b></td>
						<td><a href="#" class="btn btn-range btn-Calendar">Buscatickets
								Evento</a></td>
						<td><a href="#" class="btn btn-blue btn-Calendar">Eventos Privados</a></td>
						<td valign="center">Organizar Capas//layers</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<!-- 事件详情的弹出窗口 -->
	<div id="tcbox">
		<div id="tccontent">
			<div class="row3 map gigs_tck">
				<span class="fl pl">Detalles del Evento</span><a href="#" class="fr pr"
					onclick="javascript:closewin('tcbox');">X</a>
			</div>
			<form>
				<table width="100%" border="0" cellspacing="0" cellpadding="0"
					class="gigs-tck-table mt15 ">
					<tr>
						<td width="50" align="right" valign="top"><img
							src="{{$smarty.const.WEBSITE_URL}}public/images/calendar-ioc.gif" /></td>
						<td align="left">
							<h4 class="eventname">Lorem event title</h4>
							<p class="time" id="timeduration">Saturday, 28 July 2013 19:30
								BST</p>
						</td>
					</tr>
				</table>
				<table>
					<tr>

						<td class="time">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text"
							class="input-style4 textinput-w3" id="note_show" readOnly="true" /></td>
					</tr>
				</table>
			</form>
			<div class="row3 map gigs_top">
				<span class="fl"><a href="javascript:void(0);"
					class="btn btn-blue btn-Calendar ml15 updateBtn">Editar</a><font><a
						href="javascript:void(0);" class="cancel"
						onclick="javascript:closewin('tcbox');">Cancelar</a></font></span> <span
					class="fr pr"><a href="javascript:void(0);"
					class="btn btn-red btn-Calendar" id="delBtn">Borrar</a></span>
			</div>
		</div>
	</div>



	<!-- 添加事件的弹出窗口 -->
	<div id="tcbox_addentity">
		<div id="tccontent">
			<div class="row3 map gigs_tck">
				<span class="fl pl">Editar Entrada</span><a href="#" class="fr pr"
					onclick="javascript:closewin('tcbox_addentity');">X</a>
			</div>
				<table width="100%" border="0" cellspacing="0" cellpadding="0"
					class="table-edit mt15" style="border: none;">
					<tr>
						<td width="77" align="right" valign="middle">Título&nbsp;&nbsp;</td>
						<td align="left"><span class="inputborder"><input type="text"
								class="input-style4 textinput-w3" id="title" /></span></td>
					</tr>
					<tr>
						<td width="77" align="right" valign="middle">&nbsp;</td>
						<td align="left"><input type="checkbox" align="middle" id="allday"><span
								class="fontsize12">&nbsp;&nbsp;&nbsp;Todo el día</span></td>
					</tr>
					<tr>
						<td width="77" align="right" valign="middle">Desde&nbsp;&nbsp;</td>
						<td align="left"><span class="inputborder"><input type="text"
								class="input-style4 textinput-w4" id="fromdate" readOnly="true" /><a
								href="javascript:void(0);"><img
									src="{{$smarty.const.WEBSITE_URL}}public/images/calendar-iocx.gif" /></a></span>
							<span class="inputborder"><input type="text"
								class="input-style4 textinput-w4" id="fromtime" /><a
								href="javascript:void(0);"><img
									src="{{$smarty.const.WEBSITE_URL}}public/images/time-iocx.gif" /></a></span>
						</td>
					</tr>
					<tr>
						<td width="77" align="right" valign="middle">Hasta&nbsp;&nbsp;</td>
						<td align="left"><span class="inputborder"><input type="text"
								class="input-style4 textinput-w4" id="todate" readOnly="true" /><a
								href="#"><img
									src="{{$smarty.const.WEBSITE_URL}}public/images/calendar-iocx.gif" /></a></span>
							<span class="inputborder"><input type="text"
								class="input-style4 textinput-w4" id="totime" /><a
								href="javascript:void(0);"><img
									src="{{$smarty.const.WEBSITE_URL}}public/images/time-iocx.gif" /></a></span>
						</td>
					</tr>
					<tr>
						<td width="77" align="right" valign="middle">Localización&nbsp;&nbsp;</td>
						<td align="left"><span class="inputborder"><input type="text"
								class="input-style4 textinput-w3" id="location" /></span></td>
					</tr>
					<tr>
						<td width="77" align="right" valign="middle">Imagen&nbsp;&nbsp;</td>
						<td align="left">
							<form action="{{$smarty.const.WEBSITE_URL}}fileupload/loadfile"
								id="fileloadform" encType="multipart/form-data" method="post"
								target="file_frame">
								<input name="filename" type="file"> <input id="file_entryid"
									style="display: none">
							<input type="submit" id="subfile"    style="display: none" />
							</form> <iframe name='file_frame' id="file_frame"
								style='display: none'></iframe> <!-- <input type="file" id="fileSel"
							style="display: none" /> 
					 		<input type="button" runat="server" 
							id="file" value="" onclick="javascript:openBrowse();" /><span
 							id="filename" class="fontsize12">&nbsp;&nbsp;&nbsp;No File Chosen</span> -->
						</td>
					</tr>
					<tr>
						<td width="77" align="right" valign="middle">Notas&nbsp;&nbsp;</td>
						<td align="left"><span class="inputborder"><textarea id="note"
									style="height: 80px" class="input-style4 textinput-w3"></textarea></span>
						</td>
					</tr>
					<tr>
						<td width="77" align="right" valign="middle">&nbsp;</td>
						<td align="left"><input type="checkbox" align="middle" id="rember"><span
								class="fontsize12">&nbsp;&nbsp;&nbsp;Aviso de Email</span></td>
					</tr>
				</table>
			<div class="row3 map gigs_top">
				<span class="fl"><a href="javascript:void(0);"
					class="btn btn-black-2 btn-Calendar ml15" id="saveEvent">Guardar</a><font><a
						href="javascript:void(0);" class="cancel"
						onclick="javascript:closewin('tcbox_addentity');">Cancelar</a></font></span>
			</div>
		</div>
	</div>

	{{include file='layouts/footer.tpl'}}