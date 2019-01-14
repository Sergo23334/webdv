<?php
	require_once("functions/config.php");

	connectDB();

	$sql = mysqli_query($con, "SELECT * FROM `comments` WHERE `theme` = '$_GET[id]' ORDER BY `id` DESC");

	mysqli_close($con);

	$comments = array();

	for($i = 0; $i < mysqli_num_rows($sql); $i++){
		$comments[] = mysqli_fetch_assoc($sql);
	};
?>