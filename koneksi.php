<?php
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$db_name = 'db_pdap';

	$con = mysqli_connect($host, $username, $password, $db_name);
	//$data=mysqli_select_db("db_pdap") or die (mysqli_error());

	/*Class dbObj{
		//Database connection start 
		var $dbhost = "localhost";
		var $username = "root";
		var $password = "";
		var $dbname = "db_pdap";
		var $conn;
		function getConnstring() {
		
		$con = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());
		 
		//check connection 
		if (mysqli_connect_error()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
		} else {
		$this->conn = $con;
		}
		return $this->conn;
		}
		}*/
?>