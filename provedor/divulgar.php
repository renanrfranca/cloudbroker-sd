<?php

if (!isset($_GET) || !isset($_get[id])){
    die("O id do provedor deveria ser informado no URL");
}

$id = $_GET[id];


