<?php
require('../includes/conexao.php');
require('../includes/validar-login.php');

$genero = mb_strtoupper($_POST['genero']);


$sql = "INSERT INTO generos(descricao) VALUES('$genero')";


if(mysqli_query($conexao, $sql)){
    header('Location: ../listar-genero.php?msg=sucesso');
}
else{
    header('Location: ../listar-genero.php?msg=erro');
}

?>