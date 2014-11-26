<?php  
define('CORE',PROJECT.DS.'framework'.DS.'core');
define('CONTROLLER',PROJECT.DS.'controller');
define('COMMON',PROJECT.DS.'common');
define('LIB',PROJECT.DS.'framework'.DS.'lib');
define('SERVICE',PROJECT.DS.'service');
define('SMARTY_DIR', PROJECT.'/framework/lib/Smarty-3.1.13/libs/');
define('NUSOAP_DIR',PROJECT.'/framework/lib/nusoap-0.9.5/lib/');
define('DRIVER',PROJECT.DS.'framework'.DS.'driver');

require_once CORE.DS.'config.php';
require_once CORE.DS.'Router.class.php';
require_once CORE.DS.'Controller.class.php';
require_once CORE.DS.'SmartySetup.class.php';
require_once CORE.DS.'DBUtil.class.php';
require_once COMMON.DS.'ErrorMessage.class.php';
require_once COMMON.DS.'HtmlWrap.class.php';
require_once COMMON.DS.'CommonBase.class.php';

class App{
	function main(){
		$reqUri = $_SERVER['REQUEST_URI'];   
		$route = new Router($reqUri); 
		$filePath = $route->getControllerFilePath();
		if (!file_exists($filePath)) {
            die("Con't find the Constroller file!!! <br>the filepath is ".$filePath);
        }   
        require_once  $filePath;
		$class = $route->getControllerClassName();
		$method = $route->getMethodName();
		$params = $route->getParam();
		$controller = new $class;
		$controller->$method($params);
// 		if(empty($params)){
// 			$controller = new $class;
// 			$controller->$method();
// 		}else{
// 			//call_user_func_array(array($class,$method), $params);
// 		}
	}
}
 