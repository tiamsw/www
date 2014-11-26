<?php
class MapController extends  Controller{
	public function index(){ 
		 $this->getSmarty(); 
 		 $this->smarty->display("map.tpl"); 
	}
   
}