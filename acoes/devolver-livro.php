<?php 
include('../includes/conexao.php');

$id = $_GET['id'];
$sql = "UPDATE  emprestimos set flDevolvido = 's' WHERE id = $id";



if (mysqli_query($conexao, $sql)) {
    header('Location: ../listar-emprest.php?msg=sucesso');
  } else {
    header('Location: ../listar-emprest.php?msg=erro');
  }
?>