<?php

require "conexao.php";

//UPDATE
if($_GET && $_GET['acao']="atualizar"){
    $id = $_GET['id'];
    $resultado = mysqli_query($Link,'SELECT * FROM tb_info WHERE ID ='.$id);
    while($dados = mysqli_fetch_assoc($resultado)){
        $id= $dados['id'];
        $servico= $dados['servico'];
        $login= $dados['login'];
        $senha= $dados['senha'];
    }
}

if($_POST){
    $id= $_POST['id'];
    $servico= $_POST['servico'];
    $login= $_POST['login'];
    $senha= $_POST['senha'];

    mysqli_query($Link, "UPDATE tb_info SET servico = '$servico', LOGIN = '$login', senha = '$senha' WHERE id =".$id);
    header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senha</title>
</head>
<body>
<h1>Atualizar</h1>
<br><hr><br>
<form method="post" action="atualizar.php">
                <label for="id"><h3>Id:</h3></label>
                <input type="text" name="id" placeholder="id" value="<?php echo $id; ?>" required>  

                <label for="servico"><h3>Serviços:</h3></label>
                <input type="text" name="servico" placeholder="Serviços" value="<?php echo $servico; ?>" required>
                       
                <label for="email"><h3>Email:</h3></label>
                <input type="text" name="login" placeholder="E-mail" value="<?php echo $servico; ?>" required>

                <label for="senha"><h3>Senha:</h3></label>
                <input type="text" name="senha" placeholder="Senha" value="<?php echo $servico; ?>" required>
                
                <button type="submit">Atualizar</button>
        </form>
        <br><hr><br>
        