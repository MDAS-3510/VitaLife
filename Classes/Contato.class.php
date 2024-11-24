<?php

class Contato{
   private $idContato;
   private $nomeContato;
   private $emailContato;
   private $telefoneContato;
   private $enderecoContato;
   private $crmContato;
   private $favorito;
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
      $sql = "INSERT INTO contatos SET  nomecontato= :n, emailcontato = :e,  telefonecontato = :t, enderecocontato = :d, crmcontato = :c";
		$sql = $this->pdo->prepare($sql);

		$sql->bindValue(":n", $nomeContato);
		$sql->bindValue(":e", $emailContato);
		$sql->bindValue(":t", $telefoneContato);
		$sql->bindValue(":d", $enderecoContato);
		$sql->bindValue(":c", $crmContato);
		

		$sql->execute();
   }

   public function alterarContato($idContato, $nomeContato, $emailContato,  $telefoneContato, $enderecoContato , $crmContato){
      $sql = "UPDATE contatos SET nomecontato = :n, emailcontato = :e, telefonecontato = :t, enderecocontato = :d, crmContato = :c WHERE idContato = :i";
      $sql = $this->pdo->prepare($sql);
      $sql->bindValue(':i', $idContato);
      $sql->bindValue(':n', $nomeContato);
      $sql->bindValue(':e', $emailContato);
      $sql->bindValue(':t', $telefoneContato);
      $sql->bindValue(':d', $enderecoContato);
      $sql->bindValue(':c', $crmContato);

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

public function tabelaContatos($txt_pesquisa, $inicio, $quantidade, $favorito = null) {
   $sql = "SELECT
               idContato,
               UPPER(nomeContato) AS nomeContato,
               LOWER(emailContato) AS emailContato,
               telefoneContato,
               UPPER(enderecoContato) AS enderecoContato,
               crmContato,
               flagFavoritoContato
               FROM contatos
               WHERE
               idContato = :idContato
               OR nomeContato LIKE :nomeContato
               OR telefoneContato LIKE :telefoneContato";

   // Adiciona filtro de favorito, se necessário
   if (!is_null($favorito)) {
      $sql .= " AND flagFavoritoContato = :flagFavoritoContato";
   }

   $sql .= " ORDER BY flagFavoritoContato DESC, nomeContato ASC
               LIMIT :inicio, :quantidade";

   $sql = $this->pdo->prepare($sql);

   $sql->bindValue(':idContato', (is_numeric($txt_pesquisa) ? $txt_pesquisa : 0), PDO::PARAM_INT);
   $sql->bindValue(':nomeContato', "%$txt_pesquisa%", PDO::PARAM_STR);
   $sql->bindValue(':telefoneContato', "%$txt_pesquisa%", PDO::PARAM_STR);

   $sql->bindValue(':inicio', (int) $inicio, PDO::PARAM_INT);
   $sql->bindValue(':quantidade', (int) $quantidade, PDO::PARAM_INT);

   if (!is_null($favorito)) {
      $sql->bindValue(':flagFavoritoContato', (int) $favorito, PDO::PARAM_INT);
   }

   $sql->execute();

   return ($sql->rowCount() > 0) ? $sql->fetchAll(PDO::FETCH_ASSOC) : [];
}
public function atualizarFavorito($idContato, $flagFavoritoContato) {
   $sql = "UPDATE contatos SET flagFavoritoContato = :f WHERE idContato = :i";
   $sql = $this->pdo->prepare($sql);

   $sql->bindValue(':i', $idContato);
   $sql->bindValue(':f', $flagFavoritoContato);


   $sql->execute();
}



}