<link rel="stylesheet" href="styly_add.css">
<?php

require("database.php");

if (isset($_GET["id"]) && is_numeric($_GET["id"])) { //tento kod se spousti okamzite

    $sql = "SELECT * FROM klienti WHERE id=". $_GET["id"];
    $result = mysqli_query($connection, $sql);

    if ($result) {
        $data = mysqli_fetch_assoc($result);
        $id = $data["id"];

        if ($data) {
            echo '
            <form method="POST">
                <input type="text" name="name" placeholder="Jméno" value="' . htmlspecialchars($data['name']) . '"> <br>
                <input type="text" name="email" placeholder="Email" value="' . htmlspecialchars($data['email']) . '"><br>
                <input type="text" name="phone" placeholder="Mobil" value="' . htmlspecialchars($data['phone']) . '"> <br>
                <input type="text" name="address" placeholder="Adresa" value="' . htmlspecialchars($data['address']) . '"> <br>
                <button>Potvrdit</button>
            </form>';

        } else {
            die("Student nenalezen!");
        }

    }  else {

        $data = null;
    } 
};

    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        $sql = "UPDATE klienti SET name = ?, email = ?, phone = ?, address = ? WHERE id=?";

        $stmt = mysqli_prepare($connection, $sql);

        if ($stmt === false) {

            echo mysqli_error($connection);
        } else {

        mysqli_stmt_bind_param($stmt, "ssssi", $name, $email, $phone, $address, $id);

            if (mysqli_stmt_execute($stmt)) {

                echo "Informace byly zapsány úspěšně!";
            }
        }

        header("location: /CRUD1/index.php");
        exit;

    }
    
?>