<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Новини</title>
</head>

<body>

<?php include "navbar.php"; ?>

<div class="container">
    <h1>Список новин</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Назва</th>
            <th scope="col">Опис</th>
            <th scope="col">Фото</th>
        </tr>
        </thead>
        <tbody>


        <?php
        try {
            $user = "root";
            $pass = "";
            $dbh = new PDO('mysql:host=localhost;dbname=pv915', $user, $pass);
            $reader = $dbh->query('SELECT id, name, description, image from news');

            foreach ($reader as $row) {
                echo "
    <tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['description']}</td>
        <td><img src='/images/{$row['image']}' alt='Синок' width='100'></td>
    </tr>";

            }
            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        ?>


        </tbody>
    </table>

</div>


<script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>