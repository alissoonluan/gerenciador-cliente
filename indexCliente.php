<?php
    session_start();
    if (!isset($_SESSION['usu_id'])){
        header("location: index.php");
        exit;
    }

    require_once 'Class/cliente.php';
    $c = new Cliente;
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Gerenciamento de Cliente</title>
    </head>
    <body>
    <header>
        <a href="cadastrarCliente.php" class="btnindex">Cliente</a>
        &nbsp;&nbsp;
        <a href="cadastrarEndereco.php" class="btnindex">Endereço</a>
        &nbsp;&nbsp;
        <a href="Sair.php" class="btnindex"> Sair </a>
    </header>
    <br />
    <br />
    <br />
    <br />
    <?php 
        $c->conexao("crud", "localhost", "root", "");
        $clientes = $c->select();
        $html = "<table id='index' width='100%'>";
        $html .= "<tr>
                    <th>Nome</th>
                    <th>Data de nascimento</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                    <th>Endereços</th>
                  </tr>";
        foreach($clientes as $item) {
            $html .= "<tr>
                        <td><center>".$item["nome"]."</center></td>
                        <td><center>".date('d/m/Y', strtotime($item["dtnascimento"]))."</center></td>
                        <td><center>".$item["cpf"]."</center></td>
                        <td><center>".$item["telefone"]."</center></td>
                        <td><center><a href='alterar.php?id=".$item["id"]."'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a></center></td>
                        <td><center><a href='delete.php?id=".$item["id"]."'><i class='fa fa-trash' aria-hidden='true'></i></a></center></td>
                        <td><center><a href='indexEndereco.php?id=".$item["id"]."'><i class='fa fa-address-card-o' aria-hidden='true'></i></a></center></td>
                    </tr>";
        }          
       $html .= "</table>"; 

       echo $html;
    ?>

    </body>

</html>

