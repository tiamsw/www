<?php
class UsersController extends Controller {
	public function index() {
		$this->getSmarty ();
		$this->smarty->display ( "admin/users/users.tpl" );
	}
	public function getpage() {
		$this->getSmarty ();
		require_once SERVICE . DS . 'admin' . DS . 'UsersService.class.php';
		// START 数据库查询及分页数据
		$userService = new UsersService( $this->getDB () );
		$page = isset ( $_POST ['page'] ) ? intval ( $_POST ['page'] ) : 1;
		$rows = isset ( $_POST ['rows'] ) ? intval ( $_POST ['rows'] ) : 10;
		$offset = ($page - 1) * $rows;
		$result = array ();
		$row_count = $userService->countNum ();
		$result ["total"] = $row_count;
		$user_infos = $userService->userPage ( $offset, $rows );
		$result ["rows"] = $user_infos;
		echo json_encode ( $result );
	}
}