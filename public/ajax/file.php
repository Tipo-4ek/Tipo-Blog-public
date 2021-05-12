<?php require_once '../vendor/config.php';



$scient_type = $_POST['scient_type'];
if ($scient_type == '' or $scient_type == '-') {unset($scient_type); echo 'NONONONO';}
else {
	echo $scient_type; 
	switch ($scient_type) {
		case 'link':

			break;
	case 'file':
			
			break;
	case 'create':
			
			break;
}




?> 