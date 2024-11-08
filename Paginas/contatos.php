<header>
   <h3>Medicos</h3>
</header>

<div>
   <a href="index.php?menuop=cad-contato">Novo Medico</a>
</div>
<div>
   <br>
   <form action="index.php?menuop=contatos" method="post">
      <input type="text" name="txt_pesquisa">
      <input type="submit" value="pesquisar">
   </form>
   <br>
</div>
<?php
require '../Classes/Contato.class.php';
$contato = new Contato();

?>

<table border="1">
<div class="container text-center">
   <div class="row row-cols-4">
      <div class="col">ID</div>
      <div class="col">Nome</div>
      <div class="col">Email</div>
      <div class="col">Endereço</div>
      <div class="col">CRM</div>
      <div class="col">Editar</div>
      <div class="col">Excluir</div>
   </div>
   </div>


   <thead>
      <tr>
         <th>ID</th>
         <th>Nome</th>
         <th>Email</th>
         <th>Telefone</th>
         <th>Endereço</th>
         <th>CRM</th>
         <th>Editar</th>
         <th>Excluir</th>
      </tr>
   </thead>

   <tbody>
      <?php
      // Definindo valores para paginação
      $quantidade = 10;
      $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
      $inicio = ($quantidade * $pagina) - $quantidade;

      // Verifica o termo de pesquisa
      $txt_pesquisa = isset($_POST['txt_pesquisa']) ? $_POST['txt_pesquisa'] : "";
      $dados = $contato->tabelaContatos($txt_pesquisa, $inicio, $pagina, $quantidade);

      // Loop para exibir os resultados
      foreach($dados as $dado){
         ?>
         <tr>
            <td><?= $dado["idContato"] ?></td>
            <td><?= $dado["nomeContato"] ?></td>
            <td><?= $dado["emailContato"] ?></td>
            <td><?= $dado["telefoneContato"] ?></td>
            <td><?= $dado["enderecoContato"] ?></td>
            <td><?= $dado["crmContato"] ?></td>
            <td><a href="index.php?menuop=editar-contato&idContato=<?= $dado["idContato"] ?>">Editar</a></td>
            <td><a href="index.php?menuop=excluir-contato&idContato=<?= $dado["idContato"] ?>">Excluir</a></td>
         </tr>
         <?php
      }
      ?>
   </tbody>
</table>
<br>

