<?php

define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('INC', ROOT . '/includes');

require_once(INC . '/global.php');

?>

<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Manager's Club | Главная страница</title>
	</head>
<body>

<?php if(isset($_SESSION['logged_in'])) : ?>
	<?php $user = unserialize($_SESSION['user']); ?>
	Hello, <?php echo $user->username; ?>. You are logged in. <a href="main/logout.php">Logout</a> | <a href="main/settings.php">Change Email</a>
<?php else : ?>
	You are not logged in. <a href="main/login.php">Log In</a> | <a href="main/register.php">Register</a>
<?php endif; ?>

</body>
</html>
