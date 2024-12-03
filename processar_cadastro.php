<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "sistema_usuarios";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
   die("Erro de conexão: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   // Verifica se as chaves estão definidas
   if (isset($_POST['nome'], $_POST['identificador'], $_POST['email'], $_POST['tipo'])) {
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
            header("Location: Telamedico.php");
            exit();
         } elseif ($tipo == 'gestor') {
            header("Location: Paginas");
            exit();
         }
      } else {
         echo "Erro ao cadastrar: " . $conn->error;
      }

      $stmt->close();
   } else {
      echo "Erro: Dados não enviados corretamente.";
   }
} else {
   echo "Erro: Método de requisição inválido.";
}

$conn->close();
