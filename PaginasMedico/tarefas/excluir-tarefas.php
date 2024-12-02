<?php
require('../Classes/Tarefas2.class.php');
$contato = new Tarefa();
if (isset($_GET['idTarefas'])) {
   $id = $_GET['idTarefas'];
   $contato->deletarTarefa($id);
   header("location: index.php?menuop=tarefas");
}
