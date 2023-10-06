<?php
    $server="localhost";
    $dataBase="hlc";
    $username="Frutero";
    $password="123fruta";
    $conect= mysqli_connect($server, $username, $password, $dataBase);
    if(!$conect){
        die("Conexión fallida: ". mysqli_connect_errno());
    } 
?>
