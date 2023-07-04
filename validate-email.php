<?php
// CHECK EMAIL ISNT ALREADY TAKEN IN DATABASE AND RETURN A BOOLEAN VALUE JSON OBJECT (is_available) 

$mysqli = require __DIR__ . "/database.php";

$sql = sprintf("SELECT * FROM accounts
                WHERE email = '%s'",
                $mysqli->real_escape_string($_GET["email"]));

$result = $mysqli->query($sql);

$is_available;

if ($result->rowCount() === 0) {
    $is_available = true;
} else {
    $is_available = false;
};

header("Content-Type: application/json");

echo json_encode(["available => $is_available"]);
