<?php
	session_start();
	$symbol = [$quest_one, $quest_two, $quest_three, $quest_four, $quest_five];
	$symbol[0] = "\"Капитан ... Воробей\"";
	$symbol[1] = "\"Властелин ...\"";
	$symbol[2] = "\"... престолов\"";
	$symbol[3] = "\"Конан ...\"";
	$symbol[4] = "\"Астерикс и ...\"";
	$rand_quest = $symbol[rand(0, 4)];
	$captcha = $rand_quest;
	if (isset($_POST["send"])) {
		$login = filter_var(trim($_POST["login"]), FILTER_SANITIZE_STRING);
		$name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
		$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_STRING);
		$password = filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING);
		$password_two = filter_var(trim($_POST["password_two"]), FILTER_SANITIZE_STRING);
		$in_captcha = filter_var(trim($_POST["in_captcha"]), FILTER_SANITIZE_STRING);
		$_SESSION["login"] = $login;
		$_SESSION["name"] = $name;
		$_SESSION["email"] = $email;
		$_SESSION["password"] = $password;
		$_SESSION["password_two"] = $password_two;
		$_SESSION["in_captcha"] = $in_captcha;
		$error_login = "";
		$error_name = "";
		$error_email = "";
		$error_password = "";
		$error_passwor_two = "";
		$error_captcha = "";
		$error = false;
		if (mb_strlen($login) < 2 || mb_strlen($login) > 30) {
			$error_login = "Введите логин";
			$error = true;
		}
		if (mb_strlen($name) < 2 || mb_strlen($name) > 30) {
			$error_name = "Введите имя";
			$error = true;
		}
		if (mb_strlen($password) < 5 || mb_strlen($password) > 90) {
			$error_password = "Введите пароль(не менее 5 символов)";
			$error = true;
		}
		if ($password_two != $password) {
			$error_password_two = "Пароль не совпадает";
			$error = true;
		}
		if ($in_captcha == "Джек" || $in_captcha == "джек" || $in_captcha == "Колец" || $in_captcha == "колец" || $in_captcha == "Игра" || $in_captcha == "игра" || $in_captcha == "Варвар" || $in_captcha == "варвар" || $in_captcha == "Обеликс" || $in_captcha == "обеликс") {
			$error = false;
		}else {
			$error = true;
			$error_captcha = "Введите символы";
		}
		if (!$error) {
			$password = md5($password."ghfkjjngn12345");
			$mysql = new mysqli('localhost', 'root', '', 'mybase');
			$mysql->query("INSERT INTO `users`(`login`, `name`, `email`, `password`) VALUES('$login', '$name', '$email','$password')");
			$mysql->close();
			header('Location: autho.php');
			session_destroy();
			exit;
		}
	}

?>
<!DOCTYPE html> 
<html> 
<head> 
<title>Регистрация</title> 
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
		<center><span id="title_reg">Регистрация</span></center>
		<form action="" method="post">
			<label for="login" class="in_title">Придумайте логин <span class="color">*</span>: </label><br />
			<input type="text" name="login" class="in_reg" value="<?=$_SESSION["login"]?>"/><span style="color:red">&nbsp&nbsp<?=$error_login?></span><br /><br />
			<label for="name" class="in_title">Введите ваше имя <span class="color">*</span>: </label><br />
			<input type="text" name="name" class="in_reg" value="<?=$_SESSION['name']?>"/><span style="color:red">&nbsp&nbsp<?=$error_name?></span><br /><br />
			<label for="email" class="in_title">Введите e-mail <span class="color">*</span>: </label><br />
			<input type="email" name="email" class="in_reg" value="<?=$_SESSION['email']?>"/><span style="color:red">&nbsp&nbsp<?=$error_email?></span><br /><br />
			<label for="password" class="in_title">Введите пароль <span class="color">*</span>: </label><br />
			<input type="password" name="password" class="in_reg" value="<?=$_SESSION['password']?>"/><span style="color:red">&nbsp&nbsp<?=$error_password?></span><br /><br />
			<label for="password_two" class="in_title">Введите пароль еще раз <span class="color">*</span>: </label><br />
			<input type="password" name="password_two" class="in_reg" value="<?=$_SESSION['password_two']?>"/><span style="color:red">&nbsp&nbsp<?=$error_password_two?></span><br /><br />
			<span>(Защита от ботов) Заполните пустое поле <span class="color">*</span>: </span><br /><br />
			<span><?=$captcha?></span><br />
			<input type="text" name="in_captcha" class="in_reg" value="<?=$_SESSION['in_captcha']?>"/><span style="color:red">&nbsp&nbsp<?=$error_captcha?></span><br /><br />
			<input type="submit" id="sub_reg" name="send" value="Отправить"/>
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