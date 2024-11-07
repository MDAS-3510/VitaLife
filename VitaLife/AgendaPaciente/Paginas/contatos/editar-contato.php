<?php
include("db/config.php"); // Inclui o arquivo de configuração com a conexão PDO

   $idContato = $_GET["idContato"] ?? null;

   if ($idContato) {
      // Prepara a consulta para buscar o contato pelo ID
      $sql = "SELECT * FROM agendapaciente WHERE idContato = :idContato";
      $sql = $pdo->prepare($sql);
      $sql->bindParam(':idContato', $idContato, PDO::PARAM_INT);

      try {
         $sql->execute();
         $dados = $sql->fetch(PDO::FETCH_ASSOC); // Obtém o resultado

         if ($dados) {
               // Os dados foram encontrados e estão prontos para exibição
         } else {
               echo "Nenhum contato encontrado com esse ID.";
               $dados = null;
         }
      } catch (PDOException $e) {
         echo "Erro ao recuperar os dados: " . $e->getMessage();
      }
   } else {
      echo "ID do contato não foi informado.";
      $dados = null;
   }
   ?>




<header>
   <h3>
      Editar Contato
   </h3>
</header>

<div>
   <form action="index.php?menuop=atualizar-contato" method="post">
      
      <div>
         <label for="idContato">ID</label>
         <input type="text" name="idContato" value="<?= $dados["idContato"]?>">
      </div>

      <div>
         <label for="nomeContato">Nome</label>
         <input type="text" name="nomeContato" value="<?= $dados["nomeContato"]?>">
      </div>
      
      <div>
         <label for="emailContato">Email</label>
         <input type="email" name="emailContato" value="<?= $dados["emailContato"]?>">
      </div>
      
      <div>
         <label for="telefoneContato">Telefone</label>
         <input type="text" name="telefoneContato"  value="<?= $dados["telefoneContato"]?>">
      </div>
      
      <div>
         <label for="crmContato">CRM</label>
         <input type="number" name="crmContato" value="<?= $dados["crmContato"]?>">
      </div>

      <div>
         <label for="enderecoContato">Endereço</label>
         <input type="text" name="enderecoContato" value="<?= $dados["enderecoContato"]?>">
      </div>

      <div>
         <input type="submit" value="Atualizar" name="btn-atualizar">
      </div>

   </form>
</div>