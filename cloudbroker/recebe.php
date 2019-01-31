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
    $data = json_decode(file_get_contents('php://input'),true);
    var_dump(data);
    foreach($acutjason as $provedor){
    
    }
?>