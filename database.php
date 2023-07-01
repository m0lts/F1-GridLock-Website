<?php

// Database details
$host = "localhost";
$dbname = "u128425984_predictions";
$username = "u128425984_moltontom";
$password = "Wilson2000";

$mysqli = new mysqli(hostname: $host,
                    username: $username,
                    password: $password,
                    database: $dbname);
if ($mysqli->connect_errno) {
    die ("Connection error: " . $mysqli->connect_error);
}

return $mysqli;