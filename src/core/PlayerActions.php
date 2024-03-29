<?php

require_once 'DB.php';
require_once 'Player.php';

class PlayerActions {

	# Проверяем $username и $password. Если данные совпадают, создаем объект Player и сохраняем его в сессии. 
	public function login($username, $password)
	{
		$hashedPassword = md5($password);
		$result = mysql_query("SELECT * FROM players WHERE username = '$username' AND password = '$hashedPassword'");

		if(mysql_num_rows($result) == 1) {
			$_SESSION["user"] = serialize(new User(mysql_fetch_assoc($result)));
			$_SESSION["login_time"] = time();
			$_SESSION["logged_in"] = 1;
			return true;
		} else {
			return false;
		}
	}

	# Чистим память, удаляем сессию
	public function logout() 
	{
		unset($_SESSION['user']);
		unset($_SESSION['login_time']);
		unset($_SESSION['logged_in']);
		session_destroy();
	}

    # Запрашиваем, использован такой логин или нет.
	public function checkUsernameExists($username) 
	{
		$result = mysql_query("select id from players where username='$username'");
		
		if(mysql_num_rows($result) == 0) {
			return false;
		} else {
			return true;
		}
	}

 	# Создаем новый объект "Player"
	public function get($id)
	{
		$db = new DB();
		$result = $db->select('players', "id = $id");
		
		return new Player($result);
	}
}