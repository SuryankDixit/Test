<!-- 
    Session: Used to manage information across different pages;
    $_SESSION  variable persists across all the pages in a website.
-->

<?php
    // if user login is successful;
    session_start();
    $_SESSION['username']="suryank";
    $_SESSION['favcat']='Books';
    echo "Your session is saved"; 
?>