<?php
require ('../Classes/Evento.class.php');
$contato = new Evento();
if (isset($_GET['idEventos'])) {
   $id = $_GET['idEventos'];
   $contato -> deletarEventos($id);
}
header("location: index.php?menuop=eventos");
?>