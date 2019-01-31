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
*/
    if(!isset($_POST)){
        die("algo deu errado...");
    }
    var_dump($_POST);
    $acutjason=json_decode($_POST);
    var_dump($acutjason);
    foreach($acutjason as $provedor){
        
    }
?>