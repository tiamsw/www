<?php /* Smarty version Smarty-3.1.13, created on 2014-09-20 15:36:28
         compiled from "/var/www/templates/admin/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:694602492541d9efc3b5ed2-88673466%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eba14ba626186645a2cd75422d48aec611e1be69' => 
    array (
      0 => '/var/www/templates/admin/footer.tpl',
      1 => 1392316621,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '694602492541d9efc3b5ed2-88673466',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_541d9efc3e47e3_10314077',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541d9efc3e47e3_10314077')) {function content_541d9efc3e47e3_10314077($_smarty_tpl) {?>                    
	
					<footer>
                        <hr>
                         
                    </footer>
				</div>
			</div>
		</div>
    <script src="<?php echo @constant('WEBSITE_URL');?>
/public/assets/lib/bootstrap/js/bootstrap.js"></script>
	
<!--- + -快捷方式的提示 --->
	
<script type="text/javascript">	
	
alertDismiss("alert-success",3);
alertDismiss("alert-info",10);
	
listenShortCut("icon-plus");
listenShortCut("icon-minus");

</script>
  </body>
</html><?php }} ?>