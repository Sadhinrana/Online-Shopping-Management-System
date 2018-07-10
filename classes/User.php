<?php 
$realpath = realpath(dirname(__FILE__));
include_once($realpath."/../config/Database.php");
include_once($realpath."/../helpers/Format.php");

class Customer{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
?>