<?php

require('includes/validar-login.php');
require('includes/menu.php');
require('includes/conexao.php');

?>

<main id="main" class="main">
  <div class="row">

    <div class="offset-md-1 col-md-7">
      <h3>Lista de Administradores</h3>
    </div>

    <br><Br>
    <div class="offset-md-1 col-md-10">

      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Telefone</th>
            <th scope="col">Ações</th>
          </tr>

        </thead>
        <tbody>

          <?php

          $sql = "SELECT * FROM usuarios where isAdm = 's' ORDER BY nome ASC";

          $result = mysqli_query($conexao, $sql);

          foreach ($result as $r) {
            $id = $r['id'];
            $nome = strtoupper($r['nome']);
            $email = $r['email'];
            $telefone = $r['telefone'];
            
            echo "
      <tr>
        <th scope='row'>$id</th>
        <td>$nome</td>
        <td>$email</td>
        <td>$telefone</td>

  

        
        <td>
        <a href='visualizar-adm.php?id=$id'>
          <button class='btn btn-info btn-sm'>Ver</button>
        </a>
        <a href='acoes/deletar-adm.php?id=$id' onclick=\"return confirm('Tem certeza que deseja excluir este usuario?')\"
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
  <div class="offset-md-5 col-md-2">
    <a href="cadastrar-adm.php">
      <button class="btn btn-primary w-100" type="submit">Novo Administrador</button>
    </a>
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