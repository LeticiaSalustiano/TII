<?php
require 'conexao.php'; // Conectar ao banco de dados

// Verificar se o parâmetro 'id' foi passado na URL
if (isset($_GET['id'])) {
    $id_contato = mysqli_real_escape_string($Link, $_GET['id']);

    // Excluir os telefones relacionados ao contato
    $query_telefone = "DELETE FROM tb_telefones WHERE id_contato = $id_contato";
    mysqli_query($Link, $query_telefone);

    // Excluir os emails relacionados ao contato
    $query_email = "DELETE FROM tb_emails WHERE id_contato = $id_contato";
    mysqli_query($Link, $query_email);

    // Excluir o contato da tabela tb_contatos
    $query_contato = "DELETE FROM tb_contatos WHERE id = $id_contato";
    if (mysqli_query($Link, $query_contato)) {
        // Redireciona para a página principal após a exclusão
        header('Location: index.php');
        exit();
    } else {
        echo "Erro ao excluir o contato: " . mysqli_error($Link);
    }
} else {
    echo "ID do contato não informado.";
}
?>
