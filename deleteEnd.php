<?php
    require_once 'Class/endereco.php';
    $e = new Endereco;

    $id = $_GET['id'];
    $cliId = $_GET['cliId'];
    $e->conexao("crud", "localhost", "root", "");
    $e->delete($id);
    header("location: indexEndereco.php?id=$cliId");
?>
