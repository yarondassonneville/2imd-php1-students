<?php
include_once('no-session.inc.php'); //kan op alle pagina's waar sessie gecontroleerd moet worden behalve de index pagina zelf
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IMD Talks</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<nav class="display">
        <a href="logout.php">
            <img id="avatar" src="images/anon.jpg"/>
            <span id="loginstatus">Logout</span>
        </a>

</nav>

<header>
    <h1>Welkom op IMD-Talks</h1>
</header>

<section id="signup">

    <h2>Welcome back <?php print $_SESSION['user']; ?></h2>

</section>

<!--<script src="js/validatie.js"></script>-->
</body>
</html>