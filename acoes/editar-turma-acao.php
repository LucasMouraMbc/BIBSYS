<?php 
require('../includes/conexao.php');
session_start();
$id = $_POST['idTurma'];
$descricao = $_POST['descricao'];

$sql = "
    UPDATE turmas SET descricao = '$descricao' WHERE id = $id
";

if(mysqli_query($conexao, $sql)){
    echo "
        <script>
            alert('Alterado com sucesso');
            location.href = '../listar-turma.php';
        </script>
    ";
}

?>