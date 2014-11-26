<?php

class EventService {

	public  $dbutil;
	function __construct($dbutil){
		$this->dbutil =  $dbutil;
	}
	
	public  function updateEvent($data,$where){
		$this->dbutil->update("events",$data,$where);
	}
}

