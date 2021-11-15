<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
//    echo "<h3>{$_POST['name']}</h3>";
//    echo "<h3>{$_POST['description']}</h3>";

    $name = $_POST['name'];
    $description = $_POST['description'];

    $user = "root";
    $pass = "";
    $dbh = new PDO('mysql:host=localhost;dbname=pv915', $user, $pass);
    $sql = "INSERT INTO `news` (`name`, `description`) VALUES (?, ?);";
    $dbh->prepare($sql)->execute([$name, $description]);
    header('Location: /');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Додати новину</title>
</head>

<body>

<?php include "navbar.php"; ?>

<div class="container">
    <h1>Додати новину</h1>

    <form method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Назва</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Опис</label>
            <textarea  class="form-control" rows="10" cols="45"  id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Додати</button>
    </form>


</div>


<script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>