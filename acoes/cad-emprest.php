<?php
require('../includes/conexao.php');

$usuario = $_POST['usuario'];
$livro = $_POST['livro'];
$dtDevolucao = $_POST['dtDevolucao'];
$dtEmprestimo = date('Y-m-d');
$sql = "INSERT into emprestimos (idLivro, idUsuario, dtDevolucao, dtEmprestimo) VALUES ('$livro', '$usuario', '$dtDevolucao', '$dtEmprestimo')";

if (mysqli_query($conexao, $sql)) {
  $sqlTotalLidos = "SELECT totalLidos from usuarios where id = $usuario";
  $result = mysqli_query($conexao, $sqlTotalLidos);
  foreach ($result as $total) {
    $totalLidos = $total['totalLidos'] + 1;
  }
  $sqlUpdateUser = "UPDATE usuarios SET totalLidos = $totalLidos WHERE id = $usuario";
  mysqli_query($conexao, $sqlUpdateUser);

  $sqlTotalEmprestimos = "SELECT qtdEmprestimos from livros where id = $livro";
  $result = mysqli_query($conexao, $sqlTotalEmprestimos);
  foreach ($result as $totalLivros) {
    $totalEmprestimos = $totalLivros['qtdEmprestimos'] + 1;
  }
  $sqlUpdateLivro = "UPDATE livros SET qtdEmprestimos = $totalEmprestimos WHERE id = $livro";
  mysqli_query($conexao, $sqlUpdateLivro);


  header('Location: ../listar-emprest.php?msg=sucesso');
} else {
  header('Location: ../listar-emprest.php?msg=erro');
}
