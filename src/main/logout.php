<?php

define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('INC', ROOT . '/includes');

require_once(INC . '/global.php');

$playerActions = new PlayerActions();
$playerActions->logout();

header("Location: index.php");

?>
