<?php

class TicketService {

	public  $dbutil;
	function __construct($dbutil){
		$this->dbutil =  $dbutil;
	}
	
	public  function updateEvent($data,$where){
		$this->dbutil->update("products",$data,$where);
	}
	
}

?>