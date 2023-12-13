<?php
require('includes/validar-login.php');
require('includes/menu.php');
require('includes/conexao.php');

?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Novo Empréstimo</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="main.php">Página Inicial</a></li>
        <li class="breadcrumb-item">Emprestar Livro</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Dados do Empréstimo</h5>

            <?php
            if (isset($_GET['msg'])) {
              $msg = $_GET['msg'];
              if ($msg == "sucesso") {
                echo "
                              <div class='alert alert-success'>
                                Sucesso
                              </div>
                          ";
              } else {
                echo "
                              <div class='alert alert-danger'>
                              Ops! Erro!
                              </div>
                            ";
              }
            }

            ?>

            <!-- General Form Elements -->
            <form method="POST" action="acoes/cad-emprest.php">







              <div class="row mb-3">

              <label for="inputText" class="col-sm-1 col-form-label">Aluno:</label>
                <div class="col-md-5">


                  <select class="form-control js-example-basic-single" name="usuario">
                    <?php
                    $sql = "SELECT u.id as idUser, u.nome, t.descricao  FROM usuarios as u join turmas as t on u.idTurma = t.id where isAdm = '' ";
                    $result = mysqli_query($conexao, $sql);


                    foreach ($result as $r) {
                      $id = $r['idUser'];
                      $nome = $r['nome'];
                      $turma = $r['descricao'];

                    ?>
                      <option value="<?php echo $id ?>"><?php echo $nome. ' | '.$turma  ?></option>
                    <?php
                    }
                    ?>
                  </select>


                </div>

                <label for="inputText" class="col-sm-1 col-form-label">Livro:</label>
                <div class="col-md-5">

                  <select class="form-control js-example-basic-single" name="livro">
                    <?php
                    $sql = "SELECT * FROM livros";
                    $result = mysqli_query($conexao, $sql);

                    foreach ($result as $r) {
                      $id = $r['id'];
                      $titulo = $r['titulo'];
                      $autor = $r['autor'];
                    ?>
                      <option value="<?php echo $id ?>"><?php echo $titulo. ' | ' .$autor ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
               
              </div>



              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Data de devolução:</label>
                <div class="col-md-9">
                  <input type="date" name="dtDevolucao" class="form-control" value="<?php echo date('Y-m-d') ?>" required>
                </div>
              </div>

        

              <div class="offset-md-5 col-md-2">
                <button class="btn btn-primary w-100" type="submit">EMPRESTAR</button>
              </div>


            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->


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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $(".js-example-basic-single").select2();
  });
</script>
<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>


</body>

</html>