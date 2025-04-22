<?php
 // echo '<pre>';
  //print_r($_POST);
 // echo '</pre>';

 require "conexao.php";

// Selecionar o banco de dados
mysqli_select_db($Link, 'Agenda');

// Tabela de contatos (contém informações principais)
mysqli_query($Link, "CREATE TABLE IF NOT EXISTS tb_contatos(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL
)");

// Tabela de telefones (relacionada à tabela de contatos)
mysqli_query($Link, "CREATE TABLE IF NOT EXISTS tb_telefones(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_contato INT,
    telefone VARCHAR(50) NOT NULL,
    FOREIGN KEY (id_contato) REFERENCES tb_contatos(id) ON DELETE CASCADE
)");

// Tabela de e-mails (relacionada à tabela de contatos)
mysqli_query($Link, "CREATE TABLE IF NOT EXISTS tb_emails(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_contato INT,
    email VARCHAR(50) NOT NULL,
    FOREIGN KEY (id_contato) REFERENCES tb_contatos(id) ON DELETE CASCADE
)");

// Variável para armazenar a busca
$nome_busca = "";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['nome'])) {
    // Captura o nome do contato a ser buscado e previne SQL Injection
    $nome_busca = mysqli_real_escape_string($Link, $_POST['nome']);

    // Consulta para buscar os contatos pelo nome
    $query = "SELECT c.id, c.nome, GROUP_CONCAT(e.email) AS emails, GROUP_CONCAT(t.telefone) AS telefones
              FROM tb_contatos c
              LEFT JOIN tb_emails e ON c.id = e.id_contato
              LEFT JOIN tb_telefones t ON c.id = t.id_contato
              WHERE c.nome LIKE '%$nome_busca%'
              GROUP BY c.id";
} else {
    // Caso não haja pesquisa, exibe todos os contatos
    $query = "SELECT c.id, c.nome, GROUP_CONCAT(e.email) AS emails, GROUP_CONCAT(t.telefone) AS telefones
              FROM tb_contatos c
              LEFT JOIN tb_emails e ON c.id = e.id_contato
              LEFT JOIN tb_telefones t ON c.id = t.id_contato
              GROUP BY c.id";
}

// Executa a consulta
$result = mysqli_query($Link, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatos</title>
</head>
<body>

<nav class="menu">
    <h1>Agenda de Contatos</h1>
    <button><a href="adicionar.php">Adicionar Contato</a></button>
</nav>

<form action="index.php" method="post">
    <header>
        <h2>Buscar Contato</h2>
        <div class="pesquisa">
            <!-- Campo para digitar o nome -->
            <input type="text" name="nome" placeholder="Digite o nome do contato" required>
            <button class="btn" type="submit">Buscar</button>
        </div>
    </header>
</form>

<h2>Lista de Contatos</h2>

<!-- Exibe a tabela com os resultados -->
<table border="1">
    <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php

       // Exibe os resultados da busca ou todos os contatos
       while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
        echo "<td>" . htmlspecialchars($row['emails']) . "</td>";
        echo "<td>" . htmlspecialchars($row['telefones']) . "</td>";
        echo '<td><button class="excluir"><a class="a1" href="excluir.php?acao=excluir&id='.$row['id'].'">Excluir</a></button> 
        <button class="editar"><a class="a1" href="atualizar.php?id='.$row['id'].'">Editar</a></button></td>';
        echo '</tr>';
    }
    ?>
    
    </tbody>
</table>
</body>
</html>



<style>

    .menu{
        background-color: gray;
        display: flex;
    }
    
    .menu h1{
        font-family: Arial, Helvetica, sans-serif;
        color: aliceblue;
        font-size: 38px;
        padding: 7px;
        margin-left: 5%;
    }

    .menu button{
        background-color: gray; 
        font-size: 15px;
        height: 50px;
        width: 10%;
        border-radius: 5px;
        margin-left: 50%;
        margin-top: 2%;
    }

    a{
        text-decoration: none;
        color: aliceblue;
        
    }

    .menu button:hover{
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    }

    h2{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 30px;
        margin-left: 10%;
        margin-top: 5%;
}

    input{
        width: 60%;
        height: 30px;
        margin-left: 10%;
        margin-top: 1%;
        font-size: 17px;
        background-color: rgb(255, 255, 255);
    }

    .btn{
        width: 5%;
        height: 37px;
        margin-left: 1%;
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    }

    .btn:hover{
        background-color: rgb(207, 207, 207);
        border-radius: 5%;
    }

    table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 3%;
}

th, td {
    padding: 12px;
    text-align: left;
    font-family: Arial, Helvetica, sans-serif;
    border: 1px solid #dddddd;
    font-size: 18px;
}

th {
    background-color: white;
}

td {
    color: black;
}

td:hover {
    background-color: #999898;
    color: white;
}

.excluir{
    width: 50px;
    height: 25px;
    padding: 3px;
}

.editar{
    width: 50px;
    height: 25px;
    padding: 3px;
}

.a1{
    text-decoration: none;
    color: black;
}

.a1:hover{
    color: white;
}

.excluir:hover{
    background-color: #999898;
}

.editar:hover{
    background-color: #999898;
}


</style>