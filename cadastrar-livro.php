<?php
require('includes/validar-login.php');
require('includes/menu.php');
require('includes/conexao.php');

?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Novo Livro</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="main.php">Página Inicial</a></li>
          <li class="breadcrumb-item">Cadastrar Livro</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class= "col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Dados do Livro</h5>

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
              <form method="POST" action="acoes/cad-livro.php">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Título:</label>
                  <div class="col-sm-9">
                    <input type="text" name="titulo" class="form-control" required>
                    <div class="invalid-feedback">Por favor insira o título da obra</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Autor:</label>
                  <div class="col-sm-9">
                    <input type="text" name="autor" class="form-control" required>
                    <div class="invalid-feedback">Por favor insira o autor da obra</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Categoria:</label>
                  <div class="col-sm-9">


                    <select class="form-control" name="categoria" required>
                    <div class="invalid-feedback">Por favor insira a categoria da obra</div>  
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
                  <label for="inputText" class="col-sm-2 col-form-label">Gênero Literário:</label>
                  <div class="col-sm-9">


                    <select class="form-control"  name="genero" required>
                    <div class="invalid-feedback">Por favor insira o gênero literário da obra </div>  

                      <?php
                      $sql = "SELECT * FROM generos";
                      $result = mysqli_query($conexao,$sql);

                      foreach($result as $r){
                        $id = $r['id'];
                        $genero = $r['descricao'];

                        ?>
                          <option value="<?php echo $id?>"><?php echo $genero?></option>

                        <?php

                      }
                      ?>                                                                     
                    </select>


                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Edição:</label>
                  <div class="col-sm-9">
                    <input type="text" name="edicao" class="form-control" required>
                    <div class="invalid-feedback">Por favor insira a edição da obra</div>
                  </div>
                </div>

               

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Editora:</label>
                  <div class="col-sm-9">


                    <select class="form-control"  name="editora" required>
                    <div class="invalid-feedback">Por favor insira a editora </div>  

                      <?php
                      $sql = "SELECT * FROM editoras";
                      $result = mysqli_query($conexao,$sql);

                      foreach($result as $r){
                        $id = $r['id'];
                        $editora = $r['nome'];

                        ?>
                          <option value="<?php echo $id?>"><?php echo $editora?></option>

                        <?php

                      }
                      ?>                                                                     
                    </select>


                  </div>
                </div>
                

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Ano da Públicação:</label>
                  <div class="col-sm-9">
                    <input type="text" name="anoPublicacao" class="form-control" required>
                    <div class="invalid-feedback">Por favor insira o ano de públicação da obra</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Registro:</label>
                  <div class="col-sm-9">
                    <input type="text" name="registro" class="form-control" >
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ISBN:</label>
                  <div class="col-sm-9">
                    <input type="text" name="isbn" class="form-control" >
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Data de Entrada:</label>
                  <div class="col-sm-9">
                    <input type="date" name="dtEntrada" class="form-control" value="<?php echo date('Y-m-d') ?>">
                    <div class="invalid-feedback">Por favor insira a data de entrada</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Quantidade de Páginas:</label>
                  <div class="col-sm-9">
                    <input type="number" name="qtdPaginas" class="form-control" required>
                    <div class="invalid-feedback">Por favor insira a quantidade de páginas</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Estoque  Disponível:</label>
                  <div class="col-sm-9">
                    <input type="number" name="estoque" class="form-control" required>
                    <div class="invalid-feedback">Por favor insira quantos livros há no estoque</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Localização:</label>
                  <div class="col-sm-9">
                    <input type="text" name="localizacao" class="form-control" >
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Resumo:</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" style="height: 200px" name="resumo"></textarea>
                  </div>
                </div>
                <br>

                <div class="offset-md-5 col-md-2">
                  <button class="btn btn-primary w-100" type="submit">CADASTRAR</button>
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