function navigate(section) {
    switch (section) {
      case "perfil":
        alert("Navegando para Perfil");
        break;
      case "documentos":
        alert("Navegando para Documentos");
        break;
      case "alergias":
        alert("Navegando para Alergias");
        break;
      case "deficiencias":
        alert("Navegando para Deficiências");
        break;
      case "dadosPessoais":
        alert("Exibindo Dados Pessoais");
        break;
      case "agendamentos":
        alert("Navegando para Agendamentos");
        break;
      case "listaEspera":
        alert("Navegando para Lista de Espera");
        break;
      default:
        alert("Seção não encontrada!");
    }
  }
  