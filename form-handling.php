<?php

$race = "monaco";
$user = "ali";
$p1 =  $_POST["p1-ali"];
$p2 =  $_POST["p2-ali"];
$p3 =  $_POST["p3-ali"];
$p4 =  $_POST["p4-ali"];
$p5 =  $_POST["p5-ali"];
$p6 =  $_POST["p6-ali"];
$p7 =  $_POST["p7-ali"];
$p8 =  $_POST["p8-ali"];
$p9 =  $_POST["p9-ali"];
$p10 =  $_POST["p10-ali"];







$host = "localhost";
$dbname = "u128425984_predictions";
$username = "u128425984_moltontom";
$password = "Wilson2000";


$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Prepare and execute SQL statement
$stmt = $conn->prepare('INSERT INTO monaco_predictions (race, user, p1, p2, p3, p4, p5, p6, p7, p8, p9, p10) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
$stmt->bind_param('ssssssssssss', $race, $user, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10);
$stmt->execute();

// Close statement and database connection
$stmt->close();
$conn->close();




// $stmt = mysqli_stmt_init($conn);

//  if ( ! mysqli_stmt_prepare($stmt, $sql)) {
//    die(mysqli_error($conn));
//  }

// mysqli_stmt_bind_param($stmt, "ssssssssssss", $race, $user, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10);

// mysqli_stmt_execute($stmt);

// echo "Prediction saved";





