<?php
    /*CONEXÕES COM BD*/
    require_once '../vendor/autoload.php';
    $connect = new MongoDB\Client("mongodb://cloudbroker:abc123@ds161529.mlab.com:61529/heroku_phws9qjl");
    $collect = $connect->heroku_phws9qjl->recursos;
   