<div id="head">
	<div>
        <span class="index-manage"><a href="{{$smarty.const.WEBSITE_URL}}carlendar"><font color="f7931d">Organiza</font> tu agenda +</a></span>
        <ul>
           {{if empty($smarty.session.user) }}
            <li>
                <a href="{{$smarty.const.WEBSITE_URL}}register" class="input-style">Registro</a>
                <a href="{{$smarty.const.WEBSITE_URL}}login" class="input-style1">Entrar</a>
            </li>
            {{else}}
          <li class="navuserlogin">
                <span class="username"><div>{{$smarty.session.user->username}}</div><span>0</span></span>
                <a href="{{$smarty.const.WEBSITE_URL}}login/loginout"  class="btn btn-range btn-Calendar out">Salir</a>             </li>
            {{/if}}
            
            <li class="navlist">
                <a href="{{$smarty.const.WEBSITE_URL}}carlendar">
                    TU &nbsp; CALENDARIO<br /> 
                    <font>Programa  &nbsp; tus  &nbsp; Eventos</font>
                </a>
            </li>
            <li class="navlist">
                <a href="{{$smarty.const.WEBSITE_URL}}ticket">
                    EVENTOS<br /> 
                    <font>&iexcl;Descubrelos!</font>
                </a>
            </li>
            <li class="navlogo">
                <a href="{{$smarty.const.WEBSITE_URL}}"><img src="{{$smarty.const.WEBSITE_URL}}public/images/logo.png" class="index-logo" /></a>
            </li>
        </ul>
    </div>
</div>
<script  type="text/javascript">
$(function($) {  
	
	function mouseEvent(objId,objVal){
		   
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
		mouseEvent("toDate","Hasta");
});
function check( form ){
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
	//alert($("#keyword").val());
	return true;
}
		
			</script>
<div class="search">
	<div>
    	<div><form action="{{$smarty.const.WEBSITE_URL}}ticket/index/" name="searchform" method="get" class="clase_tabla">
            	<table>
                	<tr>
                    	
						
						<td><font class="fontstyle">Busca&nbsp;&nbsp;un&nbsp;&nbsp;evento</font></td>
                    	<td><input type="text" placeholder="¿Qué Evento?" name="keyword" id="keyword" value="{{$keyword}}" class="searchinput textinput-w" tabindex=3 /></td>
                        <td><input type="text" placeholder="Localización" name="location" id="location" value="{{$location}}" class="searchinput textinput-w" tabindex=4/></td>
                        <td><font class="fontstyle">Fecha</font></td>
						<td><input type="text" placeholder="Desde" name="fromDate" id="fromDate" value="{{$fromDate}}" onchange="setting()" readonly="readonly" class="searchinput textinput-w2" tabindex=5/></td>
                        <td><input type="text" placeholder="Hasta" name="toDate" id="toDate" value="{{$toDate}}" onchange="setting()" readonly="readonly" class="searchinput textinput-w2" tabindex=6/></td>
                        <td><input type="submit"   value="BuscaTickets" onclick="check(this)" class="input-style2" /></td>
						
                    </tr>
                </table>
               </form>
        </div>
    </div>
</div>