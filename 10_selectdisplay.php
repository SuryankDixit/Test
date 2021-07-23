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
    
    $sql = "SELECT * FROM `concerns`";
    $status = mysqli_query($conn,$sql);
    
    // $rows=mysqli_num_rows($status);
    // echo("$rows");
    
    // if($rows>0){
    //     forEach($status as $key )
    //     $row = mysqli_fetch_assoc($status);
    //     var_dump($row);
    //     echo "<br>";
    // }
    while($row=mysqli_fetch_assoc($status)){
        // echo var_dump($row);
        echo $row['sno']." Hello".$row['name']."(".$row['email'].")";
        echo("<br>");
        echo("<br>");
    }
?>