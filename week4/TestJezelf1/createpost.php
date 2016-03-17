<?php
    session_start();
    spl_autoload_register(function ($class_name) {
        include 'classes/' .$class_name . '.class.php';
    });

    if(isset($_SESSION['loggedin']) && isset($_SESSION['user_id'])){
        if(!empty($_POST) && !empty($_POST["post"])){
            $post = new Tweet();
            $post->Post = $_POST["post"];
            $post->UserID = $_SESSION["user_id"];
            $post->Save();
        }
    }
    else {
        header('Location: index.php');
    }
    $post = new Tweet();
    $results = $post->GetAll();
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IMD Talks</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/twitter.css">
    <style>

    </style>

</head>
<body>
<nav>
    <a href="logout.php">Logout</a>
</nav>

<div id="container">
    <section id="newpost">
        <form action="" method="post">
            <label for="post">What's on your mind?</label><br>
            <textarea name="post" id="post" cols="30" rows="2"></textarea><br>
            <input type="submit" name="btnCreatePost" value="Send" />

        </form>
    </section>

    <section id="tweets">
        <h2>Your posts</h2>
        <?php foreach($results as $result): ?>
            <p><?php echo htmlspecialchars($result["tweet"]); ?></p>
        <?php endforeach; ?>
    </section>

</div>

</body>
</html>