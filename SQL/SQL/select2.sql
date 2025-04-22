select * from tb_clientes left join tb_pedidos on (tb_clientes.id_cliente = tb_pedidos.id_cliente);
select * from tb_pedidos left join tb_clientes on (tb_clientes.id_cliente = tb_pedidos.id_cliente);

select * from tb_clientes right join tb_pedidos on (tb_clientes.id_cliente = tb_pedidos.id_cliente);






SELECT * FROM tb_produtos LEFT JOIN tb_imagens ON (tb_produtos.id_produto = tb_imagens.id_produto);




SELECT * FROM tb_clientes LEFT JOIN tb_pedidos ON (tb_clientes.id_cliente = tb_pedidos.id_cliente);
SELECT * FROM tb_produtos LEFT JOIN tb_imagens ON (tb_produtos.id_produto = tb_imagens.id_produto);

select * from tb_clientes inner join tb_pedidos on (tb_clientes.id_cliente = tb_pedidos.id_cliente);

