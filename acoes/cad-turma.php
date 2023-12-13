<?php
require('../includes/conexao.php');
require('../includes/validar-login.php');

$genero = mb_strtoupper($_POST['turma']);


$sql = "INSERT INTO turmas(descricao) VALUES('$genero')";


if(mysqli_query($conexao, $sql)){
    header('Location: ../listar-turma.php?msg=sucesso');
}
else{
    header('Location: ../listar-turma.php?msg=erro');
}

?>