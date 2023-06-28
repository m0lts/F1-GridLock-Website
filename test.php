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
    <ul>
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


                            // FUNCTION QUERYING THE DATABASE
                            function databaseQuery($name, $raceName) {
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

                                    // Bind the search values to the prepared statement and execute
                                    $userValue = $name;
                                    $raceValue = $raceName;
                                    $stmt->bindParam(':user_value', $userValue);
                                    $stmt->bindParam(':race_value', $raceValue);
                                    $stmt->execute();
                                } catch (PDOException $e) {
                                    echo "Query failed: " . $e->getMessage();
                                } catch (Exception $e) {
                                    echo "Error: " . $e->getMessage();
                                }
                            };

                            // LOOP OVER THE LINKS PRINTING POINTS OUT
                            foreach ($links as $link) {
                                $content = file_get_contents($link);
                                $result = json_decode($content);
                                $race = $result->MRData->RaceTable->Races;

                                if ($race) {
                                    $race = $result->MRData->RaceTable->Races[0]->raceName;

                                    $testPrint = databaseQuery("Ali", $race);

                                    echo "<li>$testPrint</li>";
                                } else {
                                    echo "<li>No array found</li>";
                                };

                            }

                            

                            ?>
    </ul>
</body>
</html>