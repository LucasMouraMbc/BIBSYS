<?php
require('includes/validar-login.php');
require('includes/menu.php');
require('includes/conexao.php');

$sqlLivros = "select count(*) as totalLivros from livros";
$resultLivros = mysqli_query($conexao, $sqlLivros);
foreach ($resultLivros as $l) {
  $totalLivros = $l['totalLivros'];
}

$sqlUsuarios = "select count(*) as totalUsuarios from usuarios WHERE isAdm = ''";
$resultUsuarios = mysqli_query($conexao, $sqlUsuarios);
foreach ($resultUsuarios as $u) {
  $totalUsuarios = $u['totalUsuarios'];
}

$sqlEmprestimos = "select count(*) as totalEmprestimos from emprestimos";
$resultEmprestimos = mysqli_query($conexao, $sqlEmprestimos);
foreach ($resultEmprestimos as $e) {
  $totalEmprestimos = $e['totalEmprestimos'];
}

$sqlTurmas = "select count(*) as totalTurmas from turmas";
$resultTurmas = mysqli_query($conexao, $sqlTurmas);
foreach ($resultTurmas as $t) {
  $totalTurmas = $t['totalTurmas'];
}
?>



<main id="main" class="main">

  <div class="pagetitle">
    <h1>Página Inicial</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="main.php">Home</a></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

          <!-- Post Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">Livros<span> </span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-book"></i>
                  </div>
                  <div class="ps-3">
                    <h6></h6>
                    <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted pt-2 ps-1 txt-grande"><?php echo $totalLivros ?></span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Post Card -->

          <!-- Categ Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">


              <div class="card-body">
                <h5 class="card-title">Usuários<span> </span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people-fill"></i>
                  </div>
                  <div class="ps-3">
                    <h6></h6>
                    <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted pt-2 ps-1  txt-grande"><?php echo $totalUsuarios ?></span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End CategCard -->

          <!-- Coments Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">


              <div class="card-body">
                <h5 class="card-title">Turmas<span> </span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-workspace"></i>
                  </div>
                  <div class="ps-3">
                    <h6></h6>
                    <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted pt-2 ps-1 txt-grande"><?php echo $totalTurmas  ?></span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Coments Card -->

          <!-- Top Selling -->
          <div class="col-12">
            <div class="card top-selling overflow-auto">



              <div class="card-body pb-0">
                <h5 class="card-title">Empréstimos pendentes <span>
                    <?php
                    if (isset($_GET['msg'])) {
                      if ($_GET['msg'] == 'sucesso') {
                        echo "
                            <div class='alert alert-success devolve-home'>Devolvido com sucesso</div>
                          ";
                      }
                    }
                    ?>
                  </span></h5>

                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Livro</th>
                      <th scope="col">Usuário</th>
                      <th scope="col">Data Devolução</th>
                      <th scope="col">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    function data_br($data_bd)
                    {
                      return implode('/', array_reverse(explode('-', $data_bd)));
                    }
                    $sql = "SELECT u.id as idAluno, e.dtDevolucao, e.flDevolvido, l.titulo as titulo, u.nome as usuario, t.descricao as turma, e.id as idEmprestimo, u.id as idUsuario, l.id as idLivro from emprestimos as e JOIN usuarios as u on u.id = e.idUsuario join livros as l on l.id = e.idLivro JOIN turmas as t on t.id = u.idTurma WHERE e.flDevolvido = 'n' ORDER BY idEmprestimo DESC";

                    $result = mysqli_query($conexao, $sql);

                    foreach ($result as $r) {
                      $id = $r['idEmprestimo'];
                      $livro = substr(strtoupper($r['titulo']), 0, 20);
                      $usuario = $r['usuario'];
                      $dtDevolucao = data_br($r['dtDevolucao']);
                      $devolvido = $r['flDevolvido'];

                      $idAluno = $r['idAluno'];
                      $dataAtual = date('Y-m-d');

                      if ($dataAtual > $r['dtDevolucao']) {


                        echo "
      <tr>
        <th scope='row'>$id</th>
        <td>$livro...</td>
        <td>$usuario</td>
        <td>$dtDevolucao</td>

        
        <td>
        <a href='acoes/devolver-livro-home.php?id=$id' onclick=\"return confirm('Tem certeza que deseja devolver este livro?')\">
        <button class='btn btn-danger btn-sm btn-extra-pequeno'>Devolver com atraso</button>
      </a>
        <a href='ver-aluno.php?id=$idAluno'
          <button class='btn btn-warning btn-sm btn-extra-pequeno'>Ver aluno</button>
        </a>
        </td>
      </tr>
      
      
      ";
                      }
                    }
                    ?>
                  </tbody>
                </table>

              </div>

            </div>

            <div class="card">


            <div class="card-body">
              <h5 class="card-title">Últimos empréstimos <span></span></h5>

              <div class="activity">

                <?php


                $sql = "SELECT t.descricao, e.id as idEmprestimo, l.titulo, u.nome from emprestimos as e JOIN usuarios as u on u.id = e.idUsuario JOIN livros as l on l.id = e.idLivro JOIN turmas as t on t.id = u.idTurma order by e.id DESC LIMIT 10";

                $result = mysqli_query($conexao, $sql);

                foreach ($result as $r) {
                  $id = $r['idEmprestimo'];
                  $titulo = strtoupper($r['titulo']);
                  $nome = $r['nome'];
                  $filtroNome = explode(" ", $nome);
                  $exibeNome = $filtroNome[0];
                  $turma = $r['descricao'];

                ?>
                  <div class="activity-item d-flex">
                    <div class="activite-label "><span class="turma"><?php echo $turma ?></span></div>
                    <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                    <div class="activity-content bold">
                      <?php echo $titulo ?> - <?php echo $nome ?>
                    </div>
                  </div><!-- End activity item-->

                <?php } ?>
              </div>


            </div><!-- End Recent Activity -->
          </div>
          </div><!-- End Top Selling -->
          
        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">

        <!-- Recent Activity -->


        <div class="card">


          <div class="card-body">
            <h5 class="card-title">Top 10 Leitores<span></span></h5>

            <div class="activity">

              <?php


              $sql = "select u.nome, u.totalLidos, t.descricao from usuarios as u JOIN turmas as t on t.id = u.idTurma where u.totalLidos > 0 ORDER by u.totalLidos desc LIMIT 10";

              $result = mysqli_query($conexao, $sql);

              foreach ($result as $h) {


              ?>
                <div class="activity-item d-flex">
                  <div class="activite-label "><span class="turma"><?php echo $h['descricao'] ?></span></div>
                  <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                  <div class="activity-content">
                    <?php echo $h['nome'] ?> -<strong> Total Lidos: </strong><?php echo $h['totalLidos'] ?>
                  </div>
                </div><!-- End activity item-->

              <?php } ?>
            </div>


          </div><!-- End Recent Activity -->
        </div>


        <div class="card">


          <div class="card-body">
            <h5 class="card-title">Top 10 Livros mais lidos<span></span></h5>

            <div class="activity">

              <?php


              $sql = "select titulo, qtdEmprestimos from livros where qtdEmprestimos > 0 order by qtdEmprestimos DESC limit 10";

              $result = mysqli_query($conexao, $sql);

              foreach ($result as $l) {


              ?>
                <div class="activity-item d-flex">

                  <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                  <div class="activity-content">
                    <?php echo $l['titulo'] ?> -<strong> Total: </strong><?php echo $l['qtdEmprestimos'] ?>
                  </div>
                </div><!-- End activity item-->

              <?php } ?>
            </div>


          </div><!-- End Recent Activity -->
        </div>
      </div>


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