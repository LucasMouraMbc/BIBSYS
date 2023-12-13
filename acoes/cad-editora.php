<?php
require('../includes/conexao.php');
require('../includes/validar-login.php');

$editora = mb_strtoupper($_POST['editora']);


$sql = "INSERT INTO editoras (nome) VALUES('$editora')";


if(mysqli_query($conexao, $sql)){
    header('Location: ../listar-editora.php?msg=sucesso');
}
else{
    header('Location: ../listar-editora.php?msg=erro');
}

?>