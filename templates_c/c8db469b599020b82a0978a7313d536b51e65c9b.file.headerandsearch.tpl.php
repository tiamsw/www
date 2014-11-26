<?php /* Smarty version Smarty-3.1.13, created on 2014-09-17 03:36:27
         compiled from "/var/www/templates/layouts/headerandsearch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:138606897541901bb277a73-70515162%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8db469b599020b82a0978a7313d536b51e65c9b' => 
    array (
      0 => '/var/www/templates/layouts/headerandsearch.tpl',
      1 => 1392316623,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138606897541901bb277a73-70515162',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'keyword' => 0,
    'location' => 0,
    'fromDate' => 0,
    'toDate' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_541901bb2cccd8_08879801',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541901bb2cccd8_08879801')) {function content_541901bb2cccd8_08879801($_smarty_tpl) {?><div id="head">
	<div>
        <span class="index-manage"><a href="<?php echo @constant('WEBSITE_URL');?>
carlendar"><font color="f7931d">Organiza</font> tu agenda +</a></span>
        <ul>
           <?php if (empty($_SESSION['user'])){?>
            <li>
                <a href="<?php echo @constant('WEBSITE_URL');?>
register" class="input-style">Registro</a>
                <a href="<?php echo @constant('WEBSITE_URL');?>
login" class="input-style1">Entrar</a>
            </li>
            <?php }else{ ?>
          <li class="navuserlogin">
                <span class="username"><div><?php echo $_SESSION['user']->username;?>
</div><span>0</span></span>
                <a href="<?php echo @constant('WEBSITE_URL');?>
login/loginout"  class="btn btn-range btn-Calendar out">Salir</a>             </li>
            <?php }?>
            
            <li class="navlist">
                <a href="<?php echo @constant('WEBSITE_URL');?>
carlendar">
                    TU &nbsp; CALENDARIO<br /> 
                    <font>Programa  &nbsp; tus  &nbsp; Eventos</font>
                </a>
            </li>
            <li class="navlist">
                <a href="<?php echo @constant('WEBSITE_URL');?>
ticket">
                    EVENTOS<br /> 
                    <font>&iexcl;Descubrelos!</font>
                </a>
            </li>
            <li class="navlogo">
                <a href="<?php echo @constant('WEBSITE_URL');?>
"><img src="<?php echo @constant('WEBSITE_URL');?>
public/images/logo.png" class="index-logo" /></a>
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
    	<div><form action="<?php echo @constant('WEBSITE_URL');?>
ticket/index/" name="searchform" method="get" class="clase_tabla">
            	<table>
                	<tr>
                    	
						
						<td><font class="fontstyle">Busca&nbsp;&nbsp;un&nbsp;&nbsp;evento</font></td>
                    	<td><input type="text" placeholder="¿Qué Evento?" name="keyword" id="keyword" value="<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
" class="searchinput textinput-w" tabindex=3 /></td>
                        <td><input type="text" placeholder="Localización" name="location" id="location" value="<?php echo $_smarty_tpl->tpl_vars['location']->value;?>
" class="searchinput textinput-w" tabindex=4/></td>
                        <td><font class="fontstyle">Fecha</font></td>
						<td><input type="text" placeholder="Desde" name="fromDate" id="fromDate" value="<?php echo $_smarty_tpl->tpl_vars['fromDate']->value;?>
" onchange="setting()" readonly="readonly" class="searchinput textinput-w2" tabindex=5/></td>
                        <td><input type="text" placeholder="Hasta" name="toDate" id="toDate" value="<?php echo $_smarty_tpl->tpl_vars['toDate']->value;?>
" onchange="setting()" readonly="readonly" class="searchinput textinput-w2" tabindex=6/></td>
                        <td><input type="submit"   value="BuscaTickets" onclick="check(this)" class="input-style2" /></td>
						
                    </tr>
                </table>
               </form>
        </div>
    </div>
</div><?php }} ?>