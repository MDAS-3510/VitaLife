
CREATE DATABASE VitaLife ;
use VitaLife;
CREATE TABLE pacientes(
   id int primary key auto_increment,
   nome varchar (100),
   senha varchar (32),
   cpf varchar (14),
   email varchar(100),
   data_nasc date

);

CREATE TABLE medicos(
   id int primary key auto_increment,
   nome varchar (100),
   senha varchar (32),
   crm varchar (6),
   email varchar(100)
);

CREATE TABLE gestores(
   id int primary key auto_increment,
   nome varchar (100),
   senha varchar (32),
   crm varchar (6),
   email varchar(100)
);


CREATE TABLE `contatos` (
   `idContato` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
   `nomeContato` varchar(200) NOT NULL,
   `emailContato` varchar(100) NOT NULL,
   `telefoneContato` varchar(50) NOT NULL,
   `enderecoContato` varchar(200) NOT NULL,
   `crmContato` varchar(6) NOT NULL,
   `flagFavoritoContato` tinyint(1) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


   CREATE TABLE `agendamedico` (
   `idContato` int(11) NOT NULL,
   `nomeContato` varchar(200) NOT NULL,
   `emailContato` varchar(100) NOT NULL,
   `telefoneContato` varchar(50) NOT NULL,
   `enderecoContato` varchar(200) NOT NULL,
   `flagFavoritoContato` tinyint(1) 
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE agendamento(
   idAgenda int primary key auto_increment,
   
   idMedico int,
   idPaciente int,
   dia dateTime,
   especialidade varchar(51),
   compareceu varchar(1)
)

CREATE TABLE Exame(
   idExame int primary key auto_increment,

   idMedico int,
   idPaciente int,
   dia dateTime,
   tipo_exame varchar(70),
   compareceu varchar(1)
)


CREATE TABLE Tarefas (
   idTarefas int primary key auto_increment,
   titulo varchar(255),
   descricao text,
   dataConclusao date,
   horaConclusao time,
   dataLembrete date,
   horaLembrete time,
   recorrencia int,
   verificacao tinyint
)