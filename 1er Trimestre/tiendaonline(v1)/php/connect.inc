<?php
    $servername = "localhost";
    $usu = "sara";
    $passwd = "admin";
    $dbname = "tiendaonlinesara";

    try
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $usu, $passwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e)
    {
        echo $resultado."</br>". $e ->getMensage();
    }
    

?>