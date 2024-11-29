<?php
require '../Classes/Evento.class.php';
$contato = new Evento();
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
<header>
    <h3><i class="bi bi-calendar-check"></i> Eventos</h3>
</header>
<div style="padding: 10px;">
    <a class="btn btn-outline-custom custom-btn mb-2"
        href="?menuop=cad-eventos"><i class="bi bi-calendar-check"></i> Novo Evento</a>
</div>

<div style="margin-bottom: -10px; margin-top: -20px;">
    <br>
    <form action="index.php?menuop=eventos" method="post">
        <input style=" margin-left: 10px;" type="text" name="txt_pesquisa" value="">
        <button style="margin-top: -4.5px;" class="btn btn-outline-custom btn-sm" type="submit"><i class="bi bi-search"></i> Pesquisa</button>
    </form>
    <br>
</div>

<div class="tabela">
    <table class="table table-light table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th>Status</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Data de início</th>
                <th>Hora de início</th>
                <th>Data de Fim</th>
                <th>Hora de Fim</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $quantidade = 10;
            $pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
            $inicio = ($quantidade * $pagina) - $quantidade;

            $txt_pesquisa = isset($_POST['txt_pesquisa']) ? $_POST['txt_pesquisa'] : "";

            if (isset($_GET['idEventos'])) {
                $id = $_GET['idEventos'];
                $verificacao = (isset($_GET['verificacao']) && $_GET['verificacao'] == '0') ? '1' : '0';
                $contato->verificar($id, $verificacao);
            }

            $dados = $contato->tabelaEventos($txt_pesquisa, $inicio, $quantidade);

            foreach ($dados as $dado) {

            ?>
                <tr>
                    <td>
                        <a class="btn btn-dark btn-sm" href="index.php?menuop=eventos&pagina=<?= $pagina ?>&idEventos=<?= $dado['idEventos'] ?>&verificacao=<?= $dado['verificacao'] ?>">
                            <?php
                            if ($dado['verificacao'] == 0) {
                                echo '<i class="bi bi-square"></i>';
                            } else {
                                echo '<i class="bi bi-check-square"></i>';
                            }
                            ?>
                        </a>
                    </td>
                    <td class="text-nowrap"><?= $dado['titulo'] ?></td>
                    <td class="text-nowrap"><?= $dado['descricao'] ?></td>
                    <td class="text-nowrap"><?= $dado['dataInicio'] ?></td>
                    <td class="text-nowrap"><?= $dado['horaInicio'] ?></td>
                    <td class="text-nowrap"><?= $dado['dataFim'] ?></td>
                    <td class="text-nowrap"><?= $dado['horaFim'] ?></td>

                    <td class="text-center">
                        <a class="btn btn-outline-dark btn-sm" href="index.php?menuop=editar-eventos&idEventos=<?= $dado['idEventos'] ?>"><i class="bi bi-pencil-square"></i></a>

                    </td>
                    <td class="text-center">
                        <a class="btn btn-outline-dark btn-sm" href="index.php?menuop=excluir-eventos&idEventos=<?= $dado['idEventos'] ?>"><i class="bi bi-trash-fill"></i></a>
                    </td>


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

    $sqlTotal = "SELECT COUNT(idEventos) as total FROM eventos";
    $sql = $pdo->query($sqlTotal);
    $result = $sql->fetch(PDO::FETCH_ASSOC);

    $numTotal = $result['total'];

    $totalPagina = ceil($numTotal / $quantidade);

    echo "<li class='page-item'><span class='page-link'> Total de registros: " . $numTotal .  " </span></li> ";

    echo '<li class="page-item"><a class="page-link" href="?menuop=eventos&pagina=1">Primeira Pagina</a></li>';

    if ($pagina > 6) {
    ?>
        <li class="page-item"><a class="page-link" href="?menuop=eventos&pagina=<?php echo $pagina - 1 ?>">
                <<< /a>
        </li>
    <?php
    }

    for ($i = 1; $i <= $totalPagina; $i++) {
        if ($i >= ($pagina - 5) && $i <= ($pagina + 5)) {
            if ($i == $pagina) {
                echo "<li class='page-item active'><span class='page-link'>$i</span></li>";
            } else {
                echo "<li class='page-item'><a class='page-link' href=\"?menuop=eventos&pagina={$i}\"> {$i} </a></li>";
            }
        }
    }

    if ($pagina < $totalPagina - 5) {
    ?>
        <li class="page-item"><a class="page-link" href="?menuop=eventos&pagina=<?php echo $pagina + 1 ?>">>></a></li>
    <?php
    }

    echo "<li class='page-item'> <a class='page-link' href=\"?menuop=eventos&pagina=$totalPagina\">Ultima Pagina</a></li>";
    ?>
</ul>

<style>
    .pagination .page-link {
        color: #2198A9;
        /* Cor do texto */
        border-color: #2198A9;
        /* Cor da borda */
    }

    .pagination .page-link:hover {
        background-color: #2198A9;
        /* Cor de fundo ao passar o mouse */
        color: white;
        /* Cor do texto ao passar o mouse */
    }

    .pagination .active .page-link {
        background-color: #2198A9;
        /* Cor de fundo da página ativa */
        color: white;
        /* Cor do texto da página ativa */
    }
</style>