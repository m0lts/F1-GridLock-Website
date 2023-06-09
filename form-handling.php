<?php

    session_start();

    if (isset($_SESSION["user_id"])) {

        $mysqli = require __DIR__ . "/database.php";

        $sql = "SELECT * FROM accounts
                WHERE id = {$_SESSION["user_id"]}";

        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();

    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="icon" type="image/x-icon" href="./images/common/F1 (1).png">
    <script src="https://kit.fontawesome.com/d7b281748b.js" crossorigin="anonymous"></script>
    <script src="./functionality/app.js" type="module"></script>
    <title>F1-GridLock</title>
    <meta name="description" content="F1-GridLock is a fantasy F1 league where your predictions can win you cash rewards across the Formula 1 season.">
</head>
<body>
    <!--top header, inc. logo on left and responsive menu on right-->
    <header class="header">
        <!--logo container and logo nested-->
        <figure class="logo-cont">
            <img src="./images/common/F1 (1).png" alt="F1-GridLock logo">
        </figure>
        <!--menu button - common across all pages-->
        <button class="btn menu-btn">
            Menu +
        </button>

        <!--hidden nav-screen. Background image to be yas marina circuit-->
        <nav class="nav-screen">
            <ul class="nav-list">
                <li class="nav-item"><a href="./index.php">Race</a></li>
                <li class="nav-item"><a href="./standings.php">Standings</a></li>
                <!-- <li class="nav-item"><a href="./champ-predictions.html">Predictions</a></li> -->
                <li class="nav-item"><a href="./points-system.html">Points System</a></li>
            </ul>
        </nav>
    </header>
    <!--end of header-->

    <!--main pages-->
    <main class="page-alignment">
            <!-- race weekend top-banner -->
            <div class="race-weekend-hero">
                <h1 id="race-country"></h1>
                <figure class="flag-cont">
                    <img class="flag-fill" src="" alt="">
                </figure>
            </div>
            <?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the next race name
    $content = file_get_contents("https://ergast.com/api/f1/current/next.json");
    $result = json_decode($content);
    $nextRace = $result->MRData->RaceTable->Races[0]->raceName;

    // Get posted form data
    $race = $nextRace;
    $loggedInUser = $user["first_name"] . " " . $user["second_name"];
    $p1 =  $_POST["p1-entry"];
    $p2 =  $_POST["p2-entry"];
    $p3 =  $_POST["p3-entry"];
    $p4 =  $_POST["p4-entry"];
    $p5 =  $_POST["p5-entry"];
    $p6 =  $_POST["p6-entry"];
    $p7 =  $_POST["p7-entry"];
    $p8 =  $_POST["p8-entry"];
    $p9 =  $_POST["p9-entry"];
    $p10 =  $_POST["p10-entry"];

    // Check that all drivers have been selected
    if ($_POST["p1-entry"] === "" || 
        $_POST["p2-entry"] === "" || 
        $_POST["p3-entry"] === "" || 
        $_POST["p4-entry"] === "" || 
        $_POST["p5-entry"] === "" ||
        $_POST["p6-entry"] === "" ||
        $_POST["p7-entry"] === "" ||
        $_POST["p8-entry"] === "" ||
        $_POST["p9-entry"] === "" ||
        $_POST["p10-entry"] === ""
        ) {
        die("Please select a driver for all positions");
    }
    for ($i = 1; $i <= 10; $i++) {
        for ($j = $i + 1; $j <= 10; $j++) {
            if ($_POST["p{$i}-entry"] === $_POST["p{$j}-entry"]) {
                die("You have selected the same driver more than once");
            }
        }
    }
    

    // Database details
    $host = "localhost";
    $dbname = "u128425984_predictions";
    $username = "u128425984_moltontom";
    $password = "Wilson2000";

    // Connect to database using PDO
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute SQL statement
        $checkstmt = $conn->prepare('SELECT * FROM predictions WHERE race = :race_value AND user = :user_value');
        $checkstmt->bindParam(':user_value', $loggedInUser);
        $checkstmt->bindParam(':race_value', $race);

        $checkstmt->execute();

        if ($checkstmt->rowCount() === 0) {
            $stmt = $conn->prepare('INSERT INTO predictions (race, user, p1, p2, p3, p4, p5, p6, p7, p8, p9, p10) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute([$race, $loggedInUser, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10]);
        } else {
            die("You have already submitted a prediction for the $race");
        }



        

    } catch(PDOException $e) {
        die('Connection failed: ' . $e->getMessage());
    }



}


?>
            <p class="form-submission-thanks">Thank you <?= htmlspecialchars($user["first_name"]) ?>, your submission has been recorded.</p>
</main>
</body>
</html>








