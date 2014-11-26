<?php
class AdvertisingService{
	
	public  $dbutil;
    function __construct($dbutil){
	  	$this->dbutil =  $dbutil;
	} 
	 
 
	/**
	* 根据用户名获取用户信息
	* Enter description here ...
	* @param unknown_type $name
	*/
	function getAdminByID($id){
		return $this->dbutil->get_row("select * from advertising where id='".$id."'");
	}
 
	
	
	public function userPage($start , $page_size ){
		$limit ="";
		if($page_size){
			$limit =" limit $start,$page_size ";
		}
		$sql = "select * from advertising order by id $limit";
		return $this->dbutil->get_results($sql);
	
	 
	}
	public function countNum(){
		$sql = "select count(id) countnum from advertising";
    	$resutrnarry=	$this->dbutil->get_results($sql);
    	return $resutrnarry[0]->countnum;
	}
	
	public function addItem($data){
		return	$this->dbutil->insert("advertising", $data);
	}

	public function deleteItem($data){
		$sql = " delete from advertising where id= '$data'";
		return $this->dbutil->get_results($sql);
	}
	public function edit($data,$conditions){
		return $this->dbutil->update("advertising",$data,$conditions);
	}
 
	public function getIndexPage($limit){
		$sql = "SELECT * FROM advertising ORDER BY showindex LIMIT $limit";
		return $this->dbutil->get_results($sql);
	}
	
	
}