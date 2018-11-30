<?php
	include_once("connection.php");
	function getSize($flight_id) {
		$conn = connect();
		$sql = mysqli_query($conn, "SELECT size FROM letovi WHERE id = '$flight_id'");
		while ($result = $sql->fetch_assoc()) {
			$size = $result["size"];
		}

		return $size;
	}

	function available($flight_id) {
		$conn = connect();
		if ($result = $conn->query("SELECT id FROM users WHERE flight_id = '$flight_id'")) {
			$taken = $result->num_rows;
		}
		$conn->close();
		return $taken < getSize($flight_id);
	};
?>