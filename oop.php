<?php
// namespace oop\project;
ini_set('display_errors', 1);
header('Content-type: text/plain');
class ParkingFloor
{
	public $capacity;
	public $vehicles;
	public $name;
	public $allowed_vehicles;
	public $floors;
	function __construct($name, $capacity, $allowed_vehicles)
	{
		$this->capacity = $capacity;
		$this->name = $name;
		$this->allowed_vehicles = $allowed_vehicles;
		$this->vehicles = [];
	}
	# To park vehicle
	# Its take vehicle object
	public function parkVehicle($vehicle) {
		if(count($this->vehicles) >= $this->capacity) {
			echo "Parking has been filled completly". PHP_EOL;
		} elseif($this->isVehicleAllowedAtThisFloor($vehicle)) {
			$this->vehicles[] = $vehicle->name;
			echo "Vehicle ".$vehicle->name . " has parked" .PHP_EOL;
		} else {
			echo "Vehicle ".$vehicle->name . " is not allowed to park at this floor ".$this->name .PHP_EOL;
		}
	}

	private function isVehicleAllowedAtThisFloor($vehicle) {
		foreach ($this->allowed_vehicles as $alloed_vehicle) {
			if($vehicle instanceof $alloed_vehicle) {
				return true;
			}
		}
		return false;
	}

	public function removeVehicle($vehicle) {
		if (in_array($vehicle->name, $this->vehicles)) 
		{
		    unset($this->vehicles[array_search($vehicle->name, $this->vehicles)]);
		    echo "Vehicle ".$vehicle->name." has removed".PHP_EOL;
		} else {
			echo "There is no vehicle exists with the name ". $vehicle->name;
		}
	}
}
 
class Parking
{
	public $floors;
	# To park vehicle
	# Its take vehicle object
	public function addFloor($floor) {
		$this->floors[] = $floor;
	}
}

/**
 *  General Vehicle class
 */
class Vehicle
{
	public $name;

	function __construct($name)
	{
		$this->name = $name;
	}
}

/**
 * 
 */
class Car extends Vehicle
{
	
}

class Truck extends Vehicle
{
}

 $parking = new Parking();
$parking_floor1 = new ParkingFloor('Floor 1', 2, [Car::class, Truck::class]);
$parking_floor2 = new ParkingFloor('Floor 2', 1, [Car::class]);
$parking->addFloor($parking_floor1);
$parking->addFloor($parking_floor2);

$car1 = new Car('Car 1');
$car2 = new Car('Car 2');
$truck1 = new Truck('Truck 1');
$truck2 = new Truck('Truck 2');

$parking_floor1->parkVehicle($car1);
$parking_floor1->parkVehicle($car2);
$parking_floor1->parkVehicle($truck1);
$parking_floor2->parkVehicle($truck1);
$parking_floor1->removeVehicle($car1);
$parking_floor1->parkVehicle($car1);
$parking_floor1->parkVehicle($car1);


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

class Dog implements Animal {
  public function makeSound() {
    echo " Bark ";
  }
}

class Mouse implements Animal {
  public function makeSound() {
    echo " Squeak ";
  }
}

// Create a list of animals
$cat = new Cat();
$dog = new Dog();
$mouse = new Mouse();
$animals = array($cat, $dog, $mouse);

// Tell the animals to make a sound
foreach($animals as $animal) {
  $animal->makeSound();
}


// abstract class intro 
// Parent class
abstract class CarVehicle {
  public $name;
  public function __construct($name) {
    $this->name = $name;
  }
  abstract public function intro() : string; 
}

// Child classes
class Audi extends CarVehicle {
  public function intro() : string {
    return "Choose German quality! I'm an $this->name!"; 
  }
}

class Volvo extends CarVehicle {
  public function intro() : string {
    return "Proud to be Swedish! I'm a $this->name!"; 
  }
}

class Citroen extends CarVehicle {
  public function intro() : string {
    return "French extravagance! I'm a $this->name!"; 
  }
}

// Create objects from the child classes
$audi = new audi("Audi");
echo $audi->intro();
echo "<br>";

$volvo = new volvo("Volvo");
echo $volvo->intro();
echo "<br>";

$citroen = new citroen("Citroen");
echo $citroen->intro();
?>
