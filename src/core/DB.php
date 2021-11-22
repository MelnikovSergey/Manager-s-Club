<?php

class DB {

	protected $db_name = 'managers-club';
	protected $db_user = 'root';
	protected $db_pass = 'password';
	protected $db_host = 'localhost';

	# Устанавливаем соединение с БД. Вызывается на каждой странице. 
	public function connect() 
	{
		$connection = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->db_host,  $this->db_user,  $this->db_pass));
		mysqli_select_db($GLOBALS["___mysqli_ston"], $this->db_name);
		return true;
	}

	# Берет ряд mysql и возвращает ассоциативный массив, в котором
	# названия колонок являются ключами массива. 
	# Если singleRow - true, тогда выводится только один ряд.
	public function processRowSet($rowSet, $singleRow=false)
	{
		$resultArray = array();
		
		while($row = mysqli_fetch_assoc($rowSet)) {
			array_push($resultArray, $row);
		}
		
		if($singleRow === true)
			return $resultArray[0];

		return $resultArray;
	}

	# Выбирает ряды из БД
	# Выводит полный ряд или ряды из $table используя $where 
	public function select($table, $where) 
	{
		$sql = "SELECT * FROM $table WHERE $where";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		
		if(mysqli_num_rows($result) == 1)
			return $this->processRowSet($result, true);
		
		return $this->processRowSet($result);
	}

	# Вносит изменения в БД
	public function update($data, $table, $where) 
	{
		foreach ($data as $column => $value) {
			$sql = "UPDATE $table SET $column = $value WHERE $where";
			mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}

		return true;
	}

	# Вставляет новый ряд в таблицу
	public function insert($data, $table) 
	{

		$columns = "";
		$values = "";

		foreach ($data as $column => $value) {
			$columns .= ($columns == "") ? "" : ", ";
			$columns .= $column;
		
			$values .= ($values == "") ? "" : ", ";
			$values .= $value;
		}

		$sql = "insert into $table ($columns) values ($values)";
		mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die(mysqli_error($GLOBALS["___mysqli_ston"]));

		# Выводит ID пользователя в БД.
		return ((is_null($___mysqli_res = mysqli_insert_id($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
	}
}