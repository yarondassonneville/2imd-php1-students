<?php
    spl_autoload_register(function ($class_name) {
        include 'classes/' .$class_name . '.class.php';
    });

    $jobs = new Job();
    $results = $jobs->GetAll();
    $counter = 1;
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Timeline</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- The Timeline -->

<ul class="timeline">
    
    <?php foreach($results as $result): ?>
    <li>
        <?php if($counter%2 != 0):?>
          <div class="direction-r">
        <?php else: ?>
          <div class="direction-l">
        <?php endif; ?>
            <div class="flag-wrapper">
                <span class="flag"><?php echo $result['jobTitle'] ?></span>
                <span class="time-wrapper"><span class="time"><?php echo $result['jobFromUntil'] ?></span></span>
            </div>
            <div class="desc"><?php echo $result['jobDescription'] ?></div>
        </div>
    </li>
    <?php $counter++; endforeach; ?>
</ul>

</body>
</html>