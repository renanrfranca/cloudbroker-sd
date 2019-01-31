<?php 
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
    require "bd_connect.php";

    $data = json_decode(file_get_contents('php://input'),true);
    //var_dump($data);
    
    $provedor = $data['provedor'];
    foreach($data as $recurso){

        if(isArray($recurso)){
            $recurso['provedor'] = $provedor;
            $collect->insert($recurso);
        }
    }
?>