<?php
include '../../db.class.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  include "../../imports.php";
  ?>
</head>

<body>
  <?php
  $db = new DB();
  $db->conn();

  if (!empty($_GET['id'])) {
    $db->destroy("carro", $_GET['id']);

    header('location: CarroList.php');
  }

  if (!empty($_POST)) {
    // var_dump($_POST);
    // exit;
    $dados = $db->search("carro", $_POST);
  } else {
    $dados = $db->select("carro");

  }

  ?>
  <?php include "../cabecalho.inc.php"; ?>
  <div style="padding: 10px 40px">
    <div>
      <h3>Listagem de Veiculos</h3>
      <form action="CarroList.php" method="post" class="form-inline" style="gap: 10px; padding: 10px 0 ">
        <select name="tipo" class="form-control">
          <option value="modelo">Modelo</option>
          <option value="preco">Preço</option>
          <option value="ano">Ano</option>
        </select>
        <input type="text" name="valor" class="form-control" />
        <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
        <a href="CarroForm.php" class="btn btn-danger"><i class="fa-solid fa-plus"></i> Cadastrar </a>
      </form>
    </div>

    <table class="table" class="container">
      <thead>
        <tr>
          <th scope="col">#ID</th>
          <th scope="col">Modelo</th>
          <th scope="col">Preço</th>
          <th scope="col">Ano</th>
          <th scope="col" colspan="2">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($dados as $item) {
          echo "<tr>";
          echo "<th scope='row'>$item->id</th>";
          echo "<th scope='row'>$item->modelo</th>";
          echo "<td>$item->preco</td>";
          echo "<td>$item->ano</td>";
          echo "<td><a href='CarroForm.php?id=$item->id'><i class='fa-solid fa-pencil'></i></a></td>";
          echo "<td><a onclick='return confirm(\"Deseja Excluir?\")'
                    href='CarroList.php?id=$item->id'><i class='fa-solid fa-trash'></i></a>
                  </td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <?php include "../rodape.inc.php"; ?>