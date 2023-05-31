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
    // $race = $nextRace;
    $race = "Spanish Grand Prix";
    $user = $_POST["user"];
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
        $stmt = $conn->prepare('INSERT INTO predictions (race, user, p1, p2, p3, p4, p5, p6, p7, p8, p9, p10) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([$race, $user, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10]);

    } catch(PDOException $e) {
        die('Connection failed: ' . $e->getMessage());
    }



}


?>
            <p class="form-submission-thanks">Thank you <?php echo $user; ?>, your submission has been recorded.</p>
</main>
</body>
</html>








