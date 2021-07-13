<?php
/*
	Abstract classes and methods are when the parent class has a named method, but need its child class(es) to fill out the tasks.

	An abstract class is a class that contains at least one abstract method. An abstract method is a method that is declared, but not implemented in the code.

	An abstract class or method is defined with the abstract keyword

*/

//	-->Abstract Class Contain atleast one abstract function
//	-->abstract function: Must Declare but not Implement
//	-->Abstract Class Could not create Object
//	-->Abstract Class, child class must contain Abstract function	

abstract class Class1{
	abstract function fun1();
}


class Class2 extends Class1
{
	function fun1(){
		echo "Test";
	}
}

$obj2= new Class2;
$obj2->fun1();

////////////////////////////////


abstract class Bank{
	abstract function id_proof();
}

class HDFC extends Bank
{
	function id_proof(){
		echo "Jon";
	}
}

class ICICI extends Bank
{
	function id_proof(){
		echo "Test";
	}
}

// Every Bank Need Id Proof 









?>