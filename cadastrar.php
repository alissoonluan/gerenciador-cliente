<?php
    require_once 'Class/usuarios.php';
    $u = new Usuario;
?>

<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Cadastro Usuario</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="body-form-Cad">
        <h1>CADASTRAR USUÁRIO</h1>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome Completo" maxlenght="100">
            <input type="text" name="telefone" placeholder="Telefone" maxlenght="30">
            <input type="email" name="email" placeholder="Usuario" maxlenght="100">
            <input type="password" name="senha" placeholder="Senha" maxlenght="12">
            <input type="password" name="confSenha" placeholder="Confirmar Senha">
            <input type="submit" value="CADASTRAR">
        </form>
    </div>
<?php

if(isset($_POST['nome']) )
{
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmarSenha = addslashes($_POST['confSenha']);
    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)) {
        $u->conexao("crud", "localhost", "root", "");
        if($u->msgErro == "")
        {
            if($senha == $confirmarSenha)
            {
                if($u->cadastrar($nome, $telefone, $email, $senha)) 
                {
                    ?>
                    <div id="msg-sucess">
                    <a href="index.php">Cadastrado com sucesso! Acesse para entrar! </a>
                    </div>
                    <?php
                }
                else 
                {
                    ?>
                    <div class="msg-erro">
                        Email já cadastrado
                    </div>
                    <?php
                }
            }

            else 
            {
                ?>
                <div class="msg-erro">
                    Senha e confirmar senha não correspondem!
                </div>
                <?php
            }
        }
        else 
        {
            ?>
            <div class="msg-erro">
                <?php echo "Erro: ".$u->msgErro;?>
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