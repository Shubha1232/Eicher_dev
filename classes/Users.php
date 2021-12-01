<?php
include_once 'DbConfig.php';

class Database extends DbConfig
{
	public function __construct()
	{
		parent::__construct();
	}
	
	/*
	Function For Get All Data
	*/
	public function getAllData($query)
	{		
		$result = $this->connection->query($query);
		if ($result == false) {
			return false;
		} 
		
		$rows = array();
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
	}
	
	/*
	Function For Insert Data
	*/	
	public function insert($table = null,$data) 
	{
		$query = "INSERT INTO `" . $table . "` ";
		$v     = '';
		$k     = '';
		
		foreach ($data as $key => $val) {
			$val = escape_string($val); // filter input value
			$k .= "`$key`, ";
			$v .= "'" . $val . "', ";
		}
		$query .= "(" . rtrim($k, ', ') . ") VALUES (" . rtrim($v, ', ') . ");";
		
		$result = $this->connection->query($query);
		
		if ($result == false) {
			return false;
		} else {
			return true;
		}		
	}
	
	/*
	Function For Insert Data
	*/	
	public function update($table = null, $data, $where = '1') 
	{
		if ($table === null or empty($data) or !is_array($data)) {
			echo "Invalid array for table: <b>" . $table . "</b>.";
			return false;
		}
		
		$query = "UPDATE `" . $table . "` SET ";
		foreach ($data as $key => $val) {
			
			$val = escape($val); // filter input value
			
			$query .= "`$key`='" . $val . "', ";
		}
		$query   = rtrim($q, ', ') . ' WHERE ' . $where . ';';
		
		$result = $this->connection->query($query);
		
		if ($result == false) {
			return false;
		} else {
			return true;
		}		
	}
	
	/*
	Function For Delete Data
	*/
	public function delete($id, $table) 
	{ 
		$query = "DELETE FROM $table WHERE id = $id";
		
		$result = $this->connection->query($query);
	
		if ($result == false) {
			return false;
		} else {
			return true;
		}
	}
	
	/*
	Function For Escape String
	*/
	public function escape_string($value)
	{
		return $this->connection->real_escape_string($value);
	}
	
	/*
	Function For Get Single Row Data
	*/
	public function getSingleRow($query)
	{		
		$result = $this->connection->query($query);
		if ($result == false) {
			return false;
		} 
		$row = $result->fetch_assoc(); 
		return $row;
	}
}
?>
