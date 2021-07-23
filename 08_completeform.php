<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Contacts</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="/learnphp/05_forms.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
        </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    </nav>



    <?php
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $email=$_POST['email'];
            $name=$_POST['name'];
            $desc=$_POST['desc'];
            
          // Submit these to database.
            $servername ="localhost";
            $username ="root";
            $password = "";
            $database ="contacts";
                
            // Create a db conncetion
            // telling myconnection to use dburyank database;
            $conn = mysqli_connect($servername,$username,$password);
            // Exit if connection was not successful
            if(!$conn){
                die("Failed to comnnect".mysqli_connect_errno());
            }
            echo("Connection established");
            echo("<br>");
            
            // create db;
            $db = "CREATE DATABASE contacts";
            $status = mysqli_query($conn,$db);
            // retuns true or false ;
            // if($status){
            //     echo("Db cretaed succesfully");
            // }else{
            //     echo("Error in createing database-->".mysqli_error($conn));
            // }

            $conn = mysqli_connect($servername,$username,$password,$database);

            $sql = "CREATE TABLE `concerns` ( `sno` INT(6) NOT NULL AUTO_INCREMENT , `name` VARCHAR(15) NOT NULL , `email` VARCHAR(30) NOT NULL , `concern` TEXT NOT NULL, `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`sno`))";
            $status = mysqli_query($conn,$sql);
            // if($status){
            //     echo("Table cretaed succesfully");
            // }else{
            //     echo("Error in createing table-->".mysqli_error($conn));
            // }

            $sql = "INSERT INTO `concerns` (`email`, `name`, `concern`) VALUES ('$email' ,'$name','$desc')";
            $status = mysqli_query($conn,$sql);
            if($status){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success</strong> Your entry has been saved.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'; 
            }else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Success</strong> We are facing some technical issues, Your data could not be saved.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        }
    ?>




    <div class="container my-3">
    <h1>Contact us for your concerns</h1>
        <form action="/learnphp/08_completeform.php" method="post">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="concern">Description</label>
                <textarea name="desc" id="desc" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>
</html>