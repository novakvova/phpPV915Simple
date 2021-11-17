<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
//    echo "<h3>{$_POST['name']}</h3>";
//    echo "<h3>{$_POST['description']}</h3>";

    $name = $_POST['name'];
    $description = $_POST['description'];

    $uploaddir=$_SERVER['DOCUMENT_ROOT'].'/images/';
    $file_name = uniqid().'.jpg';
    $file_save_path = $uploaddir.$file_name;

    move_uploaded_file($_FILES['image']['tmp_name'], $file_save_path);
    $user = "root";
    $pass = "";
    $dbh = new PDO('mysql:host=localhost;dbname=pv915', $user, $pass);
    $sql = "INSERT INTO `news` (`name`, `description`, image) VALUES (?, ?, ?);";
    $dbh->prepare($sql)->execute([$name, $description, $file_name]);
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
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Назва</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Опис</label>
            <textarea  class="form-control" rows="5" cols="35"  id="description" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" style="cursor: pointer;" class="form-label">
                <img src="https://elitediscovery.com/wp-content/uploads/upload-1.png"
                     id="img_preview"
                     width="200" alt="Upload image"/>
            </label>
            <input type="file" class="form-control d-none myimage" id="image"  data-view="img_preview" name="image">
        </div>

        <div class="mb-3">
            <label for="image1" style="cursor: pointer;" class="form-label">
                <img src="https://elitediscovery.com/wp-content/uploads/upload-1.png"
                     id="img_preview1"
                     width="200" alt="Upload image"/>
            </label>
            <input type="file" class="form-control d-none myimage" data-view="img_preview1" id="image1" name="image1">
        </div>
        <button type="submit" class="btn btn-primary">Додати</button>
    </form>

</div>


<script src="/js/bootstrap.bundle.min.js"></script>
<script>
    window.addEventListener('load', function() {
        const cbox = document.querySelectorAll(".myimage");
        for (let i = 0; i < cbox.length; i++) {
            cbox[i].addEventListener("change", function(event) {
                const file = event.currentTarget.files[0];
                const imgUpdate = event.currentTarget.dataset.view;
                document.getElementById(imgUpdate).src=URL.createObjectURL(file);
            });
        }




    });
</script>
</body>
</html>