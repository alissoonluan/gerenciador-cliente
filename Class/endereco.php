<?php

Class Endereco {

    private $pdo;
    public $msgErro = "";

    public function conexao($nome, $host, $usuario, $senha){
        global $pdo;
        try {
        $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        }catch (PDOException $e) {
            global $msgErro;
            $msgErro = $e->getMessage();
        }
    }

    public function cadastrar($bairro, $estado, $cep, $pontReferencia, $cidade, $numero, $cliente){
        global $pdo;
        $sql = $pdo->prepare("INSERT INTO tb_endereco (end_bairro, end_estado, end_cep, end_pontreferencia, end_cidade, end_numero, end_cli_id) 
        VALUES (:b, :e, :ce, :p, :c, :n, :cli)");
        $sql->bindValue(":b", $bairro);
        $sql->bindValue(":e", $estado);
        $sql->bindValue(":ce", $cep);
        $sql->bindValue(":p", $pontReferencia);
        $sql->bindValue(":c", $cidade);
        $sql->bindValue(":n", $numero);
        $sql->bindValue(":cli", $cliente);
        $sql->execute();
            return true;
        }          
        
}





?>