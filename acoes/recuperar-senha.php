<?php 
include('../includes/conexao.php');
$email = $_POST['email'];
$dtNascimento = $_POST['dtNascimento'];
$cpf = $_POST['cpf'];

$sql = "SELECT count(*) as total from usuarios WHERE email = '$email' and dtNascimento = '$dtNascimento' and cpf = '$cpf' and isAdm = 's'";

$result= mysqli_query($conexao, $sql);

if($result->num_rows > 0){
    session_start();
    $_SESSION['cpf'] = $cpf;
    header("Location: ../recuperar-senha-alterar.php");
}else{
    header("Location: ../recuperar-senha.php?msg=erro");
}

?>