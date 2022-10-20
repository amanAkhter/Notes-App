<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "notes-app";

    $con = mysqli_connect($server, $username, $password, $database);

    if (!$con) {
        echo "No Connection...";
    }

    // if ($con) {
    //     // echo "yes";
    // }

    // else{
    //     // echo "no";
    // }

?>