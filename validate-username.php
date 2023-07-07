<?php
// CHECK USERNAME ISNT ALREADY TAKEN IN DATABASE AND RETURN A BOOLEAN VALUE JSON OBJECT (is_available) 

$mysqli = require __DIR__ . "/database.php";

$username = $mysqli->real_escape_string($_GET["username"]);

$sql = "SELECT * FROM accounts WHERE username = '$username'";
$result = $mysqli->query($sql);
$is_available_username = $result->num_rows === 0;

header("Content-Type: application/json");
echo json_encode(["available-username" => $is_available_username]);
