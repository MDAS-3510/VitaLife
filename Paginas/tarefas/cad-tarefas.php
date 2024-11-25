<header>
   <h3>
      <i class="bi bi-list-task"></i> Cadastro de Tarefa
   </h3>
</header>
<div>
   <form class="needs-validation" method="post">
      <div class="mb-3">
            <label for="tituloTarefa" class="form-label">Título</label>
            <input class="form-control" type="text" name="titulo" id="tituloTarefa" required>
      </div>
      <div class="mb-3">
            <label for="descricaoTarefa" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricaoTarefa" cols="30" rows="5" class="form-control" required></textarea>
      </div>
      <div class="row">
            <div class="mb-3 col-3">
               <label for="dataConclusaoTarefa" class="form-label">Data de Conclusão</label>
               <input class="form-control" type="date" name="dataConclusao" id="dataConclusaoTarefa" required>
            </div>
            <div class="mb-3 col-3">
               <label for="horaConclusaoTarefa" class="form-label">Hora de Conclusão</label>
               <input class="form-control" type="time" name="horaConclusao" id="horaConclusaoTarefa" required>
            </div>
      </div>
      <div class="row">
            <div class="mb-3 col-3">
               <label for="dataLembreteTarefa" class="form-label">Data de Lembrete</label>
               <input class="form-control" type="date" name="dataLembrete" id="dataLembreteTarefa">
            </div>
            <div class="mb-3 col-3">
               <label for="horaLembreteTarefa" class="form-label">Hora de Lembrete</label>
               <input class="form-control" type="time" name="horaLembrete" id="horaLembreteTarefa">
            </div>
      </div>
      <div class="row">
            <div class="mb-3 col-3">
               <label for="recorrenciaTarefa" class="form-label">Recorrência</label>
               <select name="recorrencia" id="recorrenciaTarefa" class="form-select">
                  <option value="0">Não Recorrente</option>
                  <option value="1">Diariamente</option>
                  <option value="2">Semanalmente</option>
                  <option value="3">Mensalmente</option>
                  <option value="4">Anualmente</option>
               </select>
            </div>
      </div>
      <div class="mb-3">
            <input class="btn btn-success" type="submit" value="Adicionar" name="btnAdicionar">
      </div>
   </form>
</div>

<?php
if ( isset($_POST['titulo'] ) ){
   require '../Classes/Tarefas.class.php';
   $c = new Tarefa();

   $titu = $_POST['titulo'];
   $desc = $_POST['descricao'];
   $datac = $_POST['dataConclusao'];
   $horac = $_POST['horaConclusao'];
   $datal = $_POST['dataLembrete'];
   $horal = $_POST['horaLembrete'];
   $reco = $_POST['recorrencia'];



   $c->inserirTarefa($titu,$desc,$datac,$horac,$datal,$horal,$reco);
   header("location: index.php?menuop=tarefas");

}
?>
