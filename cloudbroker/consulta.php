<?php 
    //buscar pelo objeto form
    if(isset($_POST) && isset($_POST['cpu'])){
        var_dump($_POST);
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
