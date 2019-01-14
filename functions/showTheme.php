<?php
	require_once("functions/config.php");

	error_reporting("E_WARNING");

	if(empty($_GET["page"])) $_GET["page"] = 1;

	connectDB();

	$limit = 10;

	if(isset($_GET["search"])){
		$count = mysqli_num_rows(mysqli_query($con, "SELECT `id` FROM `theme` WHERE `name` LIKE '%$_GET[search]%' OR `discription` LIKE '%$_GET[search]%'"));
	}else{
		$count = mysqli_num_rows(mysqli_query($con, "SELECT `id` FROM `theme`"));
	};

	$maxPage = ceil($count/$limit);

	if($_GET["page"] > $maxPage) $_GET["page"] = $maxPage;
	if($_GET["page"] < 1) $_GET["page"] = 1;

	if(isset($_GET["search"])){
		$sql = mysqli_query($con, "SELECT * FROM `theme` WHERE `name` LIKE '%$_GET[search]%' OR `discription` LIKE '%$_GET[search]%' ORDER BY `id` DESC LIMIT ".($_GET["page"] - 1) * $limit.", $limit");
	}else{
		$sql = mysqli_query($con, "SELECT * FROM `theme` ORDER BY `id` DESC LIMIT ".($_GET["page"] - 1) * $limit.", $limit");		
	};
	
	mysqli_close($con);

	$data = array();

	for($i = 0; $i < mysqli_num_rows($sql); $i++){
		$data[] = mysqli_fetch_assoc($sql);
	};
?>