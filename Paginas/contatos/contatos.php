<?php
require '../Classes/Contato.class.php';
$contato = new Contato();

?>

<body>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

   <style>
      .custom-btn {
  border-color: #2198A9; 
  color: #2198A9; 
}

.custom-btn:hover {
  background-color: #2198A9;
  color: white;
}

.btn-outline-custom {
    color: #2198A9;
    border-color: #2198A9;
}

.btn-outline-custom:hover {
    background-color: #2198A9;
    color: white;
}
   </style>

</body>

<header >
   <h3><i class="bi bi-person-square">    Contatos</i></h3>
</header>

<div style="padding: 10px;">
   <a class="btn btn-outline-custom custom-btn mb-2" href="?menuop=cad-contato" ><i class="bi bi-person-plus-fill"></i>  Novo Medico</a>
</div>
<div style="margin-bottom: -10px; margin-top: -20px;">
   <br>
   <form action="index.php?menuop=contatos" method="post">
      <input  style=" margin-left: 10px;" type="text" name="txt_pesquisa" value="">
      <button style="margin-top: -4.5px;" class="btn btn-outline-custom btn-sm" type="submit"><i class="bi bi-search"></i> Pesquisa</button>
   </form>
   <br>
</div>
<div class="tabela">
   <table class="table table-light table-striped table-bordered table-sm">
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
            <td class="text-center">
               <a class="btn btn-outline-dark btn-sm" href="index.php?menuop=editar-contato&idContato=<?= $dado['idContato'] ?>"><i class="bi bi-pencil-square"></i></a>
            </td>
            <td class="text-center">
               <a class="btn btn-outline-dark btn-sm" href="index.php?menuop=excluir-contato&idContato=<?= $dado['idContato'] ?>"><i class="bi bi-trash-fill"></i></a>
            </td></tr>
         <?php
         }
         ?>
      </tbody>
   </table>
</div>





<ul class="pagination justify-content-center">
   <?php
   $pdo = new PDO("mysql:host=localhost;dbname=VitaLife", "root", "");

   $sqlTotal = "SELECT COUNT(idContato) as total FROM contatos";
   $sql = $pdo->query($sqlTotal);
   $result = $sql->fetch(PDO::FETCH_ASSOC);

   $numTotal = $result['total'];

   $totalPagina = ceil($numTotal / $quantidade);

   echo "<li class='page-item'><span class='page-link'> Total de registros: " . $numTotal .  " </span></li> ";

   echo '<li class="page-item"><a class="page-link" href="?menuop=contatos&pagina=1">Primeira Pagina</a></li>';

   if ($pagina > 6) {
   ?>
      <li class="page-item"><a class="page-link" href="?menuop=contatos&pagina=<?php echo $pagina - 1 ?>"><<</a></li>
   <?php
   }

   for ($i = 1; $i <= $totalPagina; $i++) {
      if ($i >= ($pagina - 5) && $i <= ($pagina + 5)) {
         if ($i == $pagina) {
            echo "<li class='page-item active'><span class='page-link'>$i</span></li>";
         } else {
            echo "<li class='page-item'><a class='page-link' href=\"?menuop=contatos&pagina={$i}\"> {$i} </a></li>";
         }
      }
   }

   if ($pagina < $totalPagina - 5) {
   ?>
      <li class="page-item"><a class="page-link" href="?menuop=contatos&pagina=<?php echo $pagina + 1 ?>">>></a></li>
   <?php
   }

   echo "<li class='page-item'> <a class='page-link' href=\"?menuop=contatos&pagina=$totalPagina\">Ultima Pagina</a></li>";
   ?>
</ul>

<style>
   .pagination .page-link {
      color: #2198A9; /* Cor do texto */
      border-color: #2198A9; /* Cor da borda */
   }

   .pagination .page-link:hover {
      background-color: #2198A9; /* Cor de fundo ao passar o mouse */
      color: white; /* Cor do texto ao passar o mouse */
   }

   .pagination .active .page-link {
      background-color: #2198A9; /* Cor de fundo da página ativa */
      color: white; /* Cor do texto da página ativa */
   }
</style>