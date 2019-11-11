<?php
	session_start();
	if (isset($_POST["send"])) {
		$login = filter_var(trim($_POST["login"]), FILTER_SANITIZE_STRING);
		$password = filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING);
		$_SESSION["login"] = $login;
		$_SESSION["password"] = $password;
		$error_login = "";
		$error = false;
		$password = md5($password."ghfkjjngn12345");
		$mysql = new mysqli('localhost', 'root', '', 'mybase');
		$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
		$user = $result->fetch_assoc();
		if (count($user) == 0) {
			$error_login = "Неверный логин или пароль";
			$error = true;
		}
		if (!$error) {
			setcookie('user', $user['name'], time() + 3600 * 24, "/");
			$mysql->close();
			header('Location: index.php');
			session_destroy();
			exit();
		}
	}

?>
<!DOCTYPE html> 
<html> 
<head> 
<title>Войти</title> 
<meta charset="utf-8"> 
<meta name="keywords" content="test, site, website"> 
<meta name="description" content="Сайт пока еще в тестовом виде"> 
<link href="style.css" rel="stylesheet" type="text/css" /> 
<link href="icon.jpg" rel="shortcut icon" type="image/x-icon" />
</head> 
<body> 
<header> 
<a href="index.php" id="text_logo">Steel Knife</a>
<div id="reg_header">
	<center><button class="button"><b><a href="autho.php" id="inpute">Войти</a></b></button>
	<button class="button"><b><a href="reg.php" id="reg">Регистрация</a></b></button></center>
</div>
<div id = "click_block">
	<div class="hover_block"><a href="index.php" class="click_down" title="На главную">Главная</a></div>
	<div class="hover_block"><a href="index.php" class="click_down" title="Новости">Новости</a></div>
	<div class="hover_block"><a href="index.php" class="click_down" title="Статьи">Статьи</a></div>
	<div class="hover_block"><a href="index.php" class="click_down" title="Оружейная">Оружейная</a></div>
	<div class="hover_block"><a href="index.php" class="click_down" title="О нас">О нас</a>
</div>

</header> 
<div id="left_block">
	<div id="block_panel">
		<center><ul id="menu_panel">
			<a href="index.php" class="link_color"><li class="menu_click">Главная</li></a>
			<a href="" class="link_color"><li class="menu_click">Модификации</li></a>
			<a href="" class="link_color"><li class="menu_click">Скриншоты</li></a>
			<a href="" class="link_color"><li class="menu_click">Ссылка 1</li></a>
			<a href="" class="link_color"><li class="menu_click">Ссылка 2</li></a>
			<a href="" class="link_color"><li class="menu_click">Ссылка 3</li></a>
			<a href="" class="link_color"><li class="menu_click">Ссылка 4</li></a>
		</ul></center>
	</div>
</div>
<div id="general_block">
	<div id="article_block">
		<center><span id="title_reg">Вход</span></center>
		<form action="" method="post">
			<center><label for="login" class="in_title">Логин: </label><br />
			<input type="text" name="login" class="in_reg" value="<?=$_SESSION["login"]?>"/><br /><br />
			<label for="password" class="in_title">Пароль: </label><br />
			<input type="password" name="password" class="in_reg" value="<?=$_SESSION['password']?>"/><br /><br />
			<span style="color:red">&nbsp&nbsp<?=$error_login?></span><br />
			<input type="submit" id="sub_reg" name="send" value="Войти"/></center>
		</form>


	</div>	
</div>
<div id="right_block">
	
</div>




<footer>
	<span id="copyright">Все права защищены ©</span>
</footer> 


</body> 
</html>