
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seznam klientů</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Seznam klientů</h2>
        <a class="btn btn-primary" href="add.php" role="button">Přidat</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Jméno</th>
                    <th>Email</th>
                    <th>Mobil</th>
                    <th>Adresa</th>
                    <th>vytvořeno v</th>
                    <th>Akce</th>
                </tr>
            </thead>
            <tbody>

            <?php

            require("database.php");

            $sql = "SELECT * FROM klienti"; //dotaz, zde se jedná o funkci READ, načtě všecho, co je v databázi
            $result = mysqli_query($connection, $sql);
            

            if ($result === false) {
                die("invalid query");
            }

            foreach ($result as $data) {

                echo "
                 <tr>
                    <td>$data[id]</td>
                    <td>$data[name]</td>
                    <td>$data[email]</td>
                    <td>$data[phone]</td>
                    <td>$data[address]</td>
                    <td>$data[created_at]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='edit.php?id=$data[id]'>Editovat</a>
                        <a class='btn btn-danger btn-sm' href='delete.php?id=$data[id]'>Smazat</a>
                    </td>
                </tr>
                
                ";
            }
            ?>
               
            </tbody>
        </table>

    </div>
    
</body>
</html>

