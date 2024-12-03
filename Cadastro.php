<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro</title>
<link rel="stylesheet" href="css/Cadastro.css">
<script>
   function toggleFields() {
      var tipo = document.getElementById("tipo").value;
      var identificadorLabel = document.getElementById("identificadorLabel");
      var identificador = document.getElementById("identificador");

      if (tipo === "medico") {
         identificadorLabel.textContent = "CRM:";
      } else if (tipo === "gestor") {
         identificadorLabel.textContent = "Registro:";
      } else {
         identificadorLabel.textContent = "CPF:";
      }
   }
</script>
</head>
<body>
<div class="form-container">
   <div class="buttonsform"></div>
   <h2>Cadastrar-se </h2>
   <form id="cadastro-form" action="processar_cadastro.php" method="post">
      <label for="nome">Nome Completo:</label>
      <input type="text" name="nome" required>

      <label for="nome">E-mail:</label>
      <input type="email" name="email" required>

      <label id="identificadorLabel" for="identificador">CPF:</label>
      <input type="text" id="identificador" name="identificador" required>


      <label for="tipo">Tipo de Cadastro:</label>
      <select id="tipo" name="tipo" required onchange="toggleFields()">
         <option value="paciente">Paciente</option>
         <option value="medico">Médico</option>
         <option value="gestor">Gestor</option>
      </select>

      <div class="roberta">
         <a href="#"><button>Cadastrar</button></a>
      </div>

      <a href="Login.php">Já tem uma conta?</a>

   </form>
</div>
</body>
</html>