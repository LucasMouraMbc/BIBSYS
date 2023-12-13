<?php
require('includes/validar-login.php');
require('includes/menu.php');
require('includes/conexao.php');

?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Novo Administrador</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="main.php">Página Inicial</a></li>
        <li class="breadcrumb-item">Cadastrar Administrador</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Dados do Administrador</h5>

            <?php
            if (isset($_GET['msg'])) {
              $msg = $_GET['msg'];
              if ($msg == "sucesso") {
                echo "
                              <div class='alert alert-success'>
                              Usuário cadastrado com sucesso!
                              </div>
                          ";
              } else if($msg == "erro") {
                echo "
                              <div class='alert alert-danger'>
                              Ops! Erro ao cadastrar!
                              </div>
                            ";
              }else if($msg == "erroSenha"){
                echo "
                <div class='alert alert-danger'>
                Ops! Senhas estão diferentes!
                </div>
              ";
              }
            }

            ?>

            <!-- General Form Elements -->
            <form method="POST" id="form-cadastrar" action="acoes/cad-adm.php">
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nome:</label>
                <div class="col-sm-4">
                  <input type="text" name="nome" class="form-control" required>
                  <div class="invalid-feedback">Por favor insira seu nome!</div>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-4">
                  <input type="email" name="email" class="form-control" required>
                  <div class="invalid-feedback">Por favor, insira um email válido!</div>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Telefone:</label>
                <div class="col-sm-4">
                  <input type="text" name="telefone" class="form-control" required>
                  <div class="invalid-feedback">Por favor, insira um telefone!</div>
                </div>
              </div>


              
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Estado:</label>
                <div class="col-sm-4">

                  <select class="form-control" name="estado" id='estado' required onchange="buscarCidade()">
                    <div class="invalid-feedback">Por favor insira o estado</div>

                    <?php
                    $sql = "SELECT * FROM estado";
                    $result = mysqli_query($conexao, $sql);

                    foreach ($result as $r) {
                      $id = $r['Id'];
                      $estado = $r['Nome'];
                      $uf = $r['Uf'];
                    ?>
                      <option value="<?php echo $uf ?>"><?php echo $estado ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <script>
                function buscarCidade() {
                  id = document.getElementById('estado').value;
                  $.ajax({
                    url: 'retorna-cidades.php?id=' + id,
                    success: function(data) {
                      document.getElementById('cidade').innerHTML = data;
                    }
                  });
                }
              </script>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Cidade:</label>
                <div class="col-sm-4">

                  <select class="form-control" name="cidade" id='cidade' required>

                  </select>
                </div>
              </div>



              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Bairro:</label>
                <div class="col-sm-4">
                  <input type="text" name="bairro" class="form-control" required>
                  <div class="invalid-feedback">Por favor, insira seu bairro!</div>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Rua:</label>
                <div class="col-sm-4">
                  <input type="text" name="rua" class="form-control" required>
                  <div class="invalid-feedback">Por favor, insira sua rua!</div>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Número:</label>
                <div class="col-sm-4">
                  <input type="text" name="numero" class="form-control" required>
                  <div class="invalid-feedback">Por favor, insira o número residêncial!</div>
                </div>
              </div>

        
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Data de nascimento:</label>
                <div class="col-sm-4">
                  <input type="date" name="dtNascimento" class="form-control" required>
                  <div class="invalid-feedback">Por favor, insira a data de nascimento!</div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">CPF:</label>
                <div class="col-sm-4">
                  <input type="text" name="cpf" class="form-control" required>
                  <div class="invalid-feedback">Por favor, insira o CPF!</div>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Senha:</label>
                <div class="col-sm-4">
                  <input type="password" name="senha" id="senha" class="form-control" required>
                  <div class="invalid-feedback">Por favor, insira uma senha!</div>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Confirmar Senha:</label>
                <div class="col-sm-4">
                  <input type="password" name="confirmaSenha" id="confirmaSenha" class="form-control" required>
                  <div class="invalid-feedback">Por favor, insira a senha novamente!</div>
                </div>
              </div>

          
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>



</body>

</html>