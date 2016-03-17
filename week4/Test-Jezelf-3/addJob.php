<?php
    spl_autoload_register(function ($class_name) {
        include 'classes/' .$class_name . '.class.php';
    });

    if(isset($_POST)) {
        if(!empty($_POST['jobtitle']) && !empty($_POST['jobFromUntil']) && !empty($_POST['jobDescription'])) {
            try {
                $job = new Job();
                $job->JobTitle = $_POST['jobtitle'];
                $job->JobFromUntil = $_POST['jobFromUntil'];
                $job->JobDescription = $_POST['jobDescription'];
                if($job->Save()){
                    $success = "Job added";
                } else {
                    $error = "Faild to add job";
                }
            } catch(Exception $e) {
                $error = $e->getMessage();
            }
        }
    }
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add job</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php if(isset($error)): ?>
    <h3><?php echo $error; ?></h3>
<?php else: ?>
    <h3><?php echo $success;  ?></h3>
<?php endif; ?>
<form action="" method="post">
    <p>
        <label for="jobTitle">
            Job Title<br>
            <input type="text" name="jobtitle">
        </label>
    </p>

    <p>
        <label for="jobFromUntil">
            From - Until<br>
            <input type="text" name="jobFromUntil" placeholder="YYYY - YYYY">
        </label>
    </p>

    <p>
        <label for="jobDescription">
            Job description<br>
            <textarea name="jobDescription" cols="30" rows="10"></textarea>
        </label>
    </p>

    <p><input type="submit" value="Send"></p>
</form>
</body>
</html>