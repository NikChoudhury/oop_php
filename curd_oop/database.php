<?php

class Database{
	private $host;
	private $username;
	private $password;
	private $dbname;

	protected function connect(){
		$this->host='localhost';
		$this->username='root';
		$this->password='';
		$this->dbname='curd_oop';

		$con = new mysqli($this->host,$this->username,$this->password,$this->dbname);
		if ($con->connect_error) {
 			 die("Connection failed: " . $con->connect_error);
		}
		return $con;
	}
}

class Query extends Database
{
	public function getData($table,$field='*',$condition_arr='',$order_by_filed='',$order_by_type='asc',$limit=''){

		$sql = "SELECT $field FROM $table";

		
		if ($condition_arr!='') {
			$sql.= ' WHERE ';
			$c = count($condition_arr);
			$i= 1;
			foreach ($condition_arr as $key => $val) {
				if ($i==$c) {
					$sql.= "$key='$val' ";
				}else{
					$sql.= "$key='$val' and ";
				}
				$i++;
			}
			// print_r($condition_arr);
			// die();
			
		}

		if ($order_by_filed!='') {
			$sql.= " ORDER BY $order_by_filed $order_by_type ";
		}

		if ($limit!='') {
			$sql.= " LIMIT $limit ";
		}

		// die($sql);
		
		/*$sql = "SELECT $field FROM $table WHERE $condition ORDER BY $order_by_filed $order_by_type LIMIT $limit";
		die($sql);*/

		$result = $this->connect()->Query($sql);
		if ($result->num_rows) {
			$arr = array();
			while ($row=$result->fetch_assoc()) {
				$arr[]= $row;
			}
			return $arr;
		}else{
			return 0;
		}
	} 
}

/*
 "SELECT * FROM users WHERE name='Nik' and id= 2 ORDER BY name DESC LIMIT 2"


 $sql = "SELECT $field FROM $table WHERE $condition ORDER BY $order_by_filed $order_by_type LIMIT $limit"
	
	$field -> * or name or email
	$table -> users
	$condition -> id='1' and name='Nik'
	$order_by_filed-> id, name 
	$order_by_type-> acs, decs
	$limit-> 1,2,3,...........
*/
?>