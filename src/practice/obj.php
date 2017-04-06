<?php

trait Sortable
{
    abstract function uniqueId();
    function compareById($object) {
        return ($object->uniqueId() < $this->uniqueId()) ? −1 : 1; }
}
class Bird {
    private $id = 1;
    use Sortable;
    //$id = 1;
    function uniqueId() {
        return __CLASS__ . ":{$this->id}"; }
}
class Car {
    use Sortable;
    private $id=1000;
    function uniqueId() {
        return __CLASS__ . "{$this->id}"; 
    }
}
// this will fatal
$bird = new Bird;
$car = new Car;
echo $comparison = $bird->compareById($car);


function displayClasses() {
    $classes = get_declared_classes();
    foreach ($classes as $class) {
        echo "Showing information about {$class}<br />"; 
        echo "Class methods:<br />";
        
        $methods = get_class_methods($class);
        if (!count($methods)) {
            echo "<i>None</i><br />";
        } else {
            foreach ($methods as $method) { 
                echo "<b>{$method}</b>()<br />";
            }
        }
        
        echo "Class properties:<br />";
        $properties = get_class_vars($class);
        if (!count($properties)) { echo "<i>None</i><br />";
        } else {
            foreach(array_keys($properties) as $property) { 
                echo "<b>\${$property}</b><br />";
            } 
        }
        echo "<hr />"; 
    }
}
displayClasses();
?>

