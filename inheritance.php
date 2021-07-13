<?php
/*
	Inheritance in OOP = When a class derives from another class.

	The child class will inherit all the public and protected properties and methods from the parent class. In addition, it can have its own properties and methods.

	An inherited class is defined by using the extends keyword.
*/

class Class1{
	function __construct(){
		echo "Construct1";
	}

	function fun1(){
		echo "Fun1";
	}

}

// $obj1 = new Class1();

/**
 * 
 */
class Class2 extends Class1
{
	// function __construct(){
	// 	parent::__construct();
	// 	echo "Construct2";
	// }
	
}


$obj2 = new Class2();
$obj2->fun1();













?>