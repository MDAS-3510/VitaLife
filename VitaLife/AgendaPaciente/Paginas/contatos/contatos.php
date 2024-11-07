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

<table border="1">
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

      // Consulta com parâmetros para evitar SQL Injection
      $sql = "SELECT idContato,
                     UPPER(nomeContato) AS nomeContato,
                     LOWER(emailContato) AS emailContato,
                     telefoneContato,
                     UPPER(enderecoContato) AS enderecoContato,
                     crmContato
         FROM agendapaciente 
         WHERE idContato = :txt_pesquisa OR nomeContato LIKE :nomeContato
         ORDER BY nomeContato ASC
         LIMIT :inicio, :quantidade";

      $sql = $pdo->prepare($sql);
      $sql->bindValue(':txt_pesquisa', $txt_pesquisa, PDO::PARAM_INT);
      $sql->bindValue(':nomeContato', "%$txt_pesquisa%", PDO::PARAM_STR);
      $sql->bindValue(':inicio', $inicio, PDO::PARAM_INT);
      $sql->bindValue(':quantidade', $quantidade, PDO::PARAM_INT);
      $sql->execute();

      // Loop para exibir os resultados
      while ($dados = $sql->fetch(PDO::FETCH_ASSOC)) {
      ?>
         <tr>
            <td><?= $dados["idContato"] ?></td>
            <td><?= $dados["nomeContato"] ?></td>
            <td><?= $dados["emailContato"] ?></td>
            <td><?= $dados["telefoneContato"] ?></td>
            <td><?= $dados["enderecoContato"] ?></td>
            <td><?= $dados["crmContato"] ?></td>
            <td><a href="index.php?menuop=editar-contato&idContato=<?= $dados["idContato"] ?>">Editar</a></td>
            <td><a href="index.php?menuop=excluir-contato&idContato=<?= $dados["idContato"] ?>">Excluir</a></td>
         </tr>
      <?php
      }
      ?>
   </tbody>
</table>
<br>

<?php
// Consulta para total de registros
$sqlTotal = "SELECT COUNT(idContato) AS total FROM agendapaciente";
$stmtTotal = $pdo->query($sqlTotal);
$numTotal = $stmtTotal->fetch(PDO::FETCH_ASSOC)['total'];
$totalpg = ceil($numTotal / $quantidade);
echo "Total de registros: $numTotal <br>";
echo '<a href="?menuop=contatos&pagina=1">Primeira Pagina</a> ';

// Botão "<<" para página anterior
if ($pagina > 6) {
   ?>
      <a href="?menuop=contatos&pagina=<?php echo $pagina - 1; ?>"> << </a>
   <?php
}

for ($i = 1; $i <= $totalpg; $i++) {
   if ($i >= ($pagina - 5) && $i <= ($pagina + 5)) {
      if ($i == $pagina) {
         echo $i;
      } else {
         echo " <a href=\"?menuop=contatos&pagina=$i\">$i</a>";
      }
   }
}

if ($pagina < ($totalpg - 5)) {
   ?>
      <a href="?menuop=contatos&pagina=<?php echo $pagina + 1; ?>"> >> </a>
   <?php
}

echo "<a href=\"?menuop=contatos&pagina=$totalpg\"> Última Página </a>";
?>
