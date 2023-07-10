<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../..//style.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="../../images/logo/logo.svg">
    <title>Painel de Controle</title>
    <?php
    include "../componentes/funcoes.php";
    $conn = startConnection();
    $tabela = "IMOVEIS";
    $target = 'id';
    editarCadastro($conn, $tabela);
    excluirCadastro($conn, $tabela);
    ?>
</head>

<body>
    <?php
    include "../componentes/header.php";
    if ($_GET) {
        if ($_GET['editado'] == 1) {
            echo "<div class='sucesso-msg'>
                    <i class='fa fa-check'></i>
                        <p>Edição bem sucedida.</p>
                  </div>";
        }
    }
    ?>

    <section>
        <div class="banner">
            <div>
                <p>Bem vindo, <strong>proprietário</strong>. O que deseja fazer hoje?</p>
            </div>
            <img src="../..//images/banner/owner.jpg" alt="">
        </div>
    </section>

    <section>
        <div class='gerenciamento'>
            <a href="./cadastro_imoveis.php"><button>Cadastrar imóvel</button></a>
            <a href="./painel_de_controle.php"><button>Cadastrar laudo</button></a>
            <a href="./painel_de_controle.php"><button>Novo contrato</button></a>
        </div>
    </section>


    <?php

    $query = "SELECT * FROM $tabela";
    imprimeTabelaGerenciar($conn, $query);
    ?>

    <?php
    include "../componentes/footer.php";
    ?>

</body>

</html>