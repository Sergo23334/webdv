<?php
	function connectDB(){
		$host = "localhost";
		$user = "root";
		$pass = "";
		$db = "webdv";

		global $con;

		$con = mysqli_connect($host, $user, $pass, $db);

		if(!$con){
			echo "<h1>Database connect error!</h1>";

			exit;
		};

		mysqli_set_charset($con, "utf8");
	};
?>