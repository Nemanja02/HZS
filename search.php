<?php
	include_once("connection.php");
	include_once("available_func.php");
	include_once("plane.php");
	$conn = connect();
	$result = Array();
	$sql = mysqli_query($conn, "SELECT * FROM letovi");
	while ($row = $sql->fetch_assoc()) {
		$timestamp = DateTime::createFromFormat('!m.d.Y', $row['depart_date'])->getTimestamp();
		if (time() < $timestamp && available($row['id'])) {
			$obj = $emptyPlane;
			$obj["id"] = $row["id"];
			$obj["depart_date"] = $row["depart_date"];
			$obj["return_date"] = $row["return_date"];
			$obj["from"] = $row["from"];
			$obj["to"] = $row["to"];
			$obj["size"] = $row["size"];
			array_push($result, $obj);
		}
	}
	$result = json_encode($result);
	$conn->close();
	echo $result;	
?>
