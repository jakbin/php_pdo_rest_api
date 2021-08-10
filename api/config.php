<?php
// $dsn = "mysql:host=localhost;port=3306;dbname=api";
$dsn = "mysql:host=127.0.0.1;dbname=api";
try {
	$conn = new PDO($dsn, "root","");
} catch (PDOException $e) {
	exit($e->getMessage());
}
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
?>