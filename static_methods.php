<?php
/*
Static methods can be called directly - without creating an instance of the class first.

	-->To access a static property use the class name, double colon (::), and the property name:

*/

class greeting {
  public static function welcome() {
    echo "Hello World!";
  }
}

// $obj=new greeting;
// $obj->welcome();

// Call static method
greeting::welcome();

echo "<br>-----------------<br>";

//////////////////////////////////////////

class Class1 {
	static public $num1=10;
	static public $num2 = 20;

	function __Construct(){
		echo "Contructor Call";
	}

	static function fun1(){
		// echo "Test";
		echo self :: $num2;
	} 
}

// echo Class1::$num;

Class1::fun1();


?>