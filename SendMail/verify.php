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

        <?php
            $msg;
            $email;$hash;
            require "_dbconnect.php";
            $database = 'registrations';
            $conn = mysqli_connect($servername,$username,$password,$database);
            if(!$conn){ 
                die("Failed to connect".mysqli_connect_errno());
            } 

            if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
                // Verify data
                // $email = mysql_escape_string($_GET['email']); // Set email variable
                // $hash = mysql_escape_string($_GET['hash']); // Set hash variable
                $email=$_GET['email'];
                $hash=$_GET['hash'];
                $sql = "Select email,hash,active from users where email='$email' AND hash='$hash' and active =0";
                $result = mysqli_query($conn,$sql);
                $match = mysqli_num_rows($result);
                echo "$match";
                if($match>0){
                    mysqli_query($conn,"UPDATE users SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysqli_error($conn));
                    echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
                }else{
                    echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
                }
            }else{
                echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
            }
        ?>
          
    </div>
    <!-- end wrap div -->
</body>
</html>