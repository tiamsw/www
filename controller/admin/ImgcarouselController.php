<?php
class ImgcarouselController extends Controller {
	public function index() {
		$this->getSmarty ();
		require_once SERVICE . DS . 'admin' . DS . 'ImgcarouserlService.class.php';
		if (! CommonBase::isPost ()) {
			$this->smarty->display ( "admin/users/img_carousel.tpl" );
			return;
		}
		// START 数据库查询及分页数据
		$imgService = new ImgcarouserlService ( $this->getDB () );
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
		$this->smarty->display ( "admin/users/img_carousel.tpl" );
	}
	
	public function add() {
		$this->getSmarty ();
		require_once SERVICE . DS . 'admin' . DS . 'ImgcarouserlService.class.php';
		if (! CommonBase::isPost ()) {
			$this->smarty->display ( "admin/users/img_carousel.tpl" );
			return;
		}
		
		$imgService = new ImgcarouserlService ( $this->getDB () );
		
		
		$id = $_POST ["id"];
		if( empty($id)){
			$input_data = array (
					'id' => md5 ( uniqid () ),
					'title' => $_POST ["title"],
					'url' => $_POST ["url"],
					'imgname' => $_POST ["imgname"],
					'showindex' => $_POST ["showindex"],
					'updatetime' => date ( 'Y-m-d H:i:s' ),
					'product_time' => $_POST ["product_time"],
					'desc' => $_POST ["desc"]
			);
			$data = $imgService->addItem ( $input_data );
		}else{
			$item = $imgService->getAdminByID ( $id );
			$oldimg = $_POST ["imgname"];
			if ($oldimg == $item->imgname) {
			} else {
				unlink ($item->imgname );
			}
			$input_data = array (
					'title' => $_POST ["title"],
					'url' => $_POST ["url"],
					'imgname' => $oldimg,
					'showindex' => $_POST ["showindex"],
					'updatetime' => date ( 'Y-m-d H:i:s' ),
					'product_time' => $_POST ["product_time"],
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
		$this->getSmarty ();
		require_once SERVICE . DS . 'admin' . DS . 'ImgcarouserlService.class.php';
		$imgService = new ImgcarouserlService ( $this->getDB () );
		$id = $_POST ['id'];
		
		$item = $imgService->getAdminByID ( $id );
		unlink ($item->imgname );
		$user_id = $imgService->deleteItem ( $id );
		echo 1;
	}
	
	function test($username, $password) {
		echo 'this is a test function ,username:' . $username . ',password:' . $password;
	}
	
	function getpage() {
		$this->getSmarty ();
		require_once SERVICE . DS . 'admin' . DS . 'ImgcarouserlService.class.php';
		// START 数据库查询及分页数据
		$imgService = new ImgcarouserlService ( $this->getDB () );
		
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