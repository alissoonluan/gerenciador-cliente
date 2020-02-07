<?php
    session_start();
    if (!isset($_SESSION['usu_id'])){
        header("location: index.php");
        exit;
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link ref="stylesheet" href="materialize/css/materialize.min.css">
        <title></title>
    </head>
    <body>
        

    </body>

</html>




SEJA BEEEEEM VINDO !!!!
<a href="Sair.php"> Sair</a>