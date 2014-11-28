<?php
class AboutController extends  Controller{
	public function index(){ 
		$this->getSmarty(); 
 		
 		$this->smarty->assign ( 'keyword', "¿Qué Evento?" );
		$this->smarty->assign ( 'location', "Localización" );
		$this->smarty->assign ( 'fromDate', "Desde" );
		$this->smarty->assign ( 'toDate', "Hasta" );
		
 		$this->smarty->display("about.tpl"); 
	}
	public function terms(){
		$this->getSmarty(); 
 		
 		$this->smarty->assign ( 'keyword', "¿Qué Evento?" );
		$this->smarty->assign ( 'location', "Localización" );
		$this->smarty->assign ( 'fromDate', "Desde" );
		$this->smarty->assign ( 'toDate', "Hasta" );
		
 		$this->smarty->display("term.tpl"); 
	}
    public function policy(){
		$this->getSmarty(); 
 		
 		$this->smarty->assign ( 'keyword', "¿Qué Evento?" );
		$this->smarty->assign ( 'location', "Localización" );
		$this->smarty->assign ( 'fromDate', "Desde" );
		$this->smarty->assign ( 'toDate', "Hasta" );
		
 		$this->smarty->display("policy.tpl"); 
	}
    public function privacy(){
		$this->getSmarty(); 
 		
 		$this->smarty->assign ( 'keyword', "¿Qué Evento?" );
		$this->smarty->assign ( 'location', "Localización" );
		$this->smarty->assign ( 'fromDate', "Desde" );
		$this->smarty->assign ( 'toDate', "Hasta" );
		
 		$this->smarty->display("privacy.tpl"); 
	}
}