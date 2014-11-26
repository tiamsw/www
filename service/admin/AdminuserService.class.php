<?php
class AdminuserService{
	
	public  $dbutil;
    function __construct($dbutil){
	  	$this->dbutil =  $dbutil;
	} 
	public  function checkPassword($username,$passwd){
		$md5_pwd = md5 ( $passwd );
		//连接数据库查询用户名，密码
	     $admin = $this->getAdminByName($name);
		if($admin){
			if($admin->passwd == $password){
				return $admin;
			}else{
				return false;
			}
		}else{
			return false;
		}
		 
		return $admin; 
	}
/**
	 * 根据用户名获取用户信息
	 * Enter description here ...
	 * @param unknown_type $name
	 */
	function getAdminByName($name){
		return $this->dbutil->get_row("select * from admin_users where user_name='".$name."'");
	}
	/**
	* 根据用户名获取用户信息
	* Enter description here ...
	* @param unknown_type $name
	*/
	function getAdminByID($id){
		return $this->dbutil->get_row("select * from admin_users where id='".$id."'");
	}
	/**
	 * 检查登录
	 * @param unknown_type $name
	 * @param unknown_type $password
	 */
	function checkLogin($name, $password){
		$admin = $this->getAdminByName($name);
		if($admin){
			if($admin->admin_passwd == $password){
				return $admin;
			}else{
				return false;
			}
		}else{
			return false;
		}
		
	}
	
	
	public function userPage($start , $page_size ){
		$limit ="";
		if($page_size){
			$limit =" limit $start,$page_size ";
		}
		$sql = "select * from admin_users order by id $limit";
		return $this->dbutil->get_results($sql);
	
	 
	}
	public function countNum(){
		$sql = "select count(id) countnum from admin_users";
    	$resutrnarry=	$this->dbutil->get_results($sql);
    	return $resutrnarry[0]->countnum;
	}
	
	public function addAdUser($data){
		return	$this->dbutil->insert("admin_users", $data);
	}

	public function deleteUser($data){
		$sql = " delete from admin_users where id= $data";
		return $this->dbutil->get_results($sql);
	}
	public function edit($data,$conditions){
		return $this->dbutil->update("admin_users",$data,$conditions);
	}
	
}