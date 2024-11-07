USE VitaLife;
CREATE TABLE agendaMedico(
   id int PRIMARY KEY AUTO_INCREMENT,
   idPaciente int ,
   data_consulta DATETIME,
   especialidade varchar(100)

)