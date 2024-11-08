   <?php
   require "../Classes/Contato.class.php";
   $contato = new Contato();

   $idContato = $_GET['idContato'];
   $dados = $contato->localizarContato($idContato);

   if( empty($dados) ){
      echo "Nenhum contato encontrado";
   }
   if( isset( $_POST['nomeContato'])){
      $id    = $_POST['idContato'];
      $nome  = $_POST['nomeContato'];
      $email = $_POST['emailContato'];
      $tel   = $_POST['telefoneContato'];
      $end   = $_POST['enderecoContato'];
      $crm   = $_POST['crmContato'];

      $contato-> alterarContato($id, $nome, $email, $tel, $crm, $end);
      header("location:contatos.php");

   }
   ?>
   <div>
      <style>
         label{
               display:block;
         }
      </style>

      <form action="" method="post">
         
         <div>
            <label for="idContato">ID</label>
            <input type="hidden" name="idContato" value="<?= $dados["idContato"]?> >">
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
            <input type="number" name="crmContato" width="6" value="<?= $dados["crmContato"]?>">
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