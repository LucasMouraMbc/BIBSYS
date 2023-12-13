<?php

require('includes/validar-login.php');
require('includes/menu.php');
require('includes/conexao.php');

?>

<main id="main" class="main">
  <div class="row">


    <div class="offset-md-1 col-md-7">

      <h3>Lista de Pessoas</h3>
      <div class="offset-md-11 col-md-4">
        <a href="cadastrar-pessoa.php">
          <button class="btn btn-primary w-100" type="submit">Novo Usuário</button>
        </a>
      </div><br>
      <?php
      if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        if ($msg == "sucesso") {
          echo "
                              <div class='alert alert-success'>
                              Pessoa cadastrada com sucesso!
                              </div>
                          ";
        } else {
          echo "
                              <div class='alert alert-danger'>
                              Ops! Erro ao cadastrar!
                              </div>
                            ";
        }
      }

      ?>
    </div>

    <br><Br>
    <div class="offset-md-1 col-md-10">

      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Turma</th>
            <th scope="col">Ações</th>
          </tr>

        </thead>
        <tbody>

          <?php

          $sql = "SELECT *, u.id as idUsuario FROM usuarios as u join turmas as t on u.idTurma = t.id ORDER BY nome ASC";

          $result = mysqli_query($conexao, $sql);

          foreach ($result as $r) {
            $id = $r['idUsuario'];
            $nome = strtoupper($r['nome']);
            $email = $r['email'];
            $turma = $r['descricao'];


            echo "
      <tr>
        <th scope='row'>$id</th>
        <td>$nome</td>
        <td>$email</td>
        <td>$turma</td>

  

        
        <td>
        <a href='editar-pessoa.php?id=$id'>
          <button class='btn btn-info btn-sm'>Editar</button>
        </a>
        <a href='acoes/deletar-pessoa.php?id=$id' onclick=\"return confirm('Tem certeza que deseja excluir este usuario?')\"
          <button class='btn btn-danger btn-sm'>Excluir</button>
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