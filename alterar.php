<?php
    require_once 'Class/cliente.php';
    $c = new Cliente;

    $id = $_GET['id'];
    $c->conexao("crud", "localhost", "root", "");    
    $cliente = $c->select($id);

    $nome         = $cliente[0]["nome"];
    $telefone     = $cliente[0]["telefone"];
    $cpf          = $cliente[0]["cpf"];
    $dtNascimento = $cliente[0]["dtnascimento"];
    

    ?>

<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="body-form">
        <h1>EDITAR</h1>
        <form method="POST">
            <input type="text" value = <?php echo $nome; ?> name="nome" placeholder="Nome Completo" maxlenght="100">
            <input type="text" value = <?php echo $telefone; ?> name="telefone" placeholder="Telefone" maxlenght="30">
            <input type="text" value = <?php echo $cpf; ?> name="cpf" placeholder="CPF" maxlenght="20">
            <input type="date" value = <?php echo $dtNascimento ;?> name="dtNascimento" placeholder="DATA NASCIMENTO" maxlenght="20">
            <input type="hidden" value= <?php echo $id;?> name="id" >
            <input type="submit" value="EDITAR">
        </form>
    </div>

<?php

if(isset($_POST['nome']) )
{
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $cpf = addslashes($_POST['cpf']);
    $dtNascimento = date('Y-m-d' , strtotime($_POST['dtNascimento']));
    $id = ($_POST["id"]);

    if(!empty($nome) && !empty($telefone)  && !empty($cpf) && !empty($dtNascimento)) {
        $c->conexao("crud", "localhost", "root", "");
        if($c->msgErro == "") 
        {
            if($c->update($id, $nome, $telefone, $cpf, $dtNascimento)) 
            {
                ?>
                <div id="msg-sucess">
                <a href="indexCliente.php"> Cliente Alterado com sucesso ! </a>
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
    }
}

?>
</body>
</html>