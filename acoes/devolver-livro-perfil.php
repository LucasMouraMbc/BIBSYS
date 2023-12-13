<?php 
include('../includes/conexao.php');

$id = $_GET['id'];
$idUser = $_GET['idUser'];
$sql = "UPDATE  emprestimos set flDevolvido = 's' WHERE id = $id";


if (mysqli_query($conexao, $sql)) {
    header("Location: ../ver-aluno.php?id=$idUser");
  } else {
    header("Location: ../ver-aluno.php?id=$idUser");
  }
?>