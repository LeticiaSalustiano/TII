<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "usuarios_pet";

// Conectar ao banco de dados
$Link = mysqli_connect($host, $user, $pass, $db);

// Verificar a conexão
if ($Link->connect_error) {
    die("Falha na conexão: " . $Link->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = mysqli_real_escape_string($Link, $_POST['nome']);
    $data_nascimento = mysqli_real_escape_string($Link, $_POST['idade']);
    $telefone = mysqli_real_escape_string($Link, $_POST['telefone']);
    $cpf = mysqli_real_escape_string($Link, $_POST['cpf']);
    $email = mysqli_real_escape_string($Link, $_POST['email']);
    $tipo_cadastro = mysqli_real_escape_string($Link, isset($_POST['tipoCadastro']) ? $_POST['tipoCadastro'] : '');
    
    // Verificar se o CPF já está cadastrado
    $sql_verificar = "SELECT * FROM usuarios WHERE cpf = '$cpf'";
    $resultado = $Link->query($sql_verificar);

    if ($resultado->num_rows > 0) {
        // Caso o usuário já esteja cadastrado
        echo "<script>
                  alert('O usuário já está cadastrado!');
                  window.location.href = './paginainicial.html';
              </script>";
    } else {
        // Caso o CPF não esteja cadastrado, continuar com o processo de cadastro
        $status = 'pendente';
        $data_cadastro = date('Y-m-d | H:m:s');

        $sql_inserir = "INSERT INTO usuarios (nome, data_nascimento, telefone, cpf, email, data_cadastro, tipo_cadastro, status)
                        VALUES ('$nome', '$data_nascimento', '$telefone', '$cpf', '$email', '$data_cadastro', '$tipo_cadastro', '$status')";

        if ($Link->query($sql_inserir) === TRUE) {
            echo "<script>
                      alert('Cadastro realizado com sucesso!');
                      window.location.href = './paginainicial.html';
                  </script>";
        } else {
            echo "Erro: " . $sql_inserir . "<br>" . $Link->error;
        }
    }

    // Fechar a conexão
    $Link->close();
}
