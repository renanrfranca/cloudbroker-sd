<?php

    if (!isset($_GET) || !isset($_GET['id'])){
        die("O id do provedor deveria ser informado no URL");
    }

    $id = $_GET['id'];

    require_once "connection.php";

    $collection = $client->selectCollection("heroku_kqv81xxn", "provedor" . $id);

    $result = $collection->find()->toArray();
    $result['provedor'] = $id;

    // $url = "https://cloudbrokersd.herokuapp.com/cloudbroker/recebe.php";
    $url = "http://ptsv2.com/t/yrpzf-1548955713/post";

    //Initiate cURL.
    $ch = curl_init($url);
    
    //Encode the array into JSON.
    $jsonDataEncoded = json_encode($result);
    
    //Tell cURL that we want to send a POST request.
    curl_setopt($ch, CURLOPT_POST, 1);
    
    //Attach our encoded JSON string to the POST fields.
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
    
    //Set the content type to application/json
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
    
    //Execute the request
    $curl_result = curl_exec($ch);

    var_dump($jsonDataEncoded);

    var_dump($curl_result);

    ?>