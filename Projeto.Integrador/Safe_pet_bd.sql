-- Use o banco de dados
USE usuarios_pet;

-- Criação da tabela usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    idade INT NOT NULL,
    telefone VARCHAR(11) NOT NULL,
    cpf VARCHAR(11) NOT NULL,
    email VARCHAR(100) NOT NULL,
    tipo_cadastro VARCHAR(50) NOT NULL, -- "usuario", "adm"
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(20)
);

drop table usuarios;

-- Selecionar todos os registros da tabela usuarios
SELECT * FROM usuarios;



