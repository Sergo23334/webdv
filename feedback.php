<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
		<?php 
			$title = "Обратная связь";

			require_once("blocks/head.php"); 
			require_once("functions/auth.php");
			require_once("functions/feedback.php");
		?>
	</head>

	<body>
		<div id="top"></div>

		<?php require_once("blocks/header.php"); ?>

		<?php require_once("blocks/nav.php"); ?>

		<main>
			<?php require_once("blocks/leftCol.php") ; ?>
			
			<div id="centerCol">
				<div id="feedbackBox">
					<form action="" method="POST">
						<label>Отправьте нам свои пожеания или отзыв:</label></br>
						<input maxlength="30" type="email" name="mail" placeholder="ел. почта..."></br></br></br>
						<textarea placeholder="Ваш отзыв..." name="feedbackMsg"></textarea></br>
						<input id="goFeedback" value="Отправить" type="submit">
					</form>
				</div>
			</div>

			<?php require_once("blocks/rightCol.php") ; ?>
		</main>

		<?php require_once("blocks/footer.php"); ?>
	</body>
</html>