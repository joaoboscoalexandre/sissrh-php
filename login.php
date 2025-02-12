<?php

if(isset($_COOKIE['lembrar'])){
  $cpf = $_COOKIE['cpf'];
  $senha = $_COOKIE['senha'];
  $sql = PgSql::conectar()->prepare("SELECT * FROM sissrh.tbrh_funcionario WHERE ds_cpf = ? AND ds_senha = ?");
  $sql->execute(array($cpf,$senha));

  if($sql->rowCount() == 1){
    $info = $sql->fetch();
    $_SESSION['login'] = true;
    $_SESSION['cpf'] = $cpf;
    $_SESSION['senha'] = $senha;
    $_SESSION['login'] = $info['login'];
    $_SESSION['nome'] = $info['nome'];
    $_SESSION['codPerfil'] = $info['cod_perfil'];
    Painel::redirect(INCLUDE_PATH);
  } 
}
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
  <link href="<?=INCLUDE_PATH;?>assets/img/favicon.png" rel="icon">
  <link href="<?=INCLUDE_PATH;?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>


  <!-- Vendor CSS Files -->
  <link href="<?=INCLUDE_PATH;?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=INCLUDE_PATH;?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=INCLUDE_PATH;?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?=INCLUDE_PATH;?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?=INCLUDE_PATH;?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?=INCLUDE_PATH;?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?=INCLUDE_PATH;?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?=INCLUDE_PATH;?>assets/css/style.css" rel="stylesheet">
</head>

<body>
  
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="center">
                  <img width="200px" height="175px" src="<?= INCLUDE_PATH;?>assets/img/logo-login.png" alt="">
              </div><!-- End Logo -->
              <div class="clear"><br/></div>
              <div class="card mb-3">
                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h6 class="card-title text-center pb-0 fs-4">Login para<br/> Sistemas Integrados</h6>
                    <p class="text-center small">Entre com seu CPF e senha para logar</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate method="post">
                  <?php

                    if(isset($_POST['acao'])){
                      $cpf1 = $_POST['cpf'];
                      $cpf = str_replace(array('.','-'),"",$cpf1);
                      $senha = $_POST['senha'];
                      $sql = PgSql::conectar()->prepare("SELECT * FROM sissrh.tbrh_funcionario WHERE cpf = ? AND senha = ?");
                      $sql->execute(array($cpf,$senha));

                      if($sql->rowCount() == 1){
                        $info = $sql->fetch();
                        $_SESSION['login'] = true;
                        $_SESSION['cpf'] = $cpf;
                        $_SESSION['senha'] = $info['senha'];
                        $_SESSION['login'] = $info['login'];
                        $_SESSION['nome'] = $info['nome'];
                        $_SESSION['codPerfil'] = $info['cod_perfil'];
                        $_SESSION['imagem'] = $info['imagem'];
                        if(isset($_POST['lembrar'])){
                          setcookie('lembrar','true',time()+(60*60*24),'/');
                          setcookie('cpf',$cpf,time()+(60*60*24),'/');
                          setcookie('senha',$senha,time()+(60*60*24));
                      } 
                        Painel::redirect(INCLUDE_PATH);
                        exit;
                      } else {
                        //Falho no Login
                        Painel::alert('erro','CPF ou Senha incorretos!');
                      }
                    }
                    ?>

                    <div class="col-12">
                      <label for="cpf" class="form-label">CPF</label>
                        <div class="invalid-feedback">Por favor digite seu CPF!</div>
                        <input type="text" name="cpf" class="form-control" id="cpf" required>
                        <div class="invalid-feedback">Por favor digite seu CPF!</div>
                    </div>

                    <div class="col-12">
                      <label for="senha" class="form-label">Senha</label>
                      <input type="password" name="senha" class="form-control" required>
                      <div class="invalid-feedback">Por favor digite sua senha!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="lembrar" checked>
                        
                        <label class="form-check-label" for="rememberMe">Lembrar-me</label>
                      </div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="acao">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0"><b>Não tem acesso ou esqueceu a senha? <a href="<?=INCLUDE_PATH?>registro.php">Clique aqui</a></b></p>
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

</body>

</html>