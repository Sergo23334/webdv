<?php
	session_start();
	require_once("config.php");

	$comment = htmlspecialchars(addslashes($_POST["comment"]));
	$code = htmlspecialchars(addslashes($_POST["code"]));
	$theme = $_POST["theme"];
	$user = $_SESSION["login"];
	$date = date("d.m.Y");

	connectDB();

	mysqli_query($con, "INSERT INTO `comments` (`comment`, `code`, `theme`, `user`, `date`) VALUES ('$comment', '$code', '$theme', '$user', '$date')");

	mysqli_close($con);
?>