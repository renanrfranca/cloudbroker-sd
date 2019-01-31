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

    $acutjason=json_decode($_POST[0]);
    var_dump($acutjason);
?>