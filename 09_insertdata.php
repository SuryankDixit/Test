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
    
    $name = "skd";
    $email = "hello@gmail.com";
    $concern="ooti";
    $sql = "INSERT INTO `concerns` (`name`, `email`, `concern`) VALUES ('$name','$email','$concern')";
    $status = mysqli_query($conn,$sql);
    if($status){
        echo("Record inserted succesfully");
    }else{
        echo("Error in inserting record-->".mysqli_error($conn));
    }
    
?>