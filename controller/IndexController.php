<?php
class IndexController extends Controller {
	public function index() {
	ini_set('display_errors', 'On');  
error_reporting(E_ALL & ~ E_WARNING);
         	$this->getSmarty ();
		
		require_once SERVICE . DS . 'admin' . DS . 'ImgcarouserlService.class.php';
		// START 数据库查询及分页数据
		$imgService = new ImgcarouserlService ( $this->getDB () );
		$items = $imgService->getIndexPage ( 20 );
		$source = "";
		if ($items) {
			
			foreach ( $items as $item ) {
				if (strlen ( $item->desc ) > 100) {
					$desc = substr_replace ( $item->desc, '....', 100 );
				} else {
					$desc = $item->desc;
				}
				if (strlen ( $item->title ) > 16) {
					$item->title = substr_replace ( $item->title, '....', 16 );
				}
				$source .= "
 		<LI><A href=\"$item->url\"  target=\"_blank\"><IMG src= \"" . WEBSITE_URL . "uploads/arousel/$item->imgname\"/></A>
 		<div>
 		<h3>$item->title</h3>
 		<span class=\"time\">$item->product_time</span>
 		
 		<p> $desc
 		</p>
 			<A href=\"$item->url\" class=\"a-but\">View Details</A>
 		</div>
 		</LI>
 		";
			}
			// print($source);
			
		}
		$events = $imgService->getHomeEvents();
		if (! empty ( $events )) {
			foreach ( $events as $event) {
				
				if (strlen ( $event->description ) > 100) {
					$event->description = substr_replace ( $event->description, '....', 100 );
				} 
				if (strlen ( $event->product_name ) > 16) {
					$event->product_name = substr_replace ( $event->product_name, '....', 16 );
				}
				
				$evdata [] = array (
						"url" => WEBSITE_URL."ticket/info/?id=".$event->aw_product_id,
						"name" => $event->product_name,
						"desc" => $event->description,
						"time" => $event->specifications
				);
			}
		}
		
		
		$this->smarty->assign ( 'events', $evdata );
		$this->smarty->assign ( 'imagesources', $source );
	
		$this->smarty->display ( "index.tpl" );
	}
	public function createItemLI($item) {
		return "
 		<LI><A href=\"#\"  target=\"_blank\"><IMG src=\".WEBSITE_URL.'uploads/arousel'.$item->imagename\"/></A>
 		<div>
 		<h3>$item->title</h3>
 		<span class=\"time\">$item->product_time</span>
 		
 		<p> $item->desc
 		</p>
 			<A href=\".$item->url\" class=\"a-but\">View Details</A>
 		</div>
 		</LI>
 		";
		
		// "<div class=\"windbox\" id='windbox'><div class=\"wind\" > <a
		// href=\"#\" class=\"fr\" onclick=\"javascript:closeWin();\"><img
		// src=\"".WEBSITE_URL."public/img/Close-ioc.gif\"/></a><span
		// class=\"Dataerror\">".
		// "<img src=\"".WEBSITE_URL."public/img/Dataerror.gif\" border=\"0\"/>
		// ".
		// "</span> </div> <div class=\"windbg\"></div></div>";
	}
}
