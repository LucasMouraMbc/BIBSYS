<?php
require('../includes/conexao.php');
require('../includes/validar-login.php');


$nome = $_SESSION['idPessoa'];
$titulo = mb_strtoupper($_POST['titulo']);
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
#$imagem = $_POST['imagem'];


$sql = "INSERT INTO livros (`idCategoria`, `idEditora`, `idGenero`, `titulo`, `autor`, `edicao`, `anoPublicacao`, `registro`, `isbn`, `dtEntrada`, `qtdPaginas`, `estoque`, `localizacao`, `resumo`, `imagem`) 
        VALUES (
            '$categoria', 
            '$editora',
            '$genero',
            '$titulo',
            '$autor',
            '$edicao',
            '$anoPublicacao',
            '$registro',
            '$isbn',
            '$dtEntrada',
            '$qtdPaginas',
            '$estoque',
            '$localizacao',
            '$resumo',
            '$imagem'
        )";

//executar query no banco
if (mysqli_query($conexao, $sql)) {
    header('Location: ../listar-livro.php?msg=sucesso');
} else {
    header('Location: ../listar-livro.php?msg=erro');
}
