<?php
require('../includes/conexao.php');

$email = $_POST['email'];
$senha = md5($_POST['senha']);

$sql = "SELECT COUNT(*) FROM usuarios WHERE email = '$email' AND senha = '$senha'";



$resultado = mysqli_query($conexao, $sql);
if ($resultado) {
    $dados = mysqli_fetch_assoc($resultado);
    $numLinhas = $dados['COUNT(*)'];

    if ($numLinhas > 0) {
        session_start();
        $_SESSION['logado'] = true;


        $sql = "SELECT * from usuarios WHERE email = '$email' and senha ='$senha'";
        $result = mysqli_query($conexao, $sql);

        while ($dados = mysqli_fetch_assoc($result)) {
            $_SESSION['nome'] = $dados['nome'];
            $_SESSION['idUsuario'] = $dados['id'];
        }



        echo "
        <script>
            location.href = '../main.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Ops! Dados incorretos');
            location.href ='../index.php';
        </script>
     ";
    }
}
