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
    $db->destroy("funcionario", $_GET['id']);

    header('location: FuncionarioList.php');
  }

  if (!empty($_POST)) {
    // var_dump($_POST);
    // exit;
    $dados = $db->search("funcionario", $_POST);
  } else {
    $dados = $db->select("funcionario");

  }

  ?>
  <?php include "../cabecalho.inc.php"; ?>
  <div style="padding: 10px 40px">
    <div>
      <h3>Listagem de Funcionarios</h3>
      <form action="FuncionarioList.php" method="post" class="form-inline" style="gap: 10px; padding: 10px 0 ">
        <select name="tipo" class="form-control">
          <option value="nome">Nome</option>
          <option value="cpf">CPF</option>
          <option value="contratacao">Data contratação</option>
        </select>
        <input type="text" name="valor" class="form-control" />
        <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
        <a href="FuncionarioForm.php" class="btn btn-danger"><i class="fa-solid fa-plus"></i> Cadastrar </a>
      </form>
    </div>

    <table class="table" class="container">
      <thead>
        <tr>
          <th scope="col">#ID</th>
          <th scope="col">Nome</th>
          <th scope="col">CPF</th>
          <th scope="col">Data contratação</th>
          <th scope="col" colspan="2">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($dados as $item) {
          echo "<tr>";
          echo "<th scope='row'>$item->id</th>";
          echo "<th scope='row'>$item->nome</th>";
          echo "<td>$item->cpf</td>";
          echo "<td>$item->contratacao</td>";
          echo "<td><a href='FuncionarioForm.php?id=$item->id'><i class='fa-solid fa-pencil'></i></a></td>";
          echo "<td><a onclick='return confirm(\"Deseja Excluir?\")'
                    href='FuncionarioList.php?id=$item->id'><i class='fa-solid fa-trash'></i></a>
                  </td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <?php include "../rodape.inc.php"; ?>