<?php
/*
	Namespaces are qualifiers that solve two different problems:

		-->They allow for better organization by grouping classes that work together to perform a task
		-->They allow the same name to be used for more than one class
		-->Namespaces are declared at the beginning of a file using the namespace keyword
*/
		
include 'test1.php';
include 'test2.php';

use Test1 as T1;	//Give a namespace an alias.
T1\hello();
///////////
Test2\hello();
/////////

$obj1 = new Test1\Abc;
$obj1->abcfun();

//////////

use Test2 as T2;	//Give a namespace an alias.
$obj2 = new T2\Xyz;
$obj2->xyzfun();

?>