<?php
require('../includes/conexao.php');
require('../includes/validar-login.php');

//recebendo os dados do form
//identificando os dados do formulario do atributo name


$nome = mb_strtoupper($_POST['nome']);
$estado = mb_strtoupper($_POST['estado']);
$cidade = mb_strtoupper($_POST['cidade']);
$email = strtolower($_POST['email']);
$telefone = $_POST['telefone'];
$bairro = mb_strtoupper($_POST['bairro']);
$rua = mb_strtoupper($_POST['rua']);
$numero = $_POST['numero'];
$dtNascimento = $_POST['dtNascimento'];
$senha = md5($_POST['senha']);
$confirmaSenha = md5($_POST['confirmaSenha']);
$cpf = $_POST['cpf'];
$idTurma = '';

if ($senha == $confirmaSenha) {
   $sql = "INSERT INTO usuarios( 
      idEstado, 
      idCidade,
      idTurma,
      nome,
      email,
      telefone,
      bairro,
      rua,
      numero, 
      dtNascimento,
      senha,
      isAdm,
      cpf) 
      VALUES( 
          '$estado', 
          '$cidade',
          '$idTurma', 
          '$nome',
          '$email',
          '$telefone',
          '$bairro',
          '$rua',
          '$numero',
          '$dtNascimento',
          '$senha',
          's',
          '$cpf')";

   if (mysqli_query($conexao, $sql)) {
      header('Location: ../cadastrar-adm.php?msg=sucesso');
   } else {
      header('Location: ../cadastrar-adm.php?msg=erro');
   }
} else {

   header('Location: ../cadastrar-adm.php?msg=erroSenha');
   echo "
   <div class='alert alert-danger'>
   As senhas devem ser iguais!
   </div>
";
}
