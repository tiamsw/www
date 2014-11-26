<?php
 
class Controller{ 
	public $parame ;
	public $dbutil;
	function __construct(){
	  	
	}
	//when use it,grammer init it
	function getSmarty(){ 
	   $this->smarty = new SmartySetup();  
		return $this->smarty ;
	}
	function getDB(){
		global  $CONFIG; 
	    $this->dbutil = new DbUtil($CONFIG['DB']['db_host'], $CONFIG['DB']['db_user'], $CONFIG['DB']['db_password'], $CONFIG['DB']['db_database']);
	    return $this->dbutil;
	}
	
}