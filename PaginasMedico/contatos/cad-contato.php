<body style="background-color: white;">
   <script src="/js/validation.js"></script>
</body>




</header>
<style>
   .btn-custom {
      background-color: #2198A9;
      /* Cor de fundo */
      color: white;
      /* Cor do texto */
      border: none;
      /* Remover borda */
   }

   .btn-custom:hover {
      background-color: #1a7a8f;
      /* Cor de fundo ao passar o mouse */
      color: white;
      /* Cor do texto ao passar o mouse */
   }
</style>

<div class="container" style="background-color: white;
border-radius: 6px; box-shadow: 2px 2px 2px rgba(0,0,0,.2); padding: 12px; margin-top: 50px; margin-bottom: 20px;">
   <div >
      <form class="needs-validation" action="index.php?menuop=cad-contato" method="post" novalidate>
         <div  class="mb-3">
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
               <span class="input-group-text"><i class="">⚕</i></span>
               <input class="form-control" type="text" name="crmContato" required>
               <div class="invalid-feedback">
                  Apenas 6 Numeros
               </div>
            </div>
         </div>

         <div class="mb-3">
            <input class="btn btn-custom"  type="submit" value="Adicionar" name="btnAdicionar">
         </div>
      </form>
   </div>
</div>
<?php


if (isset($_POST['nomeContato'])) {
   require '../Classes/Contato2.class.php';
   $c = new Contato();

   $contato  = $_POST['nomeContato'];
   $email    = $_POST['emailContato'];
   $tel      = $_POST['telefoneContato'];
   $endereco = $_POST['enderecoContato'];
   $crm      = $_POST['crmContato'];


   if ($c->inserirContato($contato, $email, $tel, $endereco, $crm)){

}
}
?>