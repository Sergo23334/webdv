<?php 
	require_once("functions/config.php");

	if(isset($_POST["goReg"])){
		$name = $_POST["name"];
		$surname = $_POST["surname"];
		$age = $_POST["age"];
		$country = $_POST["country"];
		$city = $_POST["city"];
		$tel = $_POST["tel"];
		$mail = $_POST["mail"];
		$log = $_POST["log"];
		$pass = $_POST["pass"];
		$pass2 = $_POST["pass2"];
		$date = date("d.m.Y");

		connectDB();

		$sql = mysqli_query($con, "SELECT `login` FROM `users` WHERE BINARY `login` = '$log'");

		if(mysqli_fetch_row($sql)){
			$error = "Пользователь с таким логином уже существует!";
			return;
		};

		
		$length = rand(16, 32);

		for($i = 0; $i < $length; $i++){
			$key = chr(rand(33, 126));
		};
	
		$pass = md5(md5($pass.$key));

		$sql = mysqli_query($con, "
			INSERT INTO `users` 
				(`name`, `surname`, `age`, `country`, `city`, `mail`, `tel`, `login`, `pass`, `key`, `date`) 
			VALUES 
				('$name', '$surname', '$age', '$country', '$city', '$mail', '$tel', '$log', '$pass', '$key', '$date')
			");

		if(!$sql){
			$error = "Ошибка записи!";
			return;
		};

		$sql = mysqli_query($con, "SELECT * FROM `users` WHERE BINARY `login` = '$log'");

		mysqli_close($con);

		session_start();

		$_SESSION = mysqli_fetch_assoc($sql);

		$_SESSION["auth"] = true;

		header("location: index.php");
	};
?>