<?php
class RegisterController extends  Controller{
	public function index(){ 
	 $smaryt = $this->getSmarty();
		 //如果不是post方式的提交，直接转向
		 if(!CommonBase::isPost()){
		 	 $this->smarty->display("register.tpl"); 
		 	return;
		 }
		  $email = $_POST ["email"];
		 if(empty($email)){
		 		$this->smarty->assign("errortip",$this->userExsist('you must write register form!!!!'));
		 		
		     	$this->smarty->display("register.tpl"); 
		 }
		 require_once SERVICE . DS . 'admin' . DS . 'UsersService.class.php';
		 $userService = new UsersService( $this->getDB());
		
		 $user = $userService->getEmailByName($email);
		  
		 if(!empty($user->usrname)){
		 	 
		 	$this->smarty->assign("errortip",$this->userExsist('this user has all ready exsist!!!!'));
		 	$this->smarty->display("register.tpl"); 
		 	return ;
		 }
		 
		  $user = array(
		        'userid' => md5(uniqid()), 
		  	    'username' => $_POST["username"],
				'password' => md5($_POST["password"] ),
				'firstname' => $_POST["lastname"],
				'lastname' => $_POST["lastname"],
				'email' => $_POST["email"],
				'birthdate' =>date("Y-m-d H:i:s",mktime(0,0,0,$_POST["month"],$_POST["day"],$_POST["year"])) 
		  );
		   $userService->addUser($user);
		   
		    require_once COMMON.DS.'SendMailUtil.class.php';
            SendMailUtil::sendmail("welcome register search4gigs",$_POST["username"].",regiter success",$email);
            
		    $this->smarty->assign("errortip",$this->userSuccess(' register success!!!!'));
		 	$this->smarty->display("register.tpl"); 
 		
	}
   public function handreg(){ 
		 $this->getSmarty(); 
		
		
		 
		 
 		 
	}
  public function userExsist($msg){
  	return "<div class='alert alert-error'>$msg</div>";
  }
 public function userSuccess($msg){
  	return "<div class='alert alert-success'>$msg</div>";
  }
  
  public  function addUser4FaceBook(){
  	 $this->getSmarty(); 
  	 require_once SERVICE . DS . 'admin' . DS . 'UsersService.class.php';
	 $userService = new UsersService( $this->getDB());
	 $userID = $_POST["userid"];
  	 $user_info = $userService->getUserInfoByID($userID);

	 if(empty($user_info)){
	 		//不存在，就天添加用户
	  	 $user = array(
			        'userid' => $_POST["userid"], 
			  	    'username' => $_POST["username"],
			/*		'password' => md5($_POST["password"] ),*/
					'firstname' => $_POST["firstname"],
					'lastname' => $_POST["lastname"],
					'email' => $_POST["email"],
	  	 			'desc' => $_POST["desc"]
					/*,
					'birthdate' =>date("Y-m-d H:i:s",mktime(0,0,0,$_POST["month"],$_POST["day"],$_POST["year"])) */
	  	 );
	  	 $userService->addUser($user);
  		 $user_info = (object)$user;
	 }
  	 $_SESSION['user'] = $user_info;
  	 echo "OK";
  }
}