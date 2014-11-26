<?php
class UsereventController extends  Controller{
	public function index(){ 
		 $this->getSmarty(); 
 		 $this->smarty->display("usercarlendar_event_list.tpl"); 
	}
	
	/**
	 * 获取用户所有票务事件以及自定义事件
	 */
	public function getAllUserEvent(){
		require_once SERVICE . DS . 'UserEventService.class.php';
		$service = new UserEventService($this->getDB ());
	
		echo json_encode($service->getAllUserEvent());
	}
   
}