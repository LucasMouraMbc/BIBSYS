<?php
session_start();
include('../includes/conexao.php');
$idUser = $_SESSION['idUsuario'];
$senhaAntiga = md5($_POST['senha-antiga']);
$sql = "SELECT senha from usuarios where id = $idUser";

$result = mysqli_query($conexao, $sql);

foreach ($result as $r) {
    $senhaBD = $r['senha'];
}

if ($senhaAntiga != $senhaBD) {
    header('Location: ../alterar-senha.php?msg=erroSenha');
} else {
    $senhaAtual = md5($_POST['senha-nova']);
    $sqlUpdate = "UPDATE usuarios SET senha = '$senhaAtual' where id = $idUser";
    if (mysqli_query($conexao, $sqlUpdate)) {
        header('Location: ../alterar-senha.php?msg=sucesso');
    }
}
