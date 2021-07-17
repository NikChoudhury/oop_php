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
	public function getData($table,$field='*',$condition_arr='',$order_by_filed='',$order_by_type='desc',$limit=''){
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


/*Funtion For Insert Data*/
	
	public function insertData($table,$condition_arr=''){

		if ($condition_arr!='') {
			foreach ($condition_arr as $key => $val) {
				$field_arr[]=$key;
				$value_arr[]=$val;	

			}
			$field = implode(",", $field_arr);
			$values = implode("','", $value_arr);
			$values = "'".$values."'";
			$sql = "INSERT INTO `$table`($field) VALUES ($values) ";
			// die($sql);
			$result= mysqli_query($this->connect(),$sql);
			return $result;		
		}
		
	}

/* Function For Delete Data*/

	public function deleteData($table,$condition_arr=''){
		$sql = "DELETE FROM `$table` WHERE ";

		if ($condition_arr!='') {
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

			// die($sql);
			// $result = $this->connect()->Query($sql);
			$result= mysqli_query($this->connect(),$sql);
			return $result;
			
			  		
		}
		
	}

// Function For Update Data
	public function updateData($table,$condition_arr='',$where_field,$where_value){
		if ($condition_arr!='') {
			$sql = "UPDATE `$table` SET ";
			$c = count($condition_arr);
			$i= 1;
			foreach ($condition_arr as $key => $val) {
				if ($i==$c) {
					$sql.= "$key='$val' ";
				}else{
					$sql.= "$key='$val' , ";
				}
				$i++;
			}
			$sql.= " WHERE $where_field = $where_value";
			// die($sql);
			$result = $this->connect()->Query($sql);		
		}
		
	}

// Safe Value
	public function get_safe_str($str){
		if ($str!='') {
			return mysqli_real_escape_string($this->connect(),$str);
		}
	}

// //Add to Trash Bin
// 	public function insertTash($table,$condition_arr=''){
		
// 	}


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