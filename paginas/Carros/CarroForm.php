<?php
include '../../db.class.php';
?>

<?php
$db = new DB();
$db->conn();

if (!empty($_POST['id'])) {
  $db->update("carro", $_POST);
  header("location: CarroList.php");

} else if ($_POST) {
  $db->insert("carro", $_POST);
  header("location: CarroList.php");
}

if (!empty($_GET['id'])) {
  $carro = $db->find("carro", $_GET['id']);
  //var_dump($carro);
}
?>
<?php
include "../../imports.php";
?>
<?php include "../cabecalho.inc.php"; ?>
<div class="d-flex flex-column bd-highlight mb-3 justify-content-center align-items-center flex-grow-1"
  style="padding: 200px 0 0 0 ">
  <h3>Formulário Veículo</h3>

  <form action="CarroForm.php" method="post">
    <input type="hidden" name="id" class="form-control" value="<?php echo !empty($carro->id) ? $carro->id : "" ?>">

    <label for="modelo">Modelo</label><br>
    <input type="text" name="modelo" class="form-control"
      value="<?php echo !empty($carro->modelo) ? $carro->modelo : "" ?>"><br>

    <label for="preco">Preço</label><br>
    <input type="text" name="preco" class="form-control"
      value="<?php echo !empty($carro->preco) ? $carro->preco : "" ?>"><br>

    <label for="ano">Ano</label><br>
    <input type="number" name="ano" class="form-control"
      value="<?php echo !empty($carro->ano) ? $carro->ano : "" ?>"><br>

    <div class="d-flex justify-content-between">
      <button type="submit" class="btn btn-danger">
        <?php echo !empty($_GET['id']) ? "Editar" : "Salvar" ?>
      </button>
      <a href="CarroList.php" class="btn btn-secondary"> Voltar </a>
    </div>

  </form>
</div>
<?php include "../rodape.inc.php"; ?>