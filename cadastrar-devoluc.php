<?php
require('includes/validar-login.php');
require('includes/menu.php');
require('includes/conexao.php');

?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Nova Devolução</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="main.php">Página Inicial</a></li>
          <li class="breadcrumb-item">Devolver Livro</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class= "col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Dados da Devolução</h5>

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
              <form method="POST" action="acoes/cad-devoluc.php">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nome:</label>
                  <div class="col-sm-9">
                    <input type="text" name="titulo" class="form-control" required>
                    <div class="invalid-feedback">Por favor insira o título da obra</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Turma:</label>
                  <div class="col-sm-4">

                    <select class="form-control" name="categoria" required>
                    <div class="invalid-feedback">Por favor insira a turma</div>  
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
                  <label for="inputText" class="col-sm-2 col-form-label">Título da Obra:</label>
                  <div class="col-sm-9">
                    <input type="text" name="titulo" class="form-control" required>
                    <div class="invalid-feedback">Por favor, insira o título da obra!</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Autor:</label>
                  <div class="col-sm-9">
                    <input type="text" name="titulo" class="form-control" required>
                    <div class="invalid-feedback">Por favor, insira o autor da obra!</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Endereço:</label>
                  <div class="col-sm-9">
                    <input type="text" name="titulo" class="form-control" required>
                    <div class="invalid-feedback">Por favor, insira o endereço!</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Email:</label>
                  <div class="col-sm-9">
                    <input type="email" name="titulo" class="form-control" required>
                    <div class="invalid-feedback">Por favor, insira um email válido!</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Telefone:</label>
                  <div class="col-sm-4">
                    <input type="text" name="titulo" class="form-control" required>
                    <div class="invalid-feedback">Por favor, insira um telefone!</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Data do Empréstimo:</label>
                  <div class="col-sm-4">
                    <input type="date" name="titulo" class="form-control" required>
                    <div class="invalid-feedback">Por favor insira a data do empréstimo!</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Data de Devolução:</label>
                  <div class="col-sm-4">
                    <input type="date" name="titulo" class="form-control" required>
                    <div class="invalid-feedback">Por favor insira a data de devolução!</div>
                  </div>
                </div>

                <div class="offset-md-5 col-md-2">
                  <button class="btn btn-primary w-100" type="submit">DEVOLVER</button>
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