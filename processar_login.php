<?php
include('processar_cadastro.php');

$user_type = $_POST['user_type'];
$identificador = $_POST['identificacao'];

// Definir a query conforme o tipo de usuário
if ($user_type == 'medico') {
    $sql = "SELECT * FROM users WHERE crm = ?";
} elseif ($user_type == 'gestor') {
    $sql = "SELECT * FROM users WHERE matricula = ?";
} else {
    $sql = "SELECT * FROM users WHERE cpf = ?";
}

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $identificacao);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // O usuário foi encontrado, redireciona para a área interna
    session_start();
    $user = $result->fetch_assoc();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_type'] = $user_type;
    header('Location: Prontuario.html');
} else {
    // Usuário não encontrado
    echo "Credenciais inválidas.";
}
?>