select * from tb_produtos;
select sum(valor) from tb_produtos; -- soma
select count(*) from tb_produtos;
select count(valor) from tb_produtos; -- contar
select avg(valor) from tb_produtos; -- média
select min(valor) from tb_produtos; -- menor valor
select max(valor) from tb_produtos; -- maior valor
select length(produto) from tb_produtos;-- quantidade de letras
select upper(produto) from tb_produtos;
select lower(produto) from tb_produtos;
select * from tb_clientes;
select concat(nome," ",idade) from tb_clientes;
select * from tb_pedidos;
select now();
select date(data_hora) from tb_pedidos;
select year(data_hora) from tb_pedidos;
select month(data_hora) from tb_pedidos;
select monthname(data_hora) from tb_pedidos;
select abs(-10);
select round(avg(valor), 2) from tb_produtos;
select ceil(avg(valor)) from tb_produtos;
select floor(avg(valor)) from tb_produtos;