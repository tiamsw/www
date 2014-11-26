<?php
class LoginController extends  Controller{
	public function index(){ 
			 $smaryt = $this->getSmarty();
			 //如果不是post方式的提交，直接转向
			 if(!CommonBase::isPost()){
			 	$this->smarty->display("login.tpl"); 
			 	return;
			 }
			  
			 $user_name = $password = $remember;
		     extract ( $_POST, EXTR_IF_EXISTS );  
			 require_once SERVICE.DS.'admin'.DS.'UsersService.class.php';
			 $userSerivce = new UsersService($this->getDB());
			 $user_info = $userSerivce->checkPassword($user_name, $password );
		       
			if (!empty($user_info->username)) { 
				$_SESSION['user'] = $user_info;
				$url = WEBSITE_URL."index";  
	     	        	 	$redirect = "<script language='javascript' type='text/javascript'>";  
							$redirect .= "window.location.href='$url'";  
							$redirect .= "</script>";  
					echo $redirect;
			 
			 }else{ 
				 $this->smarty->assign("errortip",$this->userExsist("username or password error"));   
			 } 
			 $this->smarty->display("login.tpl"); 
	 }
	   public function userExsist($msg){
	  	  return "<div class='alert alert-error'>$msg</div>";
	  }
	  public function loginout(){
	  	   $_SESSION['user'] = null; 
			$url = WEBSITE_URL."index";  
	     	        	 	$redirect = "<script language='javascript' type='text/javascript'>";  
							$redirect .= "window.location.href='$url'";  
							$redirect .= "</script>";  
					echo $redirect;
		 
	  }
	  public function testsendmail(){
	    	echo "send";
	  	 require_once COMMON.DS.'SendMailUtil.class.php'; 
         SendMailUtil::sendmail("welcome register search4gigs","superyuyue".",regiter success","superyuyue@126.com");
	  }
   
}