<?php
    require_once 'Class/endereco.php';
    $e = new Endereco;

    require_once 'Class/cliente.php';
    $c = new Cliente;
?>

<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Cadastrar Endereco</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="body-form-Cad">
        <h1>CADASTRAR</h1>
        <form method="POST">
            <?php 
                $c->conexao("crud", "localhost", "root", "");
                $comboCliente = $c->montaCombo();
                $html = "<select name='cbEndereco' id='cbEndereco'>";
                foreach($comboCliente as $item) {
                    $html .= "<option value=".$item["id"].">".$item["nome"]."</option>";
                }
                $html .="</select>";
            ?>

            <input type="text" name="bairro" placeholder="Bairro" maxlenght="60">
            <input type="text" name="estado" placeholder="Estado" maxlenght="20">
            <input type="text" name="cep" placeholder="Cep" maxlenght="10">
            <input type="text" name="pontReferencia" placeholder="Ponto de Referencia" maxlenght="100">
            <input type="text" name="cidade" placeholder="Cidade" maxlenght="60">
            <input type="text" name="numero" placeholder="Numero" maxlenght="60">
            <?php 
                echo $html;
            ?>
            <input type="submit" value="CADASTRAR">
        </form>
    </div>
<?php

if(isset($_POST['bairro']) )
{
    $bairro = addslashes($_POST['bairro']);
    $estado = addslashes($_POST['estado']);
    $cep = addslashes($_POST['cep']);
    $pontReferencia = addslashes($_POST['pontReferencia']);
    $cidade = addslashes($_POST['cidade']);
    $numero = addslashes($_POST['numero']);
    $cbEndereco = addslashes($_POST['cbEndereco']);

    if(!empty($bairro) && !empty($estado)  && !empty($cep) && !empty($pontReferencia) && !empty($cidade) && !empty($numero) && !empty($cbEndereco)) {
        $e->conexao("crud", "localhost", "root", "");
        if($e->msgErro == "")
        {
            if($e->cadastrar($bairro, $estado, $cep, $pontReferencia, $cidade, $numero, $cbEndereco)) 
            {
                ?>
                <div id="msg-sucess">
                <a href="indexCliente.php">Endereço cadastrado com sucesso ! </a>
                </div>
                <?php
            }
            else 
            {
                ?>
                <div class="msg-erro">
                    Endereço já cadastrado !
                </div>
                <?php
            }
            
        }
        else 
        {
            ?>
            <div class="msg-erro">
                <?php echo "Erro: ".$c->msgErro;?>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="msg-erro">
             Preencha todos os campos!
        </div>
        <?php
    }
}

?>
</body>
</html>