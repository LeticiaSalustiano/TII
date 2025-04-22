<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validando o login
    $usuario = $_POST['usuario'];  // Atualizado de 'adm' para 'usuario'
    $senha = $_POST['senha'];

    // Verifique as credenciais (aqui você deve verificar com os dados no banco)
    if ($usuario == 'leticiasalustiano07@gmail.com' && $senha == '0000') {
        $_SESSION['logado'] = true;
        header("Location: painel.php");
        exit;  // Não se esqueça de chamar exit após o redirecionamento de header para parar a execução do script
    } else {
        echo 'Usuário ou senha inválidos.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./imagens/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./cadastro.css">
    <title>Login</title>
</head>
<body>

<nav class="menu">
    <a href="./paginainicial.html"><img src="./imagens/Logo.png" alt="Logo"></a>
    <button><a href="./cadastro.html">Voltar</a></button>
</nav>

<div class="titulo">
    <h1>Olá adm!</h1>
    <h2>Bem-vindo(a) de volta</h2>
    <p>faça seu login para ficar por dentro de tudo o que acontece por aqui</p>
</div>

<form action="login.php" method="POST">
    <div class="info">
        <input type="email" name="usuario" placeholder="Usuário" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Login</button>
    </div>
</form>

</body>
</html>


<style>

form{
    margin-top:-65px;
    align-items: center;
}

/*-------Titulo-------*/
.titulo {
    width: 94%;
    height: 30vh;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    font-family: "Roboto Flex";
    color: 0 4px 8px rgba(22, 22, 22, 0.568);
    margin: 50px;
}

.titulo h1 {
    color: var(--blue);
    font-size: 50px;
}

.titulo h2 {
    font-size: 30px;
}

.titulo p {
    font-size: 20px;
    color: gray;
}

input{
    margin-top: 7px;
    margin-left: 40%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
    width: 20%;
    display: flex;
}

input:focus {
    border-color: var(--blue);
    box-shadow: 0 0 5px rgba(22, 160, 133, 0.5);
}

button{
    width: 9%;
    max-width: 200%;
    height: 45px;
    background-color: var(--blue);
    color: var(--white);
    font-size: 18px;
    font-family: "Roboto Flex", sans-serif;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: 51%;
    margin-top: 20px;
}

a{
    text-decoration: none;
    color: var(--white)
}

button:hover {
    background-color: var(--dark-blue);
    transform: translateY(-3px);
}

button:active {
    background-color: var(--light-blue);
    transform: translateY(1px);
}

       </style>
