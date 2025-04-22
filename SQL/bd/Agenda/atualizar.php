<?php
require 'conexao.php'; // Conectar ao banco de dados

// Verifica se o parâmetro 'id' foi passado na URL
if (isset($_GET['id'])) {
    $id_contato = mysqli_real_escape_string($Link, $_GET['id']);

    // Consulta para obter os dados do contato, e-mails e telefones
    $query = "SELECT c.id, c.nome, e.email, t.telefone 
              FROM tb_contatos c
              LEFT JOIN tb_emails e ON c.id = e.id_contato
              LEFT JOIN tb_telefones t ON c.id = t.id_contato
              WHERE c.id = $id_contato";

    $result = mysqli_query($Link, $query);

    // Verifica se o contato foi encontrado
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Contato não encontrado.";
        exit();
    }
} else {
    echo "ID do contato não informado.";
    exit();
}

// Verifica se o formulário foi enviado para atualizar o contato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário e previne SQL Injection
    $nome = mysqli_real_escape_string($Link, $_POST['nome']);
    $email = mysqli_real_escape_string($Link, $_POST['email']);
    $telefone = mysqli_real_escape_string($Link, $_POST['telefone']);

    // Atualiza os dados do contato na tabela tb_contatos
    $query_contato = "UPDATE tb_contatos SET nome = '$nome' WHERE id = $id_contato";
    mysqli_query($Link, $query_contato);

    // Atualiza o e-mail na tabela tb_emails
    $query_email = "UPDATE tb_emails SET email = '$email' WHERE id_contato = $id_contato";
    mysqli_query($Link, $query_email);

    // Atualiza o telefone na tabela tb_telefones
    $query_telefone = "UPDATE tb_telefones SET telefone = '$telefone' WHERE id_contato = $id_contato";
    mysqli_query($Link, $query_telefone);

    // Redireciona para a página principal após a atualização
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contato</title>
</head>
<body>

<nav class="menu">
    <h1>Editar Contato</h1>
    <button><a href="index.php">Voltar</a></button>
</nav>

<form action="atualizar.php?id=<?php echo $id_contato; ?>" method="post">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" value="<?php echo htmlspecialchars($row['nome']); ?>">

    <label for="email">E-mail:</label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>">

    <label for="telefone">Telefone:</label>
    <input type="tel" name="telefone" value="<?php echo htmlspecialchars($row['telefone']); ?>">

    <button class="btn" type="submit">Atualizar</button>
</form>

</body>
</html>

<style>

.menu {
    background-color: gray;
    display: flex;
}

.menu h1 {
    font-family: Arial, Helvetica, sans-serif;
    color: aliceblue;
    font-size: 38px;
    padding: 7px;
    margin-left: 5%;
}

.menu button {
    background-color: gray;
    font-size: 15px;
    height: 50px;
    width: 10%;
    border-radius: 5px;
    margin-left: 54%;
    margin-top: 2%;
}

a {
    text-decoration: none;
    color: aliceblue;
}

.menu button:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}


form {
    font-family: Arial, Helvetica, sans-serif;
    display: grid;
    margin-top: 6%;
    margin-left: 28%;
}

label {
    margin-top: 2%;
    font-size: 25px;
}

input {
    width: 60%;
    height: 30px;
    margin-top: 1%;
    font-size: 17px;
    background-color: rgb(255, 255, 255);
}

.btn {
    font-size: 15px;
    width: 10%;
    height: 40px;
    margin-left: 50%;
    margin-top: 5%;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}

.btn:hover {
    border-color: rgb(0, 0, 0);
    background-color: gray;
    color: aliceblue;
}

</style>

