<header>
   <h3>Atualizar Contato</h3>
</header>


<?php
// Obtendo os dados do formulário
$idContato = $_POST["idContato"];
$nomeContato = $_POST["nomeContato"];
$emailContato = $_POST["emailContato"];
$telefoneContato = $_POST["telefoneContato"];
$enderecoContato = $_POST["enderecoContato"];
$crmContato = $_POST["crmContato"];

// Inclui o arquivo de conexão
   include 'db/conexao.php';

   try {
      // Prepara a consulta com parâmetros nomeados para evitar injeção de SQL
      $sql = "UPDATE agendapaciente SET
         nomeContato = :nc,
         emailContato = :ec,
         telefoneContato = :tc,
         enderecoContato = :enc,
         crmContato = :crmc
         WHERE idContato = :i";

      // Prepara a consulta
      $sql = $pdo->prepare($sql);

      // Vincula os valores usando bindValue
      $sql->bindValue(':nc', $nomeContato, PDO::PARAM_STR);
      $sql->bindValue(':ec', $emailContato, PDO::PARAM_STR);
      $sql->bindValue(':tc', $telefoneContato, PDO::PARAM_STR);
      $sql->bindValue(':enc', $enderecoContato, PDO::PARAM_STR);
      $sql->bindValue(':crmc', $crmContato, PDO::PARAM_STR);
      $sql->bindValue(':i', $idContato, PDO::PARAM_INT);

      // Executa a consulta
      if ($sql->execute()) {
         echo "O registro foi atualizado com sucesso";
      } else {
         echo "Erro ao atualizar o registro.";
      }
   } catch (PDOException $e) {
      echo "Erro ao executar a consulta: " . $e->getMessage();
   }
   ?>
