<?php 
	include_once("Database.php");
	include_once("Format.php");
?>
<?php
	class AdminLogin {
		private $db;
		private $fm;
		
		public function __construct() {
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function login($uname, $pass) {
		
			if (!empty($uname) && !empty($pass)) {
				$uname = $this->fm->validation($uname);
				$pass  = $this->fm->validation(md5($pass));

				$query = "SELECT * FROM admin WHERE username = '$uname' AND password = '$pass'";
				$result = $this->db->select($query);

				if ($result != false) {
					$value = $result->fetch_assoc();

					//For Session 


					header("Location:index.php");
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