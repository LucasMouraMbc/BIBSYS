<?php
require('includes/validar-login.php');
require('includes/menu.php');
require('includes/conexao.php');

?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Alterar senha</h1>
      
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="offset-md-2 col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Alterar senha</h5>

                        <?php
                        if (isset($_GET['msg'])) {
                            $msg = $_GET['msg'];
                            if ($msg == "sucesso") {
                                echo "
                              <div class='alert alert-success'>
                              Senha alterada com sucesso!
                              </div>
                          ";
                            }else if ($msg == "erroSenha") {
                                echo "
                <div class='alert alert-danger'>
                Ops! A senha informada não confere com a sua senha atual!
                </div>
              ";
                            }
                        }

                        ?>

                        <!-- General Form Elements -->
                        <form method="POST" id="form-troca-senha" action="acoes/alterar-senha.php" onsubmit="return false">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Senha antiga:</label>
                                <div class="col-sm-9">
                                    <input type="password" name="senha-antiga" class="form-control" required>
                                    <div class="invalid-feedback">Por favor insira sua senha antiga!</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nova senha:</label>
                                <div class="col-sm-9">
                                    <input type="password" name="senha-nova" id="senha-nova" class="form-control" required>
                                    <div class="invalid-feedback">Por favor, insira uma nova senha!</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Repete Senha:</label>
                                <div class="col-sm-9">
                                    <span id="erro-repete" class="erro-senha"></span>
                                    <input type="password" name="senha-nova-repete" id="senha-nova-repete" class="form-control" required>
                                    <div class="invalid-feedback">Por favor, repita a senha!</div>
                                </div>
                            </div>


                            <div class="offset-md-5 col-md-2">
                                <button class="btn btn-primary w-100" onclick="validarSenha()" type="submit">CADASTRAR</button>
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

<script>
    function validarSenha() {
        var senhaNova = document.getElementById('senha-nova').value;
        var repeteSenhaNova = document.getElementById('senha-nova-repete').value;

        if(senhaNova != repeteSenhaNova){
            document.getElementById('senha-nova-repete').focus;
            document.getElementById('erro-repete').innerHTML = "Ops! Senhas não conferem";
        }else{
            document.getElementById('form-troca-senha').removeAttribute('onsubmit');
        }
    }
</script>

</body>

</html>