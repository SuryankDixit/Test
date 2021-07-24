<?php
session_start();
if(count($_SESSION)==0){
    echo "No session available";
}
foreach($_SESSION as $k=>$v){
    echo "$k=$v";
    echo "<br>";
}
?>