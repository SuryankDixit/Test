<?php
$x = "Hello world!";
$y = 'Hello world!';
echo $x;
echo "<br>";
echo $y;
echo "<br>";
echo "String functions: strlen(),str_word_count(),strrev(),"."strpos(seacrh for a word within a string)"
?>

<?php
$x = 5985;
// var_dump return data types and value;
echo "Integers: ";
var_dump($x);
echo "<br>";
?>

<?php
$x = 10.365;
echo "Floats: ";
var_dump($x);
echo "<br>";
?>

<?php
$cars = array("Volvo","BMW","Toyota");
echo "Arrays: ";
var_dump($cars);
echo "<br>";
?>


<?php
class Car {
  public $color;
  public $model;
  public function __construct($color, $model) {
    $this->color = $color;
    $this->model = $model;
  }
  public function message() {
    return "My car is a " . $this->color . " " . $this->model . "!";
  }
}
 
echo "Classes and objects:";
echo "<br>";
$myCar = new Car("black", "Volvo");
echo $myCar -> message();
echo "<br>";
$myCar = new Car("red", "Toyota");
echo $myCar -> message();
?>


<!-- Null is a special data type which can have only one value: NULL.

A variable of data type NULL is a variable that has no value assigned to it.

Tip: If a variable is created without a value, it is automatically assigned a value of NULL.

Variables can also be emptied by setting the value to NULL:

Example -->
<?php
$x = "Hello world!";
$x = null;
var_dump($x);
?>
