<?php
    session_start();
    $bericht = "Welkom terug!";
    //print_r($_SESSION);
    if(!isset($_SESSION['ingelogd']) || $_SESSION['ingelogd'] != 'ja'){
        header('location: index.php');
    }

    if(isset($_POST['loguit'])){
        header('location: loguit.php');
    }

?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Log-in</title>
    <link rel='stylesheet prefetch'
          href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="login-card">
    <h1><?php print $bericht; ?></h1><br>
    <form action="" method="POST">
        <input type="submit" name="loguit" class="login login-submit" value="Uitloggen">
    </form>
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>


</body>
</html>
