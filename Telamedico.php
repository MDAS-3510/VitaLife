<!DOCTYPE html>
<html lang="pt-BR">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Tela do Médico</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
      <style>
            body {
                  font-family: Arial, sans-serif;
                  margin: 0;
                  padding: 0;
                  display: flex;
                  height: 100vh;
                  font-family: 'Poppins', sans-serif;
                  ;
            }

            .sidebar {
                  width: 250px;
                  background-color: #2c3e50;
                  color: white;
                  display: flex;
                  flex-direction: column;
                  padding: 20px;
            }

            .sidebar h2 {
                  font-size: 20px;
                  margin-bottom: 30px;
            }

            .sidebar a {
                  text-decoration: none;
                  color: white;
                  padding: 10px;
                  margin: 5px 0;
                  display: block;
                  border-radius: 5px;
            }

            .sidebar a:hover {
                  background-color: #34495e;
            }

            .main {
                  flex: 1;
                  background-color: #ecf0f1;
                  display: flex;
                  flex-direction: column;
            }

            .header {
                  background-color: #2198A9;
                  color: white;
                  padding: 10px 20px;
                  display: flex;
                  justify-content: space-between;
                  align-items: center;
            }

            .header .user-info {
                  display: flex;
                  align-items: center;
            }

            .header .user-info img {
                  width: 50px;
                  height: 50px;
                  border-radius: 50%;
                  margin-right: 20px;
            }

            .content {
                  padding: 30px;
                  overflow-y: auto;
            }

            .card {
                  background-color: white;
                  margin-bottom: 20px;
                  padding: 15px;
                  border-radius: 5px;
                  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .card h3 {
                  margin: 0;
                  margin-bottom: 10px;
            }

            .footer {
                  text-align: center;
                  padding: 10px;
                  background-color: #bdc3c7;
            }

            .voltar-button{
            width: 40%;
            padding: 10px;
            background-color: #fff;
            color: #2198A9;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s ease;
            margin-top: 20px;
            margin-bottom: 30px;
            }
      </style>
</head>

<body>
      <div class="sidebar">
            <a href="./PaginasMedico/">Agenda de Consultas</a>
            <a href="Prontuariotelamedico.html">Prontuário Eletrônico</a>
            <a href="#">Mensagens</a>
            <input class="voltar-button" value="Sair" type="button" onclick="window.location.href='./Telainicial.html';">
      </div>

      <div class="main">
            <div class="header">
                  <h1>Bem-vindo médico!</h1>
                  <div class="user-info">
                        <img src="imagem/medico1.png" alt="Avatar do Médico">
                        <span> Dr. Edjarbas Maluf Hernandes </span>
                  </div>
            </div>

            <div class="content">
                  <div class="card">
                        <h3>Consultas do Dia</h3>
                        <p>Próxima consulta: 14:00 - Maria Oliveira</p>
                        <p>Status: Confirmado</p>
                  </div>

                  <div class="card">
                        <h3>Últimos Exames Recebidos</h3>
                        <ul>
                              <li>Pedro Costa - Hemograma</li>
                              <li>Juliana Alves - Ressonância Magnética</li>
                        </ul>
                  </div>
            </div>
      </div>
</body>

</html>