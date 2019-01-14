<?php
	require_once("functions/config.php");

	if(isset($_POST["log"]) && isset($_POST["pass"])){
		$log = $_POST["log"];
		$pass = $_POST["pass"];

		connectDB();
		
		$sql = mysqli_query($con, "SELECT * FROM `users` WHERE BINARY `login` = '$log'");

		mysqli_close($con);

		$array = mysqli_fetch_assoc($sql);

		if(!$array){
			$error = "Неверный логин!";
			return;
		};

		if(md5(md5($pass.$array["key"])) != $array["pass"]){
			$error = "Неверный пароль!";
			return;
		};

		$_SESSION = $array;

		$_SESSION["auth"] = true;
	};

	if(isset($_POST["exit"])){
		session_unset();
		
		header("location: index.php");
	};
?>
			
