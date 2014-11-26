<?php
class UserController extends  Controller{
	public function index(){ 
		 $this->getSmarty(); 
 		 $this->smarty->display("userinfo_modify.tpl"); 
	}
   
}