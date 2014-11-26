<?php
class LoginController extends  Controller{
	
	public function index(){ 
		 $smaryt = $this->getSmarty();
		 //如果不是post方式的提交，直接转向
		 if(!CommonBase::isPost()){
		 	$this->smarty->display("admin/login.tpl"); 
		 	return;
		 }
		  
		 $user_name = $password = $remember = $verify_code = '';
	     extract ( $_POST, EXTR_IF_EXISTS ); 
		 
		 if(strtolower($verify_code) != strtolower($_SESSION['osa_verify_code'])){
		    $alert_html = HtmlWrap::alert("error",ErrorMessage::VERIFY_CODE_WRONG); 
			$this->smarty->assign("admin_action_alert",$alert_html);   
		 }else{
		 	
		 	require_once SERVICE.DS.'admin'.DS.'UserService.class.php';
		 	$userSerivce = new UserService($this->getDB());
		 	$user_info = $userSerivce->checkPassword ( $user_name, $password );
		
				if ($user_info) { 
					//可以处理其他用户登录以后的事情
					//可以处理用户登录日志 
					echo "";
					$_SESSION['aduser']=$user_info; 
					$url = WEBSITE_URL."admin/index";  
	     	        	 	$redirect = "<script language='javascript' type='text/javascript'>";  
							$redirect .= "window.location.href='$url'";  
							$redirect .= "</script>";  
					echo $redirect;
				}else{
					$alert_html = HtmlWrap::alert("error",ErrorMessage::USER_OR_PWD_WRONG); 
					$this->smarty->assign("osadmin_action_alert",$alert_html);   
				}
			 
 		 }
		  
		 $this->smarty->display("admin/login.tpl"); 
	}
	 
}