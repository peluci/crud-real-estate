<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../..//style.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="../../images/logo/logo.svg">
    <title>Cadastrar Imóvel</title>
    <?php
    include "../componentes/funcoes.php";
    $conn = startConnection();
    adicionarCadastro($conn, 'IMOVEIS');
    ?>
</head>

<body>
    <?php
    include "../componentes/header.php";

    ?>
    <section>
        <div class="boas-vindas">
            <p>Cadastre um imóvel</p>
            <img src="../../images/banner/key.jpg" alt="">
        </div>
    </section>
    <?php
    // $conn = startConnection();
    imprimirTelaCadastro($conn, 'IMOVEIS');
    ?>

    <!-- <?php
    include "../componentes/footer.php";
    ?> -->


</body>

</html>