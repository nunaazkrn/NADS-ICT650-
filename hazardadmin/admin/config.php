<?php
	$conn = new mysqli("localhost", "root", "", "hazard");
	if($conn->connect_error){
		die("Could not connect to database!".$conn->connect_error);
	}
?>