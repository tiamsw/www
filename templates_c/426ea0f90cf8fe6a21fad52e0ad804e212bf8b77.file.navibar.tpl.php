<?php /* Smarty version Smarty-3.1.13, created on 2014-09-20 15:36:28
         compiled from "/var/www/templates/admin/navibar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:492113492541d9efc343b44-49829237%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '426ea0f90cf8fe6a21fad52e0ad804e212bf8b77' => 
    array (
      0 => '/var/www/templates/admin/navibar.tpl',
      1 => 1392316622,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '492113492541d9efc343b44-49829237',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_541d9efc3876a0_61517067',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541d9efc3876a0_61517067')) {function content_541d9efc3876a0_61517067($_smarty_tpl) {?>  <body class=""> 
  <!--<![endif]-->
<div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                    <!-- li><a href="#" class="hidden-phone visible-tablet visible-desktop" role="button">Style Template</a></li 
					 
				 
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-cog"></i>设置< class="icon-caret-down"></i>
						</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo @constant('WEBSITE_URL');?>
/admin/index/setting">系统设置</a></li>
                        </ul>
                    </li>
				 -->
					
					<li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Estilo de Plantilla
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="<?php echo @constant('WEBSITE_URL');?>
admin/set/index/?t=default">Defecto</li>
                            <li><a href="<?php echo @constant('WEBSITE_URL');?>
admin/set/index/?t=blacktie">Negra</a></li>
                            <li><a href="<?php echo @constant('WEBSITE_URL');?>
admin/set/index/?t=wintertide">Gris</a></li>
							<li><a href="<?php echo @constant('WEBSITE_URL');?>
admin/set/index/?t=schoolpainting">Verde</a></li>
                        </ul>
                    </li>
					
					<li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> <?php echo $_SESSION['aduser']->user_name;?>

                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            
                            <li><a tabindex="-1" href="<?php echo @constant('WEBSITE_URL');?>
logout.php">Salir<a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="<?php echo @constant('WEBSITE_URL');?>
/index.php"><span class="first"></span> <span class="second"><?php echo @constant('ADMIN_TITLE');?>
</span></a>
        </div>
</div><?php }} ?>