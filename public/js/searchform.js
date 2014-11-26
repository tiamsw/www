var setting = null;  
	$(function($) { 
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
		
		init();
	
		/*function mouseEvent(objId,objVal){
	
			var foucusFun = function(){
				if($("#"+objId).val() == objVal){
					$("#"+objId).val("");
				}
			}
			
			$("#"+objId).focus(foucusFun);
				
			$("#"+objId).blur(function(){
				if("" == $("#"+objId).val()){
					$("#"+objId).val(objVal);
				}
			});
		}
		
		mouseEvent("keyword","¿Qué Evento?");
		mouseEvent("location","Localización");
		mouseEvent("fromDate","Desde");
		mouseEvent("toDate","Hasta");*/
	});
	function check( ){
		var keyword = $("#keyword").val();
		var location = $("#location").val();
		var fromDate = $("#fromDate").val();
		var toDate = $("#toDate").val();
		
		if(keyword == "¿Qué Evento?"){
			$("#keyword").val("");
		}
		
		if("Localización" == location){
			$("#location").val("");
		}
		
		if("Desde" == fromDate){
			$("#fromDate").val("");
		}
		
		if("Hasta" == toDate){
			$("#toDate").val("");
		}
		
		return true;
	}
	function init(){

		if($("#keyword").val() == ""){
			$("#keyword").val("¿Qué Evento?");
		}
	 
		if("" == $("#location").val()){
			$("#location").val("Localización");
		}
		
		if("" == $("#fromDate").val()){
			$("#fromDate").val("Desde");
		}
		
		if("" == $("#toDate").val()){
			$("#toDate").val("Hasta");
		}
	}