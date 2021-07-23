<?php
    $servername ="localhost";
    $username ="root";
    $password = "";
    $database ="dbsuryank";
          
    // Create a db conncetion
    // telling myconnection to use dburyank database;
    $conn = mysqli_connect($servername,$username,$password,$database);
    // Exit if connection was not successful
    if(!$conn){
        die("Failed to comnnect".mysqli_connect_errno());
    }
    echo("Connection established");
    echo("<br>");
    
    $sql = "CREATE TABLE `phptrip` ( `sno` INT(6) NOT NULL AUTO_INCREMENT , `name` VARCHAR(15) NOT NULL , `dest` VARCHAR(15) NOT NULL , PRIMARY KEY (`sno`))";
    $status = mysqli_query($conn,$sql);
    if($status){
        echo("Table cretaed succesfully");
    }else{
        echo("Error in createing table-->".mysqli_error($conn));
    }
    
?>