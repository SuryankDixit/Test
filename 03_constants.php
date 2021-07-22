<!-- 
Syntax
define(name, value, case-insensitive)
Parameters:
name: Specifies the name of the constant
value: Specifies the value of the constant
case-insensitive: Specifies whether the constant name should be case-insensitive. Default is false 
-->

<?php
define("GREETING1", "Welcome to W3Schools.com!");
var_dump(GREETING1);
echo "<br>";
?>

<?php
define("GREETINGS", "Welcome to W3Schools.com!", true);
var_dump(greetings);
echo "<br>";
?>

<?php
define("cars", [
  "Alfa Romeo",
  "BMW",
  "Toyota"
]);
var_dump(cars[0]);
echo "<br>";
?>

<?php
define("hello", "Welcome to W3Schools.com!");

function myTest() {
    echo "Constants are Global Constants and can be used across the entire script.";
    echo "<br>";
  echo hello;
}
 
myTest();
echo "<br>";
?>