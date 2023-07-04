<?php
// CHECK EMAIL ISNT ALREADY TAKEN IN DATABASE AND RETURN A BOOLEAN VALUE JSON OBJECT (is_available) 

$mysqli = require __DIR__ . "/database.php";

$email = $mysqli->real_escape_string($_GET["email"]);

$sql = "SELECT * FROM accounts WHERE email = '$email'";
$result = $mysqli->query($sql);
$is_available = $result->num_rows === 0;

header("Content-Type: application/json");
echo json_encode(["available" => $is_available]);

