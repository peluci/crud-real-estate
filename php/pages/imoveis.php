<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../..//style.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="../../images/logo/logo.svg">

    <title>Imoveis</title>
    <?php
    include "../componentes/funcoes.php";
    $query = "SELECT * FROM IMOVEIS";
    $conn = startConnection();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['busca-imovel'])) {
            $busca = '%'.$_POST['busca-imovel'].'%';
            $query = "SELECT * FROM IMOVEIS where logradouro like '$busca' or cidade like '$busca' or estado like '$busca'";
        } else {
            $result = mysqli_query($conn, $query);
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach ($rows as $row) {
                if (isset($_POST["ver-{$row['id']}"])) {
                    $id = $row['id'];
                    header("Location: ./visualizar_imovel.php?id=$id");
                }
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
        <div class='busca-imovel'>
            <form action="./inicio.php" method='post'>
                <input name='busca-imovel' type="text" placeholder="Digite um endereço">
            </form>
        </div>
    </section>


    <?php
    $conn = startConnection();
    imprimeCardsPequenos($conn, $query);
    ?>


    <?php
    include "../componentes/footer.php";
    ?>
</body>

</html>