<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM accounts
            WHERE email = '%s'",
            $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {
        if (password_verify($_POST["password"], $user["password_hash"])) {
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];
            header("Location: index.php");
            exit;
        };
    }

    $is_invalid = true;

}

?>



<!DOCTYPE html>
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
            <a href="./index.php">
                <img src="./images/common/F1 (1).png" alt="F1-GridLock logo">
            </a>
        </figure>
        <!--menu button - common across all pages-->
        <button class="btn menu-btn">
            Menu +
        </button>

        <!--hidden nav-screen.-->
        <nav class="nav-screen">
            <ul class="nav-list">
                <li class="nav-item"><a href="./index.php">Race</a></li>
                <li class="nav-item"><a href="#">Standings</a></li>
                <li class="nav-item"><a href="./points-system.html">Points System</a></li>
            </ul>
        </nav>
    </header>
        <main class="page-alignment form-pages">
            <h1 class="forms-h1">Login</h1>

            <?php if($is_invalid): ?>
                <p>Invalid login</p>
            <?php endif; ?>

            <form method="post" class="forms">
                <div class="form-div">
                    <label for="email">Email:</label>
                    <input class="text-fields" type="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "")?>">
                </div>
                <div class="form-div">
                    <label for="password">Password:</label>
                    <input class="text-fields" type="password" name="password" id="password">
                </div>
                <button class="btn form-btn">Login</button>
            </form>

            <p>Don't have an account?<a href="./signup.html">Create an account</a>.</p>

        </main>
    </body>