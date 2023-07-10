<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="../../images/logo/logo.svg">

    <title>Contato</title>
</head>

<body>
    <?php
    include "../componentes/header.php";
    ?>

    <section>
        <div class="banner">
            <p>Deseja <strong>entrar em contato</strong>? Preencha o formulário abaixo e enviaremos uma mensagem.</p>
            <img src="../../images/banner/form.jpg" alt="">
        </div>
    </section>
    <section>
        <div class='contato'>
            <form class='busca-imovel' action="" method='post' class='contato-form'>
                <input type="text" placeholder="Seu nome">
                <input type="text" placeholder="Seu telefone">
                <input type="textarea" placeholder='Qual imóvel está interessado?'>
                <input type="submit" class="button">
            </form>
        </div>
    </section>

    <?php
    include "../componentes/footer.php";
    ?>
</body>

</html>