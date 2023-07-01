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
            <!-- timer to prediction cutoff -->
            <div class="time-banner">
                <h2 class="timer-text">Time left:</h2>
                <h2 class="timer"></h2>
                <!-- INSERT TIMER FUNCTION HERE -->
            </div>
            <section class="prediction-section">
                <h2 class="prediction-title-h2">Make your prediction:*</h2>
                <p class="information">*please only submit once, check that your name is selected and don't submit the same driver twice.</p>
                <div>
                    <?php if ($user): ?>
                        <form class="prediction-forms" action="form-handling.php" method="post">
                            <!-- <label for="user">User:</label>
                            <select name="user" id="user">
                                <option value="???">--Select yourself--</option>
                                <option value="Ali">Ali</option>
                                <option value="Ed">Ed</option>
                                <option value="Jack">Jack</option>
                                <option value="Toby">Toby</option>
                                <option value="Tom">Tom</option>
                                <option value="Owen">Owen</option>
                            </select> -->
                            <label for="p1">1.</label>
                            <select name="p1-entry" id="p1">
                                <option value="???">???</option>
                                <option value="verstappen">verstappen</option>
                                <option value="perez">perez</option>
                                <option value="alonso">alonso</option>
                                <option value="stroll">stroll</option>
                                <option value="leclerc">leclerc</option>
                                <option value="sainz">sainz</option>
                                <option value="hamilton">hamilton</option>
                                <option value="russell">russell</option>
                                <option value="norris">norris</option>
                                <option value="piastri">piastri</option>
                                <option value="magnussen">magnussen</option>
                                <option value="hulkenberg">hulkenberg</option>
                                <option value="tsunoda">tsunoda</option>
                                <option value="devries">de vries</option>
                                <option value="bottas">bottas</option>
                                <option value="zhou">zhou</option>
                                <option value="albon">albon</option>
                                <option value="sargeant">sargeant</option>
                                <option value="gasly">gasly</option>
                                <option value="ocon">ocon</option>
                            </select>
                            <label for="p2">2.</label>
                            <select name="p2-entry" id="p2">
                                <option value="???">???</option>
                                <option value="verstappen">verstappen</option>
                                <option value="perez">perez</option>
                                <option value="alonso">alonso</option>
                                <option value="stroll">stroll</option>
                                <option value="leclerc">leclerc</option>
                                <option value="sainz">sainz</option>
                                <option value="hamilton">hamilton</option>
                                <option value="russell">russell</option>
                                <option value="norris">norris</option>
                                <option value="piastri">piastri</option>
                                <option value="magnussen">magnussen</option>
                                <option value="hulkenberg">hulkenberg</option>
                                <option value="tsunoda">tsunoda</option>
                                <option value="devries">de vries</option>
                                <option value="bottas">bottas</option>
                                <option value="zhou">zhou</option>
                                <option value="albon">albon</option>
                                <option value="sargeant">sargeant</option>
                                <option value="gasly">gasly</option>
                                <option value="ocon">ocon</option>
                            </select>
                            <label for="p3">3.</label>
                            <select name="p3-entry" id="p3">
                                <option value="???">???</option>
                                <option value="verstappen">verstappen</option>
                                <option value="perez">perez</option>
                                <option value="alonso">alonso</option>
                                <option value="stroll">stroll</option>
                                <option value="leclerc">leclerc</option>
                                <option value="sainz">sainz</option>
                                <option value="hamilton">hamilton</option>
                                <option value="russell">russell</option>
                                <option value="norris">norris</option>
                                <option value="piastri">piastri</option>
                                <option value="magnussen">magnussen</option>
                                <option value="hulkenberg">hulkenberg</option>
                                <option value="tsunoda">tsunoda</option>
                                <option value="devries">de vries</option>
                                <option value="bottas">bottas</option>
                                <option value="zhou">zhou</option>
                                <option value="albon">albon</option>
                                <option value="sargeant">sargeant</option>
                                <option value="gasly">gasly</option>
                                <option value="ocon">ocon</option>
                            </select>
                            <label for="p4">4.</label>
                            <select name="p4-entry" id="p4">
                                <option value="???">???</option>
                                <option value="verstappen">verstappen</option>
                                <option value="perez">perez</option>
                                <option value="alonso">alonso</option>
                                <option value="stroll">stroll</option>
                                <option value="leclerc">leclerc</option>
                                <option value="sainz">sainz</option>
                                <option value="hamilton">hamilton</option>
                                <option value="russell">russell</option>
                                <option value="norris">norris</option>
                                <option value="piastri">piastri</option>
                                <option value="magnussen">magnussen</option>
                                <option value="hulkenberg">hulkenberg</option>
                                <option value="tsunoda">tsunoda</option>
                                <option value="devries">de vries</option>
                                <option value="bottas">bottas</option>
                                <option value="zhou">zhou</option>
                                <option value="albon">albon</option>
                                <option value="sargeant">sargeant</option>
                                <option value="gasly">gasly</option>
                                <option value="ocon">ocon</option>
                            </select>
                            <label for="p5">5.</label>
                            <select name="p5-entry" id="p5">
                                <option value="???">???</option>
                                <option value="verstappen">verstappen</option>
                                <option value="perez">perez</option>
                                <option value="alonso">alonso</option>
                                <option value="stroll">stroll</option>
                                <option value="leclerc">leclerc</option>
                                <option value="sainz">sainz</option>
                                <option value="hamilton">hamilton</option>
                                <option value="russell">russell</option>
                                <option value="norris">norris</option>
                                <option value="piastri">piastri</option>
                                <option value="magnussen">magnussen</option>
                                <option value="hulkenberg">hulkenberg</option>
                                <option value="tsunoda">tsunoda</option>
                                <option value="devries">de vries</option>
                                <option value="bottas">bottas</option>
                                <option value="zhou">zhou</option>
                                <option value="albon">albon</option>
                                <option value="sargeant">sargeant</option>
                                <option value="gasly">gasly</option>
                                <option value="ocon">ocon</option>
                            </select>
                            <label for="p6">6.</label>
                            <select name="p6-entry" id="p6">
                                <option value="???">???</option>
                                <option value="verstappen">verstappen</option>
                                <option value="perez">perez</option>
                                <option value="alonso">alonso</option>
                                <option value="stroll">stroll</option>
                                <option value="leclerc">leclerc</option>
                                <option value="sainz">sainz</option>
                                <option value="hamilton">hamilton</option>
                                <option value="russell">russell</option>
                                <option value="norris">norris</option>
                                <option value="piastri">piastri</option>
                                <option value="magnussen">magnussen</option>
                                <option value="hulkenberg">hulkenberg</option>
                                <option value="tsunoda">tsunoda</option>
                                <option value="devries">de vries</option>
                                <option value="bottas">bottas</option>
                                <option value="zhou">zhou</option>
                                <option value="albon">albon</option>
                                <option value="sargeant">sargeant</option>
                                <option value="gasly">gasly</option>
                                <option value="ocon">ocon</option>
                            </select>
                            <label for="p7">7.</label>
                            <select name="p7-entry" id="p7">
                                <option value="???">???</option>
                                <option value="verstappen">verstappen</option>
                                <option value="perez">perez</option>
                                <option value="alonso">alonso</option>
                                <option value="stroll">stroll</option>
                                <option value="leclerc">leclerc</option>
                                <option value="sainz">sainz</option>
                                <option value="hamilton">hamilton</option>
                                <option value="russell">russell</option>
                                <option value="norris">norris</option>
                                <option value="piastri">piastri</option>
                                <option value="magnussen">magnussen</option>
                                <option value="hulkenberg">hulkenberg</option>
                                <option value="tsunoda">tsunoda</option>
                                <option value="devries">de vries</option>
                                <option value="bottas">bottas</option>
                                <option value="zhou">zhou</option>
                                <option value="albon">albon</option>
                                <option value="sargeant">sargeant</option>
                                <option value="gasly">gasly</option>
                                <option value="ocon">ocon</option>
                            </select>
                            <label for="p8">8.</label>
                            <select name="p8-entry" id="p8">
                                <option value="???">???</option>
                                <option value="verstappen">verstappen</option>
                                <option value="perez">perez</option>
                                <option value="alonso">alonso</option>
                                <option value="stroll">stroll</option>
                                <option value="leclerc">leclerc</option>
                                <option value="sainz">sainz</option>
                                <option value="hamilton">hamilton</option>
                                <option value="russell">russell</option>
                                <option value="norris">norris</option>
                                <option value="piastri">piastri</option>
                                <option value="magnussen">magnussen</option>
                                <option value="hulkenberg">hulkenberg</option>
                                <option value="tsunoda">tsunoda</option>
                                <option value="devries">de vries</option>
                                <option value="bottas">bottas</option>
                                <option value="zhou">zhou</option>
                                <option value="albon">albon</option>
                                <option value="sargeant">sargeant</option>
                                <option value="gasly">gasly</option>
                                <option value="ocon">ocon</option>
                            </select>
                            <label for="p9">9.</label>
                            <select name="p9-entry" id="p9">
                                <option value="???">???</option>
                                <option value="verstappen">verstappen</option>
                                <option value="perez">perez</option>
                                <option value="alonso">alonso</option>
                                <option value="stroll">stroll</option>
                                <option value="leclerc">leclerc</option>
                                <option value="sainz">sainz</option>
                                <option value="hamilton">hamilton</option>
                                <option value="russell">russell</option>
                                <option value="norris">norris</option>
                                <option value="piastri">piastri</option>
                                <option value="magnussen">magnussen</option>
                                <option value="hulkenberg">hulkenberg</option>
                                <option value="tsunoda">tsunoda</option>
                                <option value="devries">de vries</option>
                                <option value="bottas">bottas</option>
                                <option value="zhou">zhou</option>
                                <option value="albon">albon</option>
                                <option value="sargeant">sargeant</option>
                                <option value="gasly">gasly</option>
                                <option value="ocon">ocon</option>
                            </select>
                            <label for="p10">10.</label>
                            <select name="p10-entry" id="p10">
                                <option value="???">???</option>
                                <option value="verstappen">verstappen</option>
                                <option value="perez">perez</option>
                                <option value="alonso">alonso</option>
                                <option value="stroll">stroll</option>
                                <option value="leclerc">leclerc</option>
                                <option value="sainz">sainz</option>
                                <option value="hamilton">hamilton</option>
                                <option value="russell">russell</option>
                                <option value="norris">norris</option>
                                <option value="piastri">piastri</option>
                                <option value="magnussen">magnussen</option>
                                <option value="hulkenberg">hulkenberg</option>
                                <option value="tsunoda">tsunoda</option>
                                <option value="devries">de vries</option>
                                <option value="bottas">bottas</option>
                                <option value="zhou">zhou</option>
                                <option value="albon">albon</option>
                                <option value="sargeant">sargeant</option>
                                <option value="gasly">gasly</option>
                                <option value="ocon">ocon</option>
                            </select>
                            <button type="submit" class="submit-btn">Submit</button>
                        </form>
                    <?php else: ?>
                        <p>You must be logged in to make a prediction. <a href="./login.php">Log in here</a>.</p>
                    <?php endif; ?>
                </div>
            </section>
            <section class="times-up-section hide">
                <h2 class="time-up-title">Sorry, qualifying has started. Your fallback prediction will be used this week.</h2>
            </section>
</main>
</body>
</html>
