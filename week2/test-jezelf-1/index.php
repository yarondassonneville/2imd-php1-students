<?php
    session_start();
    echo "Gebruikersnaam: brent<br />Wachtwoord: php";

    //print_r($_POST);

    if(isset($_SESSION['ingelogd']) && $_SESSION['ingelogd'] == 'ja'){
        header('location: login.php');
    }

    //is er op de knop geklikt?
    if(!empty($_POST)){
        $gebruikersnaam = $_POST['gebruikersnaam'];
        $wachtwoord = $_POST['wachtwoord'];
    }



    function kanInloggen($p_gebruikersnaam, $p_wachtwoord){
        //controleer logingegevens
        if($p_gebruikersnaam == 'brent' && $p_wachtwoord == 'php'){
            //er mag ingelogd worden
            return true;
        }else{
            //er mag niet ingelogd worden
            return false;
        }
    }


    //POST is niet leeg
    if(!empty($_POST)){

        $gebruikersnaam = $_POST['gebruikersnaam'];
        $wachtwoord = $_POST['wachtwoord'];

        if(kanInloggen($gebruikersnaam, $wachtwoord)){
            //1. sessie starten (is reeds gestart bovenaan)
            //session_start();

            //2. sessiewaarde toekennen
            $_SESSION['ingelogd'] = 'ja';

            //3. doorsturen
            header("location: login.php");

        }else{
            $bericht = "Foute gegevens";
        }
    }else{
        $bericht = "Login";
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
    <h1><?php echo $bericht; ?></h1><br>
    <form action="" method="POST">
        <input type="text" name="gebruikersnaam" placeholder="Gebruikersnaam" autofocus>
        <input type="password" name="wachtwoord" placeholder="Wachtwoord">
        <input type="submit" name="login" class="login login-submit" value="login">
    </form>

    <div class="login-help">
        <a href="#">Register</a> • <a href="#">Forgot Password</a>
    </div>
</div>


</body>
</html>
