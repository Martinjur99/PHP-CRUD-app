<?php

$db_host = "localhost";
$db_user = "root";
$db_password = "root";
$db_name = "todolist";

$connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (mysqli_connect_error()) {

    echo mysqli_connect_error("Chyba v přihlášení do databáze!");
    exit;
    } else {
            
            echo "<br>";
            echo "OK"; //ujištění se, zda došlo k přihlášení
            echo "<br>";

     };






?>