<?php
class Session {
	public static function init() {
		session_start();
	}

	public static function set($key, $val) {
		$_SESSION[$key] = $val; 
		//$_SESSION['name'] = "Raj Sana"; //Setter(Value set kara)
	}

	public static function get($key) {
		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];  //Getter(Value dharay neya asa)
		} 
		else {
			return false;
		}
	}

	public static function checkSession() {
		self::init();
		if (self::get('adminLogin') == false) {
			self::destroy();
		}
	}

	public static function checkLogin() {
		self::init();
		if (self::get('adminLogin') == true) {
			header("Location:index.php");
		}
	}

	public static function destroy() {
		session_destroy();
		header("Location:login.php");
	}

}


?>