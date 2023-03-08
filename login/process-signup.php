<?php  

if (empty($_POST["name"])) {
    die("Name is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required!");
}

if (strlen(($_POST["password"])) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/i", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords don't match");
}

$email_token = bin2hex(random_bytes(16));

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (name, email, password_hash, email_token)
        VALUES (?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();    

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$stmt->bind_param("ssss",
            $_POST["name"],
            $_POST["email"],
            $password_hash,
            $email_token);

if ($stmt->execute()) {
    $to = $_POST["email"];
    $subject = "Confirm your email";
    $message = "Please click on the following link to confirm your email: https://www.example.com/confirm-email.php?email=" . urlencode($_POST["email"]) . "&token=" . urlencode($email_token);
    $headers = "From: noreply@example.com";
    mail($to, $subject, $message, $headers);
    header("Location: check-email.html");
    exit;
} else {
    if ($mysqli->errno === 1062) {
        die("Email already taken");
    } else {
        die($mysqli->error . " " .  $mysqli->errno);
    }
}

?>
