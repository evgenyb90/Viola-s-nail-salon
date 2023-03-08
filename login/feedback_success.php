<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message sent</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="icon" type="image/x-icon" href="../img/nail-polish-64.png">
    <link rel="stylesheet" href="../css/style-form.css">
</head>
<body>
    <h1>Kiitos viestistä! Otamme sinuun pian yhteyttä.</h1>
    <a href="../index.php">Etusivu</a> <br> 
    <a style="max-width: 350px; width: 70%" href="logout.php">Kirjaudu ulos</a>
</body>
</html>