<?php
    $servername ="localhost";
    $username ="root";
    $password = "";
    $database ="contacts";
          
    // Create a db conncetion
    // telling myconnection to use dburyank database;
    $conn = mysqli_connect($servername,$username,$password,$database);
    // Exit if connection was not successful
    if(!$conn){ 
        die("Failed to comnnect".mysqli_connect_errno());
    }
    echo("Connection established");
    echo("<br>");
?>