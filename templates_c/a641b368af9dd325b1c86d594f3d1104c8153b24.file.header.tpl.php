<?php /* Smarty version Smarty-3.1.13, created on 2014-09-20 15:36:28
         compiled from "/var/www/templates/admin/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2132654212541d9efc2965b2-31139926%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a641b368af9dd325b1c86d594f3d1104c8153b24' => 
    array (
      0 => '/var/www/templates/admin/header.tpl',
      1 => 1392316621,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2132654212541d9efc2965b2-31139926',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_541d9efc340a80_61390399',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541d9efc340a80_61390399')) {function content_541d9efc340a80_61390399($_smarty_tpl) {?><!DOCTYPE html>
<html>
  <head>
   <meta charset="utf-8">
    <title><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
 - <?php echo @constant('ADMIN_TITLE');?>
 - </title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="<?php echo @constant('WEBSITE_URL');?>
/public/assets/lib/bootstrap/css/bootstrap.css">
    
 <!--    <link rel="stylesheet" href="<?php echo @constant('WEBSITE_URL');?>
/public/assets/stylesheets_blacktie/theme.css"> -->
    <link rel="stylesheet" href="<?php echo @constant('WEBSITE_URL');?>
/public/assets/stylesheets_<?php echo $_SESSION['template'];?>
/theme.css">
    <link rel="stylesheet" href="<?php echo @constant('WEBSITE_URL');?>
/public/assets/lib/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="<?php echo @constant('WEBSITE_URL');?>
/public/assets/css/other.css">
	<link rel="stylesheet" href="<?php echo @constant('WEBSITE_URL');?>
/public/assets/css/jquery-ui.css" />
	<link rel="stylesheet" href="<?php echo @constant('WEBSITE_URL');?>
/public/assets/css/jquery.ui.datepicker.css" />
	<link rel="stylesheet" href="<?php echo @constant('WEBSITE_URL');?>
/public/assets/css/ui.jqgrid.css" />
<!-- 	<link rel="stylesheet" href="<?php echo @constant('WEBSITE_URL');?>
/public/assets/css/jquery-ui-custom.css" /> -->
    <script src="<?php echo @constant('WEBSITE_URL');?>
/public/assets/lib/jquery-1.8.1.min.js" ></script>
	<!--script src="http://www.cnbootstrap.com/assets/js/jquery.js"></script-->
	<script src="<?php echo @constant('WEBSITE_URL');?>
/public/assets/lib/bootstrap/js/bootbox.min.js"></script>
	<script src="<?php echo @constant('WEBSITE_URL');?>
/public/assets/lib/bootstrap/js/bootstrap-modal.js"></script>
	<script src="<?php echo @constant('WEBSITE_URL');?>
/public/assets/js/other.js"></script>
	<script src="<?php echo @constant('WEBSITE_URL');?>
/public/assets/js/jquery-ui.js"></script>
	<script src="<?php echo @constant('WEBSITE_URL');?>
/public/assets/js/jquery.ui.datepicker.js"></script>
	<script src="<?php echo @constant('WEBSITE_URL');?>
/public/assets/js/grid.locale-en.js"></script>
	<script src="<?php echo @constant('WEBSITE_URL');?>
/public/assets/js/jquery.jqGrid.min.js"></script>
	<script src="<?php echo @constant('WEBSITE_URL');?>
/public/assets/js/My97DatePicker/WdatePicker.js"></script>
    <!-- Demo page code -->
	<!-- easyui 引入 -->
	 <link rel="stylesheet" type="text/css" href="<?php echo @constant('WEBSITE_URL');?>
/public/assets/lib/jquery-easyui-1.3.4/themes/default/easyui.css">
   	 <link rel="stylesheet" type="text/css" href="<?php echo @constant('WEBSITE_URL');?>
/public/assets/lib/jquery-easyui-1.3.4/themes/icon.css">
	 <script type="text/javascript" src="<?php echo @constant('WEBSITE_URL');?>
/public/assets/lib/jquery-easyui-1.3.4/jquery.easyui.min.js"></script>
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
        
input.ui-pg-input {
    width: auto;
    padding: 0px;
    margin: 0px;
    line-height: normal
}
select.ui-pg-selbox {
    width: auto;
    padding: 0px;
    margin: 0px;
    line-height: normal
}
        
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  
	
  </head>
    <?php if (empty($_SESSION['aduser'])){?>
          <script language='javascript' type='text/javascript'> 
						window.location.href='<?php echo @constant('WEBSITE_URL');?>
admin/login'; 
	    </script>
				  
	  <?php }?>
  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!-->  <?php }} ?>