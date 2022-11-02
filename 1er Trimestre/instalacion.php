<?php
$servername = 'localhost';
$username = 'root';
$password = '';

try
{
    $conn = new PDO('mysql:host=$servername', $username, $password);
    $conn->setAttibute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql ='CREATE TABLE IF NOT EXISTS tiendaonlineSara;';
    $sql .= 'create user "admin2" identified by "admin";';
    $sql .= 'grant all on tiendaonlineSara.* to "admin2" with grant option;';
    $sql .= 'grant select, create user on *.* to "admin2";';
    $conn->exec($sql);
    echo'Base de datos y usuario creados</br>';
}catch(PDOException $e)
{
    echo $sql.'</br>'.$e->getMessage();
}

?>