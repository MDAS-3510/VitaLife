<?php

?>

<!DOCTYPE html>
<html lang="pt">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <title>Sistemas Agendador 1.0</title>
</head>

<body>

   <style>
      .custom-navbar {
         background-color: #2198A9;
      }
   </style>
   <header>
      <div class="contaier">
         <nav class="navbar navbar-expand-lg custom-navbar">
            <div class="container-fluid">
               <a class="navbar-brand" style="color: white;" href="#">Agenda</a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                     <li class="nav-item">
                        <a class="nav-link" style="color: white;" href="index.php?menuop=contatos">Contatos</a>
                     </li>

                     <li class="nav-item">
                        <a class="nav-link" style="color: white;" href="index.php?menuop=tarefas">Tarefas</a>
                     </li>

                     <li class="nav-item">
                        <a class="nav-link" style="color: white;" href="index.php?menuop=eventos">Eventos</a>
                     </li>

                  </ul>
               </div>
            </div>
         </nav>
   </header>
</body>


<?php
$menuop = (isset($_GET["menuop"])) ? $_GET["menuop"] : "home";
switch ($menuop) {
   case 'contatos':
      include("./contatos/contatos.php");
      break;



      //==================================================//
      //Contatos
   case 'contatos':
      include("./contatos/contatos.php");
      break;

   case 'cad-contato':
      include("./contatos/cad-contato.php");
      break;

   case 'editar-contato':
      include("./contatos/editar-contato.php");
      break;

   case 'excluir-contato':
      include("./contatos/excluir-contato.php");
      break;
      //==================================================//


      //==================================================//
   case 'tarefas':
      include("./tarefas/tarefas.php");
      break;

   case 'cad-tarefas':
      include("./tarefas/cad-tarefas.php");
      break;

   case 'excluir-tarefas':
      include('./tarefas/excluir-tarefas.php');
      break;

   case 'editar-tarefas':
      include('./tarefas/editar-tarefas.php');
      break;
      //==================================================//



      //==================================================//
   case 'eventos':
      include("./eventos/eventos.php");
      break;

   case 'cad-eventos':
      include("./eventos/cad-eventos.php");
      break;

   case 'excluir-eventos':
      include('./eventos/excluir-eventos.php');
      break;

   case 'editar-eventos':
      include('./eventos/editar-eventos.php');
      break;
      //==================================================//

   default:
      include("./contatos/contatos.php");
      break;
}
?>
</main>


<script src="JAVA/javascript-flag.js"></script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="JAVA/validation.js"></script>
<script src="JAVA/jquery-validation.js"></script>
<script src="JAVA/jquery.js"></script>
</body>

</html>