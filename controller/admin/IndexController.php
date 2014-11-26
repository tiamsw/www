<?php
class IndexController extends  Controller{
	public function index(){ 
		 $this->getSmarty();  
		 $_SESSION["template"]="default";
 		 $this->smarty->display("admin/index.tpl"); 
	}
}