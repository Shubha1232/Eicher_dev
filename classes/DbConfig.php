<?php
session_start();
class DbConfig 
{	
	private $_host = 'localhost';
	private $_username = 'link4sqf_eicher';
	private $_password = 'Ujjain@0734';
	private $_database = 'link4sqf_eicher_dev';
	
	protected $connection;
	
	public function __construct()
	{
		if (!isset($this->connection)) {
			
			$this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
			
			if (!$this->connection) {
				echo 'Cannot connect to database server';
				exit;
			}			
		}	
		
		return $this->connection;
	}
}
?>