<nav id="nav">
	<form action="index.php#nav" method="GET">
		<a href="index.php">Главная</a>
		<?php if(isset($_SESSION["auth"])){ ?>
			<a href="newTheme.php#nav">Новая тема</a>
		<?php }; ?>
		<a href="feedback.php#nav">Обратная связь</a>
		<?php if(empty($_SESSION["auth"])){ ?>
			<a href="#top">Войдите чтобы создать тему</a>
		<?php }; ?>
		<input id="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; }; ?>" name="search" placeholder="Поиск" maxlength="100" type="search">
		<input id="searchIc" name="go" src="img/search.png" type="image">
	</form>
</nav>