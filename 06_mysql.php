<?php
    /*
        2 ways to connect a mysql db
            1.MySQLi extension
                procedural
                object oriented
            2. PDO(php data objects)
                if database needs to be changed in the future.
    */

    // connencting to the database;
    $servername ="localhost";
    $username ="root";
    $password = "";
          
    // Create a db conncetion
    $conn = mysqli_connect($servername,$username,$password);
    // Exit if connection was not successful
    if(!$conn){
        die("Failed to comnnect".mysqli_connect_errno());
    }
    echo("Connection established");
    echo("<br>");

    // create db;
    $db = "CREATE DATABASE dbsuryank2";
    // retuns true or false ;
    $status = mysqli_query($conn,$db);
    if($status){
        echo("Db cretaed succesfully");
    }else{
        echo("Error in createing database-->".mysqli_error($conn));
    }
?>