<?php 

class crudAll
{
	private $conn = null;
	private $table = null;

	public function __construct($db,$dbTable)
	{
		$this->conn = $db;
		$this->table = $dbTable;
	}

	function read_all()
	{
		$sql = "SELECT * FROM ".$this->table;
		try {
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
		} catch (PDOException $e) {
			exit($e->getMessage());
		}
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

	function read(int $id)
	{
		$sql = "SELECT * FROM ".$this->table." WHERE id = :id";
		try {
			$stmt = $this->conn->prepare($sql);
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

	function create(array $data)
	{
		$first_name = $data['first_name'];
		$lalst_name = $data['last_name'];

		$sql = "INSERT INTO ".$this->table." (`id`, `fname`, `lname`) VALUES (NULL, '$first_name', '$lalst_name')";
		try {
			$stmt = $this->conn->prepare($sql);
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

	function update(int $id,array $data)
	{
		$first_name = $data['first_name'];
		$lalst_name = $data['last_name'];

		$sql = "UPDATE ".$this->table." SET `fname`='$first_name', `lname`='$last_name' WHERE `id` = :id";
		try {
			$stmt = $this->conn->prepare($sql);
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

	function delete(int $id)
	{
		$sql = "DELETE FROM ".$this->table." WHERE `id` = :id";

		try {
			$stmt = $this->conn->prepare($sql);
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

}
?>