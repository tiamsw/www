<?php
class SetController extends  Controller{
	
	public function index(){ 
	 
		$t = '';
		extract ( $_REQUEST, EXTR_IF_EXISTS ); 
		$templates=array("default","blacktie","wintertide","schoolpainting");
		
		if(!in_array($t,$templates)){
			$t="default";
		}
	
		
		$_SESSION["template"]=$t;
		$rand=rand(0,10000);
		$back_url=$_SERVER['HTTP_REFERER']."#".$rand;
	  
	     	        	 	$redirect = "<script language='javascript' type='text/javascript'>";  
							$redirect .= "window.location.href='$back_url'";  
							$redirect .= "</script>";  
					echo $redirect;
	 
	}
	 
}