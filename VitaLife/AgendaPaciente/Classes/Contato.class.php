<?php

class Contato{
   private $idContato;
   private $nomeContato;
   private $emailContato;
   private $senhaContato;
   private $telefoneContato;
   private $enderecoContato;
   private $crmContato;
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

   public function inserirContato( $nomeContato, $emailContato, $senhaContato, $telefoneContato, $enderecoContato , $crmContato){
      $sql = "INSERT INTO pacientes SET  nomecontato= :n, emailcontato = :e, senhacontato = :s, telefonecontato = :t, enderecocontato = :en, crmcontato = cr:  ";
		$sql = $this->pdo->prepare($sql);

		$sql->bindValue(":n", $nomeContato);
		$sql->bindValue(":e", $emailContato);
		$sql->bindValue(":s", $senhaContato);
		$sql->bindValue(":t", $telefoneContato);
		$sql->bindValue(":en", $enderecoContato);
		$sql->bindValue(":cr", $crmContato);
		

		$sql->execute();
   }
   public function localizarContato($id){
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