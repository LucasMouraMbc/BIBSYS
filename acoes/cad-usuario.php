<?php
require('../includes/conexao.php');
require('../includes/validar-login.php');

//recebendo os dados do form
//identificando os dados do formulario do atributo name
echo "<pre>";
var_dump($_POST);
echo "</pre>";
//montar query
$nome = mb_strtoupper($_POST['nome']);
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$email = strtolower($_POST['email']);
$telefone = $_POST['telefone'];
$bairro = mb_strtoupper($_POST['bairro']);
$rua = mb_strtoupper($_POST['rua']);
$numero = $_POST['numero'];
$matricula = $_POST['matricula'];
$dtNascimento = $_POST['dtNascimento'];
$turma = $_POST['turma'];


$sql = "INSERT INTO usuarios(
        idTurma, 
        idEstado, 
        idCidade,
        nome,
        email,
        telefone,
        bairro,
        rua,
        numero,
        matricula, 
        dtNascimento,
        isAdm) 
        VALUES(
            '$turma', 
            '$estado', 
            '$cidade', 
            '$nome',
            '$email',
            '$telefone',
            '$bairro',
            '$rua',
            '$numero',
            '$matricula',
            '$dtNascimento',
            'n')";
echo $sql;
//executar query no banco

if(mysqli_query($conexao, $sql)){
   header('Location: ../listar-pessoas.php?msg=sucesso');
}
else{
   header('Location: ../listar-pessoas.php?msg=erro');
}

?>