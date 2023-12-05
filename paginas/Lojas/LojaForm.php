<?php
include '../../db.class.php';
?>

<?php
$db = new DB();
$db->conn();

if (!empty($_POST['id'])) {
  $db->update("loja", $_POST);
  header("location: LojaList.php");

} else if ($_POST) {
  $db->insert("loja", $_POST);
  header("location: LojaList.php");
}

if (!empty($_GET['id'])) {
  $loja = $db->find("loja", $_GET['id']);
  //var_dump($loja);
}
?>
<?php
include "../../imports.php";
?>
<?php include "../cabecalho.inc.php"; ?>
<div class="d-flex flex-column bd-highlight mb-3 justify-content-center align-items-center flex-grow-1"
  style="padding: 200px 0 0 0 ">
  <h3>Formulário Lojas</h3>

  <form action="LojaForm.php" method="post">
    <input type="hidden" name="id" class="form-control" value="<?php echo !empty($loja->id) ? $loja->id : "" ?>">

    <label for="nome">Nome</label><br>
    <input type="text" name="nome" class="form-control"
      value="<?php echo !empty($loja->nome) ? $loja->nome : "" ?>"><br>

    <label for="telefone">Telefone</label><br>
    <input type="text" name="telefone" class="form-control"
      value="<?php echo !empty($loja->telefone) ? $loja->telefone : "" ?>"><br>

    <label for="endereco">Endereço</label><br>
    <input type="text" name="endereco" class="form-control"
      value="<?php echo !empty($loja->endereco) ? $loja->endereco : "" ?>"><br>

    <div class="d-flex justify-content-between">
      <button type="submit" class="btn btn-danger">
        <?php echo !empty($_GET['id']) ? "Editar" : "Salvar" ?>
      </button>
      <a href="LojaList.php" class="btn btn-secondary"> Voltar </a>
    </div>

  </form>
</div>
<?php include "../rodape.inc.php"; ?>