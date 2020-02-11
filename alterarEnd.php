<?php
    require_once 'Class/endereco.php';
    $e = new Endereco;

    $id = $_GET['id'];
    $e->conexao("crud", "localhost", "root", "");    
    $endereco = $e->select($id);

    $bairro         = $endereco[0]["bairro"];
    $estado         = $endereco[0]["estado"];
    $cep            = $endereco[0]["cep"];
    $pontReferencia = $endereco[0]["pontreferencia"];
    $cidade         = $endereco[0]["cidade"];
    $numero         = $endereco[0]["numero"];
    

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
            <input type="text" value = <?php echo $bairro; ?> name="bairro" placeholder="Bairro" maxlenght="60">
            <input type="text" value = <?php echo $estado; ?> name="estado" placeholder="Estado" maxlenght="20">
            <input type="text" value = <?php echo $cep; ?>    name="cep" placeholder="Cep" maxlenght="10">
            <input type="text" value = <?php echo $pontReferencia; ?> name="pontReferencia" placeholder="Ponto de Referencia" maxlenght="100">
            <input type="text" value = <?php echo $cidade; ?> name="cidade" placeholder="Cidade" maxlenght="60">
            <input type="text" value = <?php echo $numero; ?> name="numero" placeholder="Numero" maxlenght="60">
            <input type="hidden" value= <?php echo $id;?> name="id" >
            <input type="submit" value="EDITAR">
        </form>
    </div>

<?php

if(isset($_POST['bairro']) )
{
    $bairro         = addslashes($_POST['bairro']);
    $estado         = addslashes($_POST['estado']);
    $cep            = addslashes($_POST['cep']);
    $pontReferencia = addslashes($_POST['pontReferencia']);
    $cidade         = addslashes($_POST['cidade']);
    $numero         = addslashes($_POST['numero']);
    $id             = ($_POST["id"]);

    if(!empty($bairro) && !empty($estado)  && !empty($cep) && !empty($pontReferencia) && !empty($cidade) && !empty($numero)) {
        $e->conexao("crud", "localhost", "root", "");
        if($e->msgErro == "") 
        {
            if($e->update($id, $bairro, $estado, $cep, $pontReferencia, $cidade, $numero )) 
            {
                ?>
                <div id="msg-sucess">
                <a href="indexEndereco.php?id=$id"> Endereço Alterado com sucesso ! </a>
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
                <?php echo "Erro: ".$e->msgErro;?>
            </div>
            <?php
        }
    }
}

?>
</body>
</html>