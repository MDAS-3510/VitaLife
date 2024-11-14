<header>
   <h3>Adicionar de contato</h3>
   <style>
      label{
         display:block;
      }
   </style>
</header>


<div>
   <form method="post" >
      
      <div>
         <label for="nomeContato">Nome</label>
         <input type="text" name="nomeContato" required>
      </div>
      
      <div>
         <label for="emailContato">Email</label>
         <input type="email" name="emailContato" required>
      </div>
      
      <div>
         <label for="telefoneContato">Telefone</label>
         <input type="text" name="telefoneContato" required>
      </div>
      
      <div>
         <label for="crmContato">CRM</label>
         <input type="number" name="crmContato" required>
      </div>

      <div>
         <label for="enderecoContato">Endereço</label>
         <input type="text" name="enderecoContato" required>
      </div>

      <div>
         <input type="submit" value="Adicionar" name="btn-adicionar">
      </div>

   </form>
</div>

<?php


if ( isset($_POST['nomeContato'] ) ){
   require '../classes/Contato.class.php';
   $c = new Contato();

   $contato  = $_POST['nomeContato'];
   $email    = $_POST['emailContato'];
   $tel      = $_POST['telefoneContato'];
   $crm      = $_POST['crmContato'];
   $endereco = $_POST['enderecoContato'];
   
   $c->inserirContato( $contato, $email, $tel, $endereco, $crm );


}


