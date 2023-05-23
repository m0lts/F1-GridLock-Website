<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="icon" type="image/x-icon" href="./images/common/F1 (1).png">
    <script src="./functionality/app.js" type="module" defer></script>
    <script src="./functionality/standings.js" type="module" defer></script>
    <meta name="description" content="F1-GridLock is a fantasy F1 league where your predictions can win you cash rewards across the Formula 1 season.">
    <title>F1-GridLock</title>
</head>
<body>
    <!--top header, inc. logo on left and responsive menu on right-->
    <header class="header">
        <!--logo container and logo nested-->
        <figure class="logo-cont">
            <a href="./index.html">
                <img src="./images/common/F1 (1).png" alt="F1-GridLock logo">
            </a>
        </figure>
        <!--menu button - common across all pages-->
        <button class="btn menu-btn">
            Menu +
        </button>

        <!--hidden nav-screen. Background image to be yas marina circuit-->
        <nav class="nav-screen">
            <ul class="nav-list">
                <li class="nav-item"><a href="./index.php">Race</a></li>
                <li class="nav-item visiting"><a href="#">Standings</a></li>
                <!-- <li class="nav-item"><a href="./champ-predictions.html">Predictions</a></li> -->
                <li class="nav-item"><a href="./points-system.html">Points System</a></li>
            </ul>
        </nav>
    </header>
    <!--end of header-->


     <!--main pages-->
     <main class="page-alignment">
        <!--rest-of-page segement with red to blue gradient. common across all pages-->
        <section class="standings">
            <!-- hero at top of standings page -->
            <div class="standings-hero">
                <h3 class="h3-title">Races Complete:</h3>
                <!--list of flags of races already complete-->
                <ul class="flags">
                    <li class="flag">
                        <img src="./images/flags/Flag_of_Bahrain.png" alt="">
                    </li>
                    <li class="flag">
                        <img src="./images/flags/saudi_flag.jpeg" alt="">
                    </li>
                    <li class="flag">
                        <img src="./images/flags/Flag-Australia.webp" alt="">
                    </li>
                    <li class="flag">
                        <img src="./images/flags/azer_flag.png" alt="">
                    </li>
                </ul>
            </div>
            <ul class="grey-container player-standings-box">
                <h3 class="standings-title">Standings:</h3>
                <li class="points-list-container ali-points">
                    <div class="player-standings-item">
                        <h4 class="points-heading">Ali</h4>
                        <ul class="points-list">
                            <li class="prev-points">16</li>
                            <li class="prev-points">14</li>
                            <li class="prev-points">9</li>
                            <li class="prev-points">12</li>
                            <li class="prev-points">14</li>
                            <li class="points-total">65</li>
                        </ul>
                    </div>
                    <div class="previous-player-predictions">
                        <ul class="previous-prediction-ul">
                            <li class="previous-prediction-item">
                                <h5>Bahrain:</h5>
                                <ul class="previous-prediction-drivers-list ali-bahrain-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Saudi Arabia:</h5>
                                <ul class="previous-prediction-drivers-list ali-saudi-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Australia:</h5>
                                <ul class="previous-prediction-drivers-list ali-aus-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Baku:</h5>
                                <ul class="previous-prediction-drivers-list ali-baku-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Miami:</h5>
                                <ul class="previous-prediction-drivers-list ali-miami-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Monaco:</h5>
                                <ul class="previous-prediction-drivers-list ali-monaco-pred">
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
                            
                                // Prepare and execute the SQL query
                                $stmt = $conn->prepare("SELECT * FROM monaco_predictions WHERE race = :race_value AND user = :user_value");

                                // Get the next race name
                                $content = file_get_contents("https://ergast.com/api/f1/current/next.json");
                                $result = json_decode($content);
                                $nextRace = $result->MRData->RaceTable->Races[0]->raceName;

                                //Bind the search values to the prepared statement
                                $userValue = "Ali";
                                $raceValue = $nextRace;
                                $stmt->bindParam(':user_value', $userValue);
                                $stmt->bindParam(':race_value', $raceValue);

                                $stmt->execute();
                            
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
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="points-list-container toby-points">
                    <div class="player-standings-item">
                        <h4 class="points-heading">Toby</h4>
                        <ul class="points-list">
                            <li class="prev-points">11</li>
                            <li class="prev-points">11</li>
                            <li class="prev-points">10</li>
                            <li class="prev-points">14</li>
                            <li class="prev-points">11</li>
                            <li class="points-total">57</li>
                        </ul>
                    </div>
                    <div class="previous-player-predictions">
                        <ul class="previous-prediction-ul">
                            <li class="previous-prediction-item">
                                <h5>Bahrain:</h5>
                                <ul class="previous-prediction-drivers-list toby-bahrain-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Saudi Arabia:</h5>
                                <ul class="previous-prediction-drivers-list toby-saudi-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Australia:</h5>
                                <ul class="previous-prediction-drivers-list toby-aus-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Baku:</h5>
                                <ul class="previous-prediction-drivers-list toby-baku-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Miami:</h5>
                                <ul class="previous-prediction-drivers-list toby-miami-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Monaco:</h5>
                                <ul class="previous-prediction-drivers-list toby-monaco-pred">
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
                            
                                // Prepare and execute the SQL query
                                $stmt = $conn->prepare("SELECT * FROM monaco_predictions WHERE race = :race_value AND user = :user_value");

                                // Get the next race name
                                $content = file_get_contents("https://ergast.com/api/f1/current/next.json");
                                $result = json_decode($content);
                                $nextRace = $result->MRData->RaceTable->Races[0]->raceName;

                                //Bind the search values to the prepared statement
                                $userValue = "Toby";
                                $raceValue = $nextRace;
                                $stmt->bindParam(':user_value', $userValue);
                                $stmt->bindParam(':race_value', $raceValue);

                                $stmt->execute();
                            
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
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="points-list-container ed-points">
                    <div class="player-standings-item">
                        <h4 class="points-heading">Ed</h4>
                        <ul class="points-list">
                            <li class="prev-points">12</li>
                            <li class="prev-points">10</li>
                            <li class="prev-points">8</li>
                            <li class="prev-points">13</li>
                            <li class="prev-points">14</li>
                            <li class="points-total">57</li>
                        </ul>
                    </div>
                    <div class="previous-player-predictions">
                        <ul class="previous-prediction-ul">
                            <li class="previous-prediction-item">
                                <h5>Bahrain:</h5>
                                <ul class="previous-prediction-drivers-list ed-bahrain-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Saudi Arabia:</h5>
                                <ul class="previous-prediction-drivers-list ed-saudi-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Australia:</h5>
                                <ul class="previous-prediction-drivers-list ed-aus-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Baku:</h5>
                                <ul class="previous-prediction-drivers-list ed-baku-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Miami:</h5>
                                <ul class="previous-prediction-drivers-list ed-miami-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Monaco:</h5>
                                <ul class="previous-prediction-drivers-list ed-monaco-pred">
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
                            
                                // Prepare and execute the SQL query
                                $stmt = $conn->prepare("SELECT * FROM monaco_predictions WHERE race = :race_value AND user = :user_value");

                                // Get the next race name
                                $content = file_get_contents("https://ergast.com/api/f1/current/next.json");
                                $result = json_decode($content);
                                $nextRace = $result->MRData->RaceTable->Races[0]->raceName;

                                //Bind the search values to the prepared statement
                                $userValue = "Ed";
                                $raceValue = $nextRace;
                                $stmt->bindParam(':user_value', $userValue);
                                $stmt->bindParam(':race_value', $raceValue);

                                $stmt->execute();
                            
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
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="points-list-container jack-points">
                    <div class="player-standings-item">
                        <h4 class="points-heading">Jack</h4>
                        <ul class="points-list">
                            <li class="prev-points">11</li>
                            <li class="prev-points">14</li>
                            <li class="prev-points">6</li>
                            <li class="prev-points">13</li>
                            <li class="prev-points">12</li>
                            <li class="points-total">56</li>
                        </ul>
                    </div>
                    <div class="previous-player-predictions">
                        <ul class="previous-prediction-ul">
                            <li class="previous-prediction-item">
                                <h5>Bahrain:</h5>
                                <ul class="previous-prediction-drivers-list jack-bahrain-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Saudi Arabia:</h5>
                                <ul class="previous-prediction-drivers-list jack-saudi-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Australia:</h5>
                                <ul class="previous-prediction-drivers-list jack-aus-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Baku:</h5>
                                <ul class="previous-prediction-drivers-list jack-baku-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Miami:</h5>
                                <ul class="previous-prediction-drivers-list jack-miami-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Monaco:</h5>
                                <ul class="previous-prediction-drivers-list jack-monaco-pred">
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
                            
                                // Prepare and execute the SQL query
                                $stmt = $conn->prepare("SELECT * FROM monaco_predictions WHERE race = :race_value AND user = :user_value");

                                // Get the next race name
                                $content = file_get_contents("https://ergast.com/api/f1/current/next.json");
                                $result = json_decode($content);
                                $nextRace = $result->MRData->RaceTable->Races[0]->raceName;

                                //Bind the search values to the prepared statement
                                $userValue = "Jack";
                                $raceValue = $nextRace;
                                $stmt->bindParam(':user_value', $userValue);
                                $stmt->bindParam(':race_value', $raceValue);

                                $stmt->execute();
                            
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
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="points-list-container tom-points">
                    <div class="player-standings-item">
                        <h4 class="points-heading">Tom</h4>
                        <ul class="points-list">
                            <li class="prev-points">11</li>
                            <li class="prev-points">12</li>
                            <li class="prev-points">8</li>
                            <li class="prev-points">8</li>
                            <li class="prev-points">14</li>
                            <li class="points-total">53</li>
                        </ul>
                    </div>
                    <div class="previous-player-predictions">
                        <ul class="previous-prediction-ul">
                            <li class="previous-prediction-item">
                                <h5>Bahrain:</h5>
                                <ul class="previous-prediction-drivers-list tom-bahrain-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Saudi Arabia:</h5>
                                <ul class="previous-prediction-drivers-list tom-saudi-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Australia:</h5>
                                <ul class="previous-prediction-drivers-list tom-aus-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Baku:</h5>
                                <ul class="previous-prediction-drivers-list tom-baku-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Miami:</h5>
                                <ul class="previous-prediction-drivers-list tom-miami-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Monaco:</h5>
                                <ul class="previous-prediction-drivers-list tom-monaco-pred">
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
                            
                                // Prepare and execute the SQL query
                                $stmt = $conn->prepare("SELECT * FROM monaco_predictions WHERE race = :race_value AND user = :user_value");

                                // Get the next race name
                                $content = file_get_contents("https://ergast.com/api/f1/current/next.json");
                                $result = json_decode($content);
                                $nextRace = $result->MRData->RaceTable->Races[0]->raceName;

                                //Bind the search values to the prepared statement
                                $userValue = "Tom";
                                $raceValue = $nextRace;
                                $stmt->bindParam(':user_value', $userValue);
                                $stmt->bindParam(':race_value', $raceValue);

                                $stmt->execute();
                            
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
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="points-list-container owen-points">
                    <div class="player-standings-item">
                        <h4 class="points-heading">Owen</h4>
                        <ul class="points-list">
                            <li class="prev-points">11</li>
                            <li class="prev-points">12</li>
                            <li class="prev-points">7</li>
                            <li class="prev-points">8</li>
                            <li class="prev-points">14</li>
                            <li class="points-total">52</li>
                        </ul>
                    </div>
                    <div class="previous-player-predictions">
                        <ul class="previous-prediction-ul">
                            <li class="previous-prediction-item">
                                <h5>Bahrain:</h5>
                                <ul class="previous-prediction-drivers-list owen-bahrain-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Saudi Arabia:</h5>
                                <ul class="previous-prediction-drivers-list owen-saudi-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Australia:</h5>
                                <ul class="previous-prediction-drivers-list owen-aus-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Baku:</h5>
                                <ul class="previous-prediction-drivers-list owen-baku-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Miami:</h5>
                                <ul class="previous-prediction-drivers-list owen-miami-pred">
                                    <!-- filled with JS -->
                                </ul>
                            </li>
                            <li class="previous-prediction-item">
                                <h5>Monaco:</h5>
                                <ul class="previous-prediction-drivers-list owen-monaco-pred">
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
                            
                                // Prepare and execute the SQL query
                                $stmt = $conn->prepare("SELECT * FROM monaco_predictions WHERE race = :race_value AND user = :user_value");

                                // Get the next race name
                                $content = file_get_contents("https://ergast.com/api/f1/current/next.json");
                                $result = json_decode($content);
                                $nextRace = $result->MRData->RaceTable->Races[0]->raceName;

                                //Bind the search values to the prepared statement
                                $userValue = "Tom";
                                $raceValue = $nextRace;
                                $stmt->bindParam(':user_value', $userValue);
                                $stmt->bindParam(':race_value', $raceValue);

                                $stmt->execute();
                            
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
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <!-- <div class="grey-container champ-standings-box">
                <h3 class="standings-title">Championship Standings:</h3>
                <ul class="tabs-list">
                    <li class="tab drivers">Driver's</li>
                    <li class="tab constructors">Constructor's</li>
                </ul>
                <ul class="drivers-list">
                    <li class="driver-container">
                        <div class="driver-details">
                            <div class="driver-number">
                                <p>1</p>
                            </div>
                            <div class="driver-name">
                                <p class="firstname">max</p>
                                <p class="surname">verstappen</p>
                            </div>
                        </div>
                        <figure class="driver-img">
                            <img src="./images/teams/red-bull.png" alt="">
                        </figure>
                    </li>
                    <li class="driver-container">
                        <div class="driver-details">
                            <div class="driver-number">
                                <p>11</p>
                            </div>
                            <div class="driver-name">
                                <p class="firstname">sergio</p>
                                <p class="surname">perez</p>
                            </div>
                        </div>
                        <figure class="driver-img">
                            <img src="./images/teams/red-bull.png" alt="">
                        </figure>
                    </li>
                    <li class="driver-container">
                        <div class="driver-details">
                            <div class="driver-number">
                                <p>14</p>
                            </div>
                            <div class="driver-name">
                                <p class="firstname">fernando</p>
                                <p class="surname">alonso</p>
                            </div>
                        </div>
                        <figure class="driver-img">
                            <img src="./images/teams/aston.png" alt="">
                        </figure>
                    </li>
                    <li class="driver-container">
                        <div class="driver-details">
                            <div class="driver-number">
                                <p>55</p>
                            </div>
                            <div class="driver-name">
                                <p class="firstname">carlos</p>
                                <p class="surname">sainz</p>
                            </div>
                        </div>
                        <figure class="driver-img">
                            <img src="./images/teams/ferrari.png" alt="">
                        </figure>
                    </li>
                    <li class="driver-container">
                        <div class="driver-details">
                            <div class="driver-number">
                                <p>44</p>
                            </div>
                            <div class="driver-name">
                                <p class="firstname">lewis</p>
                                <p class="surname">hamilton</p>
                            </div>
                        </div>
                        <figure class="driver-img">
                            <img src="./images/teams/mercedes.png" alt="">
                        </figure>
                    </li>
                    <li class="driver-container">
                        <div class="driver-details">
                            <div class="driver-number">
                                <p>63</p>
                            </div>
                            <div class="driver-name">
                                <p class="firstname">george</p>
                                <p class="surname">russell</p>
                            </div>
                        </div>
                        <figure class="driver-img">
                            <img src="./images/teams/mercedes.png" alt="">
                        </figure>
                    </li>
                    <li class="driver-container">
                        <div class="driver-details">
                            <div class="driver-number">
                                <p>18</p>
                            </div>
                            <div class="driver-name">
                                <p class="firstname">lance</p>
                                <p class="surname">stroll</p>
                            </div>
                        </div>
                        <figure class="driver-img">
                            <img src="./images/teams/aston.png" alt="">
                        </figure>
                    </li>
                    <li class="driver-container">
                        <div class="driver-details">
                            <div class="driver-number">
                                <p>16</p>
                            </div>
                            <div class="driver-name">
                                <p class="firstname">charles</p>
                                <p class="surname">leclerc</p>
                            </div>
                        </div>
                        <figure class="driver-img">
                            <img src="./images/teams/ferrari.png" alt="">
                        </figure>
                    </li>
                    <li class="driver-container">
                        <div class="driver-details">
                            <div class="driver-number">
                                <p>77</p>
                            </div>
                            <div class="driver-name">
                                <p class="firstname">valterri</p>
                                <p class="surname">bottas</p>
                            </div>
                        </div>
                        <figure class="driver-img">
                            <img src="./images/teams/alfa-romeo.png" alt="">
                        </figure>
                    </li>
                    <li class="driver-container">
                        <div class="driver-details">
                            <div class="driver-number">
                                <p>31</p>
                            </div>
                            <div class="driver-name">
                                <p class="firstname">esteban</p>
                                <p class="surname">ocon</p>
                            </div>
                        </div>
                        <figure class="driver-img">
                            <img src="./images/teams/alpine.png" alt="">
                        </figure>
                    </li>
                    <li class="driver-container">
                        <div class="driver-details">
                            <div class="driver-number">
                                <p>10</p>
                            </div>
                            <div class="driver-name">
                                <p class="firstname">pierre</p>
                                <p class="surname">gasly</p>
                            </div>
                        </div>
                        <figure class="driver-img">
                            <img src="./images/teams/alpine.png" alt="">
                        </figure>
                    </li>
                    <li class="driver-container">
                        <div class="driver-details">
                            <div class="driver-number">
                                <p>20</p>
                            </div>
                            <div class="driver-name">
                                <p class="firstname">kevin</p>
                                <p class="surname">magnussen</p>
                            </div>
                        </div>
                        <figure class="driver-img">
                            <img src="./images/teams/haas.png" alt="">
                        </figure>
                    </li>
                    <li class="driver-container">
                        <div class="driver-details">
                            <div class="driver-number">
                                <p>23</p>
                            </div>
                            <div class="driver-name">
                                <p class="firstname">alexander</p>
                                <p class="surname">albon</p>
                            </div>
                        </div>
                        <figure class="driver-img">
                            <img src="./images/teams/williams.png" alt="">
                        </figure>
                    </li>
                    <li class="driver-container">
                        <div class="driver-details">
                            <div class="driver-number">
                                <p>22</p>
                            </div>
                            <div class="driver-name">
                                <p class="firstname">yuki</p>
                                <p class="surname">tsunoda</p>
                            </div>
                        </div>
                        <figure class="driver-img">
                            <img src="./images/teams/alpha-tauri.png" alt="">
                        </figure>
                    </li>
                    <li class="driver-container">
                        <div class="driver-details">
                            <div class="driver-number">
                                <p>27</p>
                            </div>
                            <div class="driver-name">
                                <p class="firstname">niko</p>
                                <p class="surname">hulkenberg</p>
                            </div>
                        </div>
                        <figure class="driver-img">
                            <img src="./images/teams/haas.png" alt="">
                        </figure>
                    </li>
                    <li class="driver-container">
                        <div class="driver-details">
                            <div class="driver-number">
                                <p>2</p>
                            </div>
                            <div class="driver-name">
                                <p class="firstname">logan</p>
                                <p class="surname">sargeant</p>
                            </div>
                        </div>
                        <figure class="driver-img">
                            <img src="./images/teams/williams.png" alt="">
                        </figure>
                    </li>
                    <li class="driver-container">
                        <div class="driver-details">
                            <div class="driver-number">
                                <p>24</p>
                            </div>
                            <div class="driver-name">
                                <p class="firstname">guanyu</p>
                                <p class="surname">zhou</p>
                            </div>
                        </div>
                        <figure class="driver-img">
                            <img src="./images/teams/alfa-romeo.png" alt="">
                        </figure>
                    </li>
                    <li class="driver-container">
                        <div class="driver-details">
                            <div class="driver-number">
                                <p>21</p>
                            </div>
                            <div class="driver-name">
                                <p class="firstname">nyck</p>
                                <p class="surname">de vries</p>
                            </div>
                        </div>
                        <figure class="driver-img">
                            <img src="./images/teams/alpha-tauri.png" alt="">
                        </figure>
                    </li>
                    <li class="driver-container">
                        <div class="driver-details">
                            <div class="driver-number">
                                <p>81</p>
                            </div>
                            <div class="driver-name">
                                <p class="firstname">oscar</p>
                                <p class="surname">piastri</p>
                            </div>
                        </div>
                        <figure class="driver-img">
                            <img src="./images/teams/mclaren.png" alt="">
                        </figure>
                    </li>
                    <li class="driver-container">
                        <div class="driver-details">
                            <div class="driver-number">
                                <p>4</p>
                            </div>
                            <div class="driver-name">
                                <p class="firstname">lando</p>
                                <p class="surname">norris</p>
                            </div>
                        </div>
                        <figure class="driver-img">
                            <img src="./images/teams/mclaren.png" alt="">
                        </figure>
                    </li>
                </ul>
                <ul class="constructors-list">
                    <li class="team-logo">
                        <img src="./images/teams/red-bull.png" alt="Red Bull">
                    </li>
                    <li class="team-logo">
                        <img src="./images/teams/aston.png" alt="Aston Martin">
                    </li>
                    <li class="team-logo">
                        <img src="./images/teams/mercedes.png" alt="Mercedes">
                    </li>
                    <li class="team-logo">
                        <img src="./images/teams/ferrari.png" alt="Ferrari">
                    </li>
                    <li class="team-logo">
                        <img src="./images/teams/alpine.png" alt="Alpine">
                    </li>
                    <li class="team-logo">
                        <img src="./images/teams/alfa-romeo.png" alt="Alfa Romeo">
                    </li>
                    <li class="team-logo">
                        <img src="./images/teams/haas.png" alt="Haas">
                    </li>
                    <li class="team-logo">
                        <img src="./images/teams/williams.png" alt="Williams">
                    </li>
                    <li class="team-logo">
                        <img src="./images/teams/alpha-tauri.png" alt="Alpha Tauri">
                    </li>
                    <li class="team-logo">
                        <img src="./images/teams/mclaren.png" alt="McLaren">
                    </li>
                </ul>
            </div> -->



            <!-- <div class="standings-box">
                <table class="standings-table">
                    <thead class="table-header">
                        <th>
                            <td>Ali</td>
                            <td>Ed</td>
                            <td>Jack</td>
                            <td>Toby</td>
                            <td>Tom</td>
                            <td>Owen</td>
                        </th>
                    </thead>
                    <tbody class="race-points">
                        <tr>
                            <td>Bahrain</td>
                            <td class="table-numbers">16</td>
                            <td class="table-numbers">12</td>
                            <td class="table-numbers">11</td>
                            <td class="table-numbers">11</td>
                            <td class="table-numbers">11</td>
                            <td class="table-numbers">11</td>
                        </tr>
                        <tr>
                            <td>Saudi Arabia</td>
                            <td class="table-numbers">14</td>
                            <td class="table-numbers">10</td>
                            <td class="table-numbers">14</td>
                            <td class="table-numbers">11</td>
                            <td class="table-numbers">12</td>
                            <td class="table-numbers">12</td>
                        </tr>
                    </tbody>
                    <tbody class="overall-points">
                        <tr>
                            <td>Overall Points</td>
                            <td class="table-numbers">30</td>
                            <td class="table-numbers">22</td>
                            <td class="table-numbers">25</td>
                            <td class="table-numbers">22</td>
                            <td class="table-numbers">23</td>
                            <td class="table-numbers">23</td>
                        </tr>
                    </tbody>
                </table>
            </div> -->
        </section>
    </main>
</body>
</html>