<?php
session_start();
    $con = mysqli_connect('localhost', 'root', '', 'railway');
    if (!$con) {
        echo "Connecctin Failed!";
    }
?>