<?php
class User {

	public $con;
	
	public function __construct() {
		$this->con = mysqli_connect("localhost", "root", "", "todolist") or die ('Could not connect to the database.');
	
	}
	public function closeDB() {
		if(isset($this->con)) {
			mysqli_close($this->con);
		}
	}

	public function loginUser() {
		$user = strtolower($_POST['username']);
		$pass = strtolower($_POST['password']);
		$sql = "SELECT * 
				FROM users		
				WHERE username='$user' 
				AND password='$pass'
				LIMIT 1";
		$check = mysqli_query($this->con, $sql);
		$check2 = mysqli_num_rows($check);
		if($check2 != 0){
			while($row = mysqli_fetch_array($check)){
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['firstname'] = $row['firstname'];
				$_SESSION['logged_in'] = 1;
				return TRUE;
			}
		}
		else {
			return FALSE;
		}
	}
	public function logOut() {
		session_start();
		session_unset();
		session_destroy();
		header ("Location: index.php");
	}
	
}

?>