<?php
    // $lines1 = file( 'sk1.txt', FILE_IGNORE_NEW_LINES );
    // $lines2 = file( 'sk2.txt', FILE_IGNORE_NEW_LINES );
    
    // $result = array_diff( $lines1, $lines2 );
    // print_r( $result );



    // $old_version = 'my_script.php';
    // $new_version = 'my_new_script.php';

    // xdiff_string_diff($old_version, $new_version, 'my_script.diff', 2);

    // $contents = file_get_contents('https://github.com/timeline');
    // echo "$contents"; 

    $diff = exec('diff sk1.txt sk2.txt'); echo $diff;
?>