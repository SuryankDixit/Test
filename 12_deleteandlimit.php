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
    $sql = "SELECT * FROM `concerns` WHERE `sno`>0";
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

    echo "<br><br>";

    $sql = "DELETE FROM `concerns` WHERE `email`='abc@gmail.com' AND `sno`<3";
    $result = mysqli_query($conn,$sql);
    $aff = mysqli_affected_rows($conn);
    echo "Affected rows: $aff";
    echo("<br>");
    if($result){
        echo "Record deleted successfully";
    }else{
        echo "Failed Deletion".mysqli_error($conn);
    }

    $sql = "DELETE FROM `concerns` WHERE `name`='skd' AND `sno`>10 LIMIT 4";
    $result = mysqli_query($conn,$sql);
    $aff = mysqli_affected_rows($conn);
    echo "Affected rows: $aff";
    echo("<br>");
    if($result){
        echo "Record deleted successfully";
    }else{
        echo "Failed Deletion".mysqli_error($conn);
    }
?>