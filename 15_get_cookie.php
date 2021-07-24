<?php
$_COOKIE['category'];
$_COOKIE['TestCookie'];

echo "See all cookies: <br>";
forEach($_COOKIE as $k=>$v){
    echo("$k = $v");
    echo("<br>");
}
// for($i=0;$i<count($_COOKIE);$i++){
//     echo ("$_COOKIE[$i]");
//     echo "<br>";
// }
?>