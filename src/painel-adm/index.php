<?php 
    @session_start();
    require_once("../conexao.php"); 

    //variaveis para o menu
    $pag = @$_GET["pag"];
    $menu1 = "secretarios";
    $menu2 = "professores";
    $menu3 = "tesoureiros";
    $menu4 = "funcionarios";
    $menu5 = "disciplinas";
    $menu6 = "salas";
    $menu7 = "turmas";

    //RECUPERAR DADOS DO USUÁRIO
    $query = $pdo->query("SELECT * FROM usuarios where id = '$_SESSION[id_usuario]'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $nome_usu = @$res[0]['nome'];
    $cpf_usu = @$res[0]['cpf'];
    $email_usu = @$res[0]['email'];
    $idUsuario = @$res[0]['id'];  
?>

<!doctype html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">  
  <title>Painel Administrativo</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/icon.png" />
   <link rel="stylesheet" href="../assets/css/styles.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">  
   <link href="../assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

   <script src="../assets/libs/jquery/src/jquery.min.js"></script>
   <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>        
    

 
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.php" class="text-nowrap logo-img">
            <img src="../assets/images/logos/logo.png" width="180" alt="lohgo" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-2"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Cadastros</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="index.php?pag=<?php echo $menu1 ?>">
                <span>
                <i class="fas fa-user-tie"></i>
                </span>
                <span class="hide-menu">Secretários</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="index.php?pag=<?php echo $menu2 ?>">
                <span> 
                <i class="fas fa-chalkboard-teacher"></i> 
                </span>
                <span class="hide-menu">Professores</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="index.php?pag=<?php echo $menu3 ?>">
                <span>
                <i class="fas fa-coins"></i> 
                </span>
                <span class="hide-menu">Financeiro</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="index.php?pag=<?php echo $menu4 ?>">
                <span>
                <i class="fas fa-users"></i>
                </span>
                <span class="hide-menu">Funcionário</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="index.php?pag=<?php echo $menu5 ?>">
                <span>
                <i class="fas fa-book"></i> 
                </span>
                <span class="hide-menu">Disciplinas</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="index.php?pag=<?php echo $menu6 ?>">
                <span>
                <i class="fas fa-chalkboard"></i> 
                </span>
                <span class="hide-menu">Salas</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="index.php?pag=<?php echo $menu7 ?>">
                <span>
                <i class="fas fa-book"></i>
                </span>
                <span class="hide-menu">Turmas</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">AUTH</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../logout.php">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Login</span>
              </a>
            </li>                    
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
           
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">           
            <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nome_usu ?></span>
                  <img src="../assets/images/profile/sem-foto.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href=""  data-toggle="modal" data-target="#ModalPerfil" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">Editar Perfil</p>
                    </a>                  
                    <a  href="../logout.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->

   <!-- Begin Page Content -->
   <div class="container-fluid">
        <?php 
          if (@$pag == null) { 
            @include_once("home.php"); 
          } else if (@$pag==$menu1) {
            @include_once(@$menu1.".php");
          } else if (@$pag==$menu2) {
            @include_once(@$menu2.".php");
          } else if (@$pag==$menu3) {
            include_once(@$menu3.".php");
          } else if (@$pag==$menu4) {
            @include_once(@$menu4.".php");
          } else if (@$pag==$menu5) {
            @include_once(@$menu5.".php");
          } else if (@$pag==$menu6) {
            @include_once(@$menu6.".php");
          } else if (@$pag==$menu7) {
            @include_once(@$menu7.".php");
          } else {
            @include_once("home.php");
          }
        ?>
      </div>
      <!-- /.container-fluid -->

 <!-- Modal Perfil -->
<div class="modal fade" id="ModalPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Editar Perfil</h5>
                <button class="btn-close btn-close-white" type="button" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-perfil" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nome_usu" class="form-label">Nome</label>
                        <input value="<?php echo $nome_usu ?>" type="text" class="form-control" id="nome_usu" name="nome_usu" placeholder="Nome">
                    </div>
                    <div class="mb-3">
                        <label for="cpf_usu" class="form-label">CPF</label>
                        <input value="<?php echo $cpf_usu ?>" type="text" class="form-control" id="cpf_usu" name="cpf_usu" placeholder="CPF">
                    </div>
                    <div class="mb-3">
                        <label for="email_usu" class="form-label">Email</label>
                        <input value="<?php echo $email_usu ?>" type="email" class="form-control" id="email_usu" name="email_usu" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label for="senha_usu" class="form-label">Senha</label>
                        <input value="" type="password" class="form-control" id="senha_usu" name="senha_usu" placeholder="Senha">
                    </div>
                    <div id="mensagem-perfil" class="mb-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="btn-salvar-perfil" id="btn-salvar-perfil" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>


      
  
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
    <!-- Page level plugins -->
    <script src="../assets/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="../assets/js/demo/datatables-demo.js"></script>
        <script src="../assets/js/mascaras.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
</body>

</html>

<!-- AJAX PARA INSERÇÃO E EDIÇÃO DOS DADOS COM IMAGEM -->
<script type="text/javascript">
  $("#form-perfil").submit(function (event) {
    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      url: "editar-perfil.php",
      type: 'POST',
      data: formData,
      success: function (mensagem) {
        $('#mensagem-perfil').removeClass()

        if (mensagem.trim() == "Salvo com Sucesso!") {
          $('#btn-fechar-perfil').click();
          window.location = "index.php";
        } else {
          $('#mensagem-perfil').addClass('text-danger')
        }

        $('#mensagem-perfil').text(mensagem)
      },
      cache: false,
      contentType: false,
      processData: false,
      xhr: function () {
        var myXhr = $.ajaxSettings.xhr();
        if (myXhr.upload) {
          myXhr.upload.addEventListener('progress', function () {
          }, false);
        }
        return myXhr;
      }
    });
  });
</script>
