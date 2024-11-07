<header>
   <h3>Adicionar de contato</h3>
</header>

<div>
   <form action="index.php?menuop=inserir-contato" method="post">
      
      <div>
         <label for="nomeContato">Nome</label>
         <input type="text" name="nomeContato">
      </div>
      
      <div>
         <label for="emailContato">Email</label>
         <input type="email" name="emailContato">
      </div>
      
      <div>
         <label for="telefoneContato">Telefone</label>
         <input type="text" name="telefoneContato">
      </div>
      
      <div>
         <label for="crmContato">CRM</label>
         <input type="number" name="crmContato">
      </div>

      <div>
         <label for="enderecoContato">Endereço</label>
         <input type="text" name="enderecoContato">
      </div>

      <div>
         <input type="submit" value="Adicionar" name="btn-adicionar">
      </div>

   </form>
</div>