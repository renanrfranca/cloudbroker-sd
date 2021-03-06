<?php 
    require 'bd_connect.php';
    //buscar pelo objeto form
    if (isset($_POST) && isset($_POST['cpu'])){
        try{ 
            $filter = ['$and' =>[
                [ 'vcpus' => ['$gte' => intval($_POST['cpu'])]],
                ['ram' => ['$gte' => intval($_POST['ram'])]],
                ['hd' => ['$gte' => intval($_POST['disk'])]],
                ['uso' => 0]                 
            ]];

            $query = new MongoDB\Driver\Query($filter, ['sort' => ['preco' => 1]]);
            //$filter = {  }
            //$query = new MongoDB\Driver\Query($filter, ['sorts://s://' => [ 'preco' => 1], 'limit' => 5]);
            $rows = $connect->executeQuery("heroku_phws9qjl.recursos", $query);
            
            if(!empty($rows)){
                $row = $rows->toArray()[0];
                echo "Melhor recurso disponível:";
                echo "provedor: $row->provedor\n pid: $row->pid\n ram disp.: $row->ram\n disco disp.: $row->disk\n preco: $row->preco";
                echo '<a href="../provedores/userview.php?provedor='.$row->provedor.'&pid='.$row->pid.'.">Abrir recurso</a>';
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
