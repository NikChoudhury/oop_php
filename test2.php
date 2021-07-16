<?php
namespace Test2;
function hello(){
	echo "Hello Test2 <br>";
}

class Abc{
	protected function abcfun(){
		echo "Hello From Class Test2 Class Abc <br>";
		// return 1;
	}
}


class Xyz extends Abc
{
	function xyzfun(){
		$this->abcfun();
		
	}
}


//Use For Namespace
?>