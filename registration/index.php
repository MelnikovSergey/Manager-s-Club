<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Личный кабинет</title>
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