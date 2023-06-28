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
            <a href="./index.php">
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
            <ul class="grey-container player-standings-box">
                <h3 class="standings-title">Standings:</h3>
                <!-- ALI POINTS -->
                <li class="points-list-container">
                    <div class="player-standings-item">
                        <h4 class="points-heading">Ali</h4>
                        <ul class="points-list">
                            <?php
                                // LINKS OF ALL THE RACES
                                $links = [
                                    "https://ergast.com/api/f1/current/1/results.json",
                                    "https://ergast.com/api/f1/current/2/results.json",
                                    "https://ergast.com/api/f1/current/3/results.json",
                                    "https://ergast.com/api/f1/current/4/results.json",
                                    "https://ergast.com/api/f1/current/5/results.json",
                                    "https://ergast.com/api/f1/current/6/results.json",
                                    "https://ergast.com/api/f1/current/7/results.json",
                                    "https://ergast.com/api/f1/current/8/results.json",
                                    "https://ergast.com/api/f1/current/9/results.json",
                                    "https://ergast.com/api/f1/current/10/results.json",
                                    "https://ergast.com/api/f1/current/11/results.json",
                                    "https://ergast.com/api/f1/current/12/results.json",
                                    "https://ergast.com/api/f1/current/13/results.json",
                                    "https://ergast.com/api/f1/current/14/results.json",
                                    "https://ergast.com/api/f1/current/15/results.json",
                                    "https://ergast.com/api/f1/current/16/results.json",
                                    "https://ergast.com/api/f1/current/17/results.json",
                                    "https://ergast.com/api/f1/current/18/results.json",
                                    "https://ergast.com/api/f1/current/19/results.json",
                                    "https://ergast.com/api/f1/current/20/results.json",
                                    "https://ergast.com/api/f1/current/21/results.json",
                                    "https://ergast.com/api/f1/current/22/results.json"
                                ];
                                
                                // CREATE CLASS NAME WITH USER NAME
                                $userName = "Ali";
                                
                                function makeClassName($name) {
                                    $lc = mb_strtolower($name);
                                    $class = "-points";
                                    $concatenate = $lc . $class;
                                    return $concatenate;
                                };

                                // LOOP OVER THE LINKS PRINTING POINTS OUT
                                foreach ($links as $link) {
                                    $content = file_get_contents($link);
                                    $result = json_decode($content);
                                    $race = $result->MRData->RaceTable->Races;
                                    $raceResult = $result->MRData->RaceTable->Races[0]->Results;

                                    if ($race) {
                                        $race = $result->MRData->RaceTable->Races[0]->raceName;

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
                                            $stmt = $conn->prepare("SELECT * FROM predictions WHERE race = :race_value AND user = :user_value");

                                            // Bind the search values to the prepared statement
                                            $userValue = $userName;
                                            $raceValue = $race;
                                            $stmt->bindParam(':user_value', $userValue);
                                            $stmt->bindParam(':race_value', $raceValue);

                                            $stmt->execute();

                                            // Check if there is at least one row
                                            if ($stmt->rowCount() > 0) {
                                                // Fetch the first row as an indexed array
                                                $row = $stmt->fetch(PDO::FETCH_NUM);
                                                $predictedTop10 = array_slice($row, 3);
                                                
                                                // Get the actual race result and extract top 10 drivers
                                                $actualTop10 = [];
                                                foreach ($raceResult as $item) {
                                                    $driverSurname = $item->Driver->familyName;
                                                    $normalisation = normalizer_normalize($driverSurname, Normalizer::FORM_D);
                                                    $normalisation = preg_replace('/[\x{0300}-\x{036f}]/u', '', $normalisation);
                                                    $lowerCase = mb_strtolower($normalisation);
                                                    $actualTop10[] = $lowerCase;
                                                }
                                                $actualTop10 = array_slice($actualTop10, 0, -10);

                                                // Points calculation
                                                $points = 0;
                                                if ($predictedTop10 === $actualTop10) {
                                                    $points += 10;
                                                }
                                                for ($i = 0; $i < count($predictedTop10); $i++) {
                                                    if ($predictedTop10[$i] === $actualTop10[$i]) {
                                                        $points += 2;
                                                    }
                                                }
                                                for ($j = 0; $j < count($predictedTop10); $j++) {
                                                    for ($l = 0; $l < count($actualTop10); $l++) {
                                                        if ($predictedTop10[$j] === $actualTop10[$l]) {
                                                            $points += 1;
                                                        }
                                                    }
                                                }

                                                // Print points
                                                echo "<li class='prev-points " . makeClassName($userName) . "'>$points</li>";
                                                
                                            } else {
                                                // Handle case when no rows are returned
                                                echo "<li class='prev-points'> </li>";
                                            }

                                        } catch (PDOException $e) {
                                            echo "Query failed: " . $e->getMessage();
                                        } catch (Exception $e) {
                                            echo "Error: " . $e->getMessage();
                                        }

                                        
                                    } else {
                                        echo "<li class='prev-points'> </li>";
                                    };

                                }
                            ?>
                            <li class="ali-points-total points-tally"></li>
                        </ul>
                    </div>
                </li>
                <!-- TOBY POINTS -->
                <li class="points-list-container">
                    <div class="player-standings-item">
                        <h4 class="points-heading">Toby</h4>
                        <ul class="points-list">
                            <?php
                                // LINKS OF ALL THE RACES
                                $links = [
                                    "https://ergast.com/api/f1/current/1/results.json",
                                    "https://ergast.com/api/f1/current/2/results.json",
                                    "https://ergast.com/api/f1/current/3/results.json",
                                    "https://ergast.com/api/f1/current/4/results.json",
                                    "https://ergast.com/api/f1/current/5/results.json",
                                    "https://ergast.com/api/f1/current/6/results.json",
                                    "https://ergast.com/api/f1/current/7/results.json",
                                    "https://ergast.com/api/f1/current/8/results.json",
                                    "https://ergast.com/api/f1/current/9/results.json",
                                    "https://ergast.com/api/f1/current/10/results.json",
                                    "https://ergast.com/api/f1/current/11/results.json",
                                    "https://ergast.com/api/f1/current/12/results.json",
                                    "https://ergast.com/api/f1/current/13/results.json",
                                    "https://ergast.com/api/f1/current/14/results.json",
                                    "https://ergast.com/api/f1/current/15/results.json",
                                    "https://ergast.com/api/f1/current/16/results.json",
                                    "https://ergast.com/api/f1/current/17/results.json",
                                    "https://ergast.com/api/f1/current/18/results.json",
                                    "https://ergast.com/api/f1/current/19/results.json",
                                    "https://ergast.com/api/f1/current/20/results.json",
                                    "https://ergast.com/api/f1/current/21/results.json",
                                    "https://ergast.com/api/f1/current/22/results.json"
                                ];
                                
                                // CREATE CLASS NAME WITH USER NAME
                                $userName = "Toby";
                                
                                function makeClassName($name) {
                                    $lc = mb_strtolower($name);
                                    $class = "-points";
                                    $concatenate = $lc . $class;
                                    return $concatenate;
                                };

                                // LOOP OVER THE LINKS PRINTING POINTS OUT
                                foreach ($links as $link) {
                                    $content = file_get_contents($link);
                                    $result = json_decode($content);
                                    $race = $result->MRData->RaceTable->Races;
                                    $raceResult = $result->MRData->RaceTable->Races[0]->Results;

                                    if ($race) {
                                        $race = $result->MRData->RaceTable->Races[0]->raceName;

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
                                            $stmt = $conn->prepare("SELECT * FROM predictions WHERE race = :race_value AND user = :user_value");

                                            // Bind the search values to the prepared statement
                                            $userValue = $userName;
                                            $raceValue = $race;
                                            $stmt->bindParam(':user_value', $userValue);
                                            $stmt->bindParam(':race_value', $raceValue);

                                            $stmt->execute();

                                            // Check if there is at least one row
                                            if ($stmt->rowCount() > 0) {
                                                // Fetch the first row as an indexed array
                                                $row = $stmt->fetch(PDO::FETCH_NUM);
                                                $predictedTop10 = array_slice($row, 3);
                                                
                                                // Get the actual race result and extract top 10 drivers
                                                $actualTop10 = [];
                                                foreach ($raceResult as $item) {
                                                    $driverSurname = $item->Driver->familyName;
                                                    $normalisation = normalizer_normalize($driverSurname, Normalizer::FORM_D);
                                                    $normalisation = preg_replace('/[\x{0300}-\x{036f}]/u', '', $normalisation);
                                                    $lowerCase = mb_strtolower($normalisation);
                                                    $actualTop10[] = $lowerCase;
                                                }
                                                $actualTop10 = array_slice($actualTop10, 0, -10);

                                                // Points calculation
                                                $points = 0;
                                                if ($predictedTop10 === $actualTop10) {
                                                    $points += 10;
                                                }
                                                for ($i = 0; $i < count($predictedTop10); $i++) {
                                                    if ($predictedTop10[$i] === $actualTop10[$i]) {
                                                        $points += 2;
                                                    }
                                                }
                                                for ($j = 0; $j < count($predictedTop10); $j++) {
                                                    for ($l = 0; $l < count($actualTop10); $l++) {
                                                        if ($predictedTop10[$j] === $actualTop10[$l]) {
                                                            $points += 1;
                                                        }
                                                    }
                                                }

                                                // Print points
                                                echo "<li class='prev-points " . makeClassName($userName) . "'>$points</li>";
                                                
                                            } else {
                                                // Handle case when no rows are returned
                                                echo "<li class='prev-points'> </li>";
                                            }

                                        } catch (PDOException $e) {
                                            echo "Query failed: " . $e->getMessage();
                                        } catch (Exception $e) {
                                            echo "Error: " . $e->getMessage();
                                        }

                                        
                                    } else {
                                        echo "<li class='prev-points'> </li>";
                                    };

                                }
                            ?>
                            <li class="toby-points-total points-tally"></li>
                        </ul>
                    </div>
                </li>
                <!-- ED POINTS -->
                <li class="points-list-container">
                    <div class="player-standings-item">
                        <h4 class="points-heading">Ed</h4>
                        <ul class="points-list">
                            <?php
                                // LINKS OF ALL THE RACES
                                $links = [
                                    "https://ergast.com/api/f1/current/1/results.json",
                                    "https://ergast.com/api/f1/current/2/results.json",
                                    "https://ergast.com/api/f1/current/3/results.json",
                                    "https://ergast.com/api/f1/current/4/results.json",
                                    "https://ergast.com/api/f1/current/5/results.json",
                                    "https://ergast.com/api/f1/current/6/results.json",
                                    "https://ergast.com/api/f1/current/7/results.json",
                                    "https://ergast.com/api/f1/current/8/results.json",
                                    "https://ergast.com/api/f1/current/9/results.json",
                                    "https://ergast.com/api/f1/current/10/results.json",
                                    "https://ergast.com/api/f1/current/11/results.json",
                                    "https://ergast.com/api/f1/current/12/results.json",
                                    "https://ergast.com/api/f1/current/13/results.json",
                                    "https://ergast.com/api/f1/current/14/results.json",
                                    "https://ergast.com/api/f1/current/15/results.json",
                                    "https://ergast.com/api/f1/current/16/results.json",
                                    "https://ergast.com/api/f1/current/17/results.json",
                                    "https://ergast.com/api/f1/current/18/results.json",
                                    "https://ergast.com/api/f1/current/19/results.json",
                                    "https://ergast.com/api/f1/current/20/results.json",
                                    "https://ergast.com/api/f1/current/21/results.json",
                                    "https://ergast.com/api/f1/current/22/results.json"
                                ];
                                
                                // CREATE CLASS NAME WITH USER NAME
                                $userName = "Ed";
                                
                                function makeClassName($name) {
                                    $lc = mb_strtolower($name);
                                    $class = "-points";
                                    $concatenate = $lc . $class;
                                    return $concatenate;
                                };

                                // LOOP OVER THE LINKS PRINTING POINTS OUT
                                foreach ($links as $link) {
                                    $content = file_get_contents($link);
                                    $result = json_decode($content);
                                    $race = $result->MRData->RaceTable->Races;
                                    $raceResult = $result->MRData->RaceTable->Races[0]->Results;

                                    if ($race) {
                                        $race = $result->MRData->RaceTable->Races[0]->raceName;

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
                                            $stmt = $conn->prepare("SELECT * FROM predictions WHERE race = :race_value AND user = :user_value");

                                            // Bind the search values to the prepared statement
                                            $userValue = $userName;
                                            $raceValue = $race;
                                            $stmt->bindParam(':user_value', $userValue);
                                            $stmt->bindParam(':race_value', $raceValue);

                                            $stmt->execute();

                                            // Check if there is at least one row
                                            if ($stmt->rowCount() > 0) {
                                                // Fetch the first row as an indexed array
                                                $row = $stmt->fetch(PDO::FETCH_NUM);
                                                $predictedTop10 = array_slice($row, 3);
                                                
                                                // Get the actual race result and extract top 10 drivers
                                                $actualTop10 = [];
                                                foreach ($raceResult as $item) {
                                                    $driverSurname = $item->Driver->familyName;
                                                    $normalisation = normalizer_normalize($driverSurname, Normalizer::FORM_D);
                                                    $normalisation = preg_replace('/[\x{0300}-\x{036f}]/u', '', $normalisation);
                                                    $lowerCase = mb_strtolower($normalisation);
                                                    $actualTop10[] = $lowerCase;
                                                }
                                                $actualTop10 = array_slice($actualTop10, 0, -10);

                                                // Points calculation
                                                $points = 0;
                                                if ($predictedTop10 === $actualTop10) {
                                                    $points += 10;
                                                }
                                                for ($i = 0; $i < count($predictedTop10); $i++) {
                                                    if ($predictedTop10[$i] === $actualTop10[$i]) {
                                                        $points += 2;
                                                    }
                                                }
                                                for ($j = 0; $j < count($predictedTop10); $j++) {
                                                    for ($l = 0; $l < count($actualTop10); $l++) {
                                                        if ($predictedTop10[$j] === $actualTop10[$l]) {
                                                            $points += 1;
                                                        }
                                                    }
                                                }

                                                // Print points
                                                echo "<li class='prev-points " . makeClassName($userName) . "'>$points</li>";
                                                
                                            } else {
                                                // Handle case when no rows are returned
                                                echo "<li class='prev-points'> </li>";
                                            }

                                        } catch (PDOException $e) {
                                            echo "Query failed: " . $e->getMessage();
                                        } catch (Exception $e) {
                                            echo "Error: " . $e->getMessage();
                                        }

                                        
                                    } else {
                                        echo "<li class='prev-points'> </li>";
                                    };

                                }
                            ?>
                            <li class="ed-points-total points-tally"></li>
                        </ul>
                    </div>
                </li>
                <!-- JACK POINTS -->
                <li class="points-list-container">
                    <div class="player-standings-item">
                        <h4 class="points-heading">Jack</h4>
                        <ul class="points-list">
                            <?php
                                // LINKS OF ALL THE RACES
                                $links = [
                                    "https://ergast.com/api/f1/current/1/results.json",
                                    "https://ergast.com/api/f1/current/2/results.json",
                                    "https://ergast.com/api/f1/current/3/results.json",
                                    "https://ergast.com/api/f1/current/4/results.json",
                                    "https://ergast.com/api/f1/current/5/results.json",
                                    "https://ergast.com/api/f1/current/6/results.json",
                                    "https://ergast.com/api/f1/current/7/results.json",
                                    "https://ergast.com/api/f1/current/8/results.json",
                                    "https://ergast.com/api/f1/current/9/results.json",
                                    "https://ergast.com/api/f1/current/10/results.json",
                                    "https://ergast.com/api/f1/current/11/results.json",
                                    "https://ergast.com/api/f1/current/12/results.json",
                                    "https://ergast.com/api/f1/current/13/results.json",
                                    "https://ergast.com/api/f1/current/14/results.json",
                                    "https://ergast.com/api/f1/current/15/results.json",
                                    "https://ergast.com/api/f1/current/16/results.json",
                                    "https://ergast.com/api/f1/current/17/results.json",
                                    "https://ergast.com/api/f1/current/18/results.json",
                                    "https://ergast.com/api/f1/current/19/results.json",
                                    "https://ergast.com/api/f1/current/20/results.json",
                                    "https://ergast.com/api/f1/current/21/results.json",
                                    "https://ergast.com/api/f1/current/22/results.json"
                                ];
                                
                                // CREATE CLASS NAME WITH USER NAME
                                $userName = "Jack";
                                
                                function makeClassName($name) {
                                    $lc = mb_strtolower($name);
                                    $class = "-points";
                                    $concatenate = $lc . $class;
                                    return $concatenate;
                                };

                                // LOOP OVER THE LINKS PRINTING POINTS OUT
                                foreach ($links as $link) {
                                    $content = file_get_contents($link);
                                    $result = json_decode($content);
                                    $race = $result->MRData->RaceTable->Races;
                                    $raceResult = $result->MRData->RaceTable->Races[0]->Results;

                                    if ($race) {
                                        $race = $result->MRData->RaceTable->Races[0]->raceName;

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
                                            $stmt = $conn->prepare("SELECT * FROM predictions WHERE race = :race_value AND user = :user_value");

                                            // Bind the search values to the prepared statement
                                            $userValue = $userName;
                                            $raceValue = $race;
                                            $stmt->bindParam(':user_value', $userValue);
                                            $stmt->bindParam(':race_value', $raceValue);

                                            $stmt->execute();

                                            // Check if there is at least one row
                                            if ($stmt->rowCount() > 0) {
                                                // Fetch the first row as an indexed array
                                                $row = $stmt->fetch(PDO::FETCH_NUM);
                                                $predictedTop10 = array_slice($row, 3);
                                                
                                                // Get the actual race result and extract top 10 drivers
                                                $actualTop10 = [];
                                                foreach ($raceResult as $item) {
                                                    $driverSurname = $item->Driver->familyName;
                                                    $normalisation = normalizer_normalize($driverSurname, Normalizer::FORM_D);
                                                    $normalisation = preg_replace('/[\x{0300}-\x{036f}]/u', '', $normalisation);
                                                    $lowerCase = mb_strtolower($normalisation);
                                                    $actualTop10[] = $lowerCase;
                                                }
                                                $actualTop10 = array_slice($actualTop10, 0, -10);

                                                // Points calculation
                                                $points = 0;
                                                if ($predictedTop10 === $actualTop10) {
                                                    $points += 10;
                                                }
                                                for ($i = 0; $i < count($predictedTop10); $i++) {
                                                    if ($predictedTop10[$i] === $actualTop10[$i]) {
                                                        $points += 2;
                                                    }
                                                }
                                                for ($j = 0; $j < count($predictedTop10); $j++) {
                                                    for ($l = 0; $l < count($actualTop10); $l++) {
                                                        if ($predictedTop10[$j] === $actualTop10[$l]) {
                                                            $points += 1;
                                                        }
                                                    }
                                                }

                                                // Print points
                                                echo "<li class='prev-points " . makeClassName($userName) . "'>$points</li>";
                                                
                                            } else {
                                                // Handle case when no rows are returned
                                                echo "<li class='prev-points'> </li>";
                                            }

                                        } catch (PDOException $e) {
                                            echo "Query failed: " . $e->getMessage();
                                        } catch (Exception $e) {
                                            echo "Error: " . $e->getMessage();
                                        }

                                        
                                    } else {
                                        echo "<li class='prev-points'> </li>";
                                    };

                                }
                            ?>
                            <li class="jack-points-total points-tally"></li>
                        </ul>
                    </div>
                </li>
                <!-- TOM POINTS -->
                <li class="points-list-container">
                    <div class="player-standings-item">
                        <h4 class="points-heading">Tom</h4>
                        <ul class="points-list">
                            <?php
                                // LINKS OF ALL THE RACES
                                $links = [
                                    "https://ergast.com/api/f1/current/1/results.json",
                                    "https://ergast.com/api/f1/current/2/results.json",
                                    "https://ergast.com/api/f1/current/3/results.json",
                                    "https://ergast.com/api/f1/current/4/results.json",
                                    "https://ergast.com/api/f1/current/5/results.json",
                                    "https://ergast.com/api/f1/current/6/results.json",
                                    "https://ergast.com/api/f1/current/7/results.json",
                                    "https://ergast.com/api/f1/current/8/results.json",
                                    "https://ergast.com/api/f1/current/9/results.json",
                                    "https://ergast.com/api/f1/current/10/results.json",
                                    "https://ergast.com/api/f1/current/11/results.json",
                                    "https://ergast.com/api/f1/current/12/results.json",
                                    "https://ergast.com/api/f1/current/13/results.json",
                                    "https://ergast.com/api/f1/current/14/results.json",
                                    "https://ergast.com/api/f1/current/15/results.json",
                                    "https://ergast.com/api/f1/current/16/results.json",
                                    "https://ergast.com/api/f1/current/17/results.json",
                                    "https://ergast.com/api/f1/current/18/results.json",
                                    "https://ergast.com/api/f1/current/19/results.json",
                                    "https://ergast.com/api/f1/current/20/results.json",
                                    "https://ergast.com/api/f1/current/21/results.json",
                                    "https://ergast.com/api/f1/current/22/results.json"
                                ];
                                
                                // CREATE CLASS NAME WITH USER NAME
                                $userName = "Tom";
                                
                                function makeClassName($name) {
                                    $lc = mb_strtolower($name);
                                    $class = "-points";
                                    $concatenate = $lc . $class;
                                    return $concatenate;
                                };

                                // LOOP OVER THE LINKS PRINTING POINTS OUT
                                foreach ($links as $link) {
                                    $content = file_get_contents($link);
                                    $result = json_decode($content);
                                    $race = $result->MRData->RaceTable->Races;
                                    $raceResult = $result->MRData->RaceTable->Races[0]->Results;

                                    if ($race) {
                                        $race = $result->MRData->RaceTable->Races[0]->raceName;

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
                                            $stmt = $conn->prepare("SELECT * FROM predictions WHERE race = :race_value AND user = :user_value");

                                            // Bind the search values to the prepared statement
                                            $userValue = $userName;
                                            $raceValue = $race;
                                            $stmt->bindParam(':user_value', $userValue);
                                            $stmt->bindParam(':race_value', $raceValue);

                                            $stmt->execute();

                                            // Check if there is at least one row
                                            if ($stmt->rowCount() > 0) {
                                                // Fetch the first row as an indexed array
                                                $row = $stmt->fetch(PDO::FETCH_NUM);
                                                $predictedTop10 = array_slice($row, 3);
                                                
                                                // Get the actual race result and extract top 10 drivers
                                                $actualTop10 = [];
                                                foreach ($raceResult as $item) {
                                                    $driverSurname = $item->Driver->familyName;
                                                    $normalisation = normalizer_normalize($driverSurname, Normalizer::FORM_D);
                                                    $normalisation = preg_replace('/[\x{0300}-\x{036f}]/u', '', $normalisation);
                                                    $lowerCase = mb_strtolower($normalisation);
                                                    $actualTop10[] = $lowerCase;
                                                }
                                                $actualTop10 = array_slice($actualTop10, 0, -10);

                                                // Points calculation
                                                $points = 0;
                                                if ($predictedTop10 === $actualTop10) {
                                                    $points += 10;
                                                }
                                                for ($i = 0; $i < count($predictedTop10); $i++) {
                                                    if ($predictedTop10[$i] === $actualTop10[$i]) {
                                                        $points += 2;
                                                    }
                                                }
                                                for ($j = 0; $j < count($predictedTop10); $j++) {
                                                    for ($l = 0; $l < count($actualTop10); $l++) {
                                                        if ($predictedTop10[$j] === $actualTop10[$l]) {
                                                            $points += 1;
                                                        }
                                                    }
                                                }

                                                // Print points
                                                echo "<li class='prev-points " . makeClassName($userName) . "'>$points</li>";
                                                
                                            } else {
                                                // Handle case when no rows are returned
                                                echo "<li class='prev-points'> </li>";
                                            }

                                        } catch (PDOException $e) {
                                            echo "Query failed: " . $e->getMessage();
                                        } catch (Exception $e) {
                                            echo "Error: " . $e->getMessage();
                                        }

                                        
                                    } else {
                                        echo "<li class='prev-points'> </li>";
                                    };

                                }
                            ?>
                            <li class="tom-points-total points-tally"></li>
                        </ul>
                    </div>
                </li>
                <!-- OWEN POINTS -->
                <li class="points-list-container">
                    <div class="player-standings-item">
                        <h4 class="points-heading">Owen</h4>
                        <ul class="points-list">
                            <?php
                                // LINKS OF ALL THE RACES
                                $links = [
                                    "https://ergast.com/api/f1/current/1/results.json",
                                    "https://ergast.com/api/f1/current/2/results.json",
                                    "https://ergast.com/api/f1/current/3/results.json",
                                    "https://ergast.com/api/f1/current/4/results.json",
                                    "https://ergast.com/api/f1/current/5/results.json",
                                    "https://ergast.com/api/f1/current/6/results.json",
                                    "https://ergast.com/api/f1/current/7/results.json",
                                    "https://ergast.com/api/f1/current/8/results.json",
                                    "https://ergast.com/api/f1/current/9/results.json",
                                    "https://ergast.com/api/f1/current/10/results.json",
                                    "https://ergast.com/api/f1/current/11/results.json",
                                    "https://ergast.com/api/f1/current/12/results.json",
                                    "https://ergast.com/api/f1/current/13/results.json",
                                    "https://ergast.com/api/f1/current/14/results.json",
                                    "https://ergast.com/api/f1/current/15/results.json",
                                    "https://ergast.com/api/f1/current/16/results.json",
                                    "https://ergast.com/api/f1/current/17/results.json",
                                    "https://ergast.com/api/f1/current/18/results.json",
                                    "https://ergast.com/api/f1/current/19/results.json",
                                    "https://ergast.com/api/f1/current/20/results.json",
                                    "https://ergast.com/api/f1/current/21/results.json",
                                    "https://ergast.com/api/f1/current/22/results.json"
                                ];
                                
                                // CREATE CLASS NAME WITH USER NAME
                                $userName = "Owen";
                                
                                function makeClassName($name) {
                                    $lc = mb_strtolower($name);
                                    $class = "-points";
                                    $concatenate = $lc . $class;
                                    return $concatenate;
                                };

                                // LOOP OVER THE LINKS PRINTING POINTS OUT
                                foreach ($links as $link) {
                                    $content = file_get_contents($link);
                                    $result = json_decode($content);
                                    $race = $result->MRData->RaceTable->Races;
                                    $raceResult = $result->MRData->RaceTable->Races[0]->Results;

                                    if ($race) {
                                        $race = $result->MRData->RaceTable->Races[0]->raceName;

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
                                            $stmt = $conn->prepare("SELECT * FROM predictions WHERE race = :race_value AND user = :user_value");

                                            // Bind the search values to the prepared statement
                                            $userValue = $userName;
                                            $raceValue = $race;
                                            $stmt->bindParam(':user_value', $userValue);
                                            $stmt->bindParam(':race_value', $raceValue);

                                            $stmt->execute();

                                            // Check if there is at least one row
                                            if ($stmt->rowCount() > 0) {
                                                // Fetch the first row as an indexed array
                                                $row = $stmt->fetch(PDO::FETCH_NUM);
                                                $predictedTop10 = array_slice($row, 3);
                                                
                                                // Get the actual race result and extract top 10 drivers
                                                $actualTop10 = [];
                                                foreach ($raceResult as $item) {
                                                    $driverSurname = $item->Driver->familyName;
                                                    $normalisation = normalizer_normalize($driverSurname, Normalizer::FORM_D);
                                                    $normalisation = preg_replace('/[\x{0300}-\x{036f}]/u', '', $normalisation);
                                                    $lowerCase = mb_strtolower($normalisation);
                                                    $actualTop10[] = $lowerCase;
                                                }
                                                $actualTop10 = array_slice($actualTop10, 0, -10);

                                                // Points calculation
                                                $points = 0;
                                                if ($predictedTop10 === $actualTop10) {
                                                    $points += 10;
                                                }
                                                for ($i = 0; $i < count($predictedTop10); $i++) {
                                                    if ($predictedTop10[$i] === $actualTop10[$i]) {
                                                        $points += 2;
                                                    }
                                                }
                                                for ($j = 0; $j < count($predictedTop10); $j++) {
                                                    for ($l = 0; $l < count($actualTop10); $l++) {
                                                        if ($predictedTop10[$j] === $actualTop10[$l]) {
                                                            $points += 1;
                                                        }
                                                    }
                                                }

                                                // Print points
                                                echo "<li class='prev-points " . makeClassName($userName) . "'>$points</li>";
                                                
                                            } else {
                                                // Handle case when no rows are returned
                                                echo "<li class='prev-points'> </li>";
                                            }

                                        } catch (PDOException $e) {
                                            echo "Query failed: " . $e->getMessage();
                                        } catch (Exception $e) {
                                            echo "Error: " . $e->getMessage();
                                        }

                                        
                                    } else {
                                        echo "<li class='prev-points'> </li>";
                                    };

                                }
                            ?>
                            <li class="owen-points-total points-tally"></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </section>
    </main>
</body>
</html>