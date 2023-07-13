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
    include "../backend/config.php";
    include "../componentes/funcoes.php";
    include "../classes/imovel.php";
    $conn = startConnection();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (
            isset($_POST['id'])
            && isset($_POST['logradouro'])
            && isset($_POST['numero'])
            && isset($_POST['cidade'])
            && isset($_POST['estado'])
            && isset($_POST['quartos'])
            && isset($_POST['banheiros'])
            && isset($_POST['aluguel'])
            && isset($_POST['situacao'])
            && isset($_POST['imagem'])
        ) {
            $id = $_POST['id'];
            $logradouro = $_POST['logradouro'];
            $numero = $_POST['numero'];
            $complemento = $_POST['complemento'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $cep = $_POST['cep'];
            $quartos = $_POST['quartos'];
            $banheiros = $_POST['banheiros'];
            $aluguel = $_POST['aluguel'];
            $iptu = $_POST['iptu'];
            $agua = $_POST['agua'];
            $luz = $_POST['luz'];
            $situacao = $_POST['situacao'];
            $imagem = $_POST['imagem'];
            $imovel = new imovel($id, $imagem, $situacao, $quartos, $banheiros, $logradouro, $numero, $complemento, $cidade, $estado, $cep, $luz, $agua, $iptu, $aluguel);
            $insert = $imovel->insert_property($conn);
            if ($insert) {
                display_success_message();
            } else {
                display_error_message();
            }
        }
    }

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
    imprimirTelaCadastro($conn, 'IMOVEIS');
    ?>

    <!-- <?php
    include "../componentes/footer.php";
    ?> -->


</body>

</html>