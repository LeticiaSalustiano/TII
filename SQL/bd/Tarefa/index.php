<?php
   //echo '<pre>';
   //print_r($_POST);
   //echo '</pre>';

  require "conexao.php";

   if($_POST){
    //captura das variáveis do POST
    $servico = $_POST['servico'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
  
    //CREATE
    //conecta os inputs com o banco
    mysqli_query($Link, "INSERT INTO tb_info (servico, login, senha) VALUES ('$servico', '$login', '$senha')");
    
    unset($_POST); //zera a variável
    header('Location: index.php'); //redireciona para evitar reenvio do formulário
    exit; //garante que o script não continue após o redirecionamento
    }

    //READ
    $resultado = mysqli_query($Link, 'SELECT * FROM tb_info');
    print_r($resultado);
 
   //DELETE
   if (isset($_GET['acao']) && $_GET['acao'] == 'excluir') {
    $id = intval($_GET['id']); // Obtem o ID da URL e o converte para inteiro
    mysqli_query($Link, "DELETE FROM tb_info WHERE id = $id"); // Executa a exclusão
    header('Location: index.php'); // Redireciona após a exclusão
    exit; // Garante que o script não continue após o redirecionamento
}



   //if($Link) {
   // echo 'Banco conectado';
   //}
 
    // Criar banco
   //mysqli_query($Link, 'CREATE DATABASE IF NOT EXISTS Ger_Senhas');
 
   // Criando Tabela
   //mysqli_query($Link, 'CREATE TABLE IF NOT EXISTS tb_info(
  // id int primary key auto_increment,
  // servico varchar(50) not null,
  // login varchar(50) not null,
   //senha varchar(50) not null
  // )');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senha</title>
</head>
<body>


<form method="post" action="index.php">
      <h1>Cadastre-se</h1>

                <label for="servico"><h3>Serviços:</h3></label>
                <input type="text" name="servico" placeholder="Serviços" required>        
                <label for="email"><h3>Email:</h3></label>
                <input type="text" name="login" placeholder="E-mail"  required>        
                <label for="senha"><h3>Senha:</h3></label>
                <input type="text" name="senha" placeholder="Senha"  required>
                <button type="submit">Cadastrar</button>
        </form>

        <br><hr><br>
  <table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Serviços</th>
            <th>E-mail</th>
            <th>Senha</th>
            <th>Gerenciar</th>
        </tr>
    </thead>

    <tbody>
        <?php
       
        while($dados = mysqli_fetch_assoc($resultado)){
        echo "<tr>";
            echo "<td>".$dados['id']."</td>";
            echo "<td>".$dados['servico']."</td>";
            echo "<td>".$dados['login']."</td>";
            echo "<td>".$dados['senha']."</td>";
            echo "<td><a href = 'index.php?acao=excluir&id=".$dados['id']."'><button>Excluir</button></a> 
            <a href = 'atualizar.php?id=".$dados['id']."'><button>Editar</button></a> </td>";
        echo"</tr>";
        }

        ?>
    </tbody>
  </table>

<br><hr><br>

</body>
</html>
    
    
<style>

*{
    width: auto;
    height: auto;
}

body{
    background-color: #a3a3a3;
}

h1{
    padding: 30px;
    font-family: Arial, Helvetica, sans-serif;
}

h3{
    font-size: 20px;
}

label{
    display: flex;
    font-size: 20px;
    font-family: Arial, Helvetica, sans-serif; 
    margin-left: 30px;
}

input{
    margin-left: 30px;
    width: 250px;
    height: 30px;
} 

form{
    width: 500px;
    height: 500px;
    margin: auto;
    margin-top: 1%;
    background-color: white;
    border-radius: 20px;
    box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.603);
}

table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    border-radius: 10%;
}

th, td {
    padding: 12px;
    text-align: left;
    font-family: Arial, Helvetica, sans-serif;
    border: 1px solid #dddddd;
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

tr:hover {
    background-color: #999898;
}

button {
    
    font-family: Arial, Helvetica, sans-serif; 
    margin-left: 7%;
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;   
}

button:hover {
    background-color: #2e98ee;
    color: white;
}

</style>

