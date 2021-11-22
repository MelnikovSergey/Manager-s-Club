<?php 

define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('INC', ROOT . '/includes');

require_once(INC . '/global.php');

# Проверяем: вошел ли пользователь
if(!isset($_SESSION['logged_in'])) {
	header("Location: login.php");
}

# Забираем объект user из сессии
$user = unserialize($_SESSION['user']);

# Инициализируем переменные, используемые в форме
$email = $user->email;
$message = "";

# Проверяем: отправлена ли форма
if(isset($_POST['submit-settings'])) { 
	$email = $_POST['email'];

	$user->email = $email;
	$user->save();

	$message = "Настройки сохранены<br/>";
}

# Если форма не отправлена или не прошла проверку, то показать форму снова

?>

<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Manager's Club | Настройки</title>
	</head>
<body>
	<?php echo $message; ?>
	<form action="settings.php" method="post">
		E-Mail: <input type="text" value="<?php echo $email; ?>" name="email" /><br/>
		<input type="submit" value="Обновить" name="submit-settings" />
	</form>
</body>
</html>