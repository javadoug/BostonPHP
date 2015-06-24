<?php

/*

Aside: 

php classes have: 
namespaces
instances
overriding methods
scope resolution
abstraction
and so on

WARN: classes have changed significantly between PHP versions 3, 4 and 5. So you need to know which version of PHP you are coding.

We only focus on PHP 5.

Why OOP?
http://inventwithpython.com/blog/2014/12/02/why-is-object-oriented-programming-useful-with-an-role-playing-game-example/
http://www.dotnetperls.com/oop
http://www.drdobbs.com/a-realistic-look-at-object-oriented-reus/184415594

*/
class Car {

	const FUEL = "Unleaded";

	private $tank = 0;

	function __construct($make, $model, $year) {
		$this->make = $make;
		$this->model = $model;
		$this->year = $year;
	}

	public function start() {
		echo "starting. ";
	}

	public function drive($direction) {
		$this->driving = $direction;
	}

	public function fill($gallons) {
		$this->tank += $gallons;
		return $this->tank;
	}

}

// create an instance with constructor variables
$mycar = new Car("ford", "focus", 2012);

// access properties
echo $mycar->make . " " . $mycar->model . " " . $mycar->year . ".";

// access method
$mycar->start();

// dynamic properties
$mycar->color = "silver";

echo " My car is " . $mycar->color . ".";

// static properties (note no $ prefix)
echo " My car uses " . $mycar::FUEL . ".";

// method with parameters
$mycar->drive("Forward");

echo " My car is driving " . $mycar->driving . ".";

// method returns value
$tank = $mycar->fill(8.1);

echo " My car has " . $tank . " gallons of gas.";

// debug objects
echo "<pre>" . print_r($mycar, 1) . "</pre>";

?>
