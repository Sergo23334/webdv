<?php
	require_once("functions/config.php");

	if(isset($_POST["goTheme"])){
		$name = htmlspecialchars(addslashes($_POST["theme"]));
		$discription = htmlspecialchars(addslashes($_POST["discription"]));
		$code = htmlspecialchars(addslashes($_POST["code"]));
		$shortdisc = mb_strimwidth("$discription", 0, 300, "...");
		$date = date("d.m.Y");

		connectDB();
		$sql = mysqli_query($con, "INSERT INTO `theme` (`name`, `discription`, `shortdisc`, `code`, `user`, `date`) VALUES ('$name', '$discription', '$shortdisc', '$code', '$_SESSION[login]', '$date');");

		$newId = mysqli_insert_id($con);
		mysqli_close($con);

		if($sql){
			header("location: discussion.php?id=$newId");
		}else{
			$error = "Ошибка записи!";
		};
	};
?>