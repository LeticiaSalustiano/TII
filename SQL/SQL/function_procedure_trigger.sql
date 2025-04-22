create database db_dados2;

-- FUNCTIONS
create table Pedidos (
PedidoID INT PRIMARY KEY,
Quantidade INT,
PrecoUnitario DECIMAL(10,2)
);

DELIMITER //

CREATE FUNCTION CalcularValorTotalPedido (ID INT)
RETURNS DECIMAL(10,2)
NOT DETERMINISTIC
BEGIN
   DECLARE ValorTotal DECIMAL(10,2);
   
   SELECT SUM(Quantidade * PrecoUnitario) INTO ValorTotal
   FROM Pedidos
   WHERE PedidoID = ID;
   
   RETURN INFULL (ValorTotal, 0);
END;
//

DELIMITER ;

SELECT * FROM Pedidos;

INSERT INTO Pedidos (PedidoID, Quantidade, PrecoUnitario) VALUES (1, 5, 20.00);
INSERT INTO Pedidos (PedidoID, Quantidade, PrecoUnitario) VALUES (2, 3, 15.00);

UPDATE Pedidos SET Quantidade = 6 WHERE PedidoID = 1;

SELECT db_dados2.CalcularValorTotalPedido(1) AS ValorTotal;


-- PROCEDURE
CREATE TABLE Funcionários (
FuncionarioID INT PRIMARY KEY,
Nome VARCHAR (100),
Salario DECIMAL (10,2)
);

insert into Funcionários (FuncionarioID, Nome, Salario) values 
(1, 'João', '150'),
(2, 'Maria', '200');

select * from Funcionários;

DELIMITER $$

  CREATE PROCEDURE  AumentaSalario(
  IN FuncionarioID INT,
  IN PercentualAumento DECIMAL(5,2)
)
BEGIN

  UPDATE Funcionarios
  SET Salario = Salario + (salario * PercentualAumento / 100)
  WHERE FuncionarioID = FuncionarioID;
END $$

DELIMITER ;

CALL AumenteSalario(1,10);

SET SQL_SAFE_UPDATES = 0;

CALL AumentaSalario(1, 10.5);

SET SQL_SAFE_UPDATES = 1;


-- TRIGGER
CREATE TABLE Produtos (
ProdutoID INT PRIMARY KEY,
Nome VARCHAR(100),
Estoque int
);

CREATE TABLE Vendas (
VendaID INT PRIMARY KEY,
ProdutoID INT,
Quantidade INT,
foreign key (ProdutoID) references Produtos(ProdutoID)
);

insert into Produtos (ProdutoID, Nome, Estoque) values (1, 'Produto A', 100);
insert into Produtos (ProdutoID, Nome, Estoque) values (2, 'Produto B', 200);

insert into Vendas (VendaID, ProdutoID, Quantidade) values (1, 1, 10);
select * from vendas;
select * from produtos;
truncate vendas;

DELIMITER $$
CREATE TRIGGER AtualizaEstoque
AFTER INSERT ON vendas
FOR EACH ROW
begin
   update Produtos
   SET Estoque = Estoque - new.Quantidade
   where ProdutoID = NEW.ProdutoID;
   
end $$
DELIMITER ;


