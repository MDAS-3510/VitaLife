<?php
require '../Classes/Tarefas.class.php';
$contato = new Tarefa();
?>

<header>
   <h3><i class="bi bi-list-task"></i> Tarefas</h3>
</header>
<div>
   <a class="btn btn-outline-secondary mb-2" href="?menuop=cad-tarefas">Nova Tarefa</a>
</div>
<div>
   <form action="index.php?menuop=tarefas" method="post">
      <div class="input-group">
         <input class="form-control" type="text" name="txt_pesquisa">
         <button class="btn btn-outline-success btn-sm" type="submit"><i class="bi bi-search"></i> Pesquisar</button>
      </div>

   </form>
</div>
<div class="tabela">
   <table class="table table-dark table-striped table-bordered table-sm">
      <thead>
         <tr>
            <th>Status</th>
            <th>Título</th>
            <th>Descrição</th>
            <th>Data da Conclusão</th>
            <th>Hora da Conclusão</th>
            <th>Editar</th>
            <th>Excluir</th>
         </tr>
      </thead>
      <tbody>


         <?php

         $quantidade = 10;
         $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
         $inicio = ($quantidade * $pagina) - $quantidade;

         $txt_pesquisa = isset($_POST['txt_pesquisa']) ? $_POST['txt_pesquisa'] : "";

         if (isset($_GET['idTarefas'])) {
            $id = $_GET['idTarefas'];
            $verificacao = (isset($_GET['verificacao']) && $_GET['verificacao'] == '0') ? '1' : '0';
            $contato->verificar($id, $verificacao);
         }

         $dados = $contato->tabelaTarefas($txt_pesquisa, $inicio, $quantidade);

         foreach ($dados as $dado) {
         ?>
            <td>
               <a class="btn btn-secondary btn-sm" href="index.php?menuop=tarefas&paginas=<?= $pagina ?>&idTarefas=<?= $dado['idTarefas'] ?>&verificacao=<?= $dado['verificacao'] ?>">
                  <?php
                  if ($dado['verificacao'] == 0) {
                     echo '<i class="bi bi-square"></i>';
                  } else {
                     echo '<i class="bi bi-check-square"></i>';
                  }
                  ?>
               </a>
            </td>
            <td><?= $dado["titulo"] ?></td>
            <td><?= $dado["descricao"] ?></td>
            <td><?= $dado["dataConclusao"] ?></td>
            <td><?= $dado["horaConclusao"] ?></td>
            <td><a class="btn btn-outline-warning btn-sm" href="index.php?menuop=editar-tarefas&idTarefas=<?= $dado["idTarefas"] ?>">Editar</a></td>
            <td><a class="btn btn-outline-danger btn-sm" href="index.php?menuop=excluir-tarefas&idTarefas=<?= $dado["idTarefas"] ?>">Excluir</a></td>
            </tr>
         <?php
         }
         ?>
      </tbody>
   </table>
</div>



<ul class="pagination justify-content-center">
   <?php
   $pdo = new PDO("mysql:host=localhost;dbname=VitaLife", "root", "");

   $sqlTotal = "SELECT COUNT(idTarefas) as total FROM tarefas";
   $sql = $pdo->query($sqlTotal);
   $result = $sql->fetch(PDO::FETCH_ASSOC);


   $numTotal = $result['total'];

   $totalPagina = ceil($numTotal / $quantidade);

   echo "<li class='page-item'><span class='page-link'> Total de registros: " . $numTotal .  " </span></li> ";


   echo '<li class="page-item"><a class="page-link" href="?menuop=contatos&pagina=1">Primeira Pagina</a></li>';

 
   if ($pagina > 6) {
   ?>
      <li class="page-item"><a class="page-link" href="?menuop=contatos&pagina=<?php echo $pagina - 1 ?>">
            <<< /a>
      </li>
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