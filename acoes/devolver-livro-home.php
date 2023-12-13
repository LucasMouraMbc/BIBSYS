<?php 
include('../includes/conexao.php');

$id = $_GET['id'];
$sql = "UPDATE  emprestimos set flDevolvido = 's' WHERE id = $id";



if (mysqli_query($conexao, $sql)) {
    header('Location: ../main.php?msg=sucesso');
  } else {
    header('Location: ../main.php?msg=erro');
  }
?>