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
			$title = "Настройки";

			require_once("blocks/head.php"); 
			require_once("functions/auth.php");
		?>
	</head>

	<body>
		<div id="top"></div>
		
		<?php require_once("blocks/header.php"); ?>

		<?php require_once("blocks/nav.php"); ?>

		<main>
			<?php require_once("blocks/leftCol.php") ; ?>
			
			<div id="centerCol">
				
			</div>

			<?php require_once("blocks/rightCol.php") ; ?>
		</main>

		<?php require_once("blocks/footer.php"); ?>
	</body>
</html>