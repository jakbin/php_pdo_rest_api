<?php 

require 'config.php';

function read_all()
{
	global $conn;
	global $table;
	$sql = "SELECT * FROM ".$table;
	try {
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id',$id);
		$stmt->execute();
	} catch (PDOException $e) {
		exit($e->getMessage());
	}
	$stmt = $conn->prepare($sql);
	$stmt->execute();

	if ($stmt->rowCount() > 0){
		$row = $stmt->fetchAll();
		echo json_encode($row);
		
	}else{
		echo json_encode(array('status' => false,
							'error' => array('message'=> 'No records found')));
	}
	$conn = null;
}

function read($id)
{
	global $conn;
	global $table;

	$sql = "SELECT * FROM ".$table." WHERE id = :id";
	try {
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id',$id);
		$stmt->execute();
	} catch (PDOException $e) {
		exit($e->getMessage());
	}

	if ($stmt->rowCount() > 0){
		$row = $stmt->fetch();
		echo json_encode($row);
	}else{
		header("HTTP/1.1 404 Not Found");
		echo json_encode(array('status' => false,
							'error' => array('message'=> 'No records found')));
	}
	$conn = null;
}

function create($data)
{
	global $conn;
	global $table;

	$first_name = $data['first_name'];
	$lalst_name = $data['last_name'];

	$sql = "INSERT INTO ".$table." (`id`, `fname`, `lname`) VALUES (NULL, '$first_name', '$lalst_name')";
	try {
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
	} catch (PDOException $e) {
		exit($e->getMessage());
	}
	$stmt = $conn->prepare($sql);
	$stmt->execute();

	if ($stmt){
		echo json_encode(array('status' => true,
							'error' => array('message'=> 'Student record inserted')));
	}else{
		echo json_encode(array('status' => false,
							'error' => array('message'=> 'Student record not inserted',)));
	}
	$conn = null;
}

function update($id,$data)
{
	global $conn;
	global $table;

	$first_name = $data['first_name'];
	$lalst_name = $data['last_name'];

	$sql = "UPDATE ".$table." SET `fname`='$first_name', `lname`='$last_name' WHERE `id` = :id";
	try {
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
	} catch (PDOException $e) {
		exit($e->getMessage());
	}

	if ($stmt){
		echo json_encode(array('status' => true,
							'error' => array('message'=> 'Student record updated')));
	}else{
		echo json_encode(array('status' => false,
							'error' => array('message'=> 'Student record not updated')));
	}
	$conn = null;
}

function delete($id)
{
	global $conn;
	global $table;

	$sql = "DELETE FROM ".$table." WHERE `id` = :id";

	try {
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
	} catch (PDOException $e) {
		exit($e->getMessage());
	}

	if ($stmt){
		echo json_encode(array('status' => true,
							'error' => array('message'=> 'Student record deleted')));
	}else{
		echo json_encode(array('status' => false,
							'error' => array('message'=> 'Student record not deleted')));
	}
	$conn = null;
}
?>