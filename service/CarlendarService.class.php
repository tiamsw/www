<?php
class CarlendarService {
	public $dbutil;
	public function __construct($dbutil) {
		$this->dbutil = $dbutil;
	}
	public function getUserCalEvent($userid) {
		// get custom event
		$sql = "select e.entryid id,entrytitle title,entryfrom start,entryto end,entrynote,entrylocation,emailreminder,entryimg from userentrys ue,entry e where ue.userid='$userid' and ue.entryid=e.entryid and ue.entrytype=1 and e.entryfrom is not null";
		$custem_results = $this->dbutil->get_results ( $sql );
		// get product event
		$sql = "select p.aw_product_id id,p.product_name title,p.specifications start,p.promotional_text entrylocation from userentrys ue,products p where ue.userid='$userid' and ue.productid=p.aw_product_id  and ue.entrytype=2 and p.specifications is not null";
		$product_results = $this->dbutil->get_results ( $sql );
		// set product event color is #fb7b0e
		// you can see
		// http://arshaw.com/fullcalendar/docs/event_data/Event_Object/
		for($i = 0; $i < count ( $product_results ); $i ++) {
			$product_tmp = $product_results [$i];
			$product_tmp->color = "#fb7b0e";
			$product_results [$i] = $product_tmp;
		}
		// merge custom and product event
		$results = array_merge ( $custem_results, $product_results );
		return $results;
	}
	public function getUserCalEventByID($type, $id) {
		$product_results;
		if ($type == 1) {
			$sql = "select e.entryid id,entrytitle title,entryfrom start,entryto end,entrynote,entrylocation,emailreminder,entryimg from userentrys ue,entry e where e.entryid ='$id' ";
			$product_results = $this->dbutil->get_results ( $sql );
		}
		if ($type == 2) {
			$sql = "select p.aw_product_id id,p.product_name title,p.specifications start,p.promotional_text entrylocation ,p.aw_image_url entryimg ,ue.note entrynote ,ue.emailflag emailreminder from userentrys ue,products p where   p.aw_product_id ='$id' and ue.productid=p.aw_product_id   ";
			$product_results = $this->dbutil->get_results ( $sql );
			for($i = 0; $i < count ( $product_results ); $i ++) {
				$product_tmp = $product_results [$i];
				$product_tmp->color = "#fb7b0e";
				$product_results [$i] = $product_tmp;
			}
		}
		
		// merge custom and product event
		if ($product_results != null) {
			return $product_results [0];
		}
		return $product_results;
	}
	
	/**
	 * 新增票务事件到关系表
	 *
	 * @param unknown $productid        	
	 * @param unknown $userid        	
	 */
	public function saveuserentrys($productid, $userid) {
		$sql = "insert into userentrys(userentryid,productid,entrytype) values($userid,'$productid','2')";
		return $this->dbutil->query ( $sql );
	}
	
	/**
	 * 新增用户自定义事件，并新增关系
	 *
	 * @param unknown $entry        	
	 * @param unknown $userid        	
	 */
	public function saveCustomEvent($entry, $userid) {
		// 新增用户自定义事件
		$sql = "insert into entry(entrytitle,entryimg,entrynote,emailreminder,entrylocation,entryfrom,entryto) values('$entry->entrytitle','$entry->entryimg','$entry->entrynote','$entry->emailreminder','$entry->entrylocation',";
		if (empty ( $entry->entryfrom )) {
			$sql .= "null,";
		} else {
			$sql .= "DATE_FORMAT('$entry->entryfrom','%Y-%m-%d %H:%i:%s'),";
		}
		if (empty ( $entry->entryto )) {
			$sql .= "null)";
		} else {
			$sql .= "DATE_FORMAT('$entry->entryto','%Y-%m-%d %H:%i:%s'))";
		}
		
		$this->dbutil->query ( $sql );
		
		// 将用户自定义事件新增到关系表userentrys
		$entryid = $this->dbutil->getInsertId ();
		$sql = "insert into userentrys(userid,entryid,entrytype) values('$userid','$entryid','1')";
		$this->dbutil->query ( $sql );
		return $entryid;
	}
	
	/**
	 * 删除自定义事件，并级联删除中间表
	 *
	 * @param unknown $entryid        	
	 * @param unknown $userid        	
	 */
	public function deleteCustomEventById($entryid, $userid) {
		$sql = "delete from entry where entryid=$entryid";
		$this->dbutil->query ( $sql );
		
		$sqlrs = "delete from userentrys where userid='$userid' and entryid='$entryid'";
		$this->dbutil->query ( $sqlrs );
	}
	
	/**
	 * 删除票务关系表
	 *
	 * @param unknown $productid        	
	 * @param unknown $userid        	
	 */
	public function deleteUserEntry($productid, $userid) {
		$sql = "delete from userentrys where userid='$userid' and productid='$productid'";
		$this->dbutil->query ( $sql );
	}
	
	/**
	 * 更新自定义事件
	 *
	 * @param unknown $entry        	
	 */
	public function updateCustomEventById($entry) {
		$entryid = $entry->entryid;
		
		if (empty ( $entry->entryimg )) {
			$sql = "update entry set entrytitle='$entry->entrytitle',entrynote='$entry->entrynote',emailreminder='$entry->emailreminder',entrylocation='$entry->entrylocation',";
		} else {
			$sql = "update entry set entrytitle='$entry->entrytitle',entryimg='$entry->entryimg',entrynote='$entry->entrynote',emailreminder='$entry->emailreminder',entrylocation='$entry->entrylocation',";
		}
		if (empty ( $entry->entryfrom )) {
			$sql .= "entryfrom = null,";
		} else {
			$sql .= "entryfrom=DATE_FORMAT('$entry->entryfrom','%Y-%m-%d %H:%i:%s'),";
		}
		if (empty ( $entry->entryto )) {
			$sql .= "entryto=null";
		} else {
			$sql .= "entryto = DATE_FORMAT('$entry->entryto','%Y-%m-%d %H:%i:%s')";
		}
		$sql .= " where entryid='$entryid'";
		
		print ($sql) ;
		$this->dbutil->query ( $sql );
	}
	public function editeComEventNote($userid, $note, $rember, $proid) {
		$sql = "update userentrys set note='$note',emailflag='$rember' where userid='$userid' and productid='$proid'";
		print ($sql) ;
		$this->dbutil->query ( $sql );
	}
	public function deleteComEventNote($userid, $proid) {
		$sql = "update userentrys set note='',emailflag='2' where userid='$userid' and productid='$proid'";
		print ($sql) ;
		$this->dbutil->query ( $sql );
	}
	public function getAgendaList($userid) {
    $CURDATE = DATE ( 'Y-m-d' )." 00:00:00";
	$SQL = "SELECT DATE_FORMAT(t.entryfrom,\"%W\") AS week, DATE_FORMAT(t.entryfrom,\"%b\") AS month, DATE_FORMAT(t.entryfrom,\"%d\") AS date ,DATE_FORMAT(t.entryfrom,\"%H:%i\") AS time ,
			t.entryid,t.entrytype,t.entrytitle,t.entryimg,
		t.entrylocation,
		t.entrynote
	 FROM (
	
		SELECT p.aw_product_id AS entryid, e.entrytype,p.product_name AS entrytitle, p.aw_image_url AS entryimg,
		p.promotional_text AS entrylocation,
		p.description AS entrynote,
		p.specifications AS  entryfrom
	
	  FROM products p ,userentrys e WHERE p.aw_product_id = e.productid   AND p.specifications >='".$CURDATE."' AND e.userid='".$userid."'
	  UNION ALL
	SELECT e.entryid,u.entrytype,e.entrytitle,e.entryimg,
		e.entrylocation,
		e.entrynote,
	
		e.entryfrom
		FROM userentrys u ,entry e WHERE u.entryid = e.entryid  AND e.entryfrom >='".$CURDATE."' AND u.userid='".$userid."' ) t ORDER BY entryfrom"; 
        
		$custem_results = $this->dbutil->get_results ($SQL);
		return $custem_results;
	}
}

?>