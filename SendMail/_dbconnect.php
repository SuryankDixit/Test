<?php
    $servername ="localhost";
    $username ="root";
    $password = "";
    // $database ="users";
          
    // Create a db conncetion
    $conn = mysqli_connect($servername,$username,$password);
    // Exit if connection was not successful
    if(!$conn){ 
        die("Failed to connect".mysqli_connect_errno());
    }
    echo("Connection established");
    echo("<br>");
?>