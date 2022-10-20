<?php

    include './database.php';

    $id = $_GET["id"];

    $deleteQuery = "DELETE FROM `notes-app-table` WHERE `Sr No.` = '$id'";

    $res = mysqli_query($con, $deleteQuery);

    header("location: ./index.php");
?>