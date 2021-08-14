<?php
header('Content-Type: application/json; charset=UTF-8');
header('Acess-Control-Allow-Origin: *');
header('Acess-Control-Allow-Methods: GET,POST,PUT,DELETE');
header('Acess-Control-Allow-Headers: Acess-Control-Allow-Headers, Content-Type, Acess-Control-Allow-Methods, Authorization, X-Requested-With');

require 'action.php';
require 'validate.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

if ($uri[1] !== 'api'){
	header("HTTP/1.1 404 Not Found");
	exit();
}

$id = null;
if (isset($uri[2])) {
	$id = (int) $uri[2];
}

$data = json_decode(file_get_contents("php://input"), true);

$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestMethod == 'GET' AND $id == null){
	read_all();

}elseif ($requestMethod == 'GET' AND $id !== null) {
	read($id);

}elseif($requestMethod == 'POST'){

	if ($testData->validateData($data)){
		create($data);
	}else{
		echo json_encode(array('status' => false,
							'error' => array('message'=> $testData->getErrorMessage())));
		exit();
	}
}elseif($requestMethod == 'PUT'){
	if ($id !== null){
		
		if ($testData->validateData($data)){
		update($id,$data);
		}else{
			echo json_encode(array('status' => false,
							'error' => array('message'=> $testData->getErrorMessage())));
			exit();
		}
	}else{
		echo json_encode(array('status' => false,
							'error' => array('message'=> 'no id provided')));
		exit();
	}
	
}elseif($requestMethod == 'DELETE'){
	if ($id !== null){
		delete($id);
	}else{
		echo json_encode(array('status' => false,
							'error' => array('message'=> 'no id provided')));
		exit();
	}
}

?>