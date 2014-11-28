<?php
class UserController extends  Controller{
	public function index(){ 
		$this->getSmarty(); 
		
		$this->smarty->assign ( 'keyword', "¿Qué Evento?" );
		$this->smarty->assign ( 'location', "Localización" );
		$this->smarty->assign ( 'fromDate', "Desde" );
		$this->smarty->assign ( 'toDate', "Hasta" );
		
 		$this->smarty->display("userinfo_modify.tpl"); 
	}
   
}