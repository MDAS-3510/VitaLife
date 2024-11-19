


<h3><i class="bi bi-person-square"></i> Cadastro de Contato</h3>
</header>
<div>
   <form class="needs-validation" action="index.php?menuop=cad-contato" method="post" novalidate>
      <div class="mb-3">
         <label class="form-label" for="nomeContato">Nome</label>
         <div class="input-group">
               <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
               <input class="form-control" type="text" name="nomeContato" required>
               <div class="valid-feedback">
                  Está correto.
               </div>
               <div class="invalid-feedback">
                  Campo obrigatório de no máximo 255 caracteres 
               </div>
         </div>
      </div>
      <div class="mb-3">
         <label class="form-label" for="emailContato">E-Mail</label>
         <div class="input-group">
               <span class="input-group-text">@</span>
               <input class="form-control" type="email" name="emailContato" required>
         </div>

      </div>
      <div class="mb-3">
         <label class="form-label" for="telefoneContato">Telefone</label>
         <div class="input-group">
               <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
               <input class="form-control" type="text" name="telefoneContato" required>
         </div>
      </div>
      <div class="mb-3">
         <label class="form-label" for="enderecoContato">Endereço</label>
         <div class="input-group">
               <span class="input-group-text"><i class="bi bi-mailbox2"></i></span>
               <input class="form-control" type="text" name="enderecoContato" required>
         </div>
      </div>

      <div class="mb-3">
         <label class="form-label" for="crmContato">CRM</label>
         <div class="input-group">
               <span class="input-group-text"><i class="bi bi-mailbox2"></i></span>
               <input class="form-control" type="text" name="crmContato" required>
         </div>
      </div>
      
      <div class="mb-3">
         <input class="btn btn-success" type="submit" value="Adicionar" name="btnAdicionar">
      </div>
   </form>
</div>
<?php


if ( isset($_POST['nomeContato'] ) ){
   require '../Classes/Contato.class.php';
   $c = new Contato();

   $contato  = $_POST['nomeContato'];
   $email    = $_POST['emailContato'];
   $tel      = $_POST['telefoneContato'];
   $endereco = $_POST['enderecoContato'];
   $crm      = $_POST['crmContato'];
   
   
   $c->inserirContato( $contato, $email, $tel, $endereco, $crm );


}
?>

