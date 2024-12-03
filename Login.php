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
    <h2>Login</h2>
    <form id="cadastroForm" action="processar_login.php" method="POST">
        <label for="email">E-mail:</label>
        <input type="text" id="email" name="email" required> <!-- Adicionado name aqui -->

        <label id="identificadorLabel" for="identificador">CPF:</label>
        <input type="text" id="identificador" name="identificador" required>

        <label for="tipo">Entrar como:</label>
        <select id="tipo" name="tipo" required onchange="toggleFields()">
            <option value="paciente">Paciente</option>
            <option value="medico">Médico</option>
            <option value="gestor">Gestor</option>
        </select>

        <div class="roberta">
            <button type="submit">Entrar</button> <!-- Removido o link -->
        </div>
    </form>
</div>
</body>
</html>