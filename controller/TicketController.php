<?php
class TicketController extends Controller {
	public function index($param) {
		// $fromDate = $_POST["fromDate"];
		// $toDate = $_POST["toDate"];
		// $keyword = $_POST["keyword"];
		// $location = $_POST["location"];
		$keyword = $param ['keyword'];
		$location = $param ['location'];
		$fromDate = $param ['fromDate'];
		$toDate = $param ['toDate'];
		
		$pager = $param ["pager"];
		$pageSize = $param ["pageSize"];
		$cat = $param ["cat"];
		
		if ($pager == null) {
			$pager = 1;
		}
		
		if ($pageSize == null) {
			$pageSize = 10;
		}
		
		if ($cat == null) {
			$cat = "";
		}
		
		// ==================================================
		
		$start = ($pager - 1) * $pageSize;
		$counterSql = "select count(products.aw_product_id) as total from products products LEFT JOIN event_category event_category on products.category_id = event_category.category_id ";
		$recordsSql = "select DATE_FORMAT(products.specifications,\"%W\") as week, DATE_FORMAT(products.specifications,\"%b\") as month, DATE_FORMAT(products.specifications,\"%d\") as date ,DATE_FORMAT(products.specifications,\"%H:%i\") as time ," . "products.aw_product_id, products.product_name,event_category.category_name," . "products.aw_thumb_url,products.display_price,products.promotional_text,products.specifications,products.description from products products " . "LEFT JOIN  event_category event_category  on products.category_id = event_category.category_id ";
		$categorySql = "select event_category.category_id ,event_category.category_name ,products.total from event_category event_category LEFT JOIN " . "(select COUNT(p.category_id) as total,p.category_id from products p ";
		
		$hasWhere = false;
		
		if ($keyword != null && $keyword != "") {
			if (! $hasWhere) {
				$counterSql = $counterSql . " where products.product_name like '%$keyword%' or event_category.category_name = '$keyword' ";
				$recordsSql = $recordsSql . " where products.product_name like '%$keyword%' or event_category.category_name = '$keyword' ";
				$categorySql = $categorySql . " left join event_category e on p.category_id = e.category_id where p.product_name like '%$keyword%' or e.category_name = '$keyword' ";
				$hasWhere = true;
			} else {
				$counterSql = $counterSql . " and products.product_name like '%$keyword%' or event_category.category_name = '$keyword' ";
				$recordsSql = $recordsSql . " and products.product_name like '%$keyword%' or event_category.category_name = '$keyword' ";
				$categorySql = $categorySql . " and p.product_name like '%$keyword%' or e.category_name = '$keyword' ";
			}
		}
		
		if ($cat != null && "" != $cat) {
			if (! $hasWhere) {
				$counterSql = $counterSql . " where products.category_id = '$cat' ";
				$recordsSql = $recordsSql . " where products.category_id = '$cat' ";
				// $categorySql = $categorySql." where category_id = '$cat' ";
				$hasWhere = true;
			} else {
				$counterSql = $counterSql . " and products.category_id = '$cat' ";
				$recordsSql = $recordsSql . " and products.category_id = '$cat' ";
				// $categorySql = $categorySql." and category_id = '$cat' ";
			}
		}
		
		if ($location != null && $location != "") {
			if (! $hasWhere) {
				$counterSql = $counterSql . " where products.promotional_text like '%$location%' ";
				$recordsSql = $recordsSql . " where products.promotional_text like '%$location%' ";
				$categorySql = $categorySql . " where p.promotional_text like '%$location%' ";
				$hasWhere = true;
			} else {
				$counterSql = $counterSql . " and products.promotional_text like '%$location%' ";
				$recordsSql = $recordsSql . " and products.promotional_text like '%$location%' ";
				$categorySql = $categorySql . " and p.promotional_text like '%$location%' ";
			}
		}
		
		if ($fromDate != null && $fromDate != "") {
			if (! $hasWhere) {
				$counterSql = $counterSql . " where  products.specifications > str_to_date('$fromDate','%Y-%m-%d') ";
				$recordsSql = $recordsSql . " where  products.specifications > str_to_date('$fromDate','%Y-%m-%d') ";
				$categorySql = $categorySql . " where  p.specifications > str_to_date('$fromDate','%Y-%m-%d') ";
				$hasWhere = true;
			} else {
				$counterSql = $counterSql . " and products.specifications > str_to_date('$fromDate','%Y-%m-%d') ";
				$recordsSql = $recordsSql . " and products.specifications > str_to_date('$fromDate','%Y-%m-%d') ";
				$categorySql = $categorySql . " and p.specifications > str_to_date('$fromDate','%Y-%m-%d') ";
			}
		}
		
		if ($toDate != null && $toDate != "") {
			if (! $hasWhere) {
				$counterSql = $counterSql . " where products.specifications < str_to_date('$toDate 23:59:59','%Y-%m-%d %H:%i:%s') ";
				$recordsSql = $recordsSql . " where products.specifications < str_to_date($toDate 23:59:59','%Y-%m-%d %H:%i:%s') ";
				$categorySql = $categorySql . " where p.specifications < str_to_date($toDate 23:59:59','%Y-%m-%d %H:%i:%s') ";
				$hasWhere = true;
			} else {
				$counterSql = $counterSql . " and products.specifications < str_to_date('$toDate 23:59:59','%Y-%m-%d %H:%i:%s') ";
				$recordsSql = $recordsSql . " and products.specifications < str_to_date('$toDate 23:59:59','%Y-%m-%d %H:%i:%s') ";
				$categorySql = $categorySql . " and p.specifications < str_to_date('$toDate 23:59:59','%Y-%m-%d %H:%i:%s') ";
			}
		}
		
		$recordsSql = $recordsSql . " order by abs(UNIX_TIMESTAMP(now())- UNIX_TIMESTAMP(products.specifications)) limit $start,$pageSize";
		$categorySql = $categorySql . " GROUP BY p.category_id ) products on products.category_id = event_category.category_id ";
		
		$db = $this->getDB ();
		
		$res = $db->get_results ( $counterSql );
		$records = $res;
		foreach ( $res as $re ) {
			$records = $re->total;
			break;
		}
		
		$res = $db->get_results ( $categorySql );
		
		$cats = array ();
		
		$cats [0] = array (
				"category_id" => '',
				"category_name" => 'All Caegories',
				"total" => 0 
		);
		
		foreach ( $res as $re ) {
			
			$num = $re->total;
			
			if ($num == null) {
				$num = 0;
			}
			
			$cats [] = array (
					"category_id" => $re->category_id,
					"category_name" => $re->category_name,
					"total" => $num 
			);
			
			$cats [0] ['total'] = $cats [0] ['total'] + $num;
		}
		
		$res = $db->get_results ( $recordsSql );
		$data = array ();
		
		$descLen = 40;
		$category_name = "";
		
		foreach ( $res as $re ) {
			
			$desc = $re->description;
			if ($desc != null && strlen ( $desc ) > $descLen) {
				$desc = substr ( $desc, 0, $descLen ) . "... ...";
			}
			
			$data [] = array (
					"week" => $re->week,
					"month" => $re->month,
					"date" => $re->date,
					"time" => $re->time,
					"aw_product_id" => $re->aw_product_id,
					"product_name" => $re->product_name,
					"aw_thumb_url" => $re->aw_thumb_url,
					"category_name" => $re->category_name,
					"promotional_text" => $re->promotional_text,
					"description" => $desc,
					"display_price" => $re->display_price 
			)
			;
			
			$category_name = $re->category_name;
		}
		
		// ============================
		
		$this->getSmarty ();
		
		if ($keyword == null || $keyword == "") {
			$keyword = "¿Qué Evento?";
		}
		if ($location == null || $location == "") {
			$location = "Localización";
		}
		if ($fromDate == null || $fromDate == "") {
			$fromDate = "Desde";
		}
		if ($toDate == null || $toDate == "") {
			$toDate = "Hasta";
		}
		
		$totalPage = ceil ( $records / $pageSize );
		
		$this->smarty->assign ( 'cats', $cats );
		$this->smarty->assign ( 'data', $data );
		$this->smarty->assign ( 'keyword', $keyword );
		$this->smarty->assign ( 'location', $location );
		$this->smarty->assign ( 'fromDate', $fromDate );
		$this->smarty->assign ( 'toDate', $toDate );
		$this->smarty->assign ( 'totalEvent', $records );
		$this->smarty->assign ( 'totalPage', $totalPage );
		$this->smarty->assign ( 'pager', $pager );
		$this->smarty->assign ( 'curCat', $cat );
		$this->smarty->assign ( 'curCategory_name', $category_name );
		
		$display = 9;
		$start = 1;
		$end = 1;
		
		if ($totalPage < $display) {
			$display = $totalPage;
			$end = $totalPage;
		} else {
			
			$start = $pager - floor ( $display / 2 );
			if ($start < 1) {
				$start = 1;
			}
			
			$end = $start + $display - 1;
			if ($end > $totalPage) {
				$end = $totalPage;
			}
			
			$start = $end - $display + 1;
			if ($start < 1) {
				$start = 1;
			}
		}
		$pagers = array ();
		for(; $start <= $end; $start ++) {
			$pagers [] = $start;
		}
		$this->smarty->assign ( 'pagers', $pagers );
		
		$this->smarty->display ( "search_product_list.tpl" );
	}
	public function getAdvertising($param) {
		$db = $this->getDB ();
		$type = $_POST ['type'];
		$site = $_POST ['site'];
		// 加载广告数据
		$adver_s1 = " SELECT * FROM advertising a WHERE TYPE='" . $type . "' ORDER BY a.index LIMIT 4";
		$res_ad_s1 = $db->get_results ( $adver_s1 );
		$result = "<div class='temp'></div>
							<div class='block'>
								<div class='cl'>
									<ul class='slideshow' id='$site'>";
		
		
		$index = 1;
		$lilist;
		foreach ( $res_ad_s1 as $re_s1 ) {
			if (empty ( $re_s1->imgurl )) {
				$re_s1->imgurl = WEBSITE_URL . "uploads/arousel/" . $re_s1->location;
			}
			$result .= " <li style='display:none'><a href='" . $re_s1->url . "'  target='_blank'> <img src='" . $re_s1->imgurl . "'    width='160'height='265' alt='' /></a></li>";
			
			if($index == 1){
				$lilist.="<li class='on'>1</li>";
			}else{
				$lilist.="<li>$index</li>";
			}
			$index++;
		}
		$result .="	</ul> </div> <div class='slidebar' id='side_$site'> <ul> ".$lilist." </ul> </div> </div>";
		echo $result;
	}
	public function info($param) {
		$id = $param ['id'];
		$this->getSmarty ();
		
		$sql = "select DATE_FORMAT(products.specifications,\"%W %d %b %Y %H:%i\") as time,products.aw_product_id, products.product_name,products.category_id," . "event_category.category_name,products.aw_thumb_url,products.aw_image_url,products.display_price,products.promotional_text,products.specifications,products.description " . "from products products LEFT JOIN  event_category event_category  on products.category_id = event_category.category_id where products.aw_product_id = '$id' ";
		
		$db = $this->getDB ();
		$res = $db->get_results ( $sql );
		
		$title = "";
		$category_id = "";
		$category_name = "";
		$product_name = "";
		$promotional_text = "";
		$time = "";
		$aw_image_url = "";
		$description = "No Description";
		$display_price = "";
		
		foreach ( $res as $re ) {
			$category_id = $re->category_id;
			$category_name = $re->category_name;
			$product_name = $re->product_name;
			$promotional_text = $re->promotional_text;
			$time = $re->time;
			$aw_image_url = $re->aw_image_url;
			
			if ($re->description != null && "" != $re->description) {
				$description = $re->description;
			}
			
			$display_price = $re->display_price;
		}
		
		$this->smarty->assign ( 'category_id', $category_id );
		$this->smarty->assign ( 'category_name', $category_name );
		$this->smarty->assign ( 'product_name', $product_name );
		$this->smarty->assign ( 'promotional_text', $promotional_text );
		$this->smarty->assign ( 'time', $time );
		$this->smarty->assign ( 'aw_image_url', $aw_image_url );
		$this->smarty->assign ( 'description', $description );
		$this->smarty->assign ( 'display_price', $display_price );
		
		$this->smarty->assign ( 'keyword', "¿Qué Evento?" );
		$this->smarty->assign ( 'location', "Localización" );
		$this->smarty->assign ( 'fromDate', "Desde" );
		$this->smarty->assign ( 'toDate', "Hasta" );
		
		$this->smarty->assign ( 'id', $id );
		$this->smarty->display ( "product_info.tpl" );
	}
	public function queryById() {
		$id = $_POST ["id"];
		$result = array ();
		
		$sql = "select DATE_FORMAT(products.specifications,\"%W %d %b %Y %H:%i\") as time,products.aw_product_id, products.product_name," . "event_category.category_name,products.aw_thumb_url,products.aw_image_url,products.display_price,products.promotional_text,products.specifications,products.description " . "from products products LEFT JOIN  event_category event_category  on products.category_id = event_category.category_id where products.aw_product_id = '$id' ";
		
		$db = $this->getDB ();
		$res = $db->get_results ( $sql );
		
		foreach ( $res as $re ) {
			$description = "No Description";
			
			if ($re->description != null && "" != $re->description) {
				$description = $re->description;
			}
			
			$result = array (
					"time" => $re->time,
					"aw_product_id" => $re->aw_product_id,
					"category_name" => $re->category_name,
					"promotional_text" => $re->promotional_text,
					"aw_image_url" => $re->aw_image_url,
					"product_name" => $re->product_name,
					"description" => $description,
					"display_price" => $re->display_price 
			);
			break;
		}
		
		echo json_encode ( $result );
	}
	public function buyTickets() {
		$pid = $_POST ["pid"];
		
		$db = $this->getDB ();
		
		$res = $db->get_results ( "select click_count,aw_deep_link from products where aw_product_id='$pid'" );
		
		$result = array (
				"success" => true,
				"res" => false 
		);
		
		$count = 0;
		
		foreach ( $res as $re ) {
			$result = array (
					"success" => true,
					"res" => true,
					"href" => $re->aw_deep_link 
			);
			$count = $re->click_count;
			break;
		}
		
		if ($count == null || $count == "") {
			$count = 0;
		}
		
		$db->update ( "products", array (
				'click_count' => $count + 1 
		), array (
				"aw_product_id" => $pid 
		) );
		echo json_encode ( $result );
	}
	public function addCalendat() {
		$pid = $_POST ["pid"];
		
		$db = $this->getDB ();
		$user = $_SESSION ['user'];
		
		$result = array (
				"success" => true,
				"res" => false 
		);
		
		if ($user != null) {
			$db->insert ( "userentrys", array (
					"userid" => $user->userid,
					"productid" => $pid,
					"entrytype" => 2 
			) );
			$result = array (
					"success" => true,
					"res" => true 
			);
		}
		echo json_encode ( $result );
	}
	public function search($param) {
		$fromDate = $_POST ["fromDate"];
		$toDate = $_POST ["toDate"];
		$keyword = $_POST ["keyword"];
		$location = $_POST ["location"];
		
		$pager = $_POST ["pager"];
		$pageSize = $_POST ["pageSize"];
		$cat = $_POST ["cat"];
		if ($cat == null) {
			$cat = "";
		}
		
		if ($pager == null) {
			$pager = 1;
		}
		
		if ($pageSize == null) {
			$pageSize = 10;
		}
		
		$start = ($pager - 1) * $pageSize;
		$counterSql = "select count(products.aw_product_id) as total from products products LEFT JOIN event_category event_category on products.category_id = event_category.category_id ";
		$recordsSql = "select DATE_FORMAT(products.specifications,\"%W\") as week, DATE_FORMAT(products.specifications,\"%b\") as month, DATE_FORMAT(products.specifications,\"%d\") as date ,DATE_FORMAT(products.specifications,\"%H:%i\") as time ," . "products.aw_product_id, products.product_name,event_category.category_name," . "products.aw_thumb_url,products.display_price,products.promotional_text,products.specifications,products.description from products products " . "LEFT JOIN  event_category event_category  on products.category_id = event_category.category_id ";
		$categorySql = "select event_category.category_id ,event_category.category_name ,products.total from event_category event_category LEFT JOIN " . "(select COUNT(category_id) as total,category_id from products ";
		
		$hasWhere = false;
		
		if ($keyword != null && $keyword != "") {
			if (! $hasWhere) {
				$counterSql = $counterSql . " where products.product_name like '%$keyword%' ";
				$recordsSql = $recordsSql . " where products.product_name like '%$keyword%' ";
				$categorySql = $categorySql . " where product_name like '%$keyword%' ";
				$hasWhere = true;
			} else {
				$counterSql = $counterSql . " and products.product_name like '%$keyword%' ";
				$recordsSql = $recordsSql . " and products.product_name like '%$keyword%' ";
				$categorySql = $categorySql . " and product_name like '%$keyword%' ";
			}
		}
		
		if ($cat != null && "" != $cat) {
			if (! $hasWhere) {
				$counterSql = $counterSql . " where products.category_id = '$cat' ";
				$recordsSql = $recordsSql . " where products.category_id = '$cat' ";
				// $categorySql = $categorySql." where category_id = '$cat' ";
				$hasWhere = true;
			} else {
				$counterSql = $counterSql . " and products.category_id = '$cat' ";
				$recordsSql = $recordsSql . " and products.category_id = '$cat' ";
				// $categorySql = $categorySql." and category_id = '$cat' ";
			}
		}
		
		if ($location != null && $location != "") {
			if (! $hasWhere) {
				$counterSql = $counterSql . " where products.promotional_text like '%$location%' ";
				$recordsSql = $recordsSql . " where products.promotional_text like '%$location%' ";
				$categorySql = $categorySql . " where promotional_text like '%$location%' ";
				$hasWhere = true;
			} else {
				$counterSql = $counterSql . " and products.promotional_text like '%$location%' ";
				$recordsSql = $recordsSql . " and products.promotional_text like '%$location%' ";
				$categorySql = $categorySql . " and promotional_text like '%$location%' ";
			}
		}
		
		if ($fromDate != null && $fromDate != "") {
			if (! $hasWhere) {
				$counterSql = $counterSql . " where  products.specifications > str_to_date('$fromDate','%Y-%m-%d') ";
				$recordsSql = $recordsSql . " where  products.specifications > str_to_date('$fromDate','%Y-%m-%d') ";
				$categorySql = $categorySql . " where  specifications > str_to_date('$fromDate','%Y-%m-%d') ";
				$hasWhere = true;
			} else {
				$counterSql = $counterSql . " and products.specifications > str_to_date('$fromDate','%Y-%m-%d') ";
				$recordsSql = $recordsSql . " and products.specifications > str_to_date('$fromDate','%Y-%m-%d') ";
				$categorySql = $categorySql . " and specifications > str_to_date('$fromDate','%Y-%m-%d') ";
			}
		}
		
		if ($toDate != null && $toDate != "") {
			if (! $hasWhere) {
				$counterSql = $counterSql . " where products.specifications < str_to_date('$toDate 23:59:59','%Y-%m-%d %H:%i:%s') ";
				$recordsSql = $recordsSql . " where products.specifications < str_to_date($toDate 23:59:59','%Y-%m-%d %H:%i:%s') ";
				$categorySql = $categorySql . " where specifications < str_to_date($toDate 23:59:59','%Y-%m-%d %H:%i:%s') ";
				$hasWhere = true;
			} else {
				$counterSql = $counterSql . " and products.specifications < str_to_date('$toDate 23:59:59','%Y-%m-%d %H:%i:%s') ";
				$recordsSql = $recordsSql . " and products.specifications < str_to_date('$toDate 23:59:59','%Y-%m-%d %H:%i:%s') ";
				$categorySql = $categorySql . " and specifications < str_to_date('$toDate 23:59:59','%Y-%m-%d %H:%i:%s') ";
			}
		}
		
		$recordsSql = $recordsSql . " limit $start,$pageSize";
		$categorySql = $categorySql . " GROUP BY category_id ) products on products.category_id = event_category.category_id ";
		
		$db = $this->getDB ();
		
		$res = $db->get_results ( $counterSql );
		$records = $res;
		foreach ( $res as $re ) {
			$records = $re->total;
			break;
		}
		
		$res = $db->get_results ( $categorySql );
		$cats = array ();
		foreach ( $res as $re ) {
			$num = $re->total;
			if ($num == null) {
				$num = 0;
			}
			$cats [] = array (
					"category_id" => $re->category_id,
					"category_name" => $re->category_name,
					"total" => $num 
			);
		}
		
		$res = $db->get_results ( $recordsSql );
		$data = array ();
		
		$descLen = 40;
		foreach ( $res as $re ) {
			
			$desc = $re->description;
			if ($desc != null && strlen ( $desc ) > $descLen) {
				$desc = substr ( $desc, 0, $descLen ) . "... ...";
			}
			
			$data [] = array (
					"week" => $re->week,
					"month" => $re->month,
					"date" => $re->date,
					"time" => $re->time,
					"aw_product_id" => $re->aw_product_id,
					"product_name" => $re->product_name,
					"aw_thumb_url" => $re->aw_thumb_url,
					"category_name" => $re->category_name,
					"promotional_text" => $re->promotional_text,
					"description" => $desc,
					"display_price" => $re->display_price 
			)
			;
		}
		
		$totalPage = ceil ( $records / $pageSize );
		
		$result = array (
				"pager" => $pager,
				"cat" => $cat,
				"totalPage" => $totalPage,
				"counter" => $records,
				"pageSize" => $pageSize,
				"sql" => $recordsSql,
				"data" => $data,
				"categories" => $cats 
		);
		echo json_encode ( $result );
	}
}