<?php
include("includes/conexao.php");
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Café com Música - Login</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <style>
        .recuperar-senha {
            margin-top: 10%;
        }
    </style>
</head>

<body>
    <?php 
    session_start();
    if(isset($_SESSION['cpf'])){ ?>
    <section class="section recuperar-senha">
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
                            } else if ($msg == "erroSenha") {
                                echo "
                <div class='alert alert-danger'>
                Ops! A senha informada não confere com a sua senha atual!
                </div>
              ";
                            }
                        }

                        ?>

                        <!-- General Form Elements -->
                        <form method="POST" id="form-troca-senha" action="acoes/alterar-senha-recuperar.php" onsubmit="return false">
                           
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
                                <button class="btn btn-primary w-100" onclick="validarSenhaRecuperar()" type="submit">CADASTRAR</button>
                            </div>


                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>
        </div>
    </section>

<?php } ?>

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
    <script>
    function validarSenhaRecuperar() {
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