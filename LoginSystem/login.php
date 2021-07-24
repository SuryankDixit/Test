<?php
    $show_error=false;
    $show_alert=false;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name=$_POST['name'];
        $pass=$_POST['pass'];
        
        require "partials/_dbconnect.php";

        // create db;
        $db = "CREATE DATABASE users";
        $status = mysqli_query($conn,$db);
        // retuns true or false ;
        // if($status){
        //     echo("Db cretaed succesfully");
        // }else{
        //     echo("Error in createing database-->".mysqli_error($conn));
        // }

        $databse='users';
        $conn = mysqli_connect($servername,$username,$password,$databse);

        $sql = "CREATE TABLE `users`.`users` ( `sno` INT NOT NULL AUTO_INCREMENT ,  `username` VARCHAR(255) NOT NULL UNIQUE ,  `password` VARCHAR(40) NOT NULL ,  `dt` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`sno`))";
        $status = mysqli_query($conn,$sql);
        // if($status){
        //     echo("Table cretaed succesfully");
        // }else{
        //     echo("Error in createing table-->".mysqli_error($conn));
        // }

        

        // $sql="SELECT * FROM users where username= '$name' and `password`='$pass' ";
        $sql="SELECT * FROM users where username= '$name'";
        $result = mysqli_query($conn,$sql);
        $cnt = mysqli_num_rows($result);
        if($cnt==1){  
            while($row = mysqli_fetch_assoc($result)){
                if(password_verify($pass,$row['password'])){
                    $show_alert="You are logged in";
                    session_start();
                    $_SESSION['loggedin']=true;
                    $_SESSION['username']=$name;
                    header("location: welcome.php");
                }else{
                    $show_error="Invalid Credentials";
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <?php require "partials/nav.php";?>
    <?php
    if($show_alert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong>'.$show_alert.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'; 
    }
    if($show_error){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed</strong> '.$show_error.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>
    <div class="container">
        <h1 class="text-center my-3">Login</h1>
        <form action="/learnphp/LoginSystem/login.php" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" name="pass" id="pass" class="form-control" placeholder="Enter Password">
            </div>
            <button type="submit" class="btn btn-primary">SignUp</button>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
