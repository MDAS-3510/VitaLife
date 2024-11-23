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
            <td><a class="btn btn-outline-danger btn-sm"  href="index.php?menuop=excluir-tarefas&idTarefas=<?= $dado["idTarefas"] ?>">Excluir</a></td>
</tr>
      <?php
      }
   ?>

