<?php
include '../../db.class.php';
?>

<?php
$db = new DB();
$db->conn();

if (!empty($_POST['id'])) {
  $db->update("funcionario", $_POST);
  header("location: FuncionarioList.php");

} else if ($_POST) {
  $db->insert("funcionario", $_POST);
  header("location: FuncionarioList.php");
}

if (!empty($_GET['id'])) {
  $funcionario = $db->find("funcionario", $_GET['id']);
  //var_dump($funcionario);
}
?>
<?php
include "../../imports.php";
?>
<?php include "../cabecalho.inc.php"; ?>
<div class="d-flex flex-column bd-highlight mb-3 justify-content-center align-items-center flex-grow-1"
  style="padding: 200px 0 0 0 ">
  <h3>Formulário Funcionarios</h3>

  <form action="FuncionarioForm.php" method="post">
    <input type="hidden" name="id" class="form-control" value="<?php echo !empty($funcionario->id) ? $funcionario->id : "" ?>">

    <label for="nome">Nome</label><br>
    <input type="text" name="nome" class="form-control"
      value="<?php echo !empty($funcionario->nome) ? $funcionario->nome : "" ?>"><br>

    <label for="cpf">CPF</label><br>
    <input type="text" name="cpf" class="form-control"
      value="<?php echo !empty($funcionario->cpf) ? $funcionario->cpf : "" ?>"><br>

    <label for="contratacao">Data contratação</label><br>
    <input type="date" name="contratacao" class="form-control"
      value="<?php echo !empty($funcionario->contratacao) ? $funcionario->contratacao : "" ?>"><br>

    <div class="d-flex justify-content-between">
      <button type="submit" class="btn btn-danger">
        <?php echo !empty($_GET['id']) ? "Editar" : "Salvar" ?>
      </button>
      <a href="FuncionarioList.php" class="btn btn-secondary"> Voltar </a>
    </div>

  </form>
</div>
<?php include "../rodape.inc.php"; ?>