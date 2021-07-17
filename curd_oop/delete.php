<?php
include 'database.php';
$obj = new Query;
// Move To Trash Bin
if (isset($_POST['type']) && $_POST['type'] == 'trash') {
	$id = $obj->get_safe_str($_POST['id']);
	$condition_arr = array('id'=>$id);
	$resultArr = $obj->getData('users','*',$condition_arr,'id','desc','');
	$name = $resultArr[0]['name'];
	$email = $resultArr[0]['email'];
	$mobile = $resultArr[0]['mobile'];
	// $added_on = date('Y-m-d h:i:s');
	$insert_condition_arr = array('user_id'=>$id,'name'=>$name,'email'=>$email,'mobile'=>$mobile);
	$obj->insertData('trash',$insert_condition_arr);
	$result = $obj->deleteData('users',$condition_arr);
		if ($result==1) {
				
				echo json_encode("Object was deleted.");
		}else{	
				json_encode("Something is wrong");
		}
		// exit();
}

// Multiple Delete
if (isset($_POST['type']) && $_POST['type'] == 'multidelete'){
	$id_arr = $_POST['data'];
	$id_arr_count = count($_POST['data']);

	for($i=0; $i < $id_arr_count; $i++) 
	 {
	    $id = $id_arr[$i];
	    $id = $obj->get_safe_str($id);
	    $condition_arr = array('trash_id'=>$id);
	    // print_r($condition_arr) ;
	    $result = $obj->deleteData('trash',$condition_arr);
	}
	// print_r($id_arr_count);
}

// Multiple Restore
if (isset($_POST['type']) && $_POST['type'] == 'multirestore'){
	$id_arr = $_POST['data'];
	$id_arr_count = count($_POST['data']);

	for($i=0; $i < $id_arr_count; $i++) 
	 {
	    $id = $id_arr[$i];
	    $id = $obj->get_safe_str($id);
	    $condition_arr = array('trash_id'=>$id);
	    $resultArr = $obj->getData('trash','*',$condition_arr,'trash_id','desc','');
	    $name = $resultArr[0]['name'];
	    $email = $resultArr[0]['email'];
	    $mobile = $resultArr[0]['mobile'];
	    // $added_on = date('Y-m-d h:i:s');
	    $insert_condition_arr = array('name'=>$name,'email'=>$email,'mobile'=>$mobile);
	    $obj->insertData('users',$insert_condition_arr);
	    $result = $obj->deleteData('trash',$condition_arr);
	    json_encode($result);
	}
	// print_r($id_arr_count);
}
// DELETE FROM trash WHERE added_on < (NOW() - INTERVAL 1 MINUTE)
?>

