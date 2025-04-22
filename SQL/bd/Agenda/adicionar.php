<?php
require 'conexao.php'; // Conectar ao banco de dados

// Verifique a conexão
if (!$Link) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber dados do formulário
    $nome = mysqli_real_escape_string($Link, $_POST['nome']);
    $email = mysqli_real_escape_string($Link, $_POST['email']);
    $telefone = mysqli_real_escape_string($Link, $_POST["telefone"]);

    // Insira o contato na tabela de contatos 
    $query_contato = "INSERT INTO tb_contatos (nome) VALUES ('$nome')";
    if (mysqli_query($Link, $query_contato)) {
        // Obter o ID do contato recém-inserido
        $id_contato = mysqli_insert_id($Link);

        // Insere o e-mail do contato
        $query_email = "INSERT INTO tb_emails (id_contato, email) VALUES ($id_contato, '$email')";
        mysqli_query($Link, $query_email);

        // Insere o telefone do contato
        $query_telefone = "INSERT INTO tb_telefones (id_contato, telefone) VALUES ($id_contato, '$telefone')";
        mysqli_query($Link, $query_telefone);

        echo "Contato adicionado com sucesso!";
    } else {
        echo "Erro ao adicionar contato: " . mysqli_error($Link);
    }
}

// Fechar a conexão
mysqli_close($Link);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar</title>
</head>
<body>

<nav class="menu">
    <h1>Adicionar Contato</h1>
    <button><a href="./index.php">Voltar</a></button>
</nav>

<!-- Formulário para adicionar o contato -->
<form method="POST" action="adicionar.php">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" placeholder="Nome" required>

    <label for="email">E-mail:</label>
    <input type="email" name="email" placeholder="E-mail" required>

    <label for="phone">Telefone:</label>
    <input type="tel" name="phone" placeholder="Telefone" required>

    <button class="btn" type="submit">Adicionar</button>
</form>

</body>
</html>

<script>
    function addTelefone() {
        let divTelefones = document.getElementById("telefones");
        let novoCampo = document.createElement("input");
        novoCampo.setAttribute("type", "tel");
        novoCampo.setAttribute("name", "telefone[]");
        novoCampo.setAttribute("placeholder", "Telefone");
        divTelefones.appendChild(novoCampo);
    }
</script>

<style>

body{
    width: auto;;
    height: auto;
}

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
    margin-left: 50%;
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