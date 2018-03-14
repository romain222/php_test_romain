<?php
//how to select an element in a DataBase

if($_SERVER["REQUEST_METHOD"] == "GET"){
	try {
		$connection = new PDO('mysql:host=localhost;dbname=user','root');
	} catch (PDOException $e) {
		echo 'ERRRRRRRRORRRRR';
	}
	$sql = "SELECT * FROM track";
	$statement = $connection->prepare($sql);
	if(!$statement->execute()){
		echo 'INSERT FAILED';
		return;
	}
	$returnedData = $statement->fetchAll();
	foreach ($returnedData as $value) {
		echo $value['task'] . ':' . $value['time'];
		echo '<br/>';
	}
}
?>
