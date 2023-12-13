<?php

require('includes/validar-login.php');
require('includes/menu.php');
require('includes/conexao.php');

?>

<main id="main" class="main">
  <div class="row">
    <div class="col-md-12">
    <div class="offset-md-10 col-md-2">
        <a href="cadastrar-emprest.php">
          <button class="btn btn-primary w-100" type="submit">
          <i class="bi bi-plus-circle-fill"></i> Novo Empréstimo</button>
        </a>
      </div><br>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Titulo</th>
            <th scope="col">Autor</th>
            <th scope="col">Usuário</th>
            <th scope="col">Turma</th>
            <th scope="col">Data de devolução</th>
            <th scope="col">Ações</th>
          </tr>

        </thead>
        <tbody>

          <?php
          function data_br($data_bd)
          {
            return implode('/', array_reverse(explode('-', $data_bd)));
          }
          $sql = "SELECT *, e.id as idEmprestimo, l.autor as nomeAutor, u.idTurma as idTurma , u.id as idUsuario, l.id as idLivro, t.descricao as nomeTurma from emprestimos as e JOIN usuarios as u on u.id = e.idUsuario join livros as l on l.id = e.idLivro  join turmas as t on u.idTurma = t.id WHERE e.flDevolvido = 'n' ORDER BY idEmprestimo DESC";

          $result = mysqli_query($conexao, $sql);

          foreach ($result as $r) {
            $id = $r['idEmprestimo'];
            $titulo = strtoupper($r['titulo']);
            $turma = $r['nomeTurma'];
            $nome = $r['nome'];
            $autor = $r['nomeAutor'];
            $dtDevolucao = data_br($r['dtDevolucao']);
            $devolvido = $r['flDevolvido'];
            $idUsuario = $r['idUsuario'];
            $filtroNome = explode (" ",$nome);
            $exibeNome = $filtroNome[0];



            $dataAtual = date('Y-m-d');
            if ($devolvido == 'n') {
              if ($dataAtual > $r['dtDevolucao']) {
                $btn = " <a href='acoes/devolver-livro.php?id=$id' onclick=\"return confirm('Tem certeza que deseja devolver este livro?')\">
                <button class='btn btn-danger btn-sm btn-extra-pequeno'>Devolver com atraso</button>
              </a>";
              } else {
                $btn = " <a href='acoes/devolver-livro.php?id=$id' onclick=\"return confirm('Tem certeza que deseja devolver este livro?')\">
                <button class='btn btn-info btn-sm btn-extra-pequeno'>Devolver</button>
              </a>";
              }
            } else {
              $btn =
                "<button class='btn btn-success btn-sm' disabled>Devolvido</button>";
            }
            echo "
      <tr>
        <th scope='row'>$id</th>
        <td>$titulo</td>
        <td>$autor</td>
        <td>$exibeNome</td>
        <td>$turma</td>
        <td>$dtDevolucao</td>

        
        <td>
       $btn
        <a href='ver-aluno.php?id=$idUsuario'
          <button class='btn btn-warning btn-sm btn-extra-pequeno'>Ver aluno</button>
        </a>
        </td>
      </tr>
      
      
      ";
          }

          ?>

        </tbody>
      </table>
    </div>
  </div>
  
</main>




<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>