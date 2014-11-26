<?php
class HtmlWrap{
	
 public static function alert($type,$message=""){
		if($message == "") {
			switch(strtolower($type)){
				case "success":
					$message=ErrorMessage::SUCCESS;
					break;
				case "error" :
					$message=ErrorMessage::ERROR;
					break;
			}
		}
		$alert_html="<div class=\"alert alert-$type\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>$message</div>";
		return $alert_html;
	}
}