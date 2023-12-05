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
    $db->destroy("loja", $_GET['id']);

    header('location: LojaList.php');
  }

  if (!empty($_POST)) {
    // var_dump($_POST);
    // exit;
    $dados = $db->search("loja", $_POST);
  } else {
    $dados = $db->select("loja");

  }

  ?>
  <?php include "../cabecalho.inc.php"; ?>
  <div style="padding: 10px 40px">
    <div>
      <h3>Listagem de Lojas</h3>
      <form action="LojaList.php" method="post" class="form-inline" style="gap: 10px; padding: 10px 0 ">
        <select name="tipo" class="form-control">
          <option value="nome">Nome</option>
          <option value="telefone">Telefone</option>
          <option value="endereco">Endereço</option>
        </select>
        <input type="text" name="valor" class="form-control" />
        <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
        <a href="LojaForm.php" class="btn btn-danger"><i class="fa-solid fa-plus"></i> Cadastrar </a>
      </form>
    </div>

    <table class="table" class="container">
      <thead>
        <tr>
          <th scope="col">#ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Telefone</th>
          <th scope="col">Endereço</th>
          <th scope="col" colspan="2">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($dados as $item) {
          echo "<tr>";
          echo "<th scope='row'>$item->id</th>";
          echo "<th scope='row'>$item->nome</th>";
          echo "<td>$item->telefone</td>";
          echo "<td>$item->endereco</td>";
          echo "<td><a href='LojaForm.php?id=$item->id'><i class='fa-solid fa-pencil'></i></a></td>";
          echo "<td><a onclick='return confirm(\"Deseja Excluir?\")'
                    href='LojaList.php?id=$item->id'><i class='fa-solid fa-trash'></i></a>
                  </td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <?php include "../rodape.inc.php"; ?>