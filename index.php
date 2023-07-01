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
        <div>
            <button class="btn menu-btn">
                Menu +
            </button>
            <button class="btn login-btn">
                <?php if ($user): ?>
                    <a class="logged-in-btn" href="logout.php">Log out</a>
                <?php else: ?>    
                    <a href="./login.php">Login</a>
                <?php endif; ?>
            </button>
            
        </div>

        <!--hidden nav-screen. Background image to be yas marina circuit-->
        <nav class="nav-screen">
            <ul class="nav-list">
                <li class="nav-item"><a href="#">Race</a></li>
                <li class="nav-item"><a href="./standings.php">Standings</a></li>
                <!-- <li class="nav-item"><a href="./champ-predictions.html">Predictions</a></li> -->
                <li class="nav-item"><a href="./points-system.html">Points System</a></li>

                <li class="nav-item"><a href="./signup.html">Points System</a></li>


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
            <!-- timer to prediction cutoff -->
            <div class="time-banner">
                <h2 class="timer-text">Qualifying:</h2>
                <h2 class="timer"></h2>
                <!-- INSERT TIMER FUNCTION HERE -->
            </div>
            <a class="make-prediction" href="./prediction-page.php">
                <h2 class="mp-text">Make Prediction <i class="fa-solid fa-arrow-right"></i></h2>
            </a>


            <section class="grey-container">
                <!-- selection tabs -->
                <ul class="tabs-list">
                    <li class="tab stats">Stats</li>
                    <li class="tab predictions">Predictions</li>
                </ul>


                <!-- stats box, to show when 'stats' tab selected -->
                <div class="stats-box">
                    <figure class="circuit">
                        <img class="circuit-fill" src="" alt="">
                    </figure>
                    <div class="previous-results">
                        <!-- previous race result -->
                        <h3 class="h3-title stats-h3">previous race result <i class="right-arrow fa-solid fa-arrow-right"></i></h3>
                        <ul class="previous-race-result">
                            <!-- filled with JS -->
                        </ul>
                    </div>
                </div>



                <!-- predictions box, to show when 'predictions' tab selected -->
                <div class="predictions-box">
                    <!-- list of names that show respective preductions when clicked - filled with JS -->
                    <ul class="names-list">
                        <li class="name ali">Ali</li>
                        <li class="name ed">Ed</li>
                        <li class="name jack">Jack</li>
                        <li class="name toby">Toby</li>
                        <li class="name tom">Tom</li>
                        <li class="name owen">Owen</li>
                    </ul>
                    <div class="ali-pred">
                        <h5 class="prediction-title">Ali's Prediction</h5>
                        <ul>
                        <?php
                            // Database details
                            $host = "localhost";
                            $dbname = "u128425984_predictions";
                            $username = "u128425984_moltontom";
                            $password = "Wilson2000";

                            try {
                                // Create a new PDO instance
                                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                            
                                // Set PDO error mode to exception
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                                // Get the next race name
                                $content = file_get_contents("https://ergast.com/api/f1/current/next.json");
                                $result = json_decode($content);
                                $nextRace = $result->MRData->RaceTable->Races[0]->raceName;

                                
                            
                                // Prepare and execute the SQL query
                                $stmt = $conn->prepare("SELECT * FROM predictions WHERE race = :race_value AND user = :user_value");

                                //Bind the search values to the prepared statement
                                $userValue = "Ali";
                                $raceValue = $nextRace;
                                $stmt->bindParam(':user_value', $userValue);
                                $stmt->bindParam(':race_value', $raceValue);

                                $stmt->execute();

                                // Fetch qualifying time
                                $qualiTime = $result->MRData->RaceTable->Races[0]->Qualifying->time;
                                $timeString = str_split($qualiTime);
                                array_pop($timeString);
                                $timeString[1]++;
                                $returnedQualiTime = implode("", $timeString);
                                // Fetch qualifying date
                                $qualiDate = $result->MRData->RaceTable->Races[0]->Qualifying->date;
                                // Concatenate qualifying time and date in format: Y-M-D H-M-S
                                $qualifying = $qualiDate . " " . $returnedQualiTime;
                                $qualifying = date($qualiDate . " " . $returnedQualiTime);


                                // Access current date and time
                                $currentDateTime = date('Y-m-d H:i:s');

                                // Auto-fill database with fallback predictions if user doesn't enter a prediction
                                if ($stmt->rowCount() === 0 && $currentDateTime > $qualifying) {
                                    $stmt2 = $conn->prepare('INSERT INTO predictions (race, user, p1, p2, p3, p4, p5, p6, p7, p8, p9, p10) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
                                    $stmt2->execute([$raceValue, $userValue, "verstappen", "leclerc", "perez", "alonso", "sainz", "hamilton", "stroll", "russell", "norris", "gasly"]);
                                };
                            
                                // Fetch all rows as an associative array
                                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            
                                // Output the fetched data as an HTML unordered list
                                foreach ($rows as $row):
                                    ?>
                                    <li class="driver-container <?= $row ['p1'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p2'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p3'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p4'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p5'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p6'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p7'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p8'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p9'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p10'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    
                                <?php
                                endforeach;
                            } catch (PDOException $e) {
                                echo "Query failed: " . $e->getMessage();
                            }
                        ?>
                        </ul>
                    </div>
                    <div class="ed-pred">
                        <h5 class="prediction-title">Ed's Prediction</h5>
                        <ul>
                        <?php
                            // Database details
                            $host = "localhost";
                            $dbname = "u128425984_predictions";
                            $username = "u128425984_moltontom";
                            $password = "Wilson2000";

                            try {
                                // Create a new PDO instance
                                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                            
                                // Set PDO error mode to exception
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                                // Get the next race name
                                $content = file_get_contents("https://ergast.com/api/f1/current/next.json");
                                $result = json_decode($content);
                                $nextRace = $result->MRData->RaceTable->Races[0]->raceName;

                                
                            
                                // Prepare and execute the SQL query
                                $stmt = $conn->prepare("SELECT * FROM predictions WHERE race = :race_value AND user = :user_value");

                                //Bind the search values to the prepared statement
                                $userValue = "Ed";
                                $raceValue = $nextRace;
                                $stmt->bindParam(':user_value', $userValue);
                                $stmt->bindParam(':race_value', $raceValue);

                                $stmt->execute();

                                // Fetch qualifying time
                                $qualiTime = $result->MRData->RaceTable->Races[0]->Qualifying->time;
                                $timeString = str_split($qualiTime);
                                array_pop($timeString);
                                $timeString[1]++;
                                $returnedQualiTime = implode("", $timeString);
                                // Fetch qualifying date
                                $qualiDate = $result->MRData->RaceTable->Races[0]->Qualifying->date;
                                // Concatenate qualifying time and date in format: Y-M-D H-M-S
                                $qualifying = $qualiDate . " " . $returnedQualiTime;
                                $qualifying = date($qualiDate . " " . $returnedQualiTime);



                                // Access current date and time
                                $currentDateTime = date('Y-m-d H:i:s');

                                // Auto-fill database with fallback predictions if user doesn't enter a prediction
                                if ($stmt->rowCount() === 0 && $currentDateTime > $qualifying) {
                                    $stmt2 = $conn->prepare('INSERT INTO predictions (race, user, p1, p2, p3, p4, p5, p6, p7, p8, p9, p10) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
                                    $stmt2->execute([$raceValue, $userValue, "verstappen", "perez", "leclerc", "russell", "hamilton", "sainz", "alonso", "norris", "ocon", "piastri"]);
                                };
                            
                                // Fetch all rows as an associative array
                                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            
                                // Output the fetched data as an HTML unordered list
                                foreach ($rows as $row):
                                    ?>
                                    <li class="driver-container <?= $row ['p1'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p2'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p3'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p4'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p5'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p6'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p7'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p8'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p9'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p10'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    
                                <?php
                                endforeach;
                            } catch (PDOException $e) {
                                echo "Query failed: " . $e->getMessage();
                            }

                        ?>
                        </ul>
                    </div>
                    <div class="jack-pred">
                        <h5 class="prediction-title">Jack's Prediction</h5>
                        <ul>
                        <?php
                            // Database details
                            $host = "localhost";
                            $dbname = "u128425984_predictions";
                            $username = "u128425984_moltontom";
                            $password = "Wilson2000";

                            try {
                                // Create a new PDO instance
                                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                            
                                // Set PDO error mode to exception
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                                // Get the next race name
                                $content = file_get_contents("https://ergast.com/api/f1/current/next.json");
                                $result = json_decode($content);
                                $nextRace = $result->MRData->RaceTable->Races[0]->raceName;

                                
                            
                                // Prepare and execute the SQL query
                                $stmt = $conn->prepare("SELECT * FROM predictions WHERE race = :race_value AND user = :user_value");

                                //Bind the search values to the prepared statement
                                $userValue = "Jack";
                                $raceValue = $nextRace;
                                $stmt->bindParam(':user_value', $userValue);
                                $stmt->bindParam(':race_value', $raceValue);

                                $stmt->execute();

                                // Fetch qualifying time
                                $qualiTime = $result->MRData->RaceTable->Races[0]->Qualifying->time;
                                $timeString = str_split($qualiTime);
                                array_pop($timeString);
                                $timeString[1]++;
                                $returnedQualiTime = implode("", $timeString);
                                // Fetch qualifying date
                                $qualiDate = $result->MRData->RaceTable->Races[0]->Qualifying->date;
                                // Concatenate qualifying time and date in format: Y-M-D H-M-S
                                $qualifying = $qualiDate . " " . $returnedQualiTime;
                                $qualifying = date($qualiDate . " " . $returnedQualiTime);



                                // Access current date and time
                                $currentDateTime = date('Y-m-d H:i:s');

                                // Auto-fill database with fallback predictions if user doesn't enter a prediction
                                // issue with row count - there is more than one now preductions have been entered
                                if ($stmt->rowCount() === 0 && $currentDateTime > $qualifying) {
                                    $stmt2 = $conn->prepare('INSERT INTO predictions (race, user, p1, p2, p3, p4, p5, p6, p7, p8, p9, p10) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
                                    $stmt2->execute([$raceValue, $userValue, "leclerc", "verstappen", "perez", "sainz", "russell", "hamilton", "norris", "alonso", "stroll", "bottas"]);
                                };
                            
                                // Fetch all rows as an associative array
                                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            
                                // Output the fetched data as an HTML unordered list
                                foreach ($rows as $row):
                                    ?>
                                    <li class="driver-container <?= $row ['p1'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p2'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p3'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p4'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p5'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p6'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p7'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p8'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p9'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p10'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    
                                <?php
                                endforeach;
                            } catch (PDOException $e) {
                                echo "Query failed: " . $e->getMessage();
                            }

                        ?>
                        </ul>
                    </div>
                    <div class="toby-pred">
                        <h5 class="prediction-title">Toby's Prediction</h5>
                        <ul>
                        <?php
                            // Database details
                            $host = "localhost";
                            $dbname = "u128425984_predictions";
                            $username = "u128425984_moltontom";
                            $password = "Wilson2000";

                            try {
                                // Create a new PDO instance
                                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                            
                                // Set PDO error mode to exception
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                                // Get the next race name
                                $content = file_get_contents("https://ergast.com/api/f1/current/next.json");
                                $result = json_decode($content);
                                $nextRace = $result->MRData->RaceTable->Races[0]->raceName;

                                
                            
                                // Prepare and execute the SQL query
                                $stmt = $conn->prepare("SELECT * FROM predictions WHERE race = :race_value AND user = :user_value");

                                //Bind the search values to the prepared statement
                                $userValue = "Toby";
                                $raceValue = $nextRace;
                                $stmt->bindParam(':user_value', $userValue);
                                $stmt->bindParam(':race_value', $raceValue);

                                $stmt->execute();

                                // Fetch qualifying time
                                $qualiTime = $result->MRData->RaceTable->Races[0]->Qualifying->time;
                                $timeString = str_split($qualiTime);
                                array_pop($timeString);
                                $timeString[1]++;
                                $returnedQualiTime = implode("", $timeString);
                                // Fetch qualifying date
                                $qualiDate = $result->MRData->RaceTable->Races[0]->Qualifying->date;
                                // Concatenate qualifying time and date in format: Y-M-D H-M-S
                                $qualifying = $qualiDate . " " . $returnedQualiTime;
                                $qualifying = date($qualiDate . " " . $returnedQualiTime);



                                // Access current date and time
                                $currentDateTime = date('Y-m-d H:i:s');

                                // Auto-fill database with fallback predictions if user doesn't enter a prediction
                                if ($stmt->rowCount() === 0 && $currentDateTime > $qualifying) {
                                    $stmt2 = $conn->prepare('INSERT INTO predictions (race, user, p1, p2, p3, p4, p5, p6, p7, p8, p9, p10) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
                                    $stmt2->execute([$raceValue, $userValue, "verstappen", "leclerc", "perez", "sainz", "hamilton", "russell", "ocon", "gasly", "alonso", "norris"]);
                                };
                            
                                // Fetch all rows as an associative array
                                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            
                                // Output the fetched data as an HTML unordered list
                                foreach ($rows as $row):
                                    ?>
                                    <li class="driver-container <?= $row ['p1'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p2'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p3'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p4'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p5'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p6'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p7'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p8'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p9'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p10'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    
                                <?php
                                endforeach;
                            } catch (PDOException $e) {
                                echo "Query failed: " . $e->getMessage();
                            }
                        ?>
                        </ul>
                    </div>
                    <div class="tom-pred">
                        <h5 class="prediction-title">Tom's Prediction</h5>
                        <ul>
                        <?php
                            // Database details
                            $host = "localhost";
                            $dbname = "u128425984_predictions";
                            $username = "u128425984_moltontom";
                            $password = "Wilson2000";

                            try {
                                // Create a new PDO instance
                                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                            
                                // Set PDO error mode to exception
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                                // Get the next race name
                                $content = file_get_contents("https://ergast.com/api/f1/current/next.json");
                                $result = json_decode($content);
                                $nextRace = $result->MRData->RaceTable->Races[0]->raceName;

                                
                            
                                // Prepare and execute the SQL query
                                $stmt = $conn->prepare("SELECT * FROM predictions WHERE race = :race_value AND user = :user_value");

                                //Bind the search values to the prepared statement
                                $userValue = "Tom";
                                $raceValue = $nextRace;
                                $stmt->bindParam(':user_value', $userValue);
                                $stmt->bindParam(':race_value', $raceValue);

                                $stmt->execute();

                                // Fetch qualifying time
                                $qualiTime = $result->MRData->RaceTable->Races[0]->Qualifying->time;
                                $timeString = str_split($qualiTime);
                                array_pop($timeString);
                                $timeString[1]++;
                                $returnedQualiTime = implode("", $timeString);
                                // Fetch qualifying date
                                $qualiDate = $result->MRData->RaceTable->Races[0]->Qualifying->date;
                                // Concatenate qualifying time and date in format: Y-M-D H-M-S
                                $qualifying = $qualiDate . " " . $returnedQualiTime;
                                $qualifying = date($qualiDate . " " . $returnedQualiTime);



                                // Access current date and time
                                $currentDateTime = date('Y-m-d H:i:s');

                                // Auto-fill database with fallback predictions if user doesn't enter a prediction
                                if ($stmt->rowCount() === 0 && $currentDateTime > $qualifying) {
                                    $stmt2 = $conn->prepare('INSERT INTO predictions (race, user, p1, p2, p3, p4, p5, p6, p7, p8, p9, p10) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
                                    $stmt2->execute([$raceValue, $userValue, "verstappen", "perez", "alonso", "leclerc", "sainz", "hamilton", "stroll", "russell", "norris", "ocon"]);
                                };
                            
                                // Fetch all rows as an associative array
                                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            
                                // Output the fetched data as an HTML unordered list
                                foreach ($rows as $row):
                                    ?>
                                    <li class="driver-container <?= $row ['p1'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p2'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p3'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p4'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p5'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p6'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p7'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p8'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p9'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p10'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    
                                <?php
                                endforeach;
                            } catch (PDOException $e) {
                                echo "Query failed: " . $e->getMessage();
                            }
                        ?>
                        </ul>
                    </div>
                    <div class="owen-pred">
                        <h5 class="prediction-title">Owen's Prediction</h5>
                        <ul>
                        <?php
                            // Database details
                            $host = "localhost";
                            $dbname = "u128425984_predictions";
                            $username = "u128425984_moltontom";
                            $password = "Wilson2000";

                            try {
                                // Create a new PDO instance
                                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                            
                                // Set PDO error mode to exception
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                                // Get the next race name
                                $content = file_get_contents("https://ergast.com/api/f1/current/next.json");
                                $result = json_decode($content);
                                $nextRace = $result->MRData->RaceTable->Races[0]->raceName;

                                
                            
                                // Prepare and execute the SQL query
                                $stmt = $conn->prepare("SELECT * FROM predictions WHERE race = :race_value AND user = :user_value");

                                //Bind the search values to the prepared statement
                                $userValue = "Owen";
                                $raceValue = $nextRace;
                                $stmt->bindParam(':user_value', $userValue);
                                $stmt->bindParam(':race_value', $raceValue);

                                $stmt->execute();

                                // Fetch qualifying time
                                $qualiTime = $result->MRData->RaceTable->Races[0]->Qualifying->time;
                                $timeString = str_split($qualiTime);
                                array_pop($timeString);
                                $timeString[1]++;
                                $returnedQualiTime = implode("", $timeString);
                                // Fetch qualifying date
                                $qualiDate = $result->MRData->RaceTable->Races[0]->Qualifying->date;
                                // Concatenate qualifying time and date in format: Y-M-D H-M-S
                                $qualifying = $qualiDate . " " . $returnedQualiTime;
                                $qualifying = date($qualiDate . " " . $returnedQualiTime);



                                // Access current date and time
                                $currentDateTime = date('Y-m-d H:i:s');

                                // Auto-fill database with fallback predictions if user doesn't enter a prediction
                                if ($stmt->rowCount() === 0 && $currentDateTime > $qualifying) {
                                    $stmt2 = $conn->prepare('INSERT INTO predictions (race, user, p1, p2, p3, p4, p5, p6, p7, p8, p9, p10) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
                                    $stmt2->execute([$raceValue, $userValue, "verstappen", "leclerc", "alonso", "perez", "hamilton", "russell", "gasly", "stroll", "ocon", "norris"]);
                                };
                            
                                // Fetch all rows as an associative array
                                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            
                                // Output the fetched data as an HTML unordered list
                                foreach ($rows as $row):
                                    ?>
                                    <li class="driver-container <?= $row ['p1'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p2'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p3'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p4'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p5'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p6'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p7'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p8'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p9'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    <li class="driver-container <?= $row ['p10'] ?>">
                                    <div class="driver-details">
                                        <div class="driver-number">
                                        <p class="driver-number-p"></p>
                                        </div>
                                        <div class="driver-name">
                                        <p class="firstname"></p>
                                        <p class="surname"></p>
                                        </div>
                                    </div>
                                    <figure class="driver-img">
                                        <img class="team-img" src="" alt="">
                                    </figure>
                                    </li>
                                    
                                <?php
                                endforeach;
                            } catch (PDOException $e) {
                                echo "Query failed: " . $e->getMessage();
                            }

                        ?>
                        </ul>
                    </div>
                </div>
            </section>
        </section>
    </main>
</body>
</html>
