<?php
	function order() {
		include_once("available_func.php");
		include_once("connection.php");
		$first_name = $_GET['first_name'];
		$last_name = $_GET['last_name'];
		$email = $_GET['email'];
		$phone = $_GET['phone'];
		$flight_id = $_GET['flight_id'];
		if (available($flight_id)) {
			$conn = connect();
			$sql = mysqli_query($conn, "INSERT INTO users (`first_name`, `last_name`, `email`, `phone`, `flight_id`) VALUES ('$first_name', '$last_name', '$email', '$phone', '$flight_id')");
			return "Karta za let " . $flight_id . " je uspesno rezervisana.";
		} else {
			return "Sva mesta za ovaj let su popunjena!";
		}
	}

	echo order();
?>