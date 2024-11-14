<?php

class Tarefa{

   private $idTarefas;
   private $titulo;
   private $descricao;
   private $dataConclusao;
   private $horaConclusao;
   private $dataLembrete;
   private $horaLembrete;
   private $recorrencia;
   private $verificacao;
   private $pdo;

   function __construct(){
		$dbname = "mysql:dbname=VitaLife;host=localhost";
		$user   = "root";
		$pass   = "";

		try{
			$this->pdo = new PDO($dbname, $user , $pass );
		}catch(Exception $e){
				echo"<h3>nao consegui</h3>";
		}
   }
   function inserirTarefa($titulo, $descricao, $dataConclusao, $horaConclusao, $dataLembrete, $horaLembrete, $recorrencia){
      $sql = "INSERT INTO tarefas SET  titulo= :t, descricao = :d,  dataConclusao = :dc, horaConclusao = :hc, dataLembrete  = :dl, horaLembrete = :hl, recorrencia = :r";
		$sql = $this->pdo->prepare($sql);

		$sql->bindValue(":t", $titulo);
		$sql->bindValue(":d", $descricao);
		$sql->bindValue(":dc", $dataConclusao);
		$sql->bindValue(":hc", $horaConclusao);
		$sql->bindValue(":dl", $dataLembrete);
		$sql->bindValue(":hl", $horaLembrete);
		$sql->bindValue(":r", $recorrencia);
		

		$sql->execute();
   }

   public function localizarTarefa($idTarefas){
   
      $sql = "SELECT * FROM tarefas WHERE idTarefas = :i";
		$sql = $this->pdo->prepare($sql);

      $sql->bindValue(":i", $idTarefas);

		$sql->execute();

      if( $sql->rowCount() > 0 ){
         $dados = $sql->fetch();
		}else{
			$dados = array();
		}

		return $dados;

   }

   public function localizarTarefas(){
      $sql = $this->pdo->prepare('SELECT * FROM tarefas');

		$sql->execute();

      if( $sql->rowCount() > 0 ){
         $dados = $sql->fetch();
		}else{
			$dados = array();
		}

		return $dados;

   }

   public function deletarTarefa($idTarefas){
      $sql = "DELETE FROM tarefas WHERE idTarefas = :i";
		$sql = $this->pdo->prepare($sql);

      $sql->bindValue(":i", $idTarefas);

		$sql->execute();
   }

   public function tabelaTarefas($txt_pesquisa, $inicio, $pagina, $quantidade){
      // Consulta com parâmetros para evitar SQL Injection
      $sql = "SELECT
            idTarefa,
            verificacao,
            titulo,
            descricao,
            DATE_FORMAT(dataConclusao, '%d/%m/%Y') AS dataConclusao,
            horaConclusao
            FROM tarefas
            WHERE
            titulo LIKE '%{$txt_pesquisa}%' OR 
            descricao LIKE '%{$txt_pesquisa}%' OR
            DATE_FORMAT(dataConclusao, '%d/%m/%Y') LIKE '%{$txt_pesquisa}%'
            ORDER BY verificacao, dataConclusaoTarefa 
            LIMIT $inicio, $quantidade
            ";
      $sql = $this->pdo->prepare($sql);
      
      $sql->bindValue(':txt_pesquisa', $txt_pesquisa, PDO::PARAM_INT);
      $sql->bindValue(':titulo', "%$txt_pesquisa%", PDO::PARAM_STR);
      $sql->bindValue(':inicio', $inicio, PDO::PARAM_INT);
      $sql->bindValue(':quantidade', $quantidade, PDO::PARAM_INT);
      
      $sql->execute();

      if( $sql->rowCount() > 0){
         $dados = $sql->fetchAll();
      }else{
         $dados = array();
      }

      return $dados;

   }
}

?>