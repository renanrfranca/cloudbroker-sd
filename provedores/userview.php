<?php
    if (!isset($_GET) || !isset($_GET['provedor']) || !isset($_GET['pid'])){
        die("O id do provedor e o pid da maquina deveria ser informado");
    }

    $provedor = intval($_GET['provedor']);
    $pid = intval($_GET['pid']);

    require_once "connection.php";

    $collection = $client->selectCollection("heroku_kqv81xxn", "provedor" . $provedor);

    $result = $collection->findOne(["pid" => $pid]);
?>

    <h1><?php echo("Máquina " . $pid . " do provedor " . $provedor); ?></h1>

    <?php if ($result["uso"] == 0) : 
        $url = "/provedores/usar.php?provedor=".$provedor."&pid=".$pid;
    ?>
        <a href="<?=$url?>">Usar máquina</a>
    <?php else : 
        $url = "/provedores/liberar.php?provedor=".$provedor."&pid=".$pid;   
    ?>
        <a href="<?=$url?>">Liberar máquina</a>
    <?php endif; ?>