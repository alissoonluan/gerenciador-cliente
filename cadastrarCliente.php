<?php
    require_once 'Class/cliente.php';
    $c = new Cliente;
?>

<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Cadastrar Cliente</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="body-form-Cad">
        <h1>CADASTRAR</h1>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome Completo" maxlenght="100">
            <input type="text" name="telefone" placeholder="Telefone" maxlenght="30">
            <input type="text" name="cpf" placeholder="CPF" maxlenght="20">
            <input type="date" name="dtNascimento" placeholder="DATA NASCIMENTO" maxlenght="20">
            <input type="submit" value="CADASTRAR">
        </form>
    </div>
<?php

if(isset($_POST['nome']) )
{
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $cpf = addslashes($_POST['cpf']);
    $dtNascimento = addslashes($_POST['dtNascimento']);

    if(!empty($nome) && !empty($telefone)  && !empty($cpf) && !empty($dtNascimento)) {
        $c->conexao("crud", "localhost", "root", "");
        if($c->msgErro == "")
        {
            if($c->cadastrar($nome, $telefone, $cpf, $dtNascimento)) 
            {
                ?>
                <div id="msg-sucess">
                <a href="indexCliente.php"> Cliente cadastrado com sucesso ! </a>
                </div>
                <?php
            }
            else 
            {
                ?>
                <div class="msg-erro">
                    Cliente já cadastrado !
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