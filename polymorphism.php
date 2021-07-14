<?php
/*
	--> Same Operation may be behaive differently in diffrent Case
	-->Interface
	-->Abstract class

*/

// With Help Of Abstract Class
/*
abstract class Class1{
	abstract function fun1();
}

class Class2 extends Class1{
	function fun1(){
		echo "Fun 1";
		echo "<br>";
	}
}

class Class3 extends Class1{
	function fun1(){
		echo "Fun 2";
	}
}

$obj2 = new Class2;
$obj2->fun1();

$obj3 = new Class3;
$obj3->fun1();
*/

// With Help Of Interface

interface Machine{
	function calcTask();
}

class Circle implements Machine {
  	private $radius;
 	function __construct($radius){
    $this -> radius = $radius;
  	}

  	function calcTask(){
     return $this -> radius * $this -> radius * pi();
  	}
}

class Rectangle implements Machine {
  private $width;
  private $height;
  function __construct($width, $height){
     $this -> width = $width;
     $this -> height = $height;
  }
  function calcTask(){
     return $this -> width * $this -> height;
  }
}

$mycirc = new Circle(3);
$myrect = new Rectangle(3,4);
echo $mycirc->calcTask();
echo $myrect->calcTask();


// Same Function behaive Different In Polymorphism






?>