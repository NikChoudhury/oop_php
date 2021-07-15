<?php
include 'database.php';

$obj = new Query;
echo "<pre>";
$condition_arr = array('name'=>'Nik');
print_r($obj->getData('users','name,id,mobile','','id','desc'));

?>