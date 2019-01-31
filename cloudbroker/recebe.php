<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

/*
    JSON RECEBIDO DO POST VEM COM TODOS RECURSOS. Modelo:

    { provedor: xxx
        {
            recurso 1 lalala
        }, 
        {
            recurso 2...
        }, 
        {
            recurso 3...
        }, 
        
    
    }
    if(!isset($_POST)){
        die("algo deu errado...");
    }
    */

    require_once '../vendor/autoload.php';
    $client = new MongoDB\Client("mongodb://cloudbroker:abc123@ds161529.mlab.com:61529/heroku_phws9qjl");
    $collection = $client->selectCollection("hheroku_phws9qjl", "recursos");
 
    $data = json_decode(file_get_contents('php://input'),true);
    var_dump($data);
    
    $provedor = $data['provedor'];
    foreach($data as $recurso){
        echo '<br><br><br><br><br>';
       var_dump($recurso);
        $recurso['provedor'] = $provedor;
        $collection->insert($recurso);
    }
?>