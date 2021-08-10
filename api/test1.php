<?php

$json = '
{
	"id": 6,
	"f_name":"dilver",
	"l_name" : "kumar"
}';

// echo $json;
$data = json_decode($json,true);

// var_dump($data);

// echo $data['id'];
// echo $data['f_name'];
// echo $data['l_name'];

foreach ($data as $key => $value) {
	echo $key . " => " . $value . "  ";
}

?>