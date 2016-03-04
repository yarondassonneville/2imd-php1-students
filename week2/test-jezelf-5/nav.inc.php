<?php
global $username, $password, $p_user;

    //controleer of post niet leeg is
    if(!empty($_POST) && isset($_POST['btnLogIn'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        //kan ik inloggen met mijn ingevulde logingegevens?
        if(canLogin($username, $password)){
            //ja, er kan ingelogd worden. Er is een match met user en pass
            $p_user = $username;
            doLogin($username);
        }
    }else{
        isLoggedIn();
    }

	function canLogin($p_username, $p_password)
	{
        //indien match gebruikersnaam en wachtwoord, keer dan true terug
		if($p_username == 'brent.schuddinck@hotmail.be' && $p_password == 'imd'){
            return true;
        }else{
            return false;
        }
	}

	function isLoggedIn()
	{
		//check of cookie loggedin aanwezig is
        if(isset($_COOKIE['loggedin'])){
            //uitlezen cookie. We krijgen de username,usersname hash terug
            $koekje = $_COOKIE['loggedin'];
            $arrayKoekje = explode(",", $koekje); //trekt kokje in 2 stukken voor en na komma

            $gebruikersnaam = $arrayKoekje[0];
            $hash = $arrayKoekje[1];
            $salt = "AR0ge6#@QFD/G2sd.f";
            $check = md5($gebruikersnaam . $salt);

            if($check == $hash){
                return true;
            }else{
                if(basename($_SERVER['PHP_SELF']) != 'index.php'){
                    header('location: index.php');
                }
                //hash en check komen niet overeen. Pagina verlaten en cookie intrekken
                return false;
            }
        }else{
            //indien bezoeker niet bevoegd pagina te bekijken en deze pagina niet de homagepage is, dan wordt hij naar homepage doorgestuurd.
            //Indien niets zetten => mogelijk om bv profile.php te openen zonder toegang
            //Indien enkel redirecten => is persoon op homepage dan zorgt dit voor oneindige loop
            if(basename($_SERVER['PHP_SELF']) != 'index.php'){
                header('location: index.php');
            }
        }
	}

	function doLogin($p_user)
	{
		// this function sets the cookie required for subsequent logins
        $salt = "AR0ge6#@QFD/G2sd.f"; //iets wat niet te gokken valt
        $secret = $p_user . "," . md5($p_user . $salt); //username + , + md5 van username + salt

        //cookie aanmaken
        //setcookie('naamcookie', inhoud cookie, vervaltijd 1u);
        setcookie('loggedin', $secret, time()+3600);

        //redirect (moet voor html gebeuren) naar zelfde pagina
        //header('Location: loggedin.php');
        header('Location: ' . $_SERVER['PHP_SELF']);
	}

?>

<div class="users_container">
    <nav>
        <?php if(isLoggedIn()){ ?>
            <p class="welcome">Welcome back! <a href="logout.php">Log out?</a></p>
        <?php }else{
            ?>
            <form action="" method="post">
                <input class="input" type="text" name="username" placeholder="Your username" value="brent.schuddinck@hotmail.be">
                <input class="input" type="password" name="password" placeholder="Your password" value="imd">
                <button class="button" type="submit" name="btnLogIn">Log in</button>
            </form>
            <?php
        }?>


    </nav>

    <?php if(isLoggedIn()){
        ?>
        <ul class="users">

            <?php foreach($users as $userKey => $userVal): ?>
                <li><a href="profile.php?id=<?php print $userKey; ?>"><img src="<?php print $userVal['picture']; ?>" alt="<?php print "Profielfoto van " . $userVal['name']; ?>"></a></li>
            <?php endforeach; ?>
        </ul>
        <br class="clearfix">
        <?php
    }?>


</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $(document).ready(function(){

        $(".users_container").mousemove(function( event ) {
            var x = Math.round(event.pageX/5) * -1;
            var y = Math.round(event.pageY/5) * -1;
            $(".users").css("transform", "translateX("+x+"px) translateY("+y+"px)");
        });

        $("body").mousemove();

    });
</script>