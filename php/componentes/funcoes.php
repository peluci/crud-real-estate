<?php

include '../backend/config.php';

// Printing functions
function imprimeTabela($conn, $query)
{
    // Get the results of the query
    $result = mysqli_query($conn, $query);

    $fields = mysqli_fetch_fields($result);
    echo "<table>";
    echo "<tr>";
    foreach ($fields as $field) {
        echo "<th>$field->name </th>";
    }
    echo "</tr>";
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach ($rows as $row) {
        echo "<tr>";
        foreach ($fields as $field)
            printf("<td>%s</td>", $row[$field->name]);
        echo "</tr>";
    }
    echo "</table>";
}


function imprimeCards($conn, $query)
{
    // Get the results of the query
    $result = mysqli_query($conn, $query);
    $fields = mysqli_fetch_fields($result);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $fieldsName = array();
    foreach ($fields as $field)
        array_push($fieldsName, $field->name);
    echo "<table>";
    echo "<tr>"; foreach ($rows as $row) {
        echo "<td>
            <div class='card'>
                <img class='imovel-imagem' src='../../images/properties/{$row['imagem']}.jpg' alt=''>
                <div class='dados'>
                ";
        foreach ($fieldsName as $field) {
            if ($field != 'id')
                echo "<p><strong>$field:</strong> {$row[$field]}</p>";
        }
        echo "</div>
                <a href=''><button>Ver</button></a>
            </div>
        </td>";
    }
    echo "</tr>";
    echo "</table>";
}



function imprimeCardsPequenos($conn, $query)
{
    // Get the results of the query
    $result = mysqli_query($conn, $query);
    $fields = mysqli_fetch_fields($result);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if (sizeof($rows) == 0) {
        echo "<section>";
        echo "<div class='warning-msg'>
                <p>Sua busca não retornou nenhum resultado.</p>
             </div>
             ";
        echo "</section>";
        echo "<section><a href='./inicio.php'>Voltar</a></section>";
        exit();
    }
    $fieldsName = array();
    foreach ($fields as $field)
        array_push($fieldsName, $field->name);
    echo "<section>";
    echo "<div class='cards-pequenos'>";
    echo "<table>";
    $counter = 1; foreach ($rows as $row) {
        if ($counter == 1) {
            echo "<tr>";
        }
        echo "<td>
            <div class='card'>
                <img class='imovel-imagem' src='../../images/properties/{$row['imagem']}.jpg' alt=''>
                <div class='dados'>";
        echo "<p><strong>Endereço:</strong> {$row['logradouro']} {$row['numero']}, {$row['complemento']}</p>";
        echo "</div>
            <form method='post' action=''>
                <input class='button' type='submit' name='ver-{$row['id']}' value='Visualizar'>
            </form>
                </div>
        </td>";
        if ($counter == 3) {
            echo "</tr>";
            $counter = 0;
        }
        $counter++;
    }
    echo "</tr>";
    echo "</div>";

    echo "</table>";
    echo "</section>";

}


function imprimeTabelaGerenciar($conn, $query)
{
    // Get the results of the query
    $result = mysqli_query($conn, $query);
    $fields = mysqli_fetch_fields($result);

    echo "<section>";

    echo "<div class='tabela-gerenciar'><table> ";
    echo "<tr>";
    foreach ($fields as $field) {
        echo "<th>$field->name </th>";
    }
    echo "<th>Gerenciar</th>";
    echo "</tr>";

    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach ($rows as $row) {
        echo "<tr>";
        foreach ($fields as $field)
            printf("<td>%s</td>", $row[$field->name]);
        $botao_id = $row['id'];
        echo "<form action'' method='post'><td><input class='button' type=submit value=Editar name='editar-$botao_id'>";
        echo " ";
        echo "<input class='button' type=submit value=Excluir name='excluir-$botao_id'></td>";
        echo "</tr>";
    }
    echo "</table></div>";
    echo "</section>";
}

function imprimirTelaCadastro($conn, $tabela)
{
    // Get the results of the query
    $query = "SELECT * FROM $tabela";
    $result = mysqli_query($conn, $query);

    $fields = mysqli_fetch_fields($result);
    echo "<div class = 'tela-cadastro'>";
    echo "<div class = 'tela-cadastro-coluna'>";
    echo "<form action='' method='post'>";
    foreach ($fields as $field) {
        echo "<div class = 'celula'>";
        echo "";
        $input_type = "text";
        $input_min = "";
        $input_nullable = "";
        if ($field->type == 3) { // Number type in MySQL equals 3
            $input_type = "number";
            $input_min = "min=0";
        }
        if ($field->flags & 1) {
            $input_nullable = "required";
        }
        echo "<input $input_min name='$field->name' type=$input_type placeholder='$field->name' $input_nullable>";
        echo "</div>";
    }


    echo "</div>";
    echo "<input class='button' type = 'submit' value = 'Cadastrar Imóvel'>";
    echo "</form>";
    echo "</div>";
}

function adicionarCadastro($conn, $tabela)
{
    $query = "SELECT * FROM $tabela";
    $result = mysqli_query($conn, $query);

    $fields = mysqli_fetch_fields($result);
    $allFieldsArray = array();
    $requiredFieldsArray = array();

    foreach ($fields as $field) {
        array_push($allFieldsArray, $field->name);
        if ($field->flags & 1) {
            array_push($requiredFieldsArray, $field->name);
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        foreach ($requiredFieldsArray as $requiredField) {

            if (!isset($_POST[$requiredField])) {
                include "../componentes/footer.php";
                exit();
            }

        }

        $values = "(";
        $last_key = end($allFieldsArray);
        foreach ($allFieldsArray as $field) {
            if ($field != $last_key) {
                $values .= "'" . $_POST[$field] . "'" . ",";
            } else {
                $values .= "'" . $_POST[$field] . "'" . ")";
            }
        }

        $insertQuery = "INSERT INTO $tabela VALUES $values";
        mysqli_query($conn, $insertQuery);
        echo "<div class='sucesso-msg'>
                <i class='fa fa-check'></i>
                    <p>Cadastro bem sucedido.</p>
              </div>";
        // include "../pages/cadastro_imoveis.php";
    }
}

function excluirCadastro($conn, $tabela)
{
    $IDsArray = retornarId($conn, $tabela);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        foreach ($IDsArray as $ID) {
            if (isset($_POST['excluir-' . $ID])) {
                $deleteQuery = "DELETE FROM $tabela WHERE id = $ID";
                mysqli_query($conn, $deleteQuery);
            }
        }
    }
}

function editarCadastro($conn, $tabela)
{
    $IDsArray = retornarId($conn, $tabela);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        foreach ($IDsArray as $ID) {
            if (isset($_POST['editar-' . $ID])) {
                header("Location: ./editar_imovel.php?id=$ID");
            }


        }
    }
}


function retornarId($conn, $tabela)
{
    $query = "SELECT id FROM $tabela";
    $result = mysqli_query($conn, $query);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $IDsArray = array();
    foreach ($rows as $row) {
        array_push($IDsArray, $row['id']);
    }
    return $IDsArray;
}

function imprimeImovel($conn, $query)
{
    // Get the results of the query
    $result = mysqli_query($conn, $query);
    $fields = mysqli_fetch_fields($result);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $fieldsName = array();
    foreach ($fields as $field)
        array_push($fieldsName, $field->name);
    echo "<section><div class='imovel'>"; foreach ($rows as $row) {
        echo "
            <img class='imovel-imagem' src='../../images/properties/{$row['imagem']}.jpg' alt=''>
            <div class='dados'>
            ";
        foreach ($fieldsName as $field) {
            if ($field != 'id')
                echo "<p><strong>$field:</strong> {$row[$field]}</p>";
        }
        echo "</div>";
    }
    echo "</section>";
}
function imprimeImovelEditar($conn, $query)
{
    // Get the results of the query
    $result = mysqli_query($conn, $query);
    $fields = mysqli_fetch_fields($result);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $fieldsName = array();
    foreach ($fields as $field)
        array_push($fieldsName, $field->name);
    echo "<section><div class='imovel'>"; foreach ($rows as $row) {
        echo "
            <img class='imovel-imagem' src='../../images/properties/{$row['imagem']}.jpg' alt=''>
            <div class='dados'>
            <form action='' method='post'>";
        foreach ($fieldsName as $field) {
            if ($field != 'id')
                echo "<div class='campo'><p><strong>$field:</strong></p>
                <input name='editar-$field' value='{$row[$field]}'></div>";
        }
        echo "<section>
        <input type='submit' class='button' value='Editar'>
        </form>
        </section>";
        echo "</div>";
    }
    echo "</section>";
}


function verificarUsuario($conn, $usuario, $senha)
{
    $query = "SELECT * FROM USUARIOS where usuario='$usuario'";
    $result = mysqli_query($conn, $query);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if (sizeof($rows) == 0) {
        echo "<div class='erro-msg'>
                    <p>Usuário não encontrado.</p>
              </div>";
    } else {
        $query = "SELECT * FROM USUARIOS where usuario='$usuario' and senha='$senha'";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if (sizeof($rows) > 0) {
            header("Location: painel_de_controle.php");
        } else {
            echo "<div class='erro-msg'>
                    <p>Senha incorreta.</p>
              </div>";
        }
    }
}

?>