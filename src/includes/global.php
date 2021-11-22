<?php

define('CORE_DIR', ROOT . '/core');

require_once(CORE_DIR . '/DB.php');
require_once(CORE_DIR . '/Player.php');
require_once(CORE_DIR . '/PlayerActions.php');

$db = new DB();
$db->connect();

$playerActions = new PlayerActions();

session_start();

# Если пользователь залогинен - обновим $_SESSION['user'] 
# (чтобы отобразить самую последнюю информацию о нем). 
if(isset($_SESSION['logged_in'])) {
	$user = unserialize($_SESSION['user']);
	
	$_SESSION['user'] = serialize($userTools->get($user->id));
}