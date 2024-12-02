<?php
require "../Classes/Tarefas2.class.php";
$contato = new Tarefa();
?>
<?php
$idTarefas = $_GET['idTarefas'];
$dados = $contato->localizarTarefa($idTarefas);

if (empty($dados)) {
   echo "Nenhum contato encontrado";
}

if (isset($_POST['titulo'])) {
   $id = $_POST['idTarefas'];
   $titu = $_POST['titulo'];
   $desc = $_POST['descricao'];
   $datac = $_POST['dataConclusao'];
   $horac = $_POST['horaConclusao'];
   $datal = $_POST['dataLembrete'];
   $horal = $_POST['horaLembrete'];
   $reco = $_POST['recorrencia'];

   if ($contato->alterarTarefa($id, $titu, $desc, $datac, $horac, $datal, $horal, $reco)) {
   }
   header("location: index.php?menuop=tarefas");
}
?>


<header>
   <h3>
      <i class="bi bi-list-task"></i> Editar Tarefa
   </h3>
</header>


   <form class="needs-validation" method="post" novalidate>
      <div class="mb-3 col-3">
         <label for="idTarefa" class="form-label"></label>
         <input class="form-control" type="hidden" name="idTarefas" id="idTarefas" value="<?= $dados["idTarefas"] ?>" readonly>
      </div>
      <div class="mb-3">
         <label for="tituloTarefa" class="form-label">Título</label>
         <input class="form-control" type="text" name="titulo" id="tituloTarefa" value="<?= $dados["titulo"] ?>" required>
      </div>
      <div class="mb-3">
         <label for="descricaoTarefa" class="form-label">Descrição</label>
         <textarea name="descricao" id="descricaoTarefa" cols="30" rows="5" class="form-control" required><?= $dados["descricao"] ?></textarea>
      </div>
      <div class="row">
         <div class="mb-3 col-3">
            <label for="dataConclusaoTarefa" class="form-label">Data de Conclusão</label>
            <input class="form-control" type="date" name="dataConclusao" id="dataConclusaoTarefa" value="<?= $dados["dataConclusao"] ?>" required>
         </div>
         <div class="mb-3 col-3">
            <label for="horaConclusaoTarefa" class="form-label">Hora de Conclusão</label>
            <input class="form-control" type="time" name="horaConclusao" id="horaConclusaoTarefa" value="<?= $dados["horaConclusao"] ?>" required>
         </div>
      </div>
      <div class="row">
         <div class="mb-3 col-3">
            <label for="dataLembreteTarefa" class="form-label">Data de Lembrete</label>
            <input class="form-control" type="date" name="dataLembrete" id="dataLembreteTarefa" value="<?= $dados["dataLembrete"] ?>">
         </div>
         <div class="mb-3 col-3">
            <label for="horaLembreteTarefa" class="form-label">Hora de Lembrete</label>
            <input class="form-control" type="time" name="horaLembrete" id="horaLembreteTarefa" value="<?= $dados["horaLembrete"] ?>">
         </div>
      </div>
      <div class="row">
         <div class="mb-3 col-3">
            <label for="recorrenciaTarefa" class="form-label">Recorrência</label>
            <select name="recorrencia" id="recorrenciaTarefa" class="form-select">
               <option value="0" <?php echo ($dados["recorrencia"] == 0) ? "selected" : "" ?>>Não Recorrente</option>
               <option value="1" <?php echo ($dados["recorrencia"] == 1) ? "selected" : "" ?>>Diariamente</option>
               <option value="2" <?php echo ($dados["recorrencia"] == 2) ? "selected" : "" ?>>Semanalmente</option>
               <option value="3" <?php echo ($dados["recorrencia"] == 3) ? "selected" : "" ?>>Mensalmente</option>
               <option value="4" <?php echo ($dados["recorrencia"] == 4) ? "selected" : "" ?>>Anualmente</option>
            </select>
         </div>
      </div>
      <div class="mb-3">
         <input class="btn btn-success" type="submit" value="Atualizar" name="btnAtualizar">
      </div>
   </form>
</div>