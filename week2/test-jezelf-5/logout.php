<?php
//cookie leegmaken en wissen door tijd -1s te zetten. Dit is al voldoende om de cookie te wissen.
setcookie('loggedin', '', time()-1);

//redirect naar homepage
header('location: index.php');