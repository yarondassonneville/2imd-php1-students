<?php
//sessie
session_start();
controleerSessie();


function controleerSessie(){
    if(!isset($_SESSION['user'])){
        header('location: index.php');
    }
}