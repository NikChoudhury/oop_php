<?php
/*
	 OOPs concept of Encapsulation in PHP means, enclosing the internal details of the object to protect from external sources. It describes, combining the class, data variables and member functions that work on data together within a single unit to form an object.

	 Data is not accessed directly, in fact, they are accessed through functions(GET or SET) written inside the class. Attributes are kept private but getter(GET) and setter(SET) methods are kept public for manipulation of these attributes.
*/


class Class1{
	protected $num;
	function __construct(){
		$this->num=1;
	}

	function getNum(){
		return $this->num;
	}
}

$obj1= new Class1;

// $obj1->num=2;

// echo $obj1->num;

// echo $obj1->getNum();


////////////////////////////////////////////


class Class2
{
	protected $num;
	function __construct(){
		$this->num=1;
	}
	
}

class Class3 extends Class2
{
	function getNum(){
		return $this->num;
	}
	
}

$obj3= new Class3;
echo $obj3->getNum();


/*
public -> Access Everywhere
protected -> Access Inside The Class and Extended Class( Inheritance)
private -> Access Within The Class
*/

?>