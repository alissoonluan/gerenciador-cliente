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

        public function select($id){
            global $pdo;
            $sql = $pdo->prepare("SELECT end_id, end_bairro, end_estado, end_cep, end_pontreferencia, end_cidade, end_numero
             FROM tb_endereco WHERE end_cli_id = :i");
            $sql->bindValue(":i", $id);
            $sql->execute();
            $arrItem = [];
            while($row = $sql->fetch()){
                $arrItem[] = array("id" => $row["end_id"], "bairro" => $row["end_bairro"], "estado" => $row["end_estado"], "cep" => $row["end_cep"],
                "pontreferencia" => $row["end_pontreferencia"] , "cidade" => $row["end_cidade"], "numero" => $row["end_numero"]);
            }
            return $arrItem;
        }

        public function selectEnd($id){
          global $pdo;
          $sql = $pdo->prepare("SELECT end_id, end_bairro, end_estado, end_cep, end_pontreferencia, end_cidade, end_numero, end_cli_id
           FROM tb_endereco WHERE end_id = :i");
          $sql->bindValue(":i", $id);
          $sql->execute();
          $arrItem = [];
          while($row = $sql->fetch()){
              $arrItem[] = array("id" => $row["end_id"], "bairro" => $row["end_bairro"], "estado" => $row["end_estado"], "cep" => $row["end_cep"],
              "pontreferencia" => $row["end_pontreferencia"] , "cidade" => $row["end_cidade"], "numero" => $row["end_numero"], "idCli" => $row["end_cli_id"]);
          }
          return $arrItem;
        }

        public function delete($id){
            global $pdo;
            $sql = $pdo->prepare("DELETE FROM tb_endereco WHERE end_id = :i ");
            $sql->bindValue(":i", $id);
            $sql->execute();
            return true;
        }
        public function update($id, $bairro, $estado, $cep, $pontReferencia, $cidade, $numero) {
            global $pdo;
            $sql = $pdo->prepare("UPDATE tb_endereco SET end_bairro = :b, end_estado = :e, end_cep = :c, end_pontreferencia = :p,
            end_cidade = :ci, end_numero = :n WHERE end_id = :i");
            $sql->bindValue(":i", $id);
            $sql->bindValue(":b", $bairro);
            $sql->bindValue(":e", $estado);
            $sql->bindValue(":c", $cep);
            $sql->bindValue(":p", $pontReferencia);
            $sql->bindValue(":ci", $cidade);
            $sql->bindValue(":n", $numero);
            $sql->execute();
            return true;

        }

}





?>
