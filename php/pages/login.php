
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="../../images/logo/logo.svg">

    <?php
    include '../componentes/funcoes.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['botao-login'])) {
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];
            // $usuario = "reinaldo";
            // $senha = "1234";
            $conn = startConnection();
            
            $_SESSION["usuario"] = $usuario;
            $_SESSION['senha'] = $senha;
            verificarUsuario($conn, $usuario, $senha);
        }
    }
    ?>
</head>

<body>
    <div class="login">
        <div class="card">
            <a href="../pages/inicio.php"><img src="../../images/logo/logo.svg" alt=""></a>
            <div class="dados">
                <form action="" method="POST">
                    <div class='entrada'>
                        <p>Usuário</p>
                        <input type="text" name="usuario" placeholder="Digite seu usuário"  required>
                    </div>
                    <div class='entrada'>
                        <p>Senha</p>
                        <input type="password" name="senha" placeholder="Digite sua senha" required>
                    </div>
            </div>
            <input class="button" type="submit" value="Login" name="botao-login"></button>
            </form>
        </div>
    </div>
    <?php
    include "../componentes/footer.php";
    ?>
</body>

</html>