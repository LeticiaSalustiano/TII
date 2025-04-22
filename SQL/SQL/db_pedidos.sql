CREATE DATABASE db_pedidos;
DROP DATABASE db_pedidos;

CREATE TABLE clientes (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

INSERT INTO clientes (id_cliente, nome) VALUES
(1, 'Marcia'),
(2, 'Jonas'),
(3, 'Chico');

SELECT * FROM clientes;

CREATE TABLE produtos (
    id_produto INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    quantidade INT NOT NULL
);

INSERT INTO produtos (id_produto, nome, preco, quantidade) VALUES
(1, 'Chá Matte', 5.25, 100),
(2, 'Chocolate Quente', 7.25, 190),
(3, 'Água', 4.25, 300),
(4, 'Água com Gás', 5.25, 270),
(5, 'Sucos Naturais', 10.25, 210),
(6, 'Café Expresso', 4.25, 220),
(7, 'Café c Leite', 4.00, 200),
(8, 'Cappucino', 5.00, 270),
(9, 'Café robusta', 6.25,100),
(10, 'Café tradicional', 4.00, 270);

SELECT * FROM produtos;


CREATE TABLE pedidos (
    id_pedido INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    data_pedido DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente)
);

INSERT INTO pedidos (id_pedido, id_cliente, data_pedido) VALUES
(1, 1 ),
(2, 1 ),
(3, 2 ),
(4, 2 ),
(5, 2 ),
(6, 3 );

SELECT * FROM pedidos;

CREATE TABLE itens_pedido (
    id_item INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido INT,
    id_produto INT,
    quantidade INT,
    preco_unitario DECIMAL(10, 2),
    FOREIGN KEY (id_pedido) REFERENCES pedidos(id_pedido),
    FOREIGN KEY (id_produto) REFERENCES produtos(id_produto)
);
