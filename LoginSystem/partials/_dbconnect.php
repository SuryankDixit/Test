<?php
    $servername ="localhost";
    $username ="root";
    $password = "";
    // $database ="users";
          
    // Create a db conncetion
    // telling myconnection to use dburyank database;
    $conn = mysqli_connect($servername,$username,$password);
    // Exit if connection was not successful
    if(!$conn){ 
        die("Failed to comnnect".mysqli_connect_errno());
    }
    // echo("Connection established");
    // echo("<br>");
?>