<?php

class Medico{
   private $id;
   private $email;
   private $senha;
   private $crm;
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

   public function cadastrarMedico( $email, $senha, $crm, $nome){
      $sql = "INSERT INTO medicos SET email= :e, senha = :s, crm = :c, nome = :n ";
		$sql = $this->pdo->prepare($sql);

		$sql->bindValue(":e", $email);

      $sql->bindValue(":s", $senha);

      $sql->bindValue(":c", $crm);

      $sql->bindValue(":n", $nome);

		$sql->execute();
   }
   public function localizarMedico($id){
      $sql = "SELECT * FROM medicos WHERE id = :i";
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

   public function localizarMedicos(){
      $sql = $this->pdo->prepare('SELECT * FROM medicos');

		$sql->execute();

      if( $sql->rowCount() > 0 ){
         $dados = $sql->fetch();
		}else{
			$dados = array();
		}

		return $dados;

   }

   public function deletarMedico($id){
      $sql = "DELETE FROM medicos WHERE id = :i";
		$sql = $this->pdo->prepare($sql);

      $sql->bindValue(":i", $id);

		$sql->execute();
   }

   public function alterarMedico($id, $email, $senha, $crm, $nome){
      $sql = "UPDATE medicos SET  email= :e, senha = :s, crm = :c, nome = :n WHERE id = :i";
		$sql = $this->pdo->prepare($sql);

      $sql->bindValue(":i", $id);

      $sql->bindValue(":e", $email);

      $sql->bindValue(":s", $senha);

      $sql->bindValue(":c", $crm);

      $sql->bindValue(":n", $nome);
      

		return $sql->execute();
   }
}

