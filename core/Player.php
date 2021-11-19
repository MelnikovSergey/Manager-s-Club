<?php

require_once 'DB.php';

class Player {

	public $id;
	public $username;
	public $hashedPassword;
	public $email;
	public $joinDate;

	public function __construct($data) 
	{
		$this->id = (isset($data['id'])) ? $data['id'] : "";
		$this->username = (isset($data['username'])) ? $data['username'] : "";
		$this->hashedPassword = (isset($data['password'])) ? $data['password'] : "";
		$this->email = (isset($data['email'])) ? $data['email'] : "";
		$this->joinDate = (isset($data['join_date'])) ? $data['join_date'] : "";
	}

	public function save($isNewPlayer = false) {
		
		$db = new DB();

		# Если игрок зарегистрирован
		if(!$isNewPlayer) {

			$data = array(
				"username" => "'$this->username'",
				"password" => "'$this->hashedPassword'",
				"email" => "'$this->email'"
			);

			# Апдейтим данные игрока
			$db->update($data, 'players', 'id = '.$this->id);
		} else {
			
			# Если игрок регистрируется впервые ($isNewPlayer == true)
			$data = array(
				"username" => "'$this->username'",
				"password" => "'$this->hashedPassword'",
				"email" => "'$this->email'",
				"join_date" => "'".date("Y-m-d H:i:s",time())."'"
			);
		
			$this->id = $db->insert($data, 'players');
			$this->joinDate = time();
		}

		return true;
	}
}
