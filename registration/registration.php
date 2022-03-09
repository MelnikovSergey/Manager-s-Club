<?php

require_once 'functions.php';

if(isset($_SESSION['id'])) {
	header('Location: index.php');
}

$register = new Register();

if(isset($_POST['submit'])) {
	$result = $register->registration($_POST['name'], $_POST['username'], $_POST['email'], $_POST['password'], $_POST['confirmpassword']);
}

if($result === 1) {
	echo '<script>alert("Регистрация завершена");</script>';
}

elseif($result === 10) {
	echo '<script>alert("Имя пользователя или E-mail заняты");</script>';
}

elseif($result === 100) {
	echo '<script>alert("Пароль не совпадает");</script>';
}


<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Регистрация</title>
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
	<h2>Регистрация</h2>

	<form class="" action="" method="post" autocomplete="off">
		<label for="">Имя:</label>
		<input type="text" name="name" required value="">
		<br>
		<label for="">Имя пользователя:</label>
		<input type="text" name="username" required value="">
		<br>
		<label for="">E-mail:</label>
		<input type="email" name="email" required value="">
		<br>
		<label for="">Пароль:</label>
		<input type="password" name="password" required value="">
		<br>
		<label for="">Подтверждение пароля:</label>
		<input type="password" name="confirmpassword" required value="">
		<br>
		<button type="submit" name="submit">Отправить</button>
	</form>
	<div class="action__links">
		<a href="login.php">Войти</a> | <a href="registration.php">Зарегистрироваться</a>
	</div>
</body>
</html>