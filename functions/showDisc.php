<?php
	require_once("functions/config.php");

	connectDB();
	$sql = mysqli_query($con, "SELECT * FROM `theme` WHERE `id` = $_GET[id]");
	mysqli_close($con);

	$data = mysqli_fetch_assoc($sql);
?>