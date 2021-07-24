<?php
session_start();
session_unset();
session_destroy();
echo "Yoy have been logged out";
?>