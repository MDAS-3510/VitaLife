<?php

class Evento
{

    private $idEventos;
    private $titulo;
    private $descricao;
    private $dataInicio;
    private $horaInicio;
    private $dataFim;
    private $horaFim;
    private $verificacao;
    private $pdo;

    function __construct()
    {
        $dbname = "mysql:dbname=VitaLife;host=localhost";
        $user   = "root";
        $pass   = "";

        try {
            $this->pdo = new PDO($dbname, $user, $pass);
        } catch (Exception $e) {
            echo "<h3>nao consegui</h3>";
        }
    }
    function inserirEvento($titulo, $descricao, $dataInicio, $horaInicio, $dataFim, $horaFim)
    {
        $sql = "INSERT INTO eventos SET  titulo= :t, descricao = :d,  dataInicio = :di , horaInicio = :hi, dataFim = :df, horaFim = :hf";
        $sql = $this->pdo->prepare($sql);

        $sql->bindValue(":t", $titulo);
        $sql->bindValue(":d", $descricao);
        $sql->bindValue(":di", $dataInicio);
        $sql->bindValue(":hi", $horaInicio);
        $sql->bindValue(":df", $dataFim);
        $sql->bindValue(":hf", $horaFim);
        
        $sql->execute();
    }

    public function alterarEvento($idEventos,$titulo,$descricao,$dataInicio,$horaInicio,$dataFim,$horaFim)
    {
        $sql = "UPDATE eventos SET titulo= :t, descricao = :d, dataInicio = :di , horaInicio = :hi, dataFim = :df, horaFim = :hf WHERE idEventos = :i";
        $sql = $this->pdo->prepare($sql);

        $sql->bindValue(":i", $idEventos);
        $sql->bindValue(":t", $titulo);
        $sql->bindValue(":d", $descricao);
        $sql->bindValue(":di", $dataInicio);
        $sql->bindValue(":hi", $horaInicio);
        $sql->bindValue(":df", $dataFim);
        $sql->bindValue(":hf", $horaFim);

        $sql->execute();
    }


    public function localizarEvento($idEventos)
    {

        $sql = "SELECT * FROM eventos WHERE idEventos = :i";
        $sql = $this->pdo->prepare($sql);

        $sql->bindValue(":i", $idEventos);

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $dados = $sql->fetch();
        } else {
            $dados = array();
        }

        return $dados;
    }

    public function localizarEventos()
    {
        $sql = $this->pdo->prepare('SELECT * FROM eventos');

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $dados = $sql->fetch();
        } else {
            $dados = array();
        }

        return $dados;
    }

    public function deletarEventos($idEventos)
    {
        $sql = "DELETE FROM eventos WHERE idEventos = :i";
        $sql = $this->pdo->prepare($sql);

        $sql->bindValue(":i", $idEventos);

        $sql->execute();
    }

    public function tabelaEventos($txt_pesquisa, $inicio, $quantidade)
    {
        // Consulta SQL para evitar SQL Injection
        $sql = "SELECT
               idEventos,
               verificacao,
               titulo,
               descricao,
               DATE_FORMAT(dataInicio, '%d/%m/%Y') AS dataInicio,
            horaInicio, 
            DATE_FORMAT(dataFim, '%d/%m/%Y') AS dataFim,
            horaFim 
               FROM eventos
               WHERE
               titulo = :titulo
               OR descricao LIKE :descricao
               OR DATE_FORMAT(dataInicio, '%d/%m/%Y') LIKE :data_pesquisa
         ORDER BY verificacao, dataInicio
         LIMIT :inicio, :quantidade";
        $sql = $this->pdo->prepare($sql);

        // Atribuição de valores aos parâmetros com curinga para busca parcial
        $sql->bindValue(':titulo', $txt_pesquisa, PDO::PARAM_STR);
        $sql->bindValue(':descricao', "%$txt_pesquisa%", PDO::PARAM_STR);
        $sql->bindValue(':data_pesquisa', "%$txt_pesquisa%", PDO::PARAM_STR);

        // Parâmetros de paginação
        $sql->bindValue(':inicio', (int) $inicio, PDO::PARAM_INT);
        $sql->bindValue(':quantidade', (int) $quantidade, PDO::PARAM_INT);

        // Executa a consulta
        $sql->execute();

        // Retorna os dados ou array vazio caso não haja resultados
        if ($sql->rowCount() > 0) {
            $dados = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $dados = array();
        }

        return $dados;
    }
    public function verificar($idEventos, $verificacao)
    {
        $sql = "UPDATE tarefas SET verificacao = :v WHERE idEventos = :i";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":i", $idEventos);
        $sql->bindValue(":v", $verificacao);
        $sql->execute();
    }
}
