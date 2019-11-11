<!DOCTYPE html> 
<html> 
<head> 
<title>Steel Knife</title> 
<meta charset="utf-8"> 
<meta name="keywords" content="test, site, website"> 
<meta name="description" content="Сайт пока еще в тестовом виде"> 
<link href="style.css?ver=4" rel="stylesheet" type="text/css" /> 
<link href="icon.jpg" rel="shortcut icon" type="image/x-icon" /> 
</head> 
<body> 
<header> 
<a href="index.php" id="text_logo">Steel Knife</a>
<div id="reg_header">
	<?php 
		if ($_COOKIE['user'] == ''):
	?>
	<center><button class="button"><b><a href="autho.php" id="inpute">Войти</a></b></button>
	<button class="button"><b><a href="reg.php" id="reg">Регистрация</a></b></button></center>
	<?php else: ?>
		<center><span id="text_user">Добро пожаловать, <a href="exit.php" style="color: #f2e0a2;" title="Выйти из учетной записи"><?=$_COOKIE['user']?></a></center>
	<?php endif ?>
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
		<center><p id="heading">Добро пожаловать!</p></center>
		<article id="general_text">Этот сайт пока что в тестовом режиме. <br /><br /><b>Скачивания только для зарегестрированных пользователей.</b> <img id="poster" src="https://www.playcentral.de/uploads/news/newspic-57020.jpg"></article>


	</div>	
</div>
<div id="right_block">
	
</div>




<footer>
	<span id="copyright">Все права защищены ©</span>
</footer> 


</body> 
</html>