<?php 
require('../includes/conexao.php');
session_start();
$id = $_POST['idGenero'];
$descricao = mb_strtoupper($_POST['descricao']);

$sql = "
    UPDATE generos SET descricao = '$descricao' WHERE id = $id
";

if(mysqli_query($conexao, $sql)){
    echo "
        <script>
            alert('Alterado com sucesso');
            location.href = '../listar-genero.php';
        </script>
    ";
}

?>