<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
		<?php 
			$title = "Тема";

			require_once("blocks/head.php"); 
			require_once("functions/auth.php");
			require_once("functions/showDisc.php");
			require_once("functions/showComment.php"); 
		?>
	</head>

	<body>
		<div id="top"></div>

		<?php require_once("blocks/header.php"); ?>

		<?php require_once("blocks/nav.php"); ?>

		<main>
			<?php require_once("blocks/leftCol.php") ; ?>
			
			<div id="centerCol">
				<div id="discussion">
					<h1><?= $data["name"] ?></h1>
					<p><?= $data["discription"] ?></p>
					<?php if($data["code"] != ""){ ?>
						<h1>Код:</h1>
						<pre><?= $data["code"] ?></pre>
					<?php }; ?>
					<p align="right"><span><?= $data["date"] ?></span>Автор темы: <?= $data["user"] ?>.</p>

					<?php if(isset($_SESSION["auth"])){ ?>
						<form id="commentForm" action="" method="POST"><textarea id="comment" placeholder="Ваш коментарий..." type="text"></textarea><textarea id="code" placeholder="Ваш код..." type="text"></textarea><div><input id="goComment" value="Отправить" type="button"><input value="Прикрепить код" id="addCode" type="button"></div></form></br></br>
					<?php }else{ ?>
						<p><a style="color: rgb(50, 50, 50);" href="#top">Войдите</a>, чтобы прокоментировать.</p>
					<?php }; ?>
					
					<div id="commentList">
						<?php if(isset($comments[0]["id"])){ ?>
							<h1>Коментарии</h1>
						<?php }; ?>		
										
						<?php for($i = 0; $i < count($comments); $i++){ ?>
							<div id="commentBox">
								<b <?php if($comments[$i]["user"] == $data["user"]) echo "style='color: rgb(0, 90, 0);'" ?>><?= $comments[$i]["user"] ?></b></br>
								<span><?= $comments[$i]["comment"] ?></span>
								<?php if($comments[$i]["code"] != ""){ ?>
									<pre><?= $comments[$i]["code"] ?></pre>
								<?php }; ?>
							</div>	
						<?php }; ?>
					</div>
				</div>
			</div>

			<?php require_once("blocks/rightCol.php") ; ?>
		</main>

		<?php require_once("blocks/footer.php"); ?>

		<script>
			$(document).ready(function(){
				$("#goComment").on("click", function(){
					var comment = $("#comment").val();
					var code = $("#code").val();

					if(comment != "" || code != ""){
						$("#comment").val("");
						$("#code").val("");

						$.ajax({
							url: "functions/addComment.php",
							type: "POST",
							dataType: "html",
							data: ({comment: comment, code: code, theme: <?= $_GET["id"] ?>}),
							success: success
						});
					};

					function success(data){
						$("#commentList").load("discussion.php?id="+<?= $_GET['id'] ?>+" #commentList");
						$("#commentList").css({"width": "100%"});
					};
				});

				$("#addCode").on("click", function(){
 					$("#code").slideToggle(800);
				});
			});
		</script>
	</body>
</html>