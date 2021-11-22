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
	Hey there, <?php echo $user->username; ?>. You've been registered and logged in. 
	Welcome! <a href="logout.php">Log Out</a> | <a href="index.php">Return to 
	Homepage</a>
</body>
</html>