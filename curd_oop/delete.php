<?php
include 'database.php';
$obj = new Query;
if (isset($_POST['type']) && $_POST['type'] = 'delete') {
	$id = $obj->get_safe_str($_POST['id']);
	$condition_arr = array('id'=>$id);
	// sleep(.4);
	$result = $obj->deleteData('users',$condition_arr);
	if ($result==1) {
			
			echo json_encode("Object was deleted.");
	}else{	
			json_encode("Something is wrong");
	}
}
?>