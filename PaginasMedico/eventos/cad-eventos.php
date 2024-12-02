<style>
    .btn-custom {
        background-color: #2198A9;
        /* Cor de fundo */
        color: white;
        /* Cor do texto */
        border: none;
        /* Remover borda */
    }

    .btn-custom:hover {
        background-color: #1a7a8f;
        /* Cor de fundo ao passar o mouse */
        color: white;
        /* Cor do texto ao passar o mouse */
    }
</style>

<div class="container" style="background-color: white;
border-radius: 6px; box-shadow: 2px 2px 2px rgba(0,0,0,.2); padding: 12px; margin-top: 30px; margin-bottom: 20px;">
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
            <input class="btn btn-custom" type="submit" value="Adicionar" name="btnAdicionar">
        </div>
    </form>
</div>
<?php
if (isset($_POST['titulo'])) {
    require '../Classes/Evento2.class.php';
    $c = new Evento();

    $titu = $_POST['titulo'];
    $desc = $_POST['descricao'];
    $dataInicio = $_POST['dataInicio'];
    $horaInicio = $_POST['horaInicio'];
    $dataFim = $_POST['dataFim'];
    $horaFim = $_POST['horaFim'];



    $c->inserirEvento($titu, $desc, $dataInicio, $horaInicio, $dataFim, $horaFim);
}
?>