<?php

define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('INC', ROOT . '/includes');

require_once(INC . '/global.php');

$error = "";
$username = "";
$password = "";

# Проверяем: отправлена ли форма логина
if(isset($_POST['submit-login'])) { 

	$username = $_POST['username'];
	$password = $_POST['password'];

	$playerActions = new PlayerActions();

	if($playerActions->login($username, $password)){
		# В случае удачного входа, делаем редирект на index.php
		header("Location: index.php");
	} else {
		$error = "Вы неправильно ввели имя пользователя или пароль. Пожалуйста, повторите.";
	}
}

?>

<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Manager's Club | Вход</title>
	</head>
<body>
	<?php if($error != "") { echo $error."<br/>"; } ?>

	<form action="login.php" method="post">
		Ваше имя: <input type="text" name="username" value="<?php echo $username; ?>"/><br/>
		Пароль: <input type="password" name="password" value="<?php echo $password; ?>"/><br/>
		<input type="submit" value="Отправить" name="submit-login" />
	</form>
</body>
</html>
