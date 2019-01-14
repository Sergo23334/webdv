<header>
	<div id="logo">
		<h1 align="center"><a href="index.php"><span>WEB</span>community</a></h1>
		<p>Наш форум посвящен различным вопросам касающимся сферы WEB-разработки. Если у вас возникли сложности, здесь вам могут помочь другие программисты. Просим вас соблюдать вежливость, публиковать только темы касающиеся данной тематики и не спамить. Приветствуются темы WEB-новинок. Пользователи, нарушившие правила форума будут удалены.</p>
	</div>

	<div id="login">
		<form onsubmit ="return valid()" action="" method="POST">
			<?php if(empty($_SESSION["auth"])){ ?>			
				<label>Логин:</label><input value="<?php if(isset($log)) echo $log; ?>" id="log" name="log" placeholder="логин"></br></br>
				<label>Пароль:</label><input value="<?php if(isset($pass)) echo $pass; ?>" id="pass" name="pass" placeholder="пароль" type="password"></br></br>
				<a href="registration.php">Регистрация</a><input value="Вход" id="goForm" type="submit"></br>
				<div id="error" style="text-align: center; width: 50%;"><?php if(isset($error)) echo $error ; ?></div>			
			<?php }else{ ?>
				<div id="hello">
					<img height="150px" width="150px" src="img/user.png"></br>
					<span>Привет <?php echo $_SESSION["name"]; ?>!</span></br>
					<input id="goForm" value="Выйти" type="submit" name="exit"></br>
				</div>
			<?php }; ?>
		</form>
	</div>
</header>

<script>
	$(document).ready(function(){
		$("#goForm").on("click", function valid(){
			var log = $("#log").val();
			var pass = $("#pass").val();

			if(log.length < 5 || log.length > 20){
				$("#error").html("Ошибка логина!");
				return false;
			};

			if(pass.length < 5 || pass.length > 30){
				$("#error").html("Ошибка пароля!");
				return false;
			};

			return true;
		});
	});
</script>