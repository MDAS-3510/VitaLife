<?php
include("db/conexao.php")
?>

<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="Css/estilo-padrao.css">
   <title>Sistemas Agendador 1.0</title>
</head>
<body>
   <header class="bg-white">
      <div class="container">
         <h1>Sistemas Agendador 1.0</h1>
         <nav class="navbar navbar-expand-lg navbar-white bg-primary-subtle">
            <a class="navbar-brand" href="#">
               <img src="" alt="">
            </a>
            <a href="index.php?menuop=home">Home</a>
            <a href="index.php?menuop=contatos">Contatos</a>
            <a href="index.php?menuop=tarefas">Tarefas</a>
            <a href="index.php?menuop=eventos">Eventos</a>
         </nav>
      </div>
   </header>

   <main>

   <?php
   $menuop = (isset($_GET["menuop"]))?$_GET["menuop"]:"home";
   switch ($menuop) {
      case 'home':
         include("paginas/home/home.php");
         break;

      case 'contatos':
         include("paginas/contatos/contatos.php");
         break;
         
      case 'cad-contato':
         include("paginas/contatos/cad-contato.php");
         break;

      case 'inserir-contato':
         include("paginas/contatos/inserir-contato.php");
         break;

      case 'editar-contato':
         include("paginas/contatos/editar-contato.php");
         break;

      case 'atualizar-contato':
         include("paginas/contatos/atualizar-contato.php");
         break;

      case 'excluir-contato':
         include("paginas/contatos/excluir-contato.php");
         break;
         
      case 'tarefas':
      include("paginas/tarefas/tarefas.php");
      break;

      case 'eventos':
         include("paginas/eventos/eventos.php");
         break;

      default:
      include("paginas/home/home.php");
         break;
   }
   ?>
   </main>

   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>