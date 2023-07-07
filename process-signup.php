<?php

if (empty($_POST["username"])) {
    die("Name is required");
}

if (empty($_POST["first_name"])) {
    die("Name is required");
}

if (empty($_POST["surname"])) {
    die("Name is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  {
        die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must contain at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die ("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);


$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO accounts (username, first_name, surname, email, password_hash)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sssss",
                    $_POST["username"],
                    $_POST["first_name"],
                    $_POST["surname"],
                    $_POST["email"],
                    $password_hash);

if ($stmt->execute()) {

    header("Location: signup-success.html");
    exit;
    
} else {

    if ($mysqli->errno === 1062) {
        die("Sorry, that email or username is already in use.");
    }
    die($mysqli->error . " " . $mysqli->errno);
    
}





?>