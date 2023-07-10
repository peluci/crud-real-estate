<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    <link rel="icon" type="image/x-icon" href="../../images/logo/logo.svg">
</head>

<body>
    <?php
    include "../componentes/header.php";
    include "../componentes/funcoes.php";
    ?>
    <section>
        <div class="boas-vindas">
            <p>Você está <strong>visualizando</strong> um imóvel</p>
            <img src="../../images/banner/view.jpg" alt="">
        </div>
    </section>

    <?php
    $id = $_GET['id'];
    $query = "SELECT * FROM IMOVEIS where id = $id";
    $conn = startConnection();
    imprimeImovel($conn, $query);
    ?>

    <section>
    <p>Deseja <strong>entrar em contato</strong>? <a href="../pages/contato.php">Clique aqui</a>.</p>

        <!-- <div class="boas-vindas"> -->
            <!-- <img src="../../images/view.jpg" alt=""> -->
        <!-- </div> -->
    </section>

    <?php
    include "../componentes/footer.php";
    ?>
</body>

</html>