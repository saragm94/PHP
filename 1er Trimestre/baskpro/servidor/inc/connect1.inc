<?php
    $servername = "localhost";
    $username = 'u674705277_sara2';
    $password = 'Pulido1234';
    $dbname = 'u674705277_sara2';
    $sql = '';

    try
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e)
    {
        echo $resultado."</br>". $e ->getMensage();
    }
    

?>