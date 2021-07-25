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
          
        <!-- start php code -->
        <?php
            $msg;

            if($_SERVER['REQUEST_METHOD']=="POST"){
                // isset() is to check if a variable is set with a value and that value should not be null.
                // empty() is to check if a given variable is empty. The difference with isset() is, isset has null check.
                if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['email']) && !empty($_POST['email'])){
                    
                    //$name = mysql_escape_string($_POST['name']); // Turn our post into a local variable
                    //$email = mysql_escape_string($_POST['email']); // Turn our post into a local variable

                    $name=$_POST['name'];
                    $email=$_POST['email'];

                    // if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
                    //     // Return Error - Invalid Email 
                    //      $msg = 'The email you have entered is invalid, please try again.'
                    // 
                    // }else{
                        // $msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.'                    
                    //     // Return Success - Valid Email xxx@xxx.xxx
                    // }

                    require '_dbconnect.php';
                    
                    $db = "CREATE DATABASE registrations";
                    $result = mysqli_query($conn,$db);
                    // if(!$result){
                    //     echo "Error :".mysqli_error($conn);
                    // }

                    $database = 'registrations';
                    $conn = mysqli_connect($servername,$username,$password,$database);
                    // if(!$conn){ 
                    //     die("Failed to connect".mysqli_connect_errno());
                    // }

                    $sql = "CREATE TABLE `users` (
                        `id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
                        `username` VARCHAR( 256 ) NOT NULL ,
                        `password` VARCHAR( 256 ) NOT NULL , 
                        `email` TEXT NOT NULL ,                 
                        `hash` VARCHAR( 32 ) NOT NULL ,
                        `active` INT( 1 ) NOT NULL DEFAULT '0'
                        )" ;
                    
                    $status = mysqli_query($conn,$sql);
                    // if($status){
                    //     echo("Table cretaed succesfully");
                    // }else{
                    //     echo("Error in createing table-->".mysqli_error($conn));
                    // }   
                    
                    // Return Success - Valid Email
                    $msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';
                    
                    //Well, we're using the PHP function rand to generate a random number between 0 and 1000. Next, our MD5 function will turn this number into a 32-character string of text, which we'll use in our activation email. 
                    $hash = md5(rand(0,1000));


                    // Create a random password;
                    $password = rand(1000,50000);
                    $password_hash = password_hash($password,PASSWORD_DEFAULT);

                    // Insert
                    // mysql_query("INSERT INTO users (username, password, email, hash) VALUES(
                    //     '". mysql_escape_string($name) ."', 
                    //     '". mysql_escape_string(password_hash($password)) ."', 
                    //     '". mysql_escape_string($email) ."', 
                    //     '". mysql_escape_string($hash) ."') ") or die(mysql_error());
                    

                    $sql = "INSERT INTO users (username,password,email,hash) VALUES('$name','$password_hash','$email','$hash')";
                    $result = mysqli_query($conn,$sql);
                    if(!$result){
                        echo "Error".mysqli_error($conn);
                    }

                    // Sending Message;
                    $to      = $email; // Send email to our user
                    $subject = 'Signup | Verification'; // Give the email a subject 
                    $message = '
                    
                    Thanks for signing up!
                    Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
                    
                    ------------------------
                    Username: '.$name.'
                    Password: '.$password.'
                    ------------------------
                    
                    Please click this link to activate your account:
                    localhost/learnphp/SendMail/verify.php?email='.$email.'&hash='.$hash.'
                    
                    '; // Our message above including the link
                    $headers = 'From: avdheshsharma21799@gmail.com' . "\r\n"; // Set from headers
                    // echo "$message";
                    // echo "<br>";
                    if (mail($to, $subject, $message, $headers)) {
                        echo "Email successfully sent to $to...";
                    } else {
                        echo "Email sending failed...";
                    }
                }
            }
        ?>
        <!-- stop php code -->
      
        <!-- title and description -->   
        <h3>Signup Form</h3>
        <p>Please enter your name and email addres to create your account</p>
        
        <?php
            if(isset($msg)){  // Check if $msg is not empty
                echo '<div class="statusmsg">'.$msg.'</div>'; // Display our message and wrap it with a div with the class "statusmsg".
            } 
        ?>

        <!-- start sign up form -->  
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" value="" />
            <label for="email">Email:</label>
            <input type="text" name="email" value="" />
              
            <input type="submit" class="submit_button" value="Sign up" />
        </form>
        <!-- end sign up form -->
          
    </div>
    <!-- end wrap div -->
</body>
</html>