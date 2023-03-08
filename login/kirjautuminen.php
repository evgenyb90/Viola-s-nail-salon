<?php 
session_start();

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palaute</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="icon" type="image/x-icon" href="../img/nail-polish-64.png">
    <link rel="stylesheet" href="../css/style-form.css">
</head>
<body>
    

    <?php 
    if (isset($_SESSION["user_id"])): ?>
    <p>Terve <?= htmlspecialchars($user["name"]) ?>!</p> <br>
    <a href="../index.php">Etusivu</a> <br>
    <a href="logout.php">Kirjaudu ulos</a> <br><br>
    <h1>Palaute</h1>
    <form action="feedback.php" method="POST">
        <p>Merkitse sinulle sopiva päiviä ja aika ja otamme sinuun pian yhteyttä.</p>
        <label for="name">Valitse Työntekijä:</label><br>
        <select name="name" id="name" required>
            <option value="Veronika">Veronika</option>
            <option value="Karoliina">Karoliina</option>
            <option value="Pilvi">Pilvi</option>
            <option value="Tanja">Tanja</option>
            <option value="Anyone">Kuka tahansa</option>
        </select><br>

        <label for="feedback">Message:</label><br>
        <textarea style="max-width: 450px; width: 85%; resize: none;" name="feedback" id="feedback" rows="5" required></textarea><br>

        <button class="btn" type="submit">Submit Feedback</button>
</form>
    
    <?php 
    else: ?>

    <a href="login.php">Log in</a> or <a href="signup.html">sign up</a>

    <?php endif; ?>

    </body>
</html>
