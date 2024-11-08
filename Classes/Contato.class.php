<?php

class Contato{
   private $idContato;
   private $nomeContato;
   private $emailContato;
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
		}catch(Exception $e){
				echo"<h3>nao consegui</h3>";
		}
   }
   public function inserirContato( $nomeContato, $emailContato,  $telefoneContato, $enderecoContato , $crmContato){
      $sql = "INSERT INTO contatos SET  nomecontato= :n, emailcontato = :e,  telefonecontato = :t, enderecocontato = :n, crmcontato = :c";
		$sql = $this->pdo->prepare($sql);

		$sql->bindValue(":n", $nomeContato);
		$sql->bindValue(":e", $emailContato);
		$sql->bindValue(":t", $telefoneContato);
		$sql->bindValue(":d", $enderecoContato);
		$sql->bindValue(":c", $crmContato);
		

		$sql->execute();
   }
   public function localizarContato($id){
   
      $sql = "SELECT * FROM contatos WHERE idContato = :i";
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

   public function localizarContatos(){
      $sql = $this->pdo->prepare('SELECT * FROM contatos');

		$sql->execute();

      if( $sql->rowCount() > 0 ){
         $dados = $sql->fetch();
		}else{
			$dados = array();
		}

		return $dados;

   }

   public function deletarContato($id){
      $sql = "DELETE FROM contatos WHERE idContato = :i";
		$sql = $this->pdo->prepare($sql);

      $sql->bindValue(":i", $id);

		$sql->execute();
   }

   public function alterarContato($id, $nome, $email, $telefone, $crm, $endereco){
      $sql = "UPDATE contatos SET  emailcontato= :e, nomecontato = :n, telefonecontato = :t, enderecocontato = :n, crmcontato = :c WHERE idcontato = :i";
		$sql = $this->pdo->prepare($sql);

      $sql->bindValue(":i", $id);
      $sql->bindValue(":e", $email);
      $sql->bindValue(":c", $crm);
      $sql->bindValue(":d", $endereco);
      $sql->bindValue(":n", $nome);
      $sql->bindValue(":t", $telefone);

		return $sql->execute();
   }

   public function tabelaContatos($txt_pesquisa, $inicio, $pagina, $quantidade){
      // Consulta com parâmetros para evitar SQL Injection
      $sql = "SELECT idContato,
         UPPER(nomeContato) AS nomeContato,
         LOWER(emailContato) AS emailContato,
         telefoneContato,
         UPPER(enderecoContato) AS enderecoContato,
         crmContato
         FROM contatos
         WHERE idContato = :txt_pesquisa OR nomeContato LIKE :nomeContato
         ORDER BY nomeContato ASC
         LIMIT :inicio, :quantidade";

      $sql = $this->pdo->prepare($sql);
      
      $sql->bindValue(':txt_pesquisa', $txt_pesquisa, PDO::PARAM_INT);
      $sql->bindValue(':nomeContato', "%$txt_pesquisa%", PDO::PARAM_STR);
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