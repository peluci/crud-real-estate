<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    <link rel="icon" type="image/x-icon" href="../../images/logo/logo.svg">
    <?php
    include "../componentes/funcoes.php";
    $id = $_GET['id'];
    $query = "SELECT * FROM IMOVEIS where id = $id";
    $conn = startConnection();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $logradouro = $_POST['editar-logradouro'];
        $numero = $_POST['editar-numero'];
        $complemento = $_POST['editar-complemento'];
        $cidade = $_POST['editar-cidade'];
        $estado = $_POST['editar-estado'];
        $cep = $_POST['editar-cep'];
        $quartos = $_POST['editar-quartos'];
        $banheiros = $_POST['editar-banheiros'];
        $aluguelValor = $_POST['editar-aluguel'];
        $iptuValor = $_POST['editar-iptu'];
        $aguaValor = $_POST['editar-agua'];
        $luzValor = $_POST['editar-luz'];
        $situacao = $_POST['editar-situacao'];
        $imagem = $_POST['editar-imagem'];


        $query = "UPDATE IMOVEIS
        SET 
        logradouro = '$logradouro',
        numero='$numero', 
        complemento='$complemento',
        cidade='$cidade',
        estado='$estado',
        cep='$cep',
        quartos='$quartos',
        banheiros='$banheiros',
        aluguel='$aluguelValor',
        iptu='$iptuValor',
        agua='$aguaValor',
        luz='$luzValor',
        situacao='$situacao',
        imagem = '$imagem'
        WHERE
        id = '$id'";
        mysqli_query($conn, $query);
        header("Location: painel_de_controle.php?editado=1");
        
    }


    ?>
</head>

<body>
    <?php
    include "../componentes/header.php";
    ?>
    <section>
        <div class="boas-vindas">
            <p>Você está <strong>editando</strong> um imóvel</p>
            <img src="../../images/banner/view.jpg" alt="">
        </div>
    </section>

    <?php
    imprimeImovelEditar($conn, $query);
    ?>

    <!--     

    <?php
    include "../componentes/footer.php";
    ?> -->
</body>

</html>