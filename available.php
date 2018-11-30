<?php
	include_once("available_func.php");
	echo json_encode(available($_GET['flight_id']));
?>