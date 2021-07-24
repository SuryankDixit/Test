<!-- 
    Cookie: a tag you attach with user , 
    so that you can recognise him next time 
    (some info is stored on the user's computer by php script)
    (Not used sensitive info)

    Session: Stored on server;
-->

<?php
    // Syntax to set a cookie:
    // Returns true if it succeeds;
//     setcookie (
//         string $name ,           name of the cookie
//         string $value= "" ,      value of the cookie
//         int $expires= 0 ,        Expires after how many seconds;
//         string $path= "" ,       The path on the server where the cookie will be available. If the value is '/', the cookie will be available on the whole domain domain
//         string $domain= "" ,     
//         bool $secure=false ,     Indicates whether the cookie should only be transmitted over a secure HTTPS connection from the client. When this parameter is valid true, the cookie will only be sent if the connection is secure. 
//         bool $httponly=false
//    ): bool

//  An array of associations which may have the keys expires, path, domain, secure, httponlyand samesite.
// setcookie ( string $name , string $value= "" , array $options= [] ): bool

    setcookie("category","books", time()+ 86400, "/");
    setcookie("TestCookie","QuatradeFormaggi", time()+ 86400, "/");
    echo "The cookie is set. Check network tab and response headers.";
?>