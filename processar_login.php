<?php
include('processar_cadastro.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$user_type = $_POST['tipo'];
$identificador = $_POST['identificador'];

if ($user_type == 'medico') {
    $sql = "SELECT * FROM users WHERE tipo_cadastro = 'medico' AND crm = ?";
} elseif ($user_type == 'gestor') {
    $sql = "SELECT * FROM users WHERE tipo_cadastro = 'gestor' AND matricula = ?";
} else {
    $sql = "SELECT * FROM users WHERE tipo_cadastro = 'paciente' AND cpf = ?";
}

$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Erro na preparação da consulta: " . $conn->error);
}

$stmt->bind_param("s", $identificador);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    session_start();
    $user = $result->fetch_assoc();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_type'] = $user_type;
    header('Location: Prontuario.php');
    exit();
} else {
    echo "Credenciais inválidas.";
}

$stmt->close();
$conn->close();
?>