<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistemas Integrados - Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php INCLUDE_PATH ?>assets/img/favicon.png" rel="icon">
  <link href="<?php INCLUDE_PATH ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

  <!-- Vendor CSS Files -->
  <link href="<?php INCLUDE_PATH ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php INCLUDE_PATH ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php INCLUDE_PATH ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php INCLUDE_PATH ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?php INCLUDE_PATH ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?php INCLUDE_PATH ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php INCLUDE_PATH ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="center">
                  <img width="200px" height="175px" src="assets/img/logo-login.png" alt="">
              </div><!-- End Logo -->
              <div class="clear"><br/></div>
              <div class="card mb-3">
                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h6 class="card-title text-center pb-0 fs-4">Sistemas Integrados</h6>
                    <p class="text-center small">Entre com seu CPF e data de Nascimento<br/> para recuperar sua senha.</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate method="post" action="registro.php">

                  <?php

                  if(isset($_POST['acao'])){
                    $ds_cpf = $_POST['cpf'];
                    $ds_cpf = str_replace(array('.','-'),"",$ds_cpf);
                    echo $dt_data_nascimento = $_POST['dataNascimento'];

                    $sql = PgSql::conectar()->prepare("SELECT ds_cpf FROM rh.tbsirh_servidor WHERE ds_cpf = ? AND dt_data_nascimento = ?");
                    $sql->execute(array($ds_cpf,$dt_data_nascimento));
                    $ds_cpf = $sql->fetch()['ds_cpf'];

                    if($sql->rowCount() == 1){
                      $_SESSION['cpf'] = $ds_cpf;
                      //$_SESSION['senha'] = $senha;
                      header('Location: '.INCLUDE_PATH.'dados_registro.php?cpf='.$_SESSION['cpf']);
                      die();
                      
                    } else {
                      Painel::alert('erro','CPF ou data de nascimento incorretos!');;
                    }

                  }
                  
                  ?>
                  
                    <div class="col-12">
                      <label for="usuario" class="form-label">CPF:</label>
                        <input type="text" name="cpf" class="form-control" id="cpf" required>
                        <div class="invalid-feedback">Por favor digite seu CPF</div>
                    </div>

                    <div class="col-12">
                      <label for="senha" class="form-label">Data Nascimento:</label>
                      <input type="date" name="dataNascimento" class="form-control" required>
                      <div class="invalid-feedback">Por favor digite sua data de nascimento</div>
                    </div>
                    
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="acao">Validar e criar nova senha</button>
                    </div>
                    <div class="col-12">

                    <div class="col-12">
                      <p class="small mb-0"><b>Voltar para a Página de Login</b> <a href="<?=INCLUDE_PATH?>">Clique aqui</a> </p>
                    </div>

                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                Desenvolvido por <a href="#">Célula de Desenvolvimento</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php INCLUDE_PATH ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?php INCLUDE_PATH ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php INCLUDE_PATH ?>assets/vendor/chart.js/chart.umd.js"></script>
  <script src="<?php INCLUDE_PATH ?>assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?php INCLUDE_PATH ?>assets/vendor/quill/quill.min.js"></script>
  <script src="<?php INCLUDE_PATH ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?php INCLUDE_PATH ?>assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?php INCLUDE_PATH ?>assets/vendor/php-email-form/validate.js"></script>
  <!-- Template Main JS File -->
  <script src="<?php INCLUDE_PATH ?>assets/js/main.js"></script>
  <script src="<?php INCLUDE_PATH ?>assets/js/helperMask.js"></script>
  <script src="<?php INCLUDE_PATH ?>assets/js/jquery.mask.js"></script>
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

</body>

</html>