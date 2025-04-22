CREATE DATABASE db_Carros;

-- Tabela de carros:
CREATE TABLE Carros (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Marca VARCHAR(50) NOT NULL,
    Modelo VARCHAR(50) NOT NULL,
    Ano INT NOT NULL,
    Preco DECIMAL(10, 2)
);

-- Tabela de clientes:
CREATE TABLE Clientes (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(100) NOT NULL
);

-- Tabela de telefone:
CREATE TABLE Tel (
    Telefone VARCHAR(15),
    ClienteId INT NOT NULL,
    FOREIGN KEY (ClienteId) REFERENCES Clientes(ID)
);

-- Tabela de vendedores:
CREATE TABLE Vendedores (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(100) NOT NULL
);

-- Tabela de vendas:
CREATE TABLE Vendas (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    CarroID INT,
    ClienteID INT,
    VendedorID INT,
    FOREIGN KEY (CarroID) REFERENCES Carros(ID),
    FOREIGN KEY (ClienteID) REFERENCES Clientes(ID),
    FOREIGN KEY (VendedorID) REFERENCES Vendedores(ID)
);

-- INSERTS:

INSERT INTO Carros (Marca, Modelo, Ano, Preco) VALUES
('Toyota', 'Corolla', 2024, 85000.00),
('Honda', 'Civic', 2018, 90000.00),
('Ford', '1', 2022, 300000.00),
('Chevrolet', 'Onix', 2016, 45000.00),
('Hyundai', 'HB20', 2020, 80000),
('Volkswagen', 'Gol', 2021, 72000),
('Nissan', 'Kicks', 2022, 95000),
('Fiat', 'Argo', 2019, 65000),
('Renault', 'Kwid', 2021, 60000),
('Jeep', 'Compass', 2023, 180000),
('Kia', 'Seltos', 2022, 120000),
('Subaru', 'Crosstrek', 2023, 160000);

INSERT INTO Clientes (Nome) VALUES
('Luciana Alcântara'),
('Gabriel Brito'),
('Laura Farias'),
('João Xavier'),
('Natan Brito'),
('Yara Silva'),
('Sofia Maria'),
('Carlos Benite'),
('Bernardo Nunes');

INSERT INTO Tel (Telefone, ClienteId) VALUES
('13 99683-5322', 1),
('11 99584-9369', 2),
('13 99583-6714', 3),
('13 99586-6334', 3),
('11 99782-9322', 4),
('13 99897-5714', 5),
('11 99512-9867', 6),
('13 99513-1614', 7),
('11 99566-8926', 8),
('11 99437-9712', 9),
('11 99685-6445', 2);

INSERT INTO Vendedores (Nome) VALUES
('Mariana Barbosa'),
('Rosa Maria'),
('Mario Antonio'),
('Kauã Cezar'),
('Paula Tranjam'),
('Roberta Ratzke'),
('Silvio Santos'),
('Pedro Pascal'),
('Priscila Santos');

-- Exemplo de inserção na tabela Vendas:
INSERT INTO Vendas (CarroID, ClienteID, VendedorID) VALUES
(1, 1, 1),  -- Exemplo: Cliente 1 comprou o carro 1 vendido pelo vendedor 1
(2, 2, 2), 
(3, 3, 3),  
(4, 4, 4), 
(5, 5, 5), 
(6, 6, 6),
(7, 7, 7), 
(8, 8, 8), 
(9, 9, 9);

-- Selects:
 
-- seleciona os carros abaixo de um determinado ano:
select * from Carros where ano<=2020;
select * from Carros where ano in(2018,2021);
select * from Carros where ano between 2018 and 2021;

-- seleciona os carros e clientes que compraram esses carros:
SELECT c.Nome AS Cliente, car.Marca, car.Modelo, car.Ano, car.preco
FROM Carros car
JOIN Vendas v ON car.ID = v.CarroID
JOIN Clientes c ON v.ClienteID = c.ID;

-- seleciona os vendedores e os carros vendidos:
SELECT v.Nome AS Vendedor, car.Marca, car.Modelo, car.Ano, car.Preco
FROM Vendedores v
JOIN Vendas vd ON v.ID = vd.VendedorID
JOIN Carros car ON vd.CarroID = car.ID;

-- seleciona os clientes e telefones:
SELECT cl.Nome AS Cliente, cl.ID, t.Telefone
FROM Tel t
JOIN Clientes cl ON t.ClienteId = cl.ID;

