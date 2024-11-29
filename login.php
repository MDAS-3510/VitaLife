<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "sistema_usuarios";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
die("Erro de conexão: " . $conn->connect_error);
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
        header("Location: Telainicial.html");
    exit();
} elseif ($tipo == 'medico') {
        header("Location: tela_medico.html"); 
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


<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/Login.css">
    <script>
    function toggleFields() {
        var tipo = document.getElementById("tipo").value;
        var identificadorLabel = document.getElementById("identificadorLabel");
        var identificador = document.getElementById("identificador");

        if (tipo === "medico") {
            identificadorLabel.textContent = "CRM:";
        } else if (tipo === "gestor") {
            identificadorLabel.textContent = "Matrícula:";
        } else {
            identificadorLabel.textContent = "CPF:";
        }
    }
    </script>
    </head>
    <body>
    <div class="form-container">
    <div class="buttonsform"></div>
    <h2>Login</h2>
    <form id="cadastroForm" action="processar_login.php" method="POST">
        <label for="email">E-mail:</label>
        <input type="text" id="email" required>

        <label id="identificadorLabel" for="identificador">CPF:</label>
        <input type="text" id="identificador" name="identificador" required>

        <label for="tipo">Entrar como:</label>
        <select id="tipo" name="tipo" required onchange="toggleFields()">
            <option value="paciente">Paciente</option>
            <option value="medico">Médico</option>
            <option value="gestor">Gestor</option>
        </select>

        <div class="roberta">
            <a href="Telainicial.html"><button>Entrar</button></a>
        </div>

        <a href="./Esqueciasenha.html">Esqueceu senha</a>

    </form>
    </div>
    </body>
</html>