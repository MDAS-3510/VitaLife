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

   public function alterarTarefa($idTarefas ,$titulo, $descricao, $dataConclusao, $horaConclusao, $dataLembrete, $horaLembrete, $recorrencia){
      $sql = "UPDATE tarefas SET titulo= :t, descricao = :d,  dataConclusao = :dc, horaConclusao = :hc, dataLembrete  = :dl, horaLembrete = :hl, recorrencia = :r WHERE idTarefas = :i";
      $sql = $this->pdo->prepare($sql);
      
		$sql->bindValue(":i", $idTarefas);
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

public function tabelaTarefas($txt_pesquisa, $inicio, $quantidade){
   $inicio = max(0, (int)$inicio);
   $sql = "SELECT
               idTarefas,
               verificacao,
               titulo,
               descricao,
               DATE_FORMAT(dataConclusao, '%d/%m/%Y') AS dataConclusao,
               horaConclusao
               FROM tarefas
               WHERE
               titulo = :titulo
               OR descricao LIKE :descricao
               OR DATE_FORMAT(dataConclusao, '%d/%m/%Y') LIKE :data_pesquisa
         ORDER BY verificacao, dataConclusao
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
   public function verificar($idTarefas, $verificacao){
      $sql = "UPDATE tarefas SET verificacao = :v WHERE idTarefas = :i";
      $sql = $this->pdo->prepare($sql);
      $sql->bindValue(":i", $idTarefas);
      $sql->bindValue(":v", $verificacao);
      $sql->execute();
   }
}


?>