<?php
    require_once 'Class/endereco.php';
    $e = new Endereco;

    $id = $_GET['id'];
    $e->conexao("crud", "localhost", "root", "");                     
    $e->delete($id);
    header("location: indexCliente.php");
?>