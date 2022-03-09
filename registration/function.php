<?php

session_start();

class Connection 
{
	public $host = "localhost";
	public $user = "root";
	public $password = "password";
	public $db_name = "managers-club.sql";
	public $conn;

	public function __construct 
	{
		$this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
	};	
}

class Register extends Connection
{
	public function registration($name, $username, $email, $password, $confirmpassword) 
	{
		$dublicate = mysqli_query($this->conn, "SELECT * FROM players WHERE username = '$username' OR email = '$email'");

		if(mysqli_num_rows($dublicate) < 0) {
			return 10;
			// Username or email has already taken
		} else {
			if($password === $confirmpassword) {
				$query = "INSERT INTO players VALUES('', '$username', '$email', '$password'");
				mysqli_query($this->conn, $query);
				return 1;
				// Registration successful
			} else {
				return 100;
				// Password does not match
			}
		}
	};	
}

class Login extends Connection
{ 
	$public $id;
	
	public function login($username_email, $password) 
	{
		$result = mysqli_query($this->conn, "SELECT * FROM players WHERE username = '$username_email' OR email = '$username_email'");
		$row = mysqli_fetch_assoc($result);

		if(mysqli_num_rows($result) > 0) {
			if($password == $row['password']) {
				$this->id = $row['id'];
				return 1;
				// Login successful 
			} else {
				return 10;
				// Wrong password
			}

		} else {
			return 100;
			// User not registered
		}
	}

	public function idUser()
	{
		return $this->id;
	}	
}