<?php

Class Cliente {

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

    public function cadastrar($nome, $telefone, $cpf, $dtNascimento){
        global $pdo;
        $sql = $pdo->prepare("SELECT cli_id FROM tb_cliente WHERE cli_cpf = :c");
        $sql->bindValue(":c", $cpf);
        $sql->execute();
        if($sql->rowCount() > 0){
            return false;
        }
        else {
            $sql = $pdo->prepare("INSERT INTO tb_cliente (cli_nome, cli_telefone, cli_cpf, cli_dtnascimento) VALUES (:n, :t, :c, :d)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":t", $telefone);
            $sql->bindValue(":c", $cpf);
            $sql->bindValue(":d", $dtNascimento);
            $sql->execute();
            return true;

        }       
    }

    public function montaCombo(){
        global $pdo;
        $sql = $pdo->prepare("SELECT cli_id, cli_nome FROM tb_cliente");
        $sql->execute();
        if($sql->rowCount() <= 0){
            return false;
        }
        $arrItem = [];
        while($row = $sql->fetch()) {
            $arrItem[] = array("id" => $row["cli_id"], "nome" => $row["cli_nome"]);
                
        }
       return $arrItem;
    }

    public function select($id = ''){
        global $pdo;
        $where = '';
        if (!empty($id)){
            $where.= "WHERE cli_id = $id";
        }
        $sql = $pdo->prepare("SELECT cli_id, cli_nome, cli_dtnascimento, cli_cpf, cli_telefone FROM tb_cliente $where");
        $sql->execute();
        $arrItem = [];
        while($row = $sql->fetch()){
            $arrItem[] = array("id" => $row["cli_id"], "nome" => $row["cli_nome"], "dtnascimento" => $row["cli_dtnascimento"], 
            "cpf" => $row["cli_cpf"] , "telefone" => $row["cli_telefone"]);
        }
        return $arrItem;
    }

    public function delete($id){
        global $pdo;
        $sql = $pdo->prepare("DELETE FROM tb_cliente WHERE cli_id = :i ");
        $sql->bindValue(":i", $id);
        $sql->execute();
        return true;
    }
    public function update($id, $nome, $telefone, $cpf, $dtNascimento) {
        global $pdo;
        $sql = $pdo->prepare("UPDATE tb_cliente SET cli_nome = :n, cli_telefone = :t, cli_cpf = :c, cli_dtnascimento = :dt WHERE cli_id = :i");
        $sql->bindValue(":i", $id);
        $sql->bindValue(":n", $nome);
        $sql->bindValue(":t", $telefone);
        $sql->bindValue(":c", $cpf);
        $sql->bindValue(":dt", $dtNascimento);
        $sql->execute();
        return true;
        
    }

}





?>