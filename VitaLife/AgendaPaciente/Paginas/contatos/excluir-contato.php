<header>
   <h3>Excluir Contato</h3>
</header>

<?php 
// Obtém o ID do contato de forma segura
$idContato = $_GET['idContato'];

// Inclui o arquivo de conexão
include 'db/conexao.php';

try {
   // Prepara a consulta SQL para exclusão
   $sql = "DELETE FROM agendapaciente WHERE idContato = :idContato";
   $sql = $pdo->prepare($sql);
   
   // Vincula o valor do ID ao parâmetro :idContato
   $sql->bindValue(':idContato', $idContato, PDO::PARAM_INT);
   
   // Executa a consulta
   if ($sql->execute()) {
      echo "Registro excluído com sucesso";
   } else {
      echo "Erro ao excluir o registro.";
   }
} catch (PDOException $e) {
   echo "Erro ao executar a exclusão: " . $e->getMessage();
}
?>
