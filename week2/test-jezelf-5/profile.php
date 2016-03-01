<?php
include_once('data.inc.php');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
		
	</title>
	<link rel="stylesheet" href="css/ello.css">
</head>
<body class="profile">

<?php include("nav.inc.php"); ?>

<?php if(isLoggedIn()){
    $userId = $_GET['id'];
    $name= $users[$userId]["name"];
    $bio= $users[$userId]["bio"];
    $picture= $users[$userId]["picture"];
    ?>
    <div class="profile_details">
        <img src="<?php print $picture; ?>" alt="Profielfoto van <?php print $name; ?>">
        <h1><?php print $name; ?></h1>
        <p><?php print $bio; ?></p>
    </div>
    <?php
} ?>

</body>
</html>