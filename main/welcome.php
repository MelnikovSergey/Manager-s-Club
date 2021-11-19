<?php

define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('INC', ROOT . '/includes');

require_once(INC . '/global.php');

# Проверяем вошел ли пользователь
if(!isset($_SESSION['logged_in'])) {
	header("Location: login.php");
}

# Забираем объект user из сессии
$user = unserialize($_SESSION['user']);

?>

<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Manager's Club | Личный кабинет <?php echo $user->username; ?></title>
	</head>
<body>
	Привет, <?php echo $user->username; ?>. Вы зарегистрировались и вошли в систему. 
	Добро пожаловать! <a href="logout.php">Выйти</a> | <a href="index.php">Вернуться на главную страницу</a>
</body>
</html>
