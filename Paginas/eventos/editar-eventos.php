<?php
require "../Classes/Evento.class.php";
$contato = new Evento();
?>
<?php
$id = $_GET['idEventos'];
$dados = $contato->localizarEvento($id);

if (empty($dados)) {
    echo "Nenhum contato encontrado";
}

if (isset($_POST['titulo'])) {
    $id = $_POST['idEventos'];
    $titu = $_POST['titulo'];
    $desc = $_POST['descricao'];
    $di = $_POST['dataInicio'];
    $hi = $_POST['horaInicio'];
    $df = $_POST['dataFim'];
    $hf = $_POST['horaFim'];


    if ($contato->alterarEvento($id, $titu, $desc, $di, $hi, $df, $hf)) {
    }
    header("location: index.php?menuop=eventos");
}
?>






<header>
    <h3>
        <i class="bi bi-calendar-check"></i> Editar Evento
    </h3>
</header>
<div>
    <form class="needs-validation" method="post" novalidate>
        <div class="mb-3 col-3">
            <label for="idEvento" class="form-label">ID</label>
            <input class="form-control" type="text" name="idEventos" value="<?= $dados["idEventos"] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="tituloEvento" class="form-label">Título</label>
            <input class="form-control" type="text" name="titulo" value="<?= $dados["titulo"] ?>" required>
        </div>
        <div class="mb-3">
            <label for="descricaoEvento" class="form-label">Descrição</label>
            <textarea name="descricao" cols="30" rows="5" class="form-control" required><?= $dados["descricao"] ?></textarea>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataInicioEvento" class="form-label">Data de inìcio</label>
                <input class="form-control" type="date" name="dataInicio" value="<?= $dados["dataInicio"] ?>" required>
            </div>
            <div class="mb-3 col-3">
                <label for="horaInicioEvento" class="form-label">Hora de inìcio</label>
                <input class="form-control" type="time" name="horaInicio" id="horaInicioEvento" value="<?= $dados["horaInicio"] ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataFimEvento" class="form-label">Data de Fim</label>
                <input class="form-control" type="date" name="dataFim" id="dataFimEvento" value="<?= $dados["dataFim"] ?>">
            </div>
            <div class="mb-3 col-3">
                <label for="horaFimEvento" class="form-label">Hora de Fim</label>
                <input class="form-control" type="time" name="horaFim" id="horaFimEvento" value="<?= $dados["horaFim"] ?>">
            </div>
        </div>

        <div class="mb-3">
            <input class="btn btn-success" type="submit" value="Atualizar" name="btnAtualizar">
        </div>
    </form>
</div>