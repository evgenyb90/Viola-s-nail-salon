<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require __DIR__ . "/database.php";

    $name = $mysqli->real_escape_string($_POST["name"]);
    $feedback = $mysqli->real_escape_string($_POST["feedback"]);
    $user_id = $_SESSION["user_id"];

    $sql = "INSERT INTO feedback (name, feedback, user_id) VALUES ('$name', '$feedback', '$user_id')";
    $result = $mysqli->query($sql);

    if ($result) {
        header("Location: feedback_success.php");
        exit;
    } else {
        $error_msg = "Error submitting feedback. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Feedback Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="icon" type="image/x-icon" href="../img/nail-polish-64.png">
    <link rel="stylesheet" href="../css/style-form.css">
</head>
<body>
    <?php if (isset($error_msg)) { ?>
        <div class="error" style="font-size: 20px; margin-bottom: 20px; color: #96216B;"><?php echo $error_msg; ?></div>
    <?php } ?>

    <h1>Feedback Form</h1>
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

        <label for="feedback">Viesti:</label><br>
        <textarea name="feedback" id="feedback" rows="5" required></textarea><br>

        <button class="btn" type="submit">Submit Feedback</button>
    </form>
    
    <a href="../index.php">Etusivu</a> <br>
    <a href="logout.php">Kirjaudu ulos</a>
</body>
</html>
