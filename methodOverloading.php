<?php

ini_set('display_errors', 1);
header('Content-type: text/plain');
class GFG {
      
      
    public function __call($name, $arguments) {
          
        // echo "Calling object method '$name' "
            // . implode(', ', $arguments). "\n";
            $this->{'functionParameters'. count($arguments)}($arguments);
    }
  
      
    public static function __callStatic($name, $arguments) {
          
        echo "Calling static method '$name' "
            . implode(', ', $arguments). "\n";
    }

    private function functionParameters1($arr) {
    	echo "Function with " . count($arr) . " parameter is called\n";
    }

    private function functionParameters2($arr) {
    	echo "Function with " . count($arr) . " parameters is called\n";
    }

    private function functionParameters3($arr) {
    	echo "Function with " . count($arr) . " parameters is called\n";
    }
}
  
// Create new object
$obj = new GFG;
$obj->calFunctionDaynamically('this is first argu');
$obj->calFunctionDaynamically('this is first argu', 'this is 2nd argu');
$obj->calFunctionDaynamically('this is first argu', 'this is 2nd argu' , 'this is 3rd agru');
  
GFG::testMethod('in static method'); 