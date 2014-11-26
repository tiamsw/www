<?php
class UserEventService{
	
	public  $dbutil;
	
	function __construct($dbutil){
		$this->dbutil =  $dbutil;
	}
	
	/**
	 * 获取用户所有票务事件以及自定义事件
	 */
	public function getAllUserEvent(){
		$sql = "select p.aw_product_id id,p.product_name ename,p.merchant_image_url imgurl,valid_from fromtime,valid_to totime ,promotional_text descr,ec.category_name from userentrys ue join products p ".
		"left join event_category ec  on p.category_id = ec.category_id where ue.entrytype=2 and ue.productid=p.aw_product_id".
		" union all select e.entryid id,e.entrytitle ename,e.entryimg imgurl,e.entryfrom fromtime,entryto totime,entrynote descr ,null from userentrys ue,entry e where ue.entrytype=1 and ue.entryid=e.entryid ";
		
		return $this->dbutil->get_results($sql);
		
		//getCustom event;
// 		$sql = "select e.entryid id,e.entrytitle ename,e.entryimg imgurl,e.entryfrom fromtime,entryto totime,entrynote descr  from userentrys ue,entry e where ue.entrytype=1 and ue.entryid=e.entryid";
// 		$customEvent = $this->dbutil->get_results($sql);
		
		//getProduct event
// 		$sql ="select p.aw_product_id id,p.product_name ename,p.merchant_image_url imgurl,valid_from fromtime,valid_to totime ,promotional_text descr,ec.category_name from userentrys ue join products p left join event_category ec  on p.category_id = ec.category_id where ue.entrytype=2 and ue.productid=p.aw_product_id";
// 		$product = $this->dbutil->get_results($sql);
// 		return array_merge($product,$customEvent);
			
	}
}

?>