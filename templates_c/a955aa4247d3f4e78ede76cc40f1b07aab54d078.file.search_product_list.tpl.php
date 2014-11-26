<?php /* Smarty version Smarty-3.1.13, created on 2014-09-17 04:41:27
         compiled from "/var/www/templates/search_product_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1656131496541910f7f27272-40142490%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a955aa4247d3f4e78ede76cc40f1b07aab54d078' => 
    array (
      0 => '/var/www/templates/search_product_list.tpl',
      1 => 1392316618,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1656131496541910f7f27272-40142490',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'curCat' => 0,
    'curCategory_name' => 0,
    'cats' => 0,
    'c' => 0,
    'totalEvent' => 0,
    'd' => 0,
    'pager' => 0,
    'pagers' => 0,
    'index' => 0,
    'totalPage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_541910f81824b6_25994002',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541910f81824b6_25994002')) {function content_541910f81824b6_25994002($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo $_smarty_tpl->getSubTemplate ('layouts/title.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link href="<?php echo @constant('WEBSITE_URL');?>
public/style/reset.css"
	type="text/css" rel="stylesheet" />
<link href="<?php echo @constant('WEBSITE_URL');?>
public/style/style.css"
	type="text/css" rel="stylesheet" />
<link rel="stylesheet"
	href="<?php echo @constant('WEBSITE_URL');?>
/public/assets/css/jquery-ui.css" />
<link rel="stylesheet"
	href="<?php echo @constant('WEBSITE_URL');?>
/public/assets/css/jquery.ui.datepicker.css" />

<script
	src="<?php echo @constant('WEBSITE_URL');?>
/public/assets/lib/jquery-1.8.1.min.js"></script>
<script
	src="<?php echo @constant('WEBSITE_URL');?>
/public/assets/js/jquery-ui.js"></script>
<script
	src="<?php echo @constant('WEBSITE_URL');?>
/public/assets/js/jquery.ui.datepicker.js"></script>
<script src="<?php echo @constant('WEBSITE_URL');?>
/public/js/slideshow.js" type="text/javascript"></script>

<script type="text/javascript"> 
	function buyTickets(pid){
		$.post(
			'<?php echo @constant('WEBSITE_URL');?>
ticket/buyTickets',
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
			'<?php echo @constant('WEBSITE_URL');?>
ticket/addCalendat',
			{'pid':pid},
			function(obj){
				if(obj.res){
					alert("success");
				}else{
					window.location.href="<?php echo @constant('WEBSITE_URL');?>
login";
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
		
		if(toDate == null || toDate == undefined || "Desde" == toDate){
			toDate = "";
		}
		
		if(fromDate == null || fromDate == undefined || "Hasta" == fromDate){
			fromDate = "";
		}
		
		window.location.href = url + "&keyword=" + keyword + "&location=" + location + "&fromDate=" + fromDate + "&toDate="+toDate;
	}
 
	var setting = null;
	$(function($) { 
		param={"type":"search1","site":"search1"};
	$.ajax({
		url:"<?php echo @constant('WEBSITE_URL');?>
ticket/getAdvertising",
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
		url:"<?php echo @constant('WEBSITE_URL');?>
ticket/getAdvertising",
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
	      
		     
		var pdata = '<?php echo json_encode($_smarty_tpl->tpl_vars['data']->value);?>
';
	  //(pdata);
	  var regex = /<\S*\s*[\/]?<?php ?>>/gi; 
	  var regex2 = /\n/gi;
	  pdata = pdata.replace(regex, "");
	  pdata = pdata.replace(regex2, ""); 
		  
	//	alert(pdata)
		// eval("var source ="+pdata); 
		//console.log(source);
		//source  = eval('(' + '<?php echo json_encode($_smarty_tpl->tpl_vars['data']->value);?>
' + ')');
		//alert(source)
		loadDatas(eval(pdata),"promotional_text");
	});

 
	function productOver(e){
		showCurrentKeyMarker(e);
	}
	</script>
</head>
<body >
	<?php echo $_smarty_tpl->getSubTemplate ('layouts/headerandsearch.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<div class="mian">
		<div class="content">
			<div class="events">
				<div class="sub-nav">
					<span> <a href="<?php echo @constant('WEBSITE_URL');?>
">Inicio</a> <?php if ($_smarty_tpl->tpl_vars['curCat']->value!=null&&$_smarty_tpl->tpl_vars['curCat']->value!=''){?> / <a
						href="<?php echo @constant('WEBSITE_URL');?>
ticket/index/?cat=<?php echo $_smarty_tpl->tpl_vars['curCat']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['curCategory_name']->value;?>
</a>
						<?php }?>
					</span>
				</div>
				<div class="events-l mt15">
					<div style="width: 190px; height: 265px;"><?php echo $_smarty_tpl->getSubTemplate ("map.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div>
				</div>
				<!--        <img src="<?php echo @constant('WEBSITE_URL');?>
public/photo/photo1.gif" width="160" height="265" class="img-sidebar" /> -->
				<ul id="cat-list" class="gigs-title map">
					<span>Categorías</span> <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
					<li><a
						href="javascript:search('<?php echo @constant('WEBSITE_URL');?>
ticket/index/?cat=<?php echo $_smarty_tpl->tpl_vars['c']->value['category_id'];?>
')"><?php echo $_smarty_tpl->tpl_vars['c']->value['category_name'];?>
(<?php echo $_smarty_tpl->tpl_vars['c']->value['total'];?>
)</a></li>
					<?php } ?>
				</ul>

			</div>
			<div class="events-c2">
				<div class=" gigs_k map">
					<span class="aigs_k_title" id="totalCounter">Se han encontrado
						<?php echo $_smarty_tpl->tpl_vars['totalEvent']->value;?>
 eventos</span> <strong>Ordenado por:</strong> <select
						name="" class="id_3">
						<option>Mejor resultado</option>
					</select>
				</div>
				<table id="list-result" width="100%" border="0" cellspacing="0"
					cellpadding="0">


					<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>

					<tr>
						<td>
							<table width="100%" border="0" cellspacing="0" cellpadding="0"
								class="gigs-table list-tablep">
								<tr>
									<td class="tdC"><?php echo $_smarty_tpl->tpl_vars['d']->value['week'];?>
<br /> <span><?php echo $_smarty_tpl->tpl_vars['d']->value['date'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['d']->value['month'];?>
</span><br />
										<font><?php echo $_smarty_tpl->tpl_vars['d']->value['time'];?>
</font> <!-- <a href="#" class="time2">53 Dates</a>  -->
									</td>
									<td><a
										href="<?php echo @constant('WEBSITE_URL');?>
ticket/info/?id=<?php echo $_smarty_tpl->tpl_vars['d']->value['aw_product_id'];?>
">
											<img src="<?php echo $_smarty_tpl->tpl_vars['d']->value['aw_thumb_url'];?>
" width="92" height="92"
											class="btn" />
									</a></td>
									<td><?php echo $_smarty_tpl->tpl_vars['d']->value['category_name'];?>
<br /> <span> <a
											href="<?php echo @constant('WEBSITE_URL');?>
ticket/info/?id=<?php echo $_smarty_tpl->tpl_vars['d']->value['aw_product_id'];?>
"
											name=<?php echo $_smarty_tpl->tpl_vars['d']->value['aw_product_id'];?>
 onmouseover='productOver(name)'>
												<?php echo $_smarty_tpl->tpl_vars['d']->value['product_name'];?>
 </a>
									</span><br /> <?php echo $_smarty_tpl->tpl_vars['d']->value['promotional_text'];?>
 &nbsp;&nbsp;From:
										<?php echo $_smarty_tpl->tpl_vars['d']->value['display_price'];?>


									</td>
								</tr>
								<tr>
									<td colspan="2">&nbsp;</td>
									<td>
										<p class="mt15">
											<a href="javascript:addCalendat('<?php echo $_smarty_tpl->tpl_vars['d']->value['aw_product_id'];?>
')"
												class="btn btn-range btn-Calendar">Añadir al calendario</a> <a
												href="<?php echo @constant('WEBSITE_URL');?>
buyticket/index/?pid=<?php echo $_smarty_tpl->tpl_vars['d']->value['aw_product_id'];?>
"
												class="back btn btn-black"><strong>Comprar </strong></a>
										</p>
									</td>
								</tr>
							</table>
							<div class="table-xian"></div>
						</td>
					</tr>
					<?php } ?>
					<tr>
						<td><?php if ($_smarty_tpl->tpl_vars['totalEvent']->value!=0){?>
							<p class="mt15 gigs-fy">

								<?php if ($_smarty_tpl->tpl_vars['pager']->value!=1){?> <a
									href="javascript:search('<?php echo @constant('WEBSITE_URL');?>
ticket/index/?cat=<?php echo $_smarty_tpl->tpl_vars['curCat']->value;?>
&pager=1')"
									class="btn-hs btn-Calendar fontcolor">&lt;&lt;</a> <a
									href="javascript:search('<?php echo @constant('WEBSITE_URL');?>
ticket/index/?cat=<?php echo $_smarty_tpl->tpl_vars['curCat']->value;?>
&pager=<?php echo $_smarty_tpl->tpl_vars['pager']->value-1;?>
')"
									class="btn-hs btn-Calendar fontcolor">&lt;</a> <?php }?>

								<?php  $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['index']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pagers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['index']->key => $_smarty_tpl->tpl_vars['index']->value){
$_smarty_tpl->tpl_vars['index']->_loop = true;
?> <a
									href="javascript:search('<?php echo @constant('WEBSITE_URL');?>
ticket/index/?cat=<?php echo $_smarty_tpl->tpl_vars['curCat']->value;?>
&pager=<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
')"
									class="btn-hs btn-Calendar"><?php echo $_smarty_tpl->tpl_vars['index']->value;?>
</a> <?php } ?> <?php if ($_smarty_tpl->tpl_vars['pager']->value!=$_smarty_tpl->tpl_vars['totalPage']->value){?> <a
									href="javascript:search('<?php echo @constant('WEBSITE_URL');?>
ticket/index/?cat=<?php echo $_smarty_tpl->tpl_vars['curCat']->value;?>
&pager=<?php echo $_smarty_tpl->tpl_vars['pager']->value+1;?>
')"
									class="btn-hs btn-Calendar fontcolor">&gt;</a> <a
									href="javascript:search('<?php echo @constant('WEBSITE_URL');?>
ticket/index/?cat=<?php echo $_smarty_tpl->tpl_vars['curCat']->value;?>
&pager=<?php echo $_smarty_tpl->tpl_vars['totalPage']->value;?>
')"
									class="btn-hs btn-Calendar fontcolor">&gt;&gt;</a> <?php }?>


							</p> <span class="fy-size">Showing <?php echo $_smarty_tpl->tpl_vars['pager']->value;?>
 of <?php echo $_smarty_tpl->tpl_vars['totalPage']->value;?>

								pages</span>
						</td> <?php }?>
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
	<?php echo $_smarty_tpl->getSubTemplate ('layouts/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>