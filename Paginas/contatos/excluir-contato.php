<?php
require ('../Classes/Contato.class.php');
$contato = new Contato();
if (isset($_GET['idContato'])) {
   $idContato = $_GET['idContato'];
   $contato -> deletarContato($idContato);

}
?>