
CREATE DATABASE VitaLife if EXISTS;
use VitaLife;
CREATE TABLE pacientes(
   id int primary key auto_increment,
   nome varchar (100),
   senha varchar (32),
   cpf varchar (14),
   email varchar(100),
   data_nasc date

)

CREATE DATABASE VitaLife if EXISTS;
use VitaLife;
CREATE TABLE medicos(
   id int primary key auto_increment,
   nome varchar (100),
   senha varchar (32),
   crm varchar (6),
   email varchar(100),

)

CREATE DATABASE VitaLife if EXISTS;
use VitaLife;
CREATE TABLE gestores(
   id int primary key auto_increment,
   nome varchar (100),
   senha varchar (32),
   crm varchar (6),
   email varchar(100),

)


--Tabela agendaPaciente

CREATE TABLE `agendapaciente` (
   `idContato` int(11) NOT NULL,
   `nomeContato` varchar(200) NOT NULL,
   `emailContato` varchar(100) NOT NULL,
   `telefoneContato` varchar(50) NOT NULL,
   `enderecoContato` varchar(200) NOT NULL,
   `crmContato` varchar(6) NOT NULL,
   `flagFavoritoContato` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `agendapaciente`
  ADD PRIMARY KEY (`idContato`);

  ALTER TABLE `agendapaciente`
  MODIFY `idContato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;



SELECT idContato,
upper(nomeContato) AS nomeContato,
lower(emailContato) as emailContato,
telefoneContato,
upper(enderecoContato) AS enderecoContato,
crmContato
FROM agendapaciente

--------------------------------------------------------------------
--Tabela agendaMedico

CREATE TABLE `agendamedico` (
  `idContato` int(11) NOT NULL,
  `nomeContato` varchar(200) NOT NULL,
  `emailContato` varchar(100) NOT NULL,
  `telefoneContato` varchar(50) NOT NULL,
  `enderecoContato` varchar(200) NOT NULL,
  `flagFavoritoContato` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

SELECT idContato,
upper(nomeContato) AS nomeContato,
lower(emailContato) as emailContato,
telefoneContato,
upper(enderecoContato) AS enderecoContato
FROM agendapaciente






-----------------------------------------------------------------