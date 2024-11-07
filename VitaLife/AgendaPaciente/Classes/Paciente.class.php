<?php

class Paciente{
   private $id;
   private $email;
   private $senha;
   private $cpf;
   private $data_nasc;
   private $nome;
   private $pdo;

   function __construct(){
		$dbname = "mysql:dbname=VitaLife;host=localhost";
		$user   = "root";
		$pass   = "";

		try{
			$this->pdo = new PDO($dbname, $user , $pass );
			echo"<h3>conectado</h3>";
		}catch(Exception $e){
				echo"<h3>nao consegui</h3>";
		}
   }

   public function cadastrarPaciente( $email, $senha, $cpf, $data_nasc, $nome){
      $sql = "INSERT INTO pacientes SET  email= :e, senha = :s, cpf = :c, data_nasc = :d, nome = :n  ";
		$sql = $this->pdo->prepare($sql);

		$sql->bindValue(":e", $email);

      $sql->bindValue(":s", $senha);

      $sql->bindValue(":c", $cpf);

      $sql->bindValue(":d", $data_nasc);

      $sql->bindValue(":n", $nome);

		$sql->execute();
   }
   public function localizarPaciente($id){
      $sql = "SELECT * FROM pacientes WHERE id = :i";
		$sql = $this->pdo->prepare($sql);

      $sql->bindValue(":i", $id);

		$sql->execute();

      if( $sql->rowCount() > 0 ){
         $dados = $sql->fetch();
		}else{
			$dados = array();
		}

		return $dados;

   }

   public function localizarPacientes(){
      $sql = $this->pdo->prepare('SELECT * FROM pacientes');

		$sql->execute();

      if( $sql->rowCount() > 0 ){
         $dados = $sql->fetch();
		}else{
			$dados = array();
		}

		return $dados;

   }

   public function deletarPaciente($id){
      $sql = "DELETE FROM pacientes WHERE id = :i";
		$sql = $this->pdo->prepare($sql);

      $sql->bindValue(":i", $id);

		$sql->execute();
   }

   public function alterarPaciente($id, $email, $senha, $cpf, $data_nasc, $nome){
      $sql = "UPDATE pacientes SET  email= :e, senha = :s, cpf = :c, data_nasc = :d, nome = :n WHERE id = :i";
		$sql = $this->pdo->prepare($sql);

      $sql->bindValue(":i", $id);

      $sql->bindValue(":e", $email);

      $sql->bindValue(":s", $senha);

      $sql->bindValue(":c", $cpf);

      $sql->bindValue(":d", $data_nasc);

      $sql->bindValue(":n", $nome);
      

		return $sql->execute();
   }
}