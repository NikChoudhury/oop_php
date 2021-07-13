<?php
/*
	PHP only supports single inheritance: a child class can inherit only from one single parent.

	So, what if a class needs to inherit multiple behaviors? OOP traits solve this problem.

	Traits are used to declare methods that can be used in multiple classes. Traits can have methods and abstract methods that can be used in multiple classes, and the methods can have any access modifier (public, private, or protected).

	Traits are declared with the trait keyword:
*/

/*
trait Class1{
	function fun1(){
		echo "Fun1";
	}
}

class Class2{
	// use Class1;
	function fun2(){
		echo "Fun2";
	}
}

class Class3 extends Class2{
	function fun3(){
		echo "Fun3";
	}
}

class Class4 extends Class3{
	use Class1;
	function fun4(){
		echo "Fun4";
	}
}

$obj = new Class4;
$obj->fun1();

*/

trait T1{
	function fun1(){
		echo "T1:fun1";
		echo "<br>";
	}
}

trait T2{
	function fun2(){
		echo "T2:fun2";
		echo "<br>";
	}
}

trait T3{
	function fun3(){
		echo "T3:fun3";
		echo "<br>";
	}
}

class Newclass1{
	use T1;
}

class Newclass2{
	use T2,T3;
}

$NewObj1 = New Newclass1;
$NewObj1->fun1();


$NewObj2 = New Newclass2;
$NewObj2->fun2();
$NewObj2->fun3();
?>