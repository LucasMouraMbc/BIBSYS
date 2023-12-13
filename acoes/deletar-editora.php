<?php
require('../includes/validar-login.php');
require('../includes/conexao.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];


    $sql = "DELETE FROM editoras WHERE id  = $id";


    if(mysqli_query($conexao, $sql)){
        echo "
            <script>
                alert('Deletado com Sucesso');
                location.href='../listar-editora.php';
            </script>
        ";

    }
    
}




?>