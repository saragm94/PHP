<?php
    $servername = "localhost";
    $usu = "sara";
    $passwd = "admin";
    $dbname = "tiendaonlinesara";

    $connect = mysqli_connect($servername,$usu,$passwd,$dbname);
    if(!$connect)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
?>