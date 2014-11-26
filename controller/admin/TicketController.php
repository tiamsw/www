<?php


class TicketController extends Controller{
 
	public function index($param){
		$this->getSmarty();
		
		$event_id = $param[0];
		if($event_id == null){
			$event_id = "";
		} 
		$this->smarty->assign ('event_id',$event_id);
		
		//$this->smarty->assign ( 'web_root' , WEBSITE_URL);
		$this->smarty->display("admin/ticket/ticket.tpl");
		
	}
	
	public function queryCategory(){

		$result = array();
		
		$db = $this->getDB();
		
		$res = $db->get_results(" select category_id,category_name from event_category ");
		
		foreach ($res as $re){
			$result[] = array($re->category_id,$re->category_name);
		}
		echo json_encode($result);
	}
	
	public function queryTicket(){
		
		require_once PROJECT.DS.'framework'.DS."util".DS.'JQGridFilterUtil.php';
		
		//页码
		$page = $_POST["page"];
		if($page == null ){
			$page = $_GET["page"];
		}
		
		//每页显示记录数
		$rows = $_POST["rows"];
		if($rows == null ){
			$rows = $_GET["rows"];
		}
		
		$start = ($page-1)*$rows ;
		$end = $page*$rows;
		
		
		//排序索引id
		$sidx = $_POST["sidx"];
		if($sidx == null ){
			$sidx = $_GET["sidx"];
		}
		
		//排序顺序
		$sord = $_POST["sord"];
		if($sord == null ){
			$sord = $_GET["sord"];
		}
		
		//活动id
		$event_id = $_POST["event_id"];
		if($event_id == null ){
			$event_id = $_GET["event_id"];
		}
		
		$filtersStr = $_POST["filters"];
		if($filtersStr == null){
			$filtersStr = $_GET["filters"];
		}
		
		$config = array(
				"products.product_name"=>JQGridFilterUtil::$STRING,
				"aw_product_id"=>JQGridFilterUtil::$STRING,
				"event_category.category_id"=>JQGridFilterUtil::$STRING,
				"products.display_price"=>JQGridFilterUtil::$FLOAT,
				"products.promotional_text"=>JQGridFilterUtil::$STRING,
				"products.specifications"=>JQGridFilterUtil::$DATE
		);
		
		$where = JQGridFilterUtil::toSqlWhere($filtersStr,$config);
		
		$counterSql = "select count(products.aw_product_id) as total from products products LEFT JOIN event_category event_category on products.category_id = event_category.category_id " ;
		$recordsSql = "select products.aw_product_id, products.product_name,event_category.category_name,".
			"products.aw_thumb_url,products.display_price,products.promotional_text,products.specifications from products products ".
			"LEFT JOIN  event_category event_category  on products.category_id = event_category.category_id ";

		$eventkey = " and "; 
		
		if(!is_null($where) && $where != ""){
			$counterSql = $counterSql." where ".$where;
			$recordsSql = $recordsSql." where ".$where;
		}else{
			$eventkey = " where " ;
		}
		
		if($event_id != null && "" != $event_id){
			$counterSql = $counterSql.$eventkey." products.parent_product_id = '".$event_id."' ";
			$recordsSql = $recordsSql.$eventkey." products.parent_product_id = '".$event_id."' ";
		}
		
		if($sidx != null && $sidx != "" && $sord != null && $sord != ""){
			$recordsSql = $recordsSql." order by $sidx $sord ";
		}
		
		$recordsSql = $recordsSql." limit $start ,$rows" ; 
		
		
		
		$db = $this->getDB();
		
		$res = $db->get_results($counterSql);
		$records = $res;
		foreach ($res as $re){
			$records = $re->total;
			break;
		}		
		
		$res = $db->get_results($recordsSql);
		
		$data = array();
		
		foreach ($res as $re){
			$data[] = array(
					"id"=>$re->aw_product_id,
					"cell"=>array(
					$re->aw_product_id,$re->product_name,$re->category_name,$re->aw_thumb_url,$re->display_price,$re->promotional_text,$re->specifications)
			);
		}
		
		$totalPage = ceil($records/$rows);
		
		$result = array(
				"rows"=>$data,
				"page"=>$page,
				"total"=>$totalPage,
				"records"=>$records);
		
		echo json_encode($result);
	}
	
	function showproductinfo(){
		$id = $_POST["id"];
		$result = array();
		
		$sql = "select products.*,event_category.category_name category_name ".
			"from products products LEFT JOIN  event_category event_category  on products.category_id = event_category.category_id where products.aw_product_id = '$id' ";
		
		$db = $this->getDB();
		$res = $db->get_results($sql);
		
		foreach ($res as $re){
			$result =  array(
					"aw_product_id"=>$re->aw_product_id,
					"product_name"=>$re->product_name,
					"product_type"=>$re->product_type,
					"aw_deep_link"=>$re->aw_deep_link,
					"aw_image_url"=>$re->aw_image_url,
					"aw_thumb_url"=>$re->aw_thumb_url,
					"description"=>$re->description,
					"display_price"=>$re->display_price,
					"in_stock"=>$re->in_stock,
					"is_hot_pick"=>$re->is_hot_pick,
					"is_for_sale"=>$re->is_for_sale,
					"language"=>$re->language,
					"parent_product_id"=>$re->parent_product_id,
					"promotional_text"=>$re->promotional_text,
					"specifications"=>$re->specifications,
					"stock_quantity"=>$re->stock_quantity,
					"valid_from"=>$re->valid_from,
					"valid_to"=>$re->valid_to,
					"merchant_image_url"=>$re->merchant_image_url,
					"merchant_thumb_url"=>$re->merchant_thumb_url,
					"merchant_id"=>$re->merchant_id,
					"ean"=>$re->ean,
					"click_count"=>$re->click_count
					 
			);
			break;
		}
		
		echo json_encode($result);
	}
}