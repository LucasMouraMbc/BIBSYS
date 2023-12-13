<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BIBSYS</title>
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

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="main.php" class="logo d-flex align-items-center">
        
        <span style="font-size: 18px;" class="d-none d-lg-block">BIBSYS</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0 show" href="#" data-bs-toggle="dropdown" aria-expanded="true">
            <img src="assets/img/logo.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['nome'] ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-16px, 38.4px, 0px);" data-popper-placement="bottom-end">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['nome'] ?></h6>
              
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="ver-adm.php?id=<?php echo $_SESSION['idUsuario'] ?>">
                <i class="bi bi-person"></i>
                <span>Meu Perfil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="editar-pessoa.php?id=<?php echo $_SESSION['idUsuario'] ?>">
                <i class="bi bi-gear"></i>
                <span>Editar Perfil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="alterar-senha.php">
                <i class="bi bi-question-circle"></i>
                <span>Alterar senha</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="acoes/logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li>

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="main.php">
          <i class="bi bi-grid"></i>
          <span>Página Ínicial</span>
        </a>
      </li><!-- End Dashboard Nav -->



      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-navposts" data-bs-toggle="collapse" href="#">
          <i class="bi bi-book-half"></i><span>Livros</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-navposts" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="listar-livro.php">
              <i class="bi bi-circle"></i><span>Listar</span>
            </a>
          </li>
          <li>
            <a href="cadastrar-livro.php">
              <i class="bi bi-circle"></i><span>Cadastrar</span>
            </a>
          </li>

        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-navcom" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-bookmark-fill"></i><span>Empréstimos</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-navcom" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="cadastrar-emprest.php">
              <i class="bi bi-circle"></i><span>Emprestar</span>
            </a>
          </li>
          <li>
            <a href="emprestados.php">
              <i class="bi bi-circle"></i><span>Todos os empréstimos</span>
            </a>
          </li>
          <li>
            <a href="emprestimos-em-atraso.php">
              <i class="bi bi-circle"></i><span>Em atraso</span>
            </a>
          </li>

          <li>
            <a href="listar-emprest.php">
              <i class="bi bi-circle"></i><span>Histórico</span>
            </a>
          </li>

        </ul>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#usuarios" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-circle"></i><span>Pessoas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="usuarios" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="listar-pessoas.php">
              <i class="bi bi-circle"></i><span>Listar</span>
            </a>
          </li>
          <li>
            <a href="cadastrar-pessoa.php">
              <i class="bi bi-circle"></i><span>Cadastrar</span>
            </a>
          </li>
          <li>
            <a href="listar-adm.php">
              <i class="bi bi-circle"></i><span>Administradores</span>
            </a>
          </li>
          <li>
            <a href="cadastrar-adm.php">
              <i class="bi bi-circle"></i><span>Cadastrar Administrador</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#turmas" data-bs-toggle="collapse" href="#">
          <i class="bi bi-mortarboard-fill"></i><span>Turmas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="turmas" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="listar-turma.php">
              <i class="bi bi-circle"></i><span>Listar</span>
            </a>
          </li>
          <li>
            <a href="cadastrar-turma.php">
              <i class="bi bi-circle"></i><span>Cadastrar</span>
            </a>
          </li>

        </ul>
      </li>



      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#Categorias-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-filter-circle"></i><span>Categorias</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="Categorias-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="listar-categorias.php">
              <i class="bi bi-circle"></i><span>Listar</span>
            </a>
          </li>
          <li>
            <a href="cadastrar-categ.php">
              <i class="bi bi-circle"></i><span>Cadastrar</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#Literário-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button"></i><span>Gênero Literário</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="Literário-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="listar-genero.php">
              <i class="bi bi-circle"></i><span>Listar</span>
            </a>
          </li>
          <li>
            <a href="cadastrar-genero.php">
              <i class="bi bi-circle"></i><span>Cadastrar</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#Editora-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-pencil-square"></i><span>Editora</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="Editora-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="listar-editora.php">
              <i class="bi bi-circle"></i><span>Listar</span>
            </a>
          </li>
          <li>
            <a href="cadastrar-editora.php">
              <i class="bi bi-circle"></i><span>Cadastrar</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- End Charts Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="backup.php">
          <i class="bi bi-database"></i>
          <span>Fazer backup</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="acoes/logout.php">
          <i class="bi bi-x-circle"></i>
          <span>Sair</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <!-- End Login Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->