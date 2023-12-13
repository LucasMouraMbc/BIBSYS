<?php 
require('../includes/conexao.php');
session_start();
$id = $_POST['idCategoria'];
$descricao = $_POST['descricao'];

$sql = "
    UPDATE categorias SET descricao = '$descricao' WHERE id = $id
";

if(mysqli_query($conexao, $sql)){
    echo "
        <script>
            alert('Alterado com sucesso');
            location.href = '../listar-categorias.php';
        </script>
    ";
}

?>