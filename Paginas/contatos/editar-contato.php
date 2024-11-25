<?php
require "../Classes/Contato.class.php";
$contato = new Contato();
?>
<?php
$idContato = $_GET['idContato'];
$dados = $contato->localizarContato($idContato);

if (empty($dados)) {
      echo "Nenhum contato encontrado";
}

if (isset($_POST['nomeContato'])) {
      $id = $_POST['idContato'];
      $nome = $_POST['nomeContato'];
      $email = $_POST['emailContato'];
      $tel = $_POST['telefoneContato'];
      $end = $_POST['enderecoContato'];
      $crm = $_POST['crmContato'];

      if ($contato->alterarContato($id, $nome, $email, $tel, $end, $crm)) {
            header("Location: index.php?menuop=contatos");
            exit;
      }
}
?>
<div>
      <style>
            label {
                  display: block;
            }
      </style>


      <div class="row">
            <div class="col-6">
                  <form action="" method="post">
                        <div class="mb-3 col-3">
                              <label class="form-label" for="idContato">ID</label>
                              <div class="input-group">
                                    <span class="input-group-text">
                                          <i class="bi bi-key-fill"></i>
                                    </span>
                                    <input class="form-control" type="text" name="idContato" value="<?= $dados['idContato'] ?>" readonly>
                              </div>
                        </div>

                        <div class="mb-3">
                              <label class="form-label" for="nomeContato">Nome</label>
                              <div class="input-group">
                                    <span class="input-group-text">
                                          <i class="bi bi-person-fill"></i>
                                    </span>
                                    <input class="form-control" type="text" name="nomeContato" value="<?= $dados['nomeContato'] ?>">
                              </div>
                        </div>

                        <div class="mb-3">
                              <label class="form-label" for="emailContato">Email</label>
                              <div class="input-group">
                              <span class="input-group-text">@</span>
                <input class="form-control" type="text" name="emailContato" value="<?=$dados['emailContato']?>">
            </div>
                        </div>

                        <div class="mb-3">
                              <label class="form-label" for="telefoneContato">Telefone</label>
                              <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-telephone-fill"></i>
                </span>
                <input class="form-control" type="text" name="telefoneContato" value="<?=$dados['telefoneContato']?>">
            </div>
                        </div>

                        <div class="mb-3">
                              <label class="form-label" for="crmContato">CRM</label>
                              <div class="input-group">
                              <span class="input-group-text">⚕</span>
                <input class="form-control" type="text" name="crmContato" value="<?=$dados['crmContato']?>">
            </div>
                        </div>

                        <div class="mb-3">
                              <label class="form-label" for="enderecoContato">Endereço</label>
                              <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-mailbox2"></i>
                </span>
                <input class="form-control" type="text" name="enderecoContato" value="<?=$dados['enderecoContato']?>">
            </div>
                        </div>

                        <div class="mb-3">
                              <input class="btn btn-warning" type="submit" value="Atualizar" name="btn-atualizar">
                        </div>
                  </form>
            </div>
      </div>