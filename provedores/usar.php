<?php
    if (!isset($_GET) || !isset($_GET['provedor']) || !isset($_GET['pid'])){
        die("O id do provedor e o pid da maquina deveria ser informado");
    }

    $provedor = intval($_GET['provedor']);
    $pid = intval($_GET['pid']);

    require_once "connection.php";

    $collection = $client->selectCollection("heroku_kqv81xxn", "provedor" . $provedor);

    $result = $collection->updateOne(
        ['pid' => $pid],
        ['$set' => ['uso' => 1]]
    );

    var_dump($result);

    echo("Usando a máquina " . $pid . " do provedor " . $provedor);

    $_GET['id'] = $provedor;

    require "divulgar.php";

    header("Location: /provedores/userview.php?provedor=".$provedor."&pid=".$pid);