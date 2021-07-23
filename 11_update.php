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
    


    // Select data;
    $sql = "SELECT * FROM `concerns` WHERE `sno`>3";
    $status = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($status);
    while($row = mysqli_fetch_assoc($status)){
        // echo var_dump($row);
        echo $row['sno']." Hello".$row['name']."(".$row['email'].")";
        echo("<br>");
        echo("<br>");
    }

    // Update Data;
    $sql = "UPDATE `concerns` SET `name`= 'nakul' WHERE `sno`=5";
    $result = mysqli_query($conn,$sql);
    $aff = mysqli_affected_rows($conn);
    echo "Affected rows: $aff";
    echo("<br>");
    if($result){
        echo "Record Updated Successfully";
    }else{
        echo "Failed Updation ".mysqli_error($conn);
    }
?>