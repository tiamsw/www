<?php
class CommonBase{
	
	public static function isPost() {
		return $_SERVER ['REQUEST_METHOD'] === 'POST' ? TRUE : FALSE;
	}
	
	public static function isGet() {
		return $_SERVER ['REQUEST_METHOD'] === 'GET' ? TRUE : FALSE;
	}
    public static function jumpUrl($url) { 
		Header ( "Location: ".WEBSITE_URL."$url" );
		return true;
	}
}