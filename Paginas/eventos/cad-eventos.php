<header>
    <h3>
        <i class="bi bi-calendar-check"></i> Cadastro de Evento
    </h3>
</header>
<div>
    <form class="needs-validation" method="post" novalidate>
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input class="form-control" type="text" name="titulo" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" cols="30" rows="5" class="form-control" required></textarea>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataInicio" class="form-label">Data de Início</label>
                <input class="form-control" type="date" name="dataInicio" required>
            </div>
            <div class="mb-3 col-3">
                <label for="horaInicio" class="form-label">Hora de Início</label>
                <input class="form-control" type="time" name="horaInicio" required>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataFim" class="form-label">Data de Fim</label>
                <input class="form-control" type="date" name="dataFim">
            </div>
            <div class="mb-3 col-3">
                <label for="horaFim" class="form-label">Hora de Fim</label>
                <input class="form-control" type="time" name="horaFim">
            </div>
        </div>

        <div class="mb-3">
            <input class="btn btn-success" type="submit" value="Adicionar" name="btnAdicionar">
        </div>
    </form>
</div>

<?php
if (isset($_POST['titulo'])) {
    require '../Classes/Evento.class.php';
    $c = new Evento();

    $titu = $_POST['titulo'];
    $desc = $_POST['descricao'];
    $dataInicio = $_POST['dataInicio'];
    $horaInicio = $_POST['horaInicio'];
    $dataFim = $_POST['dataFim'];
    $horaFim = $_POST['horaFim'];



    $c->inserirEvento($titu, $desc, $dataInicio, $horaInicio, $dataFim, $horaFim);

    header("location: index.php?menuop=eventos");
}
?>