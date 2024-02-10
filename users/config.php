<?php

    $dbconnect = mysqli_connect("localhost", "root", "root123", "user_form");
    if (!$dbconnect) {
        echo "database not connected properly " . mysqli_error($dbconnect);
    }
        
?>