create database db_pessoa;
use db_pessoa;
drop database db_pessoa;
create table tb_dados(
id int not null,
nome varchar(50),
profissao varchar(50),
nascimento date,
sexo char(1),
peso float (4,2),
altura float (3,2),
nacionalidade varchar(50)
);

insert into tb_dados (id, Nome, Profissao, Nascimento, Sexo, Peso, Altura, Nacionalidade) values
('1','Ana Silva', 'Médica', '1985-05-12', 'F', 68.00, 1.65, 'Brasileira'),
('2','John Smith', 'Engenheiro', '1990-03-22', 'M', 80.00, 1.80, 'Americano'),
('3','Fatima Khan', 'Professora', '1980-07-08', 'F', 55.00, 1.60, 'Paquistanesa'),
('4','Hiroshi Tanaka', 'Designer Gráfico', '1992-11-15', 'M', 70.00, 1.75, 'Japonês'),
('5','Maria Gonzalez', 'Advogada', '1988-09-25', 'F', 62.00, 1.70, 'Espanhola'),
('6','David Brown', 'Cientista', '1986-02-03', 'M', 85.00, 1.82, 'Britânico'),
('7','Aisha Malik', 'Arquiteta', '1995-06-20', 'F', 60.00, 1.68, 'Canadense'),
('8','Marco Rossi', 'Chef', '1982-01-30', 'M', 75.00, 1.78, 'Italiano'),
('9','Li Wei', 'Programador', '1994-04-18', 'M', 72.00, 1.73, 'Chinês'),
('10','Sarah Johnson', 'Psicóloga', '1987-08-05', 'F', 58.00, 1.65, 'Americana'),
('11','Ahmed Al-Farsi', 'Médico', '1991-10-10', 'M', 82.00, 1.80, 'Emiradense'),
('12','Lara Nascimento', 'Jornalista', '1993-12-14', 'F', 54.00, 1.62, 'Brasileira'),
('13','Peter Müller', 'Engenheiro Civil', '1980-09-27', 'M', 90.00, 1.85, 'Alemão'),
('14','Ines Martins', 'Farmacêutica', '1992-03-11', 'F', 58.00, 1.70, 'Portuguesa'),
('15','Rafael Mendes', 'Fotógrafo', '1985-07-29', 'M', 76.00, 1.76, 'Brasileiro'),
('16','Elena Petrova', 'Física', '1989-05-02', 'F', 62.00, 1.72, 'Russa'),
('17','Kwame Nkrumah', 'Economista', '1983-01-19', 'M', 78.00, 1.80, 'Ganense'),
('18','Sofia Ali', 'Designer de Moda', '1991-09-07', 'F', 56.00, 1.65, 'Egípcia'),
('19','Liam O\'Connor', 'Ator', '1988-02-23', 'M', 82.00, 1.77, 'Irlandês'),
('20','Noor Al-Sayed', 'Advogada', '1994-06-09', 'F', 63.00, 1.69, 'Saudita'),
('21','Carlos Mendoza', 'Engenheiro Ambiental', '1986-12-17', 'M', 85.00, 1.83, 'Mexicano'),
('22','Yuki Nakamura', 'Profissional de TI', '1993-04-30', 'F', 50.00, 1.57, 'Japonês'),
('23','Amara Diallo', 'Enfermeira', '1985-08-26', 'F', 72.00, 1.75, 'Senegalesa'),
('24','Daniel Green', 'Biólogo', '1990-01-12', 'M', 76.00, 1.78, 'Canadense'),
('25','Patricia Durand', 'Escritora', '1981-11-04', 'F', 58.00, 1.65, 'Francesa'),
('26','Julio Vargas', 'Carpinteiro', '1984-09-19', 'M', 90.00, 1.82, 'Argentino'),
('27','Mia Chen', 'Enfermeira', '1992-03-25', 'F', 55.00, 1.60, 'Chinesa'),
('28','Ivan Ivanov', 'Tradutor', '1987-10-30', 'M', 70.00, 1.74, 'Russo'),
('29','Sophie Wang', 'Engenheira de Software', '1995-02-14', 'F', 62.00, 1.68, 'Canadense'),
('30','Adil Khan', 'Gerente de Projetos', '1988-11-22', 'M', 77.00, 1.80, 'Paquistanês'),
('31','Natalia Gómez', 'Estilista', '1990-06-03', 'F', 55.00, 1.63, 'Colombiana'),
(32, 'Luca Bianchi', 'Engenheiro Mecânico', '1990-04-05', 'M', 83.00, 1.80, 'Italiano'),
(33, 'Ava Thompson', 'Arquiteta', '1989-07-12', 'F', 65.00, 1.70, 'Britânica'),
(34, 'Omar El-Sayed', 'Cientista da Computação', '1986-11-22', 'M', 78.00, 1.75, 'Egípcio'),
(35, 'Fatoumata Diallo', 'Enfermeira', '1994-03-15', 'F', 60.00, 1.68, 'Maliano'),
(36, 'Isabella Martinez', 'Designer de Interiores', '1992-05-30', 'F', 54.00, 1.62, 'Mexicana'),
(37, 'Lucas Nguyen', 'Médico', '1984-01-10', 'M', 75.00, 1.78, 'Vietnamita'),
(38, 'Chloe Smith', 'Bióloga', '1988-09-08', 'F', 62.00, 1.65, 'Americana'),
(39, 'Santiago Pérez', 'Professor', '1993-12-17', 'M', 80.00, 1.82, 'Colombiano'),
(40, 'Nina Müller', 'Psicóloga', '1991-02-14', 'F', 59.00, 1.64, 'Alemã'),
(41, 'Abdul Rahman', 'Engenheiro Civil', '1987-06-20', 'M', 88.00, 1.85, 'Saudita'),
(42, 'Elena Markova', 'Artista', '1990-08-11', 'F', 57.00, 1.63, 'Russa'),
(43, 'Dylan Carter', 'Ator', '1995-03-05', 'M', 76.00, 1.80, 'Britânico'),
(44, 'Maya Patel', 'Advogada', '1986-11-29', 'F', 64.00, 1.67, 'Indiana'),
(45, 'Jorge Santos', 'Chef', '1992-07-18', 'M', 82.00, 1.75, 'Portuguesa'),
(46, 'Hannah Kim', 'Designer Gráfico', '1991-09-25', 'F', 58.00, 1.70, 'Sul-Coreana'),
(47, 'Emilio Reyes', 'Tradutor', '1988-04-12', 'M', 74.00, 1.76, 'Chileno'),
(48, 'Amina Souleiman', 'Médica', '1989-10-19', 'F', 68.00, 1.65, 'Tunisiana'),
(49, 'Kai Wang', 'Programador', '1994-02-28', 'M', 72.00, 1.70, 'Chinês'),
(50, 'Julia Novak', 'Engenheira de Software', '1990-12-03', 'F', 61.00, 1.66, 'Polonesa');

select * from tb_dados;

select * from tb_dados where sexo="F";
select * from tb_dados where sexo="M";

select * from tb_dados where nacionalidade="Brasileiro";
select * from tb_dados where nacionalidade="Brasileira";

select * from tb_dados where profissao="programador";

