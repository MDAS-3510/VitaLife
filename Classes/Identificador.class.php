   <?php
   // Conectar ao banco de dados
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "seu_banco_de_dados";

   $conn = new mysqli($servername, $username, $password, $dbname);

   if ($conn->connect_error) {
      die("Falha na conexão: " . $conn->connect_error);
   }

   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $nome = $_POST['nome'];
      $identificador = $_POST['identificador'];
      $tipo = $_POST['tipo'];

      if ($tipo == 'paciente') {
         // Validação do CPF
         $sql = "INSERT INTO pacientes (nome, cpf) VALUES ('$nome', '$identificador')";
      } elseif ($tipo == 'medico') {
         // Validação do CRM
         $sql = "INSERT INTO medicos (nome, cpf, crm) VALUES ('$nome', '$identificador', '$identificador')";
      } elseif ($tipo == 'gestor') {
         // Validação da matrícula
         $sql = "INSERT INTO gestores (nome, cpf, matricula) VALUES ('$nome', '$identificador', '$identificador')";
      }

      if ($conn->query($sql) === TRUE) {
         echo "Cadastro realizado com sucesso!";
      } else {
         echo "Erro ao cadastrar: " . $conn->error;
      }

      $conn->close();
   }
   ?>