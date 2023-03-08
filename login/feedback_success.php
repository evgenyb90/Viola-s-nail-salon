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
    <title>Feedback Form - Success</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="icon" type="image/x-icon" href="../img/nail-polish-64.png">
    <link rel="stylesheet" href="../css/style-form.css">
</head>
<body>
    <div class="success">Kiitos viestistä! Otamme sinuun pian yhteyttä.</div>
    <a href="../index.php">Etusivu</a> <br> <a href="logout.php">Kirjaudu ulos</a>
</body>
</html>