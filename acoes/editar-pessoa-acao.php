<?php 
require('../includes/conexao.php');
session_start();

$nome =mb_strtoupper( $_POST['nome']);
$turma = $_POST['turma'];
$estado= $_POST['estado'];
$cidade = $_POST['cidade'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$bairro = mb_strtoupper($_POST['bairro']);
$rua = mb_strtoupper($_POST['rua']);
$numero = $_POST['numero'];
$matricula = $_POST['matricula'];
$dtNascimento = $_POST['dtNascimento'];
$idUsuario = $_POST['idUsuario'];
  
$sql = "
    UPDATE usuarios SET 
        nome = '$nome',  
        idTurma = '$turma', 
        idEstado = '$estado', 
        idCidade = '$cidade', 
        email = '$email', 
        telefone = '$telefone', 
        bairro = '$bairro',
        rua = '$rua',
        numero = '$numero',
        matricula = '$matricula',
        dtNascimento = '$dtNascimento'
        WHERE id = $idUsuario
";


if(mysqli_query($conexao, $sql)){
    
    $idLogado = $_SESSION['idUsuario'];
    if($idLogado == $idUsuario){
        $_SESSION['nome'] = $nome;
    }

    echo "
        <script>
            alert('Alterado com sucesso');
            location.href = '../listar-pessoas.php';
        </script>
";
}else{
    echo "
    <script>
        alert('Erro ao realizar alterações');
        location.href = '../listar-pessoas.php';
    </script>
";
}

?>