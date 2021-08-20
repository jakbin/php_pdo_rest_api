<?php
// $dsn = "mysql:host=localhost;port=3306;dbname=api";
// $dsn = "mysql:host=127.0.0.1;dbname=api";
// $table = "apiTest";
// try {
// 	$conn = new PDO($dsn, "root","");
// } catch (PDOException $e) {
// 	header("HTTP/1.1 500 Internal Server Error");
// 	exit(json_encode(array('status' => false,
// 							'error' => array('message'=> $e->getMessage()))));
// }
// $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

// print_r($conn);

class DatabaseConnecter {

	private $dbconnection = null;
	private $dbTable = null;

	public function __construct()
	{
		$dsn = "mysql:host=127.0.0.1;dbname=api";
		$this->dbTable = "apiTest";
		try {
			$this->dbconnection = new PDO($dsn, "root","");
		} catch (PDOException $e) {
			header("HTTP/1.1 500 Internal Server Error");
			exit(json_encode(array('status' => false,
									'error' => array('message'=> $e->getMessage()))));
		}
		$this->dbconnection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
	}

	public function getConnection()
	{
		return $this->dbconnection;
	}

	public function getTable()
	{
		
		return $this->dbTable;
	}
}
?>