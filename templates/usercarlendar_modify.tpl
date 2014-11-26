<html>

<script type="text/javascript">




function  showAngdeDetail(id,type){
	alert(id+"--");
 }



function popUpdateWin(calEvent){

	if(calEvent.color == "#fb7b0e"){
		
		$("#tCevent_box").show();
		clearComEventEdit();

		$("#comeventnote").val(currentCalEvent.entrynote);
		if( currentCalEvent.emailreminder==1){
			$("#comeventemail").prop("checked",true);
		}else{
			$("#comeventemail").prop("checked",false);
		}
		
	}else{
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
		$("#location_text").val(calEvent.entrylocation);
		
		$("#saveEvent").attr("un",calEvent.id);
	}
	
}
</script>



<!-- 事件详情的弹出窗口 -->
<div id="agebda_tcbox">
	<div id="tccontent">
		<div class="row3 map gigs_tck">
			<span class="fl pl">Detalles del Evento</span><a href="#" class="fr pr"
				onclick="javascript:closewin('tcbox');">X</a>
		</div>
		<form>
			<table width="100%" border="0" cellspacing="0" cellpadding="0"
				class="gigs-tck-table mt15 ">
				<tr>
					<td width="50" align="right" valign="top"><img id="entryimg"
						height="110" width="110"
						src="{{$smarty.const.WEBSITE_URL}}public/images/calendar-ioc.gif" /></td>
					<td align="left">
						<h4 class="eventname">Lorem event title</h4>
						<p class="time" id="timeduration">Saturday, 28 July 2013 19:30 BST</p>
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

<div id="agebda_tCevent_box">
	<div id="tccontent">
		<div class="row3 map gigs_tck">
			<span class="fl pl">Editar Entrada</span><a href="#" class="fr pr"
				onclick="javascript:closewin('tCevent_box');">X</a>
		</div>
		<form>
			<table width="100%" border="0" cellspacing="0" cellpadding="0"
				class="gigs-tck-table mt15 ">
				<tr>
					<td width="50" align="right" valign="top"><span class="fontsize14">Nota</span></td>
					<td align="left"><textarea class="textarea" id="comeventnote"></textarea>
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
						type="checkbox" id="comeventemail" align="middle"><span
						class="fontsize12">&nbsp;&nbsp;&nbsp;Aviso de Email</span></td>
				</tr>
			</table>
		</form>
		<div class="row3 map gigs_top">
			<span class="fl"><a href="#"
				class="btn btn-black-2 btn-Calendar ml15" id="saveComEventNote">Guardar</a><font><a
					href="#" class="cancel"
					onclick="javascript:closewin('tCevent_box');">Cancelar</a></font></span>
			<span class="fr pr"><a href="#" class="btn btn-red btn-Calendar"
				id="deleteComEventNote">Borrar</a></span>
		</div>
	</div>
</div>



<!-- 添加事件的弹出窗口 -->
<div id="agebda_tcbox_addentity">
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
					class="fontsize12">&nbsp;&nbsp;&nbsp;Todo el Día</span></td>
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
						class="input-style4 textinput-w3" id="location_text" /></span></td>
			</tr>
			<tr>
				<td width="77" align="right" valign="middle">Imagen&nbsp;&nbsp;</td>

				<td align="left"><span class="inputborder"><input type="text"
						id="file_show" class="input-style4 textinput-w3" readOnly="true" /></span>
					<input type="button" class="btn btn-small" id="selectfile"
					value="选择上传文件" /> <input type="text" id="entryimg"
					style="display: none;"></input></td>
			</tr>
			<tr>
				<td width="77" align="right" valign="middle">Nota&nbsp;&nbsp;</td>
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

</html>