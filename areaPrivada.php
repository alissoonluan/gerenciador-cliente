<?php
    session_start();
    if (!isset($_SESSION['usu_id'])){
        header("location: index.php");
        exit;
    }
?>




SEJA BEEEEEM VINDO !!!!
<a href="Sair.php"> Sair</a>