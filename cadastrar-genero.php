<?php
require('includes/validar-login.php');
require('includes/menu.php');
require('includes/conexao.php');

?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Gênero Literário</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="main.php">Início</a></li>
          <li class="breadcrumb-item">Cadastrar Gênero Literário</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

  <div class="card mb-3">

    <div class="card-body">

      <div class="pt-4 pb-2">
        <h5 class="card-title text-center pb-0 fs-4">Cadastrar novo Gênero Literário </h5>
        <?php
                  if(isset($_GET['msg'])){
                      $msg = $_GET['msg'];
                      if($msg == "sucesso"){
                          echo "
                              <div class='alert alert-success'>
                              Gênero literário cadastrado com sucesso!
                              </div>
                          ";
                            
                      }else{
                          echo "
                              <div class='alert alert-danger'>
                              Ops! Erro ao cadastrar!
                              </div>
                            ";
                        }
                  }

              ?>


      <form class="row g-3 needs-validation" novalidate method="POST" action="acoes/cad-genero.php">
        <div class="offset-md-3 col-md-6">
          <label for="yourName" class="form-label">Nome dp gênero literário:</label>
          <input type="text" name="genero" class="form-control" id="genero" required>
          <div class="invalid-feedback">Por favor, insira o gênero literário!</div>
        </div>

    
        <div class="offset-md-5 col-md-2">
          <button class="btn btn-primary w-100" type="submit">CADASTRAR</button>
        </div>
  </div>

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