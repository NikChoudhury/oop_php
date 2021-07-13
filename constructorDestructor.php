<?php
/* 
	create a __construct() function, PHP will automatically call this function when you create an object from a class.
*/
class Hello {
	function __construct(){ 
		echo "Start";

	}

	function fun1(){
		echo "Hello";
	}

	function __destruct(){
		echo "End";
	}

}

$obj= new Hello();
$obj->fun1();

echo "<br>";
// --------------------------- //

class Hello1 {
	function __construct($y){ 
		$this->x=$y;

	}

	function fun1(){
		echo $this->x;
	}

	function __destruct(){
		echo "STOP";
	}

}

$obj1= new Hello1(50);
$obj1->fun1();

/*

	__destruct() function, PHP will automatically call this function at the end of the script.

*/

?>