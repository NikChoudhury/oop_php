<?php
echo "A class is defined by using the class keyword, followed by the name of the class and a pair of curly braces {}<br>";

class Class1{
	public $x =1;
	function fun1(){
		return $this-> x++;
	}
	function fun2(){
		echo "two";
	}
}

$obj = new Class1(); /*Objects of a class is created using the new keyword.*/

echo $obj->fun1();
echo "<br>" ;

echo $obj->x;
echo "<br>" ;


$obj2 = new Class1();
$obj->fun2();
echo "<br>";
?>