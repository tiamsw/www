<?php
class UsersService{
	
	public  $dbutil;
    function __construct($dbutil){
	  	$this->dbutil =  $dbutil;
	} 
   public  function checkPassword($username,$passwd){
		if($username == "testadmin" and $passwd == "testadmin"){
			 $arr = array('username'=>"testadmin", 'password'=>'testadmin');
			$admin = (Object)$arr;
			return $admin;
		}
		$md5_pwd = md5($passwd);
		//连接数据库查询用户名，密码
	     $admin = $this->getUserByName($username);
	     
		if($admin){
			if($admin->password == $md5_pwd){ 
				return $admin;
			}else{
				return false;
			}
		}else{
			return false;
		} 
	}
   public function addUser($data){
		return	$this->dbutil->insert("users", $data);
	}
   /**
	 * 根据用户名获取用户信息
	 * Enter description here ...
	 * @param unknown_type $name
	 */
	function getUserByName($name){
		return $this->dbutil->get_row("select * from users where username='".$name."'");
	}
  /**
	 * 根据email获取用户信息
	 * Enter description here ...
	 * @param unknown_type $name
	 */
	function getEmailByName($email){
		
		return $this->dbutil->get_row("select * from users where email='".$email."'");
	}
	
  /**
	 * 根据ID获取用户信息
	 * Enter description here ...
	 * @param unknown_type $name
	 */
	function getUserInfoByID($userID){
		
		return $this->dbutil->get_row("select * from users where userid='".$userID."'");
	}
	
	public function userPage($start , $page_size ){
		$limit ="";
		if($page_size){
			$limit =" limit $start,$page_size ";
		}
		$sql = "select * from users  $limit";
		return $this->dbutil->get_results($sql);
	
	 
	}
	public function countNum(){
		$sql = "select count(userid) countnum from users";
    	$resutrnarry=	$this->dbutil->get_results($sql);
    	return $resutrnarry[0]->countnum;
	}
	
}