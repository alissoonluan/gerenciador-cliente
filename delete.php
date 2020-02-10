<?php
    require_once 'Class/cliente.php';
    $c = new Cliente;

    $id = $_GET['id'];
    $c->conexao("crud", "localhost", "root", "");                     
    $c->delete($id);
    header("location: indexCliente.php");
?>