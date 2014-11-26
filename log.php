<?php
//LOG
function info($algo,$texto){ 
	$ddf = fopen('log_buscatickets.log','a');
	fwrite($ddf,"[".date("r")."] +-+-+ $algo:$texto\r\n");
	fclose($ddf);
}
function casque($algo,$texto){
	$ddf = fopen('log_buscatickets.log','a');
	fwrite($ddf,"[".date("r")."] x-ERROR-x $algo:$texto\r\n");
	fclose($ddf);
}
set_error_handler('casque');
?> 