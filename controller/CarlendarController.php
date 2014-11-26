<?php
class CarlendarController extends Controller {
	public function index() {
		$user = $_SESSION ['user'];
		if (empty ( $user->username )) {
			$url = WEBSITE_URL . "login";
			$redirect = "<script language='javascript' type='text/javascript'>";
			$redirect .= "window.location.href='$url'";
			$redirect .= "</script>";
			echo $redirect;
		}
		$this->getSmarty ();
		$this->smarty->display ( "usercarlendar.tpl" );
	}
	public function getAgenda() {
		require_once SERVICE . DS . 'CarlendarService.class.php';
		$service = new CarlendarService ( $this->getDB () );
		
		$userId = $_SESSION ['user']->userid;
		
		$res = $service->getAgendaList ($userId);
		
		$data;
		foreach ( $res as $re ) {
			$desc = $re->entrynote;
			if ($desc != null && strlen ( $desc ) > $descLen) {
				$desc = substr ( $desc, 0, $descLen ) . "... ...";
			}
			
 			$color = #fb7b0e;
			$img;
			//t.entryid,t.entrytype,t.entrytitle,t.entryimg, t.entrylocation, t.entrynote
			if( $re->entrytype ==1){
				//自定义
				$img = WEBSITE_URL."uploads/arousel/".$re->entryimg;
				$color = '#195cc0';
			}else if($re->entrytype ==2){
				$img =$re->entryimg;
				$color = '#fb7b0e';
			}
			$data [] = array (
					"week" => $re->week,
					"month" => $re->month,
					"date" => $re->date,
					"time" => $re->time,
					"aw_product_id" => $re->entryid,
					"product_name" => $re->entrytitle,
					"aw_thumb_url" => $img,
					"promotional_text" => $re->entrylocation,
					"description" => $desc,
					"color" => $color,
					"type" =>$re->entrytype
			);
		}
		
		$return = "<table id='list-result' width='100%' border='0' cellspacing='0'
				cellpadding='0'>";
		if(is_array($data)){
			foreach( $data as $d ) {
				
				$return .= "<tr>
					<td>
					<table width='100%' border='0' cellspacing='0' cellpadding='0'
							class='gigs-table list-tablep'>
							<tr>
							<td class='tdC'>" . $d ['week'] . "<br /> <span>" . $d ['date'] . "&nbsp;" . $d ['month'] . "</span><br />
							<font>" . $d ['time'] . "</font> <!-- <a href='#' class='time2'>53 Dates</a>  -->
							</td>
							<td><a
							href='" . WEBSITE_URL . "ticket/info/?id=" . $d ['aw_product_id'] . "'>
									<img src='" . $d ['aw_thumb_url'] . "' width='92' height='92'
							class='btn' />
							</a></td>
							<td>" . $d ['category_name'] . "<br /> <span> <a style='color:".$d['color']."'  href='#'
							 onclick='showAngdeDetail(".$d['aw_product_id'].",".$d['type'].")'
							name=" . $d ['aw_product_id'] . "  >" . $d ['product_name'] . " </a>
							</span><br /> " . $d ['promotional_text'] . "  
							 
							</td> </tr> </table> <div class='table-xian'></div> </td> </tr>";
			} 
		}else{
			$return .= "<tr><td> you don't have Agenda</td> </tr>";
		}
		$return .= "</table > ";
		echo $return;
		// $this->getSmarty ();
		// $this->smarty->assign ( 'listdatas', $return );
		// $this->smarty->display ( "usercarlendar.tpl" );
	}
	/**
	 * 新增日历事件
	 *
	 * @param unknown $params        	
	 */
	public function addEvent() {
		$dirroot = "uploads/arousel/";
		require_once SERVICE . DS . 'CarlendarService.class.php';
		$service = new CarlendarService ( $this->getDB () );
		$type = $_POST ['type'];
		$entry = $_POST ['entry'];
		$productid = $_POST ['productid'];
		$userid = $_SESSION ['user']->userid;
		
		$entry = json_decode ( json_encode ( $entry ) );
		if (empty ( $entry->entryimg ) || $entry->entryimg == null) {
			$entry->entryimg = $dirroot . 'default.jpg';
		}
		if ($type == 1) {
			// 自定义事件
			echo $service->saveCustomEvent ( $entry, $userid );
		} else {
			echo $service->saveuserentrys ( $productid, $userid );
		}
	}
	
	/**
	 * 显示事件到日历
	 */
	public function getUserCalEvent() {
		if (empty ( $_SESSION ['user'] )) {
			return;
		}
		$userid = $_SESSION ['user']->userid;
		
		require_once SERVICE . DS . 'CarlendarService.class.php';
		$service = new CarlendarService ( $this->getDB () );
		$userevents = $service->getUserCalEvent ( $userid );
		echo json_encode ( $userevents );
	}
	public function editeComEventNote() {
		if (empty ( $_SESSION ['user'] )) {
			return;
		}
		$userid = $_SESSION ['user']->userid;
		
		require_once SERVICE . DS . 'CarlendarService.class.php';
		$service = new CarlendarService ( $this->getDB () );
		
		$note = $_POST ['note'];
		$rember = $_POST ['rember'];
		$proid = $_POST ['id'];
		$userevents = $service->editeComEventNote ( $userid, $note, $rember, $proid );
		echo json_encode ( $userevents );
	}
	public function deleteComEventNote() {
		if (empty ( $_SESSION ['user'] )) {
			return;
		}
		$userid = $_SESSION ['user']->userid;
		
		require_once SERVICE . DS . 'CarlendarService.class.php';
		$service = new CarlendarService ( $this->getDB () );
		$proid = $_POST ['id'];
		$userevents = $service->deleteComEventNote ( $userid, $proid );
		echo json_encode ( $userevents );
	}
	/**
	 * 根据日历事件id删除事件，并删除中间表
	 */
	public function deleteEventById() {
		require_once SERVICE . DS . 'CarlendarService.class.php';
		$service = new CarlendarService ( $this->getDB () );
		
		$type = $_POST ['type'];
		$entryid = $_POST ['entryid'];
		$productid = $_POST ['productid'];
		$userid = $_SESSION ['user']->userid;
		
		if ($type == 1) {
			// 删除自定义事件
			$service->deleteCustomEventById ( $entryid, $userid );
		} else {
			$service->deleteUserEntry ( $entryid, $userid );
		}
		echo "success";
	}
	
	/**
	 * 更新自定义事件
	 *
	 * @param unknown $entry        	
	 */
	public function updateCustomEventById($entry) {
		require_once SERVICE . DS . 'CarlendarService.class.php';
		$service = new CarlendarService ( $this->getDB () );
		
		$entry = $_POST ['entry'];
		$entry = json_decode ( json_encode ( $entry ) );
		
		$service->updateCustomEventById ( $entry );
	}
	public function getEventById() {
		require_once SERVICE . DS . 'CarlendarService.class.php';
		$service = new CarlendarService ( $this->getDB () );
		
		$id = $_POST ['entryid'];
		$type = $_POST ['type'];
		
		$data = $service->getUserCalEventByID ( $type, $id );
		echo json_encode ( $data );
	}

/**
 * 获取用户所有票务事件以及自定义事件
 */
	/*
	 * public function getAllUserEvent(){ require_once SERVICE . DS . 'CarlendarService.class.php'; $service = new CarlendarService($this->getDB ()); echo json_encode($service->getAllUserEvent()); }
	 */
}