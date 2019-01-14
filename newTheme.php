<?php
	session_start();

	if(empty($_SESSION["auth"])){
		header("location: index.php");
	};
?>

<!DOCTYPE html>
<html>
	<head>
		<?php 
			$title = "Новая тема";

			require_once("blocks/head.php"); 
			require_once("functions/auth.php");
			require_once("functions/newTheme.php");
		?>
	</head>

	<body>
		<div id="top"></div>

		<?php require_once("blocks/header.php"); ?>

		<?php require_once("blocks/nav.php"); ?>

		<main>
			<?php require_once("blocks/leftCol.php") ; ?>
			
			<div id="centerCol">
				<form id="themeForm" onsubmit="return valid()" action="" method="POST">
					<label>Тема:</label></br><textarea maxlength="100" name="theme" id="theme"></textarea></br></br>
					<label>Описание:</label></br><textarea maxlength="5000" name="discription" id="discription"></textarea></br>
					<textarea placeholder="Ваш код..." maxlength="5000" name="code" id="code"></textarea>
					<div align="center" id="error"><?php if(isset($error)) echo $error; ?></div>
					<div id="formButton" align="center"><input id="goTheme" name="goTheme" type="submit"><input value="Прикрепить код" id="addCode" type="button"></div>
				</form>
			</div>

			<?php require_once("blocks/rightCol.php") ; ?>
		</main>

		<?php require_once("blocks/footer.php"); ?>

		<script>
			$(document).ready(function(){
				$("#goTheme").on("click", function valid(){
					var theme = $("#theme").val();
					var discription = $("#discription").val();
					var code = $("#code").val();

					if(theme.length < 10){
						$("#error").html("Тема слишком короткая!");
						return false;
					};

					if(discription.length < 30){
						$("#error").html("Описание слишком короткое!");
						return false;
					};

					return true;
				});

				$("#addCode").on("click", function(){
 					$("#code").slideToggle(800);
				});
			});
		</script>
	</body>
</html>