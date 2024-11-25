<?php
require '../Classes/Contato.class.php';
$contato = new Contato();

?>
<body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
<header>
   <h3><i class = "bi bi-person-square">Medico</i></h3>
</header>
   
<div>
   <a class="btn btn-outline-secondary mb-2" href="?menuop=cad-contato"><i class="bi bi-person-plus-fill"></i>Novo Medico</a>
</div>
<div>
   <br>
   <form action="index.php?menuop=contatos" method="post">
      <input  type="text" name="txt_pesquisa" value="Pesquisa">
      <button class="btn btn-outline-success btn-sm" type="submit"><i class="bi bi-search"></i>Pesquisar</button>

   </form>
   <br>
</div>
<div class="tabela">
<table class="table table-dark table-striped table-bordered table-sm">
   <thead class="thead-dark">

      <tr>
         <th> <i class="bi bi-star-fill"></i></th>
         <th scope="col">id</th>
         <th scope="col">Nome</th>
         <th scope="col">Email</th>
         <th scope="col">Telefone</th>
         <th scope="col">Endereço</th>
         <th scope="col">CRM</th>
         <th scope="col">Editar</th>
         <th scope="col">Excluir</th>
      </tr>
   </thead>
   <tbody>
   <?php
      
      $quantidade = 10;
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$inicio = ($quantidade * $pagina) - $quantidade;

$txt_pesquisa = isset($_POST['txt_pesquisa']) ? $_POST['txt_pesquisa'] : "";

// Inicializa a variável favorito

$favorito = isset($_GET['flagFavoritoContato']) ? (int)$_GET['flagFavoritoContato'] : null;

if (isset($_GET['idContato'], $_GET['flagFavoritoContato'])) {
    $id = (int)$_GET['idContato'];
    $flag = (int)$_GET['flagFavoritoContato'];
    $contato->atualizarFavorito($id, $flag);
}

$dados = $contato->tabelaContatos($txt_pesquisa, $inicio, $quantidade, $favorito);

foreach ($dados as $dado) {
    $isFavorito = $dado["flagFavoritoContato"] == 1;
    ?>
        <td>
            <a href="#" name="flagFavoritoContato"
               class="flagFavoritoContato link-warning" 
               title="<?= $isFavorito ? 'Favorito' : 'Não Favorito'; ?>" 
               id="<?= $dado["idContato"]; ?>">
                <i class="bi <?= $isFavorito ? 'bi-star-fill' : 'bi-star'; ?>"></i>
            </a>
        </td>
    <?php
         ?>
         <td><?= $dado["idContato"] ?></td>
         <td><?= $dado["nomeContato"] ?></td>
         <td><?= $dado["emailContato"] ?></td>
         <td><?= $dado["telefoneContato"] ?></td>
         <td><?= $dado["enderecoContato"] ?></td>
         <td><?= $dado["crmContato"] ?></td>
         <td><a class="btn btn-outline-warning btn-sm" href="index.php?menuop=editar-contato&idContato=<?= $dado["idContato"] ?>"><i class="bi bi-pencil-square"></i></a></td>
         <td><a class="btn btn-outline-danger btn-sm"  href="index.php?menuop=excluir-contato&idContato=<?= $dado["idContato"] ?>"><i class="bi bi-trash"></i></a></td>
      </tr>
      <?php
      }
      ?>
   </tbody>
   </table>
</div>


   

      

<?php
// Exemplo de conexão usando PDO
$pdo = new PDO("mysql:host=localhost;dbname=VitaLife", "root", "");

// Define a consulta para obter o total de registros
$sqlTotal = "SELECT COUNT(idContato) as total FROM contatos";
$sql = $pdo->query($sqlTotal);
$result = $sql->fetch(PDO::FETCH_ASSOC);

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
