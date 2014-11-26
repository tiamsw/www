<?php
header("Content-type:application/csv");
header("Content-Disposition:attachment;filename=search4gigs.csv");

require_once '../framework/core/config.php'; 
require '../framework/core/DBUtil.class.php';

global  $CONFIG;
$dbutil = new DbUtil($CONFIG['DB']['db_host'], $CONFIG['DB']['db_user'], $CONFIG['DB']['db_password'], $CONFIG['DB']['db_database']); 
 $userId = $_GET['userid'];
       require_once  './CarlendarService.class.php';
		$service = new CarlendarService ( $dbutil); 
 		$results = $service->getUserCalEvent ( $userId );  
 		if(is_array($results)){
	        $data = "id".",".'title'.",".'startdate'.",".'entrylocation'.','.'entrynote'."\n";
	 		foreach($results as $result){
	 			$data .=$result->id;
	 			$data.=",";
	 			$data.=$result->title;
	 			$data.=",";
	 			$data.=$result->startdate;
	 			$data.=",";
	 			$data.=$result->entrylocation; 
	 			$data.=",";
	 			$data.=$result->entrynote; 
	 			$data.="\n";
	 		}
 		}else{
 			$data = $userId." don't have data";
 		}
echo ($data);
 
?>