<?php
session_start();
include('../includes/conexao.php');
if ($_SESSION['cpf']) {
    $cpf = $_SESSION['cpf'];

    $senhaAtual = md5($_POST['senha-nova']);
    $sqlUpdate = "UPDATE usuarios SET senha = '$senhaAtual' where cpf = $cpf and isAdm = 's'";
    if (mysqli_query($conexao, $sqlUpdate)) {
        header('Location: ../index.php?msg=sucesso');
        session_destroy();
    }
}
