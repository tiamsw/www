<?php
session_start();  
define('ROOT',dirname(dirname(__FILE__))); //项目部署目录的上一级 
define('PROJECT',dirname(__FILE__));       //项目部署目录
define('DS',DIRECTORY_SEPARATOR );         //系统提供文件路径分隔符  
$appPhpFile = PROJECT.DS.'framework'.DS."App.php"; //系统MVC统一入口

require_once PROJECT.DS.'log.php';

if (file_exists($appPhpFile)) {

   require_once PROJECT.DS.'framework'.DS."App.php"; 
   $app = new App();
   $app->main(); 
   
}else{
	 //提示英文的原因，是中文在这种情况下容易乱码！
	 echo "The System Core File :$appPhpFile Don't Exists，Please Check";
} 
