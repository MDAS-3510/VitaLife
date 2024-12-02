<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "sistema_usuarios";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
   die("Erro de conexão: " . $conn->connect_error);
}
if (isset($_POST ['nome'])) {
   echo "Teste";
}else{
   echo "Erro";
}



$nome = $_POST['nome'];
$identificador = $_POST['identificador'];
$email = $_POST['email'];
$tipo = $_POST['tipo'];

$sql = "INSERT INTO users (nome_completo, tipo_cadastro, identificacao, email) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $nome, $tipo, $identificador, $email);

if ($stmt->execute()) {
   if ($tipo == 'paciente') {
         header("Location: Prontuario.html");
      exit();
   } elseif ($tipo == 'medico') {
         header("Location: Telamedico.html");
      exit();
   } elseif ($tipo == 'gestor') {
         header("Location: Paginas");
      exit();
   }
} else {
   echo "Erro ao cadastrar: " . $conn->error;
}

$stmt->close();
$conn->close();
?>