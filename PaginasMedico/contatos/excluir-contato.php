<?php
require ('../Classes/Contato2.class.php');
$contato = new Contato();
if (isset($_GET['idContato'])) {
   $idContato = $_GET['idContato'];
   $contato -> deletarContato($idContato);
   header("location: index.php?menuop=contatos");
}

?>