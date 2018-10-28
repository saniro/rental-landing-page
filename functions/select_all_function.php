<?php
	function all_apartment(){
		require("./connection/connection.php");
		$query = "SELECT apartment_id, apartment_name, apartment_address FROM apartment_tbl WHERE flag = 1";
		$stmt = $con->prepare($query);
		//$stmt->bindParam(':apartment_id', $_SESSION['admin_id'], PDO::PARAM_INT);
		$stmt->execute();
		$results = $stmt->fetchAll();
		$rowCount = $stmt->rowCount();
		$results = json_encode($results);
		return $results;
	}
?>