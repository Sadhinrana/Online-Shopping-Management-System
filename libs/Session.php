<?php 
class Session{
	public static function init(){
		session_start();
	}
	
	public static function setSession($key, $value){
		$_SESSION[$key] = $value;
	}
	
	public static function getSession($key){
		if(isset($_SESSION[$key])){
			return $_SESSION[$key];
		}else{
			return false;
		}
	}
	
	public static function checkSession(){
		self::init();
		if(self::getSession("login") == false){
			self::destroy();
			header("Location:login.php");
		}
	}
	
	public static function checkLogin(){
		self::init();
		if(self::getSession("login") == true){
			self::destroy();
			header("Location:index.php");
		}
	}
	
	public static function destroy(){
		session_destroy();
		header("Location:login.php");
	}
}
?>