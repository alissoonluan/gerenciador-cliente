<?php
    require_once 'Class/endereco.php';
    $e = new Endereco;
    
    $id = $_GET['id'];
    $e->conexao("crud", "localhost", "root", "");    
    $enderecos = $e->select($id);

    ?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Gerenciamento de Endereço</title>
    </head>
    <body>
    <header>
        <a href="indexCliente.php" class="btnindex"> Sair </a>
    </header>
    <br />
    <br />
    <br />
    <br />

    <?php 
        $html = "<table id='index' width='100%'>";
        $html .= "<tr>
                    <th>Bairro</th>
                    <th>Estado</th>
                    <th>CEP</th>
                    <th>Ponto de Referencia</th>
                    <th>Cidade</th>
                    <th>Numero</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                  </tr>";
        foreach($enderecos as $item) {
            $html .= "<tr>
                        <td><center>".$item["bairro"]."</center></td>
                        <td><center>".$item["estado"]."</center></td>
                        <td><center>".$item["cep"]."</center></td>
                        <td><center>".$item["pontreferencia"]."</center></td>
                        <td><center>".$item["cidade"]."</center></td>
                        <td><center>".$item["numero"]."</center></td>
                        <td><center><a href='alterarEnd.php?id=".$item["id"]."'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a></center></td>
                        <td><center><a href='deleteEnd.php?id=".$item["id"]."'><i class='fa fa-trash' aria-hidden='true'></i></a></center></td>
                    </tr>";
        }          
       $html .= "</table>"; 

       echo $html;
    ?>

