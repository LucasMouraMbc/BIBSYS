<?php 
require('../includes/conexao.php');
session_start();
$id = $_POST['idEditora'];
$descricao = mb_strtoupper($_POST['descricao']);

$sql = "
    UPDATE editoras SET nome = '$descricao' WHERE id = $id
";

if(mysqli_query($conexao, $sql)){
    echo "
        <script>
            alert('Alterado com sucesso');
            location.href = '../listar-editora.php';
        </script>
    ";
}

?>