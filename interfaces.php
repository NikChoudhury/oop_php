<?php
/*
	Interfaces allow you to specify what methods a class should implement.

	Interfaces make it easy to use a variety of different classes in the same way. When one or more classes use the same interface, it is referred to as "polymorphism".

	Interfaces are declared with the interface keyword
*/

/*
	--> ALternate Of Multiple Inheritance
	-->Interface support Multiple Inheritance
	-->Interface can only contain abstract function
	-->In Interface we cannot define Varialbes
	-->No Constructor in Interface
	-->All Function must public

*/


// Interface definition
interface Animal {
  public function makeSound();
}

// Class definitions
class Cat implements Animal {
  public function makeSound() {
    echo " Meow ";
  }
}

$cat = new Cat();
$cat->makeSound();


/////////////////////////////////////

// Multiple Inheritance
interface Class1{
	function test1();
}

interface Class2{
	function test2();
}

class Class3 implements Class1,Class2{
	function test1(){
		echo "Test1";
	}

	function test2(){
		echo "Test2";
	}
}

$obj = new Class3;
$obj->test1();
$obj->test2();

?>