<?php

// namespace project;

/**
 * 
 */
class Parking
{
	public $capacity;
	public $vehicles;
	
	function __construct($capacity)
	{
		$this->capacity = $capacity;
		$this->vehicles = [];
	}
	# To park vehicle
	# Its take vehicle object
	public function parkVehicle($vehicle) {
		if(count($this->vehicles) >= $this->capacity) {
			echo "Parking has been filled competly";
		} else {
			$this->vehicles[] = $vehicle;
			echo "Vehicle ".$vehicle . " has parked";
		}
	}
}