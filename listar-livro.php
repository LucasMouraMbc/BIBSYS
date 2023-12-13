<?php

require('includes/validar-login.php');
require('includes/menu.php');
require('includes/conexao.php');

?>

<main id="main" class="main">
<div class="row">
    <div class="offset-md-1 col-md-10">

    <?php
                  if(isset($_GET['msg'])){
                      $msg = $_GET['msg'];
                      if($msg == "sucesso"){
                          echo "
                              <div class='alert alert-success'>
                              Livro editado com sucesso!
                              </div>
                          ";
                            
                      }else{
                          echo "
                              <div class='alert alert-danger'>
                              Ops! Erro ao editar!
                              </div>
                            ";
                        }
                  }

              ?>
      <h3>Lista de livros</h3>
    <table class="table">
  <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Título</th>
        <th scope="col">Autor</th>
        <th scope="col">Estoque</th>

       
        <th scope="col">Ações</th>
      </tr>
  </thead>
  <tbody>

    <?php

      $sql = "SELECT * from livros ORDER BY titulo ASC";

      $result = mysqli_query($conexao,$sql);

      foreach ($result as $r){
        $id = $r['id'];
        $titulo = strtoupper($r['titulo']);
        $autor = strtoupper($r['autor']);
        $estoque = $r['estoque'];
      
      echo "
      <tr>
        <th scope='row'>$id</th>
        <td>$titulo</td>
        <td>$autor</td>
        <td>$estoque</td>
       
        
        <td>
        <a href='editar-livro.php?id=$id'>
          <button class='btn btn-info btn-sm'>Editar</button>
        </a>
        <a href='acoes/deletar-livro.php?id=$id' onclick=\"return confirm('Tem certeza que deseja excluir este livro?')\"
          <button class='btn btn-danger btn-sm'>Excluir</button>
        </a>
        </td>
      </tr>
      
      
      ";
      }

    ?>
    
  </tbody>
</table>
    </div>
</div>
<div class="offset-md-5 col-md-2">
  <a href="cadastrar-livro.php">
    <button class="btn btn-primary w-100" type="submit">Novo Livro</button>
  </a>
</div>

</main>




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