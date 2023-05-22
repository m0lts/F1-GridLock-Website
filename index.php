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
                <li class="nav-item"><a href="#">Race</a></li>
                <li class="nav-item"><a href="./standings.html">Standings</a></li>
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
                        <!-- last year's result at track -->
                        <h3 class="h3-title stats-h3">previous year result <i class="right-arrow fa-solid fa-arrow-right"></i></h3>
                        <ul class="previous-year-result">
                            <!-- filled with JS -->
                        </ul>
                    </div>
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
                        <?php
                            // Database details
                            $host = "localhost";
                            $dbname = "u128425984_predictions";
                            $username = "u128425984_moltontom";
                            $password = "Wilson2000";

                            // Connect to database
                            $conn = new mysqli($host, $username, $password, $dbname);

                            // Check connection
                            if ($conn->connect_error) {
                                die('Connection failed: ' . $conn->connect_error);
                            }
                            
                            // SQL query to fetch data
                            $sql = "SELECT * FROM monaco_predictions";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    // Access data using column names
                                    $column1Value = $row["column1"];
                                    $column2Value = $row["column2"];
                            
                                    // Perform desired actions with the retrieved data
                                    // ...
                                }
                            } else {
                                echo "No results found.";
                            }
                            
                            // Close connection
                            $conn->close();

                        ?>
                    </div>
                    <div class="ed-pred">
                        <h5 class="prediction-title">Ed's Prediction</h5>
                        
                    </div>
                    <div class="jack-pred">
                        <h5 class="prediction-title">Jack's Prediction</h5>
                        
                    </div>
                    <div class="toby-pred">
                        <h5 class="prediction-title">Toby's Prediction</h5>
                        
                    </div>
                    <div class="tom-pred">
                        <h5 class="prediction-title">Tom's Prediction</h5>
                        
                    </div>
                    <div class="owen-pred">
                        <h5 class="prediction-title">Owen's Prediction</h5>
                        
                    </div>
                </div>
            </section>
        </section>
    </main>
</body>
</html>