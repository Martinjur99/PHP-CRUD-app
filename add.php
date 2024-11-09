<?php

$name = "";
$email = "";
$phone = "";
$address = "";

$errorMessage = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    
    
    if (empty($name) || empty($email) || empty($phone) || empty($address)) {

       $errorMessage = "Všechna pole musí být naplněna!";
        echo $errorMessage;
        exit; 
    }


    require("database.php");

    $sql = "INSERT INTO klienti  (name, email, phone, address) VALUES ('$name','$email','$phone','$address')";

    $result = mysqli_query($connection, $sql);

    if ($result === false) {

        echo mysqli_error($connection);
        exit;
    }   else {


        $id = $POST["id"];
        echo "Úspěšně vložen kontakt s id: $id";

    }

    

    header("location: /CRUD1/index.php");
    exit;

   

};



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přidání klienta</title>
    <link rel="stylesheet" href="styly_add.css">
</head>
<body>
    
    <form method="POST">
        <input type="text" name="name" placeholder="Jméno" value="<?= $name ?>"> <br>
        <input type="text" name="email" placeholder="Email" value="<?= $email ?>"><br>
        <input type="text" name="phone" placeholder="Mobil" value="<?= $phone ?>"> <br>
        <input type="text" name="address" placeholder="Adresa" value="<?= $address ?>"> <br>
        <button>Potvrdit</button>
    </form>




</body>
</html>