<?php
require(NUSOAP_DIR.'nusoap.php'); 
 
class WebServiceInit {

    private $url;

 	/**
 	 * 统一获取webservice连接入口
	 * 可以根据需要拓展获取webservice连接的方法
 	 */
 	function __construct(){ 
		global  $CONFIG;
 		$this->url = $CONFIG['WEBSERVICE']['url'];
 	}

 	/**
 	 * 获取webservice连接
 	 * @param  $url webservice地址
 	 */
	function getClient(){  
    	return $client = new soapclient($this->url, true);
 	}
	
	/**
 	 * 生成proxy类
	 * 目前用于定时用户同步
 	 * @param  $url webservice地址
 	 */
	function getProxy(){  
		$client = new soapclient($this->url, true);
		$client->soap_defencoding = 'UTF-8'; 
		$client->xml_encoding = 'UTF-8';
		$client->decode_utf8 = false;
    	return $proxy=$client->getProxy();
 	}
}