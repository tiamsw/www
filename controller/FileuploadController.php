<?php

class FileuploadController extends Controller {
	public function index() {
		$this->getSmarty ();
		// $this->smarty->display("map.tpl");
	}
	
		public function fileup() {
		global $fileload;
		if ($_FILES ['msUploadFile'] ['size'] < 1024 * 1024 * 2) {
			
			$dirroot = "uploads/arousel/";
			$filename = explode ( ".", $_FILES ['msUploadFile'] ['name'] );
			$filename [0] = strtotime ( date ( 'Y-m-d' ) ) . "-" . rand (); // 设置随机数长度
			$file_name = implode ( ".", $filename );
			$uploadfile = $dirroot . $file_name;
			move_uploaded_file ( $_FILES ['msUploadFile'] ['tmp_name'], $uploadfile );
			$fileload->type = "1";
			$fileload->message = "上传成功！ ";
			$fileload->filename =  $file_name;
		} else {
			$fileload->type = "0";
			$fileload->message = "请上传小于2MB的jpeg或Gif类型的附件);";
		}
		echo json_encode ( $fileload );
	}
 
	
}



