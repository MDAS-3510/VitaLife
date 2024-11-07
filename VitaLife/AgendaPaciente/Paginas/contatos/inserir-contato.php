<header>
   <h3>Inserir Contato</h3>
</header>

<?php

// Obtendo os dados do formulário
$nomeContato = $_POST["nomeContato"];
$emailContato = $_POST["emailContato"];
$telefoneContato = $_POST["telefoneContato"];
$enderecoContato = $_POST["enderecoContato"];
$crmContato = $_POST["crmContato"];

// Inclui o arquivo de conexão com PDO
   include ("db/conexao.php");

   try {
      // Prepara a consulta SQL para inserção
      $sql = "INSERT INTO agendapaciente (nomeContato, emailContato, telefoneContato, enderecoContato, crmContato)
               VALUES (:nomeContato, :emailContato, :telefoneContato, :enderecoContato, :crmContato)";
      
      // Prepara a consulta
      $sql = $pdo->prepare($sql);
      
      // Vincula os parâmetros de forma segura
      $sql->bindValue(':nomeContato', $nomeContato, PDO::PARAM_STR);
      $sql->bindValue(':emailContato', $emailContato, PDO::PARAM_STR);
      $sql->bindValue(':telefoneContato', $telefoneContato, PDO::PARAM_STR);
      $sql->bindValue(':enderecoContato', $enderecoContato, PDO::PARAM_STR);
      $sql->bindValue(':crmContato', $crmContato, PDO::PARAM_STR);
      
      // Executa a consulta
      if ($sql->execute()) {
         echo "O registro foi inserido com sucesso";
      } else {
         echo "Erro ao inserir o registro.";
      }
   } catch (PDOException $e) {
      echo "Erro ao executar a consulta: " . $e->getMessage();
   }
   ?>

