<?php
require('../includes/conexao.php');
require('../includes/validar-login.php');

$categoria = mb_strtoupper($_POST['categoria']);


$sql = "INSERT INTO categorias(descricao) VALUES('$categoria')";


if(mysqli_query($conexao, $sql)){
    header('Location: ../listar-categorias.php?msg=sucesso');
}
else{
    header('Location: ../listar-categorias.php?msg=erro');
}

?>