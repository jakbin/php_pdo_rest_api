<?php

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data)) {
	if (!isset($data['f']) AND !isset($data['l'])) {
		echo "no valide data provided";

	}elseif (!isset($data['f']) OR !isset($data['l'])) {
		
		if (!isset($data['f'])){
			echo "f not provided";
		}elseif (!isset($data['l'])){
			echo "l not provided";
		}
	}elseif (isset($data['f']) AND isset($data['l'])){
		echo "f is ".$data['f']." and l is ".$data['l']." provided";
	}
}else{
	echo "no data provided";
}

?>