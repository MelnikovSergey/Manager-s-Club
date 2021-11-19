<?php

define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('INC', ROOT . '/includes');

require_once(INC . '/global.php');

# Инициализируем переменные, которые используются в форме
$username = "";
$password = "";
$password_confirm = "";
$email = "";
$error = "";

# Проверяем: отправлена ли форма
if(isset($_POST['submit-form'])) { 

	# Получаем переменные ($_POST)
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password_confirm = $_POST['password-confirm'];
	$email = $_POST['email'];

	# Инициализируем переменные для проверки формы
	$success = true;
	$playerActions = new PlayerActions();

	# Проверяем правильность заполнения формы
	# Проверяем не занят ли этот логин
	if ($PlayerActions->checkUsernameExists($username)) {
		$error .= "That username is already taken.<br/> \n\r";
		$success = false;
	}

	# Проверяем совпадение паролей
	if($password != $password_confirm) {
		$error .= "Passwords do not match.<br/> \n\r";	
		$success = false;
	}

	if($success) {
		# Подготавливаем информацию для сохранения объекта нового пользователя
		$data['username'] = $username;
		$data['password'] = md5($password); // !!! исправить это !!!
		$data['email'] = $email;

		# Создаем новый объект пользователя
		$newPlayer = new Player($data);

		# Сохраняем нового пользователя в БД
		$newPlayer->save(true);

		# Войти
		$playerActions->login($username, $password);

		# Редирект на страницу приветствия
		header("Location: welcome.php");
	}
}

# Если форма не отправлена или не прошла проверку, то показать форму снова

?>

<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Manager's Club | Регистрация</title>
	</head>
		<body>
			<?php echo ($error != "") ? $error : ""; ?>
			<form action="register.php" method="post">
				Имя: <input type="text" value="<?php echo $username; ?>" name="username" /><br/>
				Пароль: <input type="password" value="<?php echo $password; ?>" name="password" /><br/>
				Подтвердить пароль: <input type="password" value="<?php echo $password_confirm; ?>" name="password-confirm" /><br/>
				E-Mail: <input type="text" value="<?php echo $email; ?>" name="email" /><br/>
				<input type="submit" value="Отправить" name="submit-form" />
			</form>
		</body>
</html>
