<?php 
    require 'bd_connect.php';
    //buscar pelo objeto form
    if (isset($_POST) && isset($_POST['cpu'])){
        try{ 
            $filter = ['$and' =>[
                [ 'vcpus' => ['$gte' => 1]],
                ['ram' => ['$gte' => 8],
                ] 
                ]];
            $query = new MongoDB\Driver\Query($filter);
            //$filter = {  }
            //$query = new MongoDB\Driver\Query($filter, ['sort' => [ 'preco' => 1], 'limit' => 5]);
            $rows = $connect->executeQuery("heroku_phws9qjl.recursos", $query);
            foreach ($rows as $row) {
                echo "$row->pid : $row->vcpus\n";
            }

        }catch( MongoDB\Driver\Exception\Exception $e){
            echo "Exception:", $e->getMessage(), "\n";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <form method="post" action="consulta.php">
        <b>Requisitos Mínimos</b><br>
        <i>Quantidade de vCPUs</i> 
        <input type="text" name="cpu"><br>
        <i>Quantidade de RAM (em GB)</i> 
        <input type="text" name="ram"><br>
        <i>Quantidade de disco</i> 
        <input type="text" name="disk"><br>
        <input type="submit" name="submit">
        <!--• Quantidade de vCPUs;
        • Quantidade de RAM (em GB);
        • Quantidade de disco (HD, em GB);
        • Preço de uso por hora (em R$).-->
    </form>
    </body>
</html>
