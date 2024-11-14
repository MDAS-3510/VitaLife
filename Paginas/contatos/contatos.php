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

<?php
// Exemplo de conexão usando PDO
$pdo = new PDO("mysql:host=localhost;dbname=VitaLife", "root", "");

// Define a consulta para obter o total de registros
$sqlTotal = "SELECT COUNT(idContato) as total FROM contatos";
$stmt = $pdo->query($sqlTotal);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Número total de registros
$numTotal = $result['total'];

// Define o total de páginas
$totalPagina = ceil($numTotal / $quantidade);

// Exibe o total de registros
echo "Total de registros: " . $numTotal . "";

// Link para a primeira página
echo '<a href="?menuop=contatos&pagina=1">Primeira Pagina</a>';

// Exibe o link para a página anterior, se houver
if($pagina > 6){
   echo '<a href="?menuop=contatos&pagina=' . ($pagina - 1) . '"><<</a>';
}

// Gera a lista de links de paginação
for($i = 1; $i <= $totalPagina; $i++){
   if($i >= ($pagina - 5) && $i <= ($pagina + 5)){
      if($i == $pagina){
         echo "<span>$i</span>";
      } else {
         echo "<a href=\"?menuop=contatos&pagina={$i}\"> {$i} </a>";
      }
   }
}

// Exibe o link para a próxima página, se houver
if($pagina < $totalPagina - 5){
   echo '<a href="?menuop=contatos&pagina=' . ($pagina + 1) . '">>></a>';
}

// Link para a última página
echo "<a href=\"?menuop=contatos&pagina=$totalPagina\">Ultima Pagina</a>";
?>
