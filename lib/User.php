<?php 
	include_once("Database.php");
	include_once("Format.php");
?>
<?php
class User {
	private $db;
	private $fm;
	
	public function __construct() {
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function userLogin($data) {
		if (!empty($data['username']) && !empty($data['password'])) {
			$uname = $this->fm->validation($data['username']);
			$pass  = $this->fm->validation(md5($data['password']));

			$query = "SELECT * FROM users WHERE username = '$uname' AND password = '$pass'";
			$result = $this->db->select($query);

			if ($result != false) {
				$value = $result->fetch_assoc();
				Session::set("userLogin", true);
				Session::set("userId", $value['id']);
				Session::set("userName", $value['firstname']);

				header("Location:profile.php");
			}
			else {
				return $msg = "<span class='error'>Username or Password not match !!</span>";
			}
		}
		else {
			return $msg = "<span class='error'>Username or Password must not be empty !!</span>";
		}
	}
}



?>