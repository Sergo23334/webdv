<?php
	session_start();

	error_reporting("E_NOTICE");

	if(isset($_SESSION["auth"])){
		header("location: index.php");
	}; 
?>
<!DOCTYPE html>

<html>
	<head>
		<?php 
			$title = "Регистрация";

			require_once("blocks/head.php"); 
			require_once("functions/newUser.php");
		?>
	</head>

	<body>
		<?php require_once("blocks/nav.php"); ?>

		<div id="reg">
			<h1 align="center"><a href="index.php"><span>IT</span>community</a></h1>
			<form onsubmit="return valid()" id="regForm" action="" method="POST">
				<label>Имя:</label><input id="name" value="<?php if(isset($_POST)) echo "$name" ; ?>" name="name" placeholder="имя"></br></br>
				<label>Фамилия:</label><input id="surname" value="<?php if(isset($_POST)) echo "$surname" ; ?>" name="surname" placeholder="фамилия"></br></br>
				<label>Возраст:</label><input id="age" value="<?php if(isset($_POST)) echo "$age" ; ?>" name="age" placeholder="возраст"></br></br>
				<label>Страна:</label><input id="country" value="<?php if(isset($_POST)) echo "$country" ; ?>" name="country" placeholder="страна"></br></br>
				<label>Город:</label><input id="city" value="<?php if(isset($_POST)) echo "$city" ; ?>" name="city" placeholder="город"></br></br>
				<label>Ел. почта:</label><input id="mail" value="<?php if(isset($_POST)) echo "$mail" ; ?>" name="mail" placeholder="почта"></br></br>
				<label>Номер телефона:</label><input id="tel" value="<?php if(isset($_POST)) echo "$tel" ; ?>" name="tel" placeholder="телефон"></br></br>
				<label>Логин:</label><input id="log" value="<?php if(isset($_POST)) echo "$log" ; ?>" name="log" placeholder="логин"></br></br>
				<label>Пароль:</label><input id="pass" value="<?php if(isset($_POST)) echo "$pass" ; ?>" name="pass" placeholder="пароль" type="password"></br></br>
				<label>Повторите пароль:</label><input id="pass2" value="<?php if(isset($_POST)) echo "$pass2" ; ?>" name="pass2" placeholder="пароль" type="password"></br></br>
				<div id="error"><?php if(isset($error)) echo $error ; ?></div></br>
				<a href="index.php">Назад</a>
				<input id="goReg" name="goReg" value="Зарегистрироваться" type="submit">
			</form>
		</div>

		<?php require_once("blocks/footer.php"); ?>

		<script>
			$(document).ready(function(){
				$("#goReg").on("click", function valid(){
					var name = $("#name").val();
					var surname = $("#surname").val();
					var age = $("#age").val();
					var country = $("#country").val();
					var city = $("#city").val();
					var mail = $("#mail").val();
					var tel = $("#tel").val();
					var log = $("#log").val();
					var pass = $("#pass").val();
					var pass2 = $("#pass2").val();

					if(name.length < 2 || name.length > 20){
						$("#error").html("Недопустимый формат имени!");
						return false;
					};

					if(surname.length < 2  || surname.length > 20){
						$("#error").html("Недопустимый формат фамилии!");
						return false;
					};

					if(age == ""){
						$("#error").html("Недопустимый формат возраста!");
						return false;
					};

					if(country == ""){
						$("#error").html("Недопустимый формат страны!");
						return false;
					};

					if(city == ""){
						$("#error").html("Недопустимый формат города!");
						return false;
					};

					if(mail == ""){
						$("#error").html("Недопустимый формат ел. почты!");
						return false;
					};

					if(tel == ""){
						$("#error").html("Недопустимый формат телефона!");
						return false;
					};

					if(log == ""){
						$("#error").html("Недопустимый формат логина!");
						return false;
					};

					if(pass == ""){
						$("#error").html("Недопустимый формат пароля!");
						return false;
					};

					if(pass != pass2){
						$("#error").html("Пароли не совпадают!");
						return false;
					};

					return true;
				});
			});
		</script>
	</body>
</html>