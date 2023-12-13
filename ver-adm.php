<?php
require('includes/validar-login.php');
require('includes/menu.php');
require('includes/conexao.php');

if (isset($_GET['id'])) {
    $idUser = $_GET['id'];
    $sql = "SELECT * FROM usuarios AS u JOIN municipio as m on m.Id = u.idCidade WHERE u.id = $idUser";
    $user = mysqli_query($conexao, $sql);
    foreach ($user as $r) {

        $nome = $r['nome'];
        $email = $r['email'];
        $telefone = $r['telefone'];
        $bairro = $r['bairro'];
       
    }

    $sqlEmprestimos = "SELECT count(*) as total FROM emprestimos WHERE idUsuario = $idUser";
    $totalEmprestimos = mysqli_query($conexao, $sqlEmprestimos);
    foreach ($totalEmprestimos as $e) {
        $total = $e['total'];
    }
}
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Perfil</h1>
        
    </div><!-- End Page Title -->

            <div class="offset-md-2 col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Sobre</h5>

                                <h5 class="card-title">Detalhes do Perfil</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nome:</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $nome ?></div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Telefone:</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $telefone ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Estado/Cidade:</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $r['Nome'] . '/' . $r['idEstado'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Endereço:</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $r['rua'] . ', ' . $r['bairro'] . ', ' . $r['numero'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email:</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $r['email'] ?></div>
                                </div>

                            <div class="tab-pane fade pt-3" id="profile-settings">

                                <!-- Settings Form -->
                                <form>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                                        <div class="col-md-8 col-lg-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="changesMade" checked>
                                                <label class="form-check-label" for="changesMade">
                                                    Changes made to your account
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="newProducts" checked>
                                                <label class="form-check-label" for="newProducts">
                                                    Information on new products and services
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="proOffers">
                                                <label class="form-check-label" for="proOffers">
                                                    Marketing and promo offers
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                                                <label class="form-check-label" for="securityNotify">
                                                    Security alerts
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End settings Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form>

                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control" id="currentPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control" id="newPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

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