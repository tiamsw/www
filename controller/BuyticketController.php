<?php
class BuyticketController extends  Controller{
	public function index($params){ 
		$pid = $params['pid'];   
		$db = $this->getDB(); 
		$res = $db->get_results("select click_count,aw_deep_link from products where aw_product_id='$pid'"); 
		$count = 0; 
		$result = array();
		foreach ($res as $re){
			$result = array("href"=>$re->aw_deep_link);
			$count = $re->click_count;
			break;
		} 
		if($count == null || $count == ""){
			$count = 0;
		} 
		$db->update("products", array('click_count'=>$count+1), array("aw_product_id"=>$pid));
		 
		$this->getSmarty(); 
		$this->smarty->assign ( 'ticketurl', $result['href'] ); 
 		$this->smarty->display("buyticket.tpl"); 
	}
	
   
}