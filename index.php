<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
		<?php 
			$title = "Главная";

			require_once("blocks/head.php"); 
			require_once("functions/auth.php");
			require_once("functions/showTheme.php");
		?>
	</head>

	<body>
		<div id="top"></div>

		<?php require_once("blocks/header.php"); ?>

		<?php require_once("blocks/nav.php"); ?>

		<main>
			<?php require_once("blocks/leftCol.php") ; ?>
			
			<div id="centerCol">
				<?php if(count($data) == 0){ echo "<h1 align=center style='color: rgb(60, 60, 60);'>По вашему запросу ничего не найдено!</h1>"; }; ?>

				<?php for($i = 0; $i < count($data); $i++){ ?>
					<div id="themeBox">
						<a href="discussion.php?id=<?= $data[$i]['id'] ?>#nav"><?= $data[$i]["name"] ?></a>

						<p><?= $data[$i]["shortdisc"] ?></p>
					</div>
				<?php }; ?>	

				<div id="pagination">
					<a href=?page=1<?php if(isset($_GET["search"])){ echo "&search="; echo $_GET["search"]; }; ?>><<</a>
					<a href=<?php if($_GET["page"] > 1){ echo "?page="; echo $_GET["page"] - 1; if(isset($_GET["search"])){ echo "&search="; echo $_GET["search"]; }; }; ?>><</a>
					<a href=""><?= $_GET["page"] ?></a>
					<a href=<?php if($_GET["page"] < $maxPage){ echo "?page="; echo $_GET["page"] + 1; if(isset($_GET["search"])){ echo "&search="; echo $_GET["search"]; }; }; ?>>></a>
					<a href=?page=<?= $maxPage ?><?php if(isset($_GET["search"])){ echo "&search="; echo $_GET["search"]; }; ?>>>></a>
				</div>				
			</div>

			<?php require_once("blocks/rightCol.php") ; ?>
		</main>

		<?php require_once("blocks/footer.php"); ?>
	</body>
</html>