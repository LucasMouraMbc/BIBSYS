<?php
require('../includes/conexao.php');
require('../includes/validar-login.php');

$id = $_POST['idLivro'];
$nome = $_SESSION['idPessoa'];
$titulo =mb_strtoupper( $_POST['titulo']);
$autor = mb_strtoupper($_POST['autor']);
$categoria = $_POST['categoria'];
$genero = $_POST['genero'];
$edicao = $_POST['edicao'];
$editora = $_POST['editora'];
$anoPublicacao = $_POST['anoPublicacao'];
$registro = $_POST['registro'];
$isbn = $_POST['isbn'];
$qtdPaginas = $_POST['qtdPaginas'];
$estoque = $_POST['estoque'];
$localizacao = $_POST['localizacao'];
$resumo = $_POST['resumo'];
$dtEntrada = $_POST['dtEntrada'];



$sql = "
    UPDATE livros SET 
        idCategoria = '$categoria', 
        idEditora = '$editora', 
        titulo='$titulo', 
        autor= '$autor',
        edicao = '$edicao',
        anoPublicacao = '$anoPublicacao',
        registro='$registro',
        isbn = '$isbn',
        dtEntrada = '$dtEntrada',
        qtdPaginas = '$qtdPaginas',
        estoque = '$estoque',
        localizacao = '$localizacao',
        resumo = '$resumo'
       WHERE id = $id";

//executar query no banco

var_dump(mysqli_query($conexao, $sql));
if (mysqli_query($conexao, $sql)) {
    header('Location: ../listar-livro.php?msg=sucesso');
} else {
   header('Location: ../listar-livro.php?msg=erro');
}
