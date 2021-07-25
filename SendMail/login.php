<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" type="text/css" rel="stylesheet" />
    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<body>

<!-- start header div --> 
<div id="header">
        <h3>iEmail-Signup</h3>
    </div>
    <!-- end header div -->   
      
    <!-- start wrap div -->   
    <div id="wrap">
        <!-- start PHP code -->
        <?php
            $msg;
            require '_dbconnect.php';
            $database = 'registrations';
            $conn = mysqli_connect($servername,$username,$password,$database);
            if(!$conn){ 
                die("Failed to connect".mysqli_connect_errno());
            }  

            if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['password']) && !empty($_POST['password'])) {
                $username =$_POST['name']; // Set variable for the username
                // $password = (isset($result['password']) ? $result['password'] : '');
                $password = $_POST['password'];

                $sql="SELECT password FROM users WHERE active = '1' AND username = '$username'";
                $result = mysqli_query($conn,$sql);
                $cnt = mysqli_num_rows($result);
                echo "$cnt";
                if($cnt>0){  
                    while($row = mysqli_fetch_assoc($result)){
                        if(password_verify($password,$row['password'])){
                            $msg = 'Login Complete! Thanks';
                        }else{
                            $msg = 'Login Failed! Please make sure that you enter the correct details and that you have activated your account.';
                        }
                    }
                }
            }
        ?>
        <!-- stop PHP Code -->
      
        <!-- title and description -->    
        <h3>Login Form</h3>
        <p>Please enter your name and password to login</p>
          
        <?php 
            if(isset($msg)){ // Check if $msg is not empty
                echo '<div class="statusmsg">'.$msg.'</div>'; // Display our message and add a div around it with the class statusmsg
            } ?>
          
        <!-- start sign up form -->   
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" value="" />
            <label for="password">Password:</label>
            <input type="password" name="password" value="" />
              
            <input type="submit" class="submit_button" value="Sign up" />
        </form>
        <!-- end sign up form --> 
          
    </div>
    <!-- end wrap div --> 
</body>
</html>