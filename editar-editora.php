<?php
require('includes/validar-login.php');
require('includes/conexao.php');
require('includes/menu.php');

$entrada = $_GET['id'];
function limparStringParaSQL($entrada)
{
  // Remover caracteres especiais
  $entrada = preg_replace('/[^A-Za-z0-9]/', '', $entrada);

  // Remover espaços simples e duplos
  $entrada = str_replace(array(' ', "'"), '', $entrada);

  return $entrada;
}

$id = limparStringParaSQL($entrada);



$sql = "SELECT * FROM editoras WHERE id = $id";


$result = mysqli_query($conexao, $sql);
if($result->num_rows > 0){
foreach ($result as $r) {
  $descricao = $r['nome'];

}

?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Cadastrar categoria</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="main.php">Início</a></li>
          <li class="breadcrumb-item"><a href="listar-editora.php">Editoras</a></li>
          <li class="breadcrumb-item active">Editar editora</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

  
  <div class="card mb-3">

    <div class="card-body">

      <div class="pt-4 pb-2">
        <h5 class="card-title text-center pb-0 fs-4">Editar editora</h5>
        <p class="text-center small">Insira os dados para alterar</p>
      </div>

      <form class="row g-3 needs-validation" novalidate method="POST" action="acoes/editar-editora-acao.php">
        <div class="offset-md-3 col-md-6">
          <label for="yourName" class="form-label">Nome da editora:</label>
          <input type="text" name="descricao" value="<?php echo $descricao?>" class="form-control" id="yourName" required>
          <div class="invalid-feedback">Por favor, insira o novo nome da editora!</div>
        </div>

        <input type="hidden" name="idEditora" value="<?php echo $id?>">

    
        <div class="offset-md-5 col-md-2">
          <button class="btn btn-primary w-100" type="submit">SALVAR</button>
        </div>
    </main>
<?php }else{
  echo "<script>location.href='listar-editora.php'</script>";
} ?>
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