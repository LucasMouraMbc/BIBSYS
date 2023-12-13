<?php
require('includes/menu.php');
require('includes/conexao.php');


?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Novo Post</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="main.html">Página Inicial</a></li>
          <li class="breadcrumb-item">Cadastrar Post</li>
          <li class="breadcrumb-item active">Cadastrar</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class= "col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">CRIAR NOVO POST</h5>

              <?php
                    if(isset($_GET['msg'])){
                        $msg = $_GET['msg'];
                        if($msg == "sucesso"){
                            echo "
                                <div class='alert alert-success'>
                                Post cadastrado com sucesso!
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

              <!-- General Form Elements -->
              <form method="POST" action="acoes/cad-post.php">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Título:</label>
                  <div class="col-sm-10">
                    <input type="text" name="titulo" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Categoria:</label>
                  <div class="col-sm-3">


                    <select class="form-control" name="categoria">  

                      <?php
                      $sql = "SELECT * FROM categorias";
                      $result = mysqli_query($conexao,$sql);

                      foreach($result as $r){
                        $id = $r['id'];
                        $categoria = $r['descricao'];

                        ?>
                          <option value="<?php echo $id?>"><?php echo $categoria?></option>

                        <?php

                      }
                      ?>                                                                     
                    </select>


                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Texto:</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" name="texto"></textarea>
                  </div>
                </div>
                <br>
                <div class="offset-md-5 col-md-2">
                  <button class="btn btn-primary w-100" type="submit">PUBLICAR</button>
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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>