<?php
include 'database.php';
$obj = new Query;
echo "<pre>";
// $condition_arr = array('name'=>'Nik');
// print_r($obj->getData('users','name,id,mobile','','id','desc'));

// $condition_arr = array('name'=>'Nik','email'=>'jik@gmail.com','mobile'=>'123544');
// $result = $obj->insertData('users',$condition_arr);
// print_r($result);

$condition_arr = array('id'=>'17','name'=>'18');
$result = $obj->deleteData('users',$condition_arr);
if ($result==1) {
	echo "trusse".$result;
}else{
	echo "dzscsult".$result;
}
print_r($result);
echo $result;


// $condition_arr = array('mobile'=>'14','name'=>'Nik');
// $result = $obj->updateData('users',$condition_arr,'id',1);
// print_r($result);
?>