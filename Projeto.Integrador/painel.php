<?php
session_start();
include('cadastrar.php'); // Incluir a conexão com o banco de dados

// Verificar se o usuário está logado como administrador
if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}

// Consultar todas as solicitações, não apenas as pendentes
$sql = "SELECT * FROM usuarios ORDER BY data_cadastro DESC";
$result = $Link->query($sql);

// Verificar se há resultados
$usuarios = [];
if ($result->num_rows > 0) {
    // Armazenar os resultados na variável $usuarios
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
}

// Aprovar ou Rejeitar a solicitação
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $action = $_GET['action'];

    if ($action == 'aprovar') {
        $updateSql = "UPDATE usuarios SET status = 'aprovado' WHERE id = $id";
    } elseif ($action == 'rejeitar') {
        $updateSql = "UPDATE usuarios SET status = 'rejeitado' WHERE id = $id";
    }

    if ($Link->query($updateSql) === TRUE) {
        header("Location: painel.php");
        exit;
    } else {
        echo "Erro ao atualizar status: " . $Link->error;
    }
}

$Link->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="cadastro.css">
    <title>Solicitações</title>
</head>
<body>

<nav class="menu">
    <!--<a href="./paginainicial.html"><img src="./imagens/Logo.png" alt="Logo"></a>-->
    <button><a href="./login.php">Voltar</a></button>
</nav>

<div class="titulo">
    <h1>Painel de Administrador</h1>
    <h2>Solicitações Pendentes</h2>
</div>

<table class="tabela">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Tipo de Cadastro</th>
            <th>Data de Registro</th>>
            <th>Status</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($usuarios)): ?>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= htmlspecialchars($usuario['nome']) ?></td>
                    <td><?= htmlspecialchars($usuario['data_nascimento']) ?></td>
                    <td><?= htmlspecialchars($usuario['telefone']) ?></td>
                    <td><?= htmlspecialchars($usuario['email']) ?></td>
                    <td><?= htmlspecialchars($usuario['tipo_cadastro']) ?></td>
                    <td><?= htmlspecialchars($usuario['data_cadastro']) ?></td>
                    <td><?= htmlspecialchars($usuario['status']) ?></td>
                    <td>
                       <button class="aprovar"><a href="?action=aprovar&id=<?= $usuario['id'] ?>" onclick="return confirm('Tem certeza que deseja aprovar?')">Aprovar</a></button> 
                       <button class="rejeitar"><a href="?action=rejeitar&id=<?= $usuario['id'] ?>" onclick="return confirm('Tem certeza que deseja rejeitar?')">Rejeitar</a></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8">Nenhuma solicitação pendente.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<div class="banner2">
        <h1>Desenvolvido por <span id="font">LDGL</span></h1>
        <div class="redes">
            <a href="https://pt-br.facebook.com/"><i class='bx bxl-facebook'></i></a>
            <a href="https://www.instagram.com/"><i class='bx bxl-instagram'></i></a>
            <a href="https://web.whatsapp.com/"><i class='bx bxl-whatsapp'></i></a>
        </div>
    </div>

</body>
</html>

<style>

@charset "UTF-8";
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto+Flex:opsz,wght@8..144,100..1000&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Yantramanav:wght@100;300;400;500;700;900&display=swap');
 
@font-face {
    font-family: "zen kaku gothic new light";
    src: url(../fontes/zen-kaku-gothic-new-light.ttf) format("truetype");
}

@font-face {
    font-family: "quantum";
    src: url(../fontes/Quantum.otf) format("truetype");
}

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    width: auto;
    height: auto;
}


.titulo {
    width: 100%;
    height: 40vh;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    font-family: "Roboto Flex";
}

.titulo h1 {
    color: var(--blue);
    font-size: 50px;
}

.titulo h2 {
    font-size: 30px;
}

/* Estilo da tabela */
.tabela {
    width: 70%;  
    border: 1px solid #ccc;
    border-radius: 15px;
    box-shadow: 0 4px 8px #16161691;
    margin-top: -5%;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    padding: 20px;
    background-color: var(--light-blue); 
    font-family: "Roboto Flex";
}


th, td {
    margin-top: 6px;
    border-radius: 5px;
    padding: 12px;  
    border: 1px solid #2c2c2c9f;  
    text-align: center;  
    
}


th {
    height: 10px;
    width: 20%;
    background-color: #ffffffa1; 
    color: black: bold;  
}


td {
    font-size: 15px; 
}

button{
    border-radius: 5px;
    width: 70px;
    height: 25px;
    margin-left: 2px;
}

a{
    text-decoration: none;
    color: black;
}

.aprovar{
    background-color: #04a004cb;
    margin: 5px;
}

.aprovar:hover{
    background-color: #04be04a9;
}

.rejeitar{
    background-color: #f03939;
}

.rejeitar:hover{
    background-color: #f14f4f;
}

/*-------Banner2-------*/
.banner2{
    width: 100%;
    height: 10vh;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: var(--blue);
    color: var(--white);
    margin-top: 150px;
    font-family: "Zen Kaku Gothic New";
    font-weight: 400;
    gap: 10px;
    padding: 0 20px;
}
 
/*-------Fonte-------*/
#font{
    font-family: 'quantum';
}
 
/*---Redes---*/
.redes{
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
}
 
.redes a{
    text-decoration: none;
    color: var(--white);
}
 
.redes i{
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: var(--dark-blue);
    border-radius: 50%;
    font-size: 1.7rem;
    cursor: pointer;
    transition-duration: 0.5s;
}
 
.redes i:hover{
    color: var(--blue);
}
 
</style>