<?php

Class Usuario {

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

    public function cadastrar($nome, $telefone, $email, $senha){
        global $pdo;
        $sql = $pdo->prepare("SELECT usu_id FROM tb_usuario WHERE usu_email = :e");
        $sql->bindValue(":e", $email);
        $sql->execute();
        if($sql->rowCount() > 0){
            return false;
        }
        else {
            $sql = $pdo->prepare("INSERT INTO tb_usuario (usu_nome, usu_telefone, usu_email, usu_senha) VALUES (:n, :t, :e, :s)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":t", $telefone);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5($senha));
            $sql->execute();
            return true;

        }       
    }

    public function logar($email, $senha){
        global $pdo;
        $sql = $pdo->prepare("SELECT usu_id FROM tb_usuario WHERE usu_email = :e AND usu_senha = :s");
        $sql->bindValue("e", $email);
        $sql->bindValue("s", md5($senha));
        $sql->execute();
        if($sql->rowCount() > 0){
            $dados = $sql->fetch();
            session_start();
            $_SESSION['usu_id'] = $dados['usu_id'];
            return true;
        }else {
            return false;
        }

    }

}





?>