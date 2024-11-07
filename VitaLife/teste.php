<?php
include "Classes/Paciente.class.php";

$paciente = new Paciente();
$paciente ->cadastrarPaciente("Matheus@gmail" ,"senha", "111111111", "2024-09-23", "Matheus");
