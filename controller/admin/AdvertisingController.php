<?php
class AdvertisingController extends Controller {
	public function index() {
		$this->getSmarty ();
		require_once SERVICE . DS . 'admin' . DS . 'AdvertisingService.class.php';
		if (! CommonBase::isPost ()) {
			$this->smarty->display ( "admin/advertising.tpl" );
			return;
		}
		// START 数据库查询及分页数据
		$imgService = new AdvertisingService ( $this->getDB () );
		$page_size = 2;
		$page_no = $page_no < 1 ? 1 : $page_no;
		$row_count = $imgService->countNum ();
		$total_page = $row_count / $page_size == 0 ? $row_count / $page_size : ceil ( $row_count / $page_size );
		$total_page = $total_page < 1 ? 1 : $total_page;
		$page_no = $page_no > ($total_page) ? ($total_page) : $page_no;
		$start = ($page_no - 1) * $page_size;
		
		$user_infos = $imgService->userPage ( $start, $page_size );
		$this->smarty->assign ( 'user_infos', $user_infos );
		$this->smarty->assign ( '_GET', $_POST );
		// $this->smarty->assign ( 'page_no', $page_no );
		// $this->smarty->assign ( 'page_html', $page_html );
		$this->smarty->display ( "admin/advertising.tpl" );
	}
	
	public function add() {
		$this->getSmarty ();
		require_once SERVICE . DS . 'admin' . DS . 'AdvertisingService.class.php';
		if (! CommonBase::isPost ()) {
			$this->smarty->display ( "admin/advertising.tpl" );
			return;
		}
		
		$imgService = new AdvertisingService ( $this->getDB () );
		
		
		$id = $_POST ["id"];
		if( empty($id)){
			$input_data = array (
					'id' => md5 ( uniqid () ),
					'type' => $_POST ["type"],
					'url' => $_POST ["url"],
					'location' => $_POST ["location"],
					'index' => $_POST ["index"],
					'imgurl' => $_POST ["imgurl"],
					'desc' => $_POST ["desc"]
			);
			$data = $imgService->addItem ( $input_data );
		}else{
			$item = $imgService->getAdminByID ( $id );
			$oldimg = $_POST ["location"];
			if ($oldimg == $item->location) {
			} else {
				$dirroot = "uploads/arousel/";
				unlink ($dirroot.$item->location );
			}
			$input_data = array (
					'type' => $_POST ["type"],
					'url' => $_POST ["url"],
					'location' => $_POST ["location"],
					'index' => $_POST ["index"],
					'imgurl' => $_POST ["imgurl"],
					'desc' => $_POST ["desc"]
			);
			
			$input_condition = array (
					'id' => $_POST ["id"]
			);
			$data = $imgService->edit ( $input_data, $input_condition );
		}
		echo "1";
	}
	
	 
	public function delete() {
		$dirroot = "uploads/arousel/";
		$this->getSmarty ();
		require_once SERVICE . DS . 'admin' . DS . 'AdvertisingService.class.php';
		$imgService = new AdvertisingService ( $this->getDB () );
		$id = $_POST ['id'];
		$item = $imgService->getAdminByID ( $id );
		if(file_exists($dirroot.$item->location)){
			unlink ($dirroot.$item->location);
		}
		$user_id = $imgService->deleteItem ( $id );
		echo 1;
	}
	
	function test($username, $password) {
		echo 'this is a test function ,username:' . $username . ',password:' . $password;
	}
	
	function getpage() {
		$this->getSmarty ();
		require_once SERVICE . DS . 'admin' . DS . 'AdvertisingService.class.php';
		// START 数据库查询及分页数据
		$imgService = new AdvertisingService ( $this->getDB () );
		
		$page = isset ( $_POST ['page'] ) ? intval ( $_POST ['page'] ) : 1;
		$rows = isset ( $_POST ['rows'] ) ? intval ( $_POST ['rows'] ) : 10;
		$offset = ($page - 1) * $rows;
		$result = array ();
		$row_count = $imgService->countNum ();
		$result ["total"] = $row_count;
		$user_infos = $imgService->userPage ( $offset, $rows );
		$items = array ();
		// while($row = $user_infos->fetch_assoc()){
		// print ($row);
		// array_push($items, $row);
		// }
		$result ["rows"] = $user_infos;
		echo json_encode ( $result );
		// $this->smarty->display("admin/user_list.tpl");
	}

}