<?php

require_once 'functions.php';

if(isset($_SESSION['id'])) {
	header('Location: index.php');
}

$login = new Login();

if(isset($_POST['submit'])) {
	$result = $login->login($_POST['username_email'], $_POST['password']);
}

if($result === 1) {
	$_SESSION['login'] = true;
	$_SESSION['id'] = $login->idUser();
	header('Location: index.php');
}

elseif($result === 10) {
	echo '<script>alert("Неправильный пароль");</script>';
}

elseif($result === 100) {
	echo '<script>alert("Игрок не зарегистрирован");</script>';
}


<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Авторизация</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700&amp;subset=cyrillic"> 
	<link rel="stylesheet" href="css/reset.css"> 	
	<link rel="stylesheet" href="css/styles.css">
	<link rel="icon" type="image/x-icon" href="images/favicons/favicon.ico">	
</head>

<body>
	<h2>Авторизация</h2>

	<form class="" action="" method="post" autocomplete="off">
		<label for="">Имя пользователя или E-mail:</label>
		<input type="text" name="name" required value="">
		<br>
		<label for="">Пароль:</label>
		<input type="password" name="password" required value="">
		<br>
		<label for="">Подтверждение пароля:</label>
		<input type="password" name="confirmpassword" required value="">
		<br>
		<button type="submit" name="submit">Войти</button>
	</form>
	<div class="action__links">
		<a href="registration.php">Зарегистрироваться</a>
	</div>
</body>
</html>