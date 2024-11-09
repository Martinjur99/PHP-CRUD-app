<?php


if ($_SERVER["REQUEST_METHOD"] === "GET") {

    $id = $_GET["id"];

    require("database.php");

    $sql = "DELETE FROM klienti WHERE id=$id";
    $result = mysqli_query($connection, $sql);


    header("location: /CRUD1/index.php");
    exit;

};


//jina verze delete pomocí funkce 
/*
function deleteKlient($connection, $id) {

    $sql = "DELETE FROM klienti WHERE id = ?";
    
    $id = $_GET["id"];
    $stmt = mysqli_prepare($connection, $sql);

    if ($stmt === false) {

        echo mysqli_error($connection);
        echo "Nastala chyba!";
    } else {
        mysqli_stmt_bind_param($stmt, "i", $id);

        if (mysqli_stmt_execute($stmt)) {

            header("location: /CRUD1/index.php");
            exit;

        };
    };

};


*/







?>