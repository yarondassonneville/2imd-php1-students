<?php
    //sessie
    session_start();
    controleerSessie();


    function controleerSessie(){
        if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
            header('location: loggedin.php');
        }
    }

    //is er op de knop geklikt?
    if(isset($_POST['btnSignUp'])){
        if(valideer()){
            $user = $_POST['email'];
            $_SESSION['user'] = $user;
            header('location: loggedin.php');
        };


    }


    function valideer(){
        if(valideerNaam() == true && valideerMail() == true && ValideerPass() == true){
            return true;
        }
    }


    function valideerNaam(){
        $name = $_POST['name'];
        if(!empty($name)){
            return true;
        }else{
            global $errNaam;
            $errNaam = "<span class='err'>Naam niet ingevuld</span>";
        }
    }

    function valideerPass(){
        $password = $_POST['password'];
        if(!empty($password)){
            return true;
        }else{
            global $errPass;
            $errPass = "<span class='err'>Password niet ingevuld</span>";
        }
    }

    function valideerMail(){
        $email = $_POST['email'];
        if(!empty($email)){
            if (preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)){
                return true;
            }else{
                global $errMail;
                $errMail = "<span class='err'>E-mail niet juist ingevuld</span>";
            }
        }else{
           global $errMail;
            $errMail = "<span class='err'>Mail niet ingevuld</span>";
        }
    }



?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IMD Talks</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<header>
    <h1>Welkom op IMD-Talks</h1>
</header>
<section id="signup">

    <h2>New to IMD-Talks? Sign up!</h2>

    <form action="" method="post">
        <?php if(isset($_POST['name']) && !valideerNaam()){ echo $errNaam; } ?>
        <input type="text" name="name" id="name" placeholder="Full name" value="<?php if(isset($_POST['name'])){ print $_POST['name']; } ?>">
        <?php if(isset($_POST['email']) && !valideerMail()){ echo $errMail; } ?>
        <input type="text" name="email" id="email"  placeholder="Email" value="<?php if(isset($_POST['email'])){ print $_POST['email']; } ?>">
        <?php if(isset($_POST['password']) && !valideerPass()){ echo $errPass; } ?>
        <input type="password" name="password" id="password" placeholder="Password"  value="<?php if(isset($_POST['password'])){ print $_POST['password']; } ?>">
        <input id="btnSignup" type="submit" name="btnSignUp" value="Sign up for IMD Talks" >
    </form>

</section>

<!--<script src="js/validatie.js"></script>-->
</body>
</html>