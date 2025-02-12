<?php
  include('../config.php');
  if(isset($_GET['loggout']) || $_SESSION['cpf'] == '' || $_SESSION['login'] == 1){ Painel::loggout(); }
  include('../permissoes.php');
  use PHPMailer\PHPMailer\PHPMailer;
  require '../vendor/autoload.php';

  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Secretaria dos Recursos Hídricos - Registro de identificação do Empreendedor</title>
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


  <main id="main" class="main">

  <div class="pagetitle">

  </div><!-- End Page Title -->

  <section class="section">
      <div class="row">

                <?php
                    if(isset($_GET['codBarragem'])){
                        $barragem = PgSql::conectar()->prepare("SELECT * FROM sissrh.tbbarragem_cadastro WHERE cod_barragem = ?");
                        $barragem->execute(array($_GET['codBarragem']));
                        $barragem = $barragem->fetch();
                    }
                ?>

                <table class="table table-sm">
                  <thead>
                    <tr><th scope="col"><center><img src="../assets/img/Logotipo_SRH.png" alt=""></center></th></tr>
                    <tr><th scope="col"><br/><center><h5 class="card-title">REGISTRO DE IDENTIFICAÇÃO DO EMPREENDEDOR - RIE</h5><br/>
                    <h5 class="card-title">N&#176; <?php echo $barragem['numero_registro'] ?></h5></center></tr>
                    </th>
                  </thead>
                </table>

              <!-- Small tables -->
                <table>
                    <tr><td><br/>Considerando o disposto na Lei Federal 12.334/2010, que estabelece a Política Nacional de Segurança de Barragens, 
                        a fim de garantir os padrões de segurança de barragens e o seu universo de controle pelo poder público, com base na fiscalização, 
                        orientação e correções das ações de segurança, a Secretaria dos Recursos Hídricos do Estado do Ceará, neste ato, identifica o Sr(a). 
                        <?php echo '<strong>' . $barragem['empreendedor'] . '</strong>'; ?>, CPF/CNPJ: <?php echo "<strong>" . $barragem['cpf_cnpj'] . "</strong>"; ?>, 
                        como empreendedor da Barragem: <?php echo "<strong>" . $barragem['nome_barragem'] . "</strong>"; ?>, 
                        no município de <?php echo "<strong>" . $barragem['municipio'] . "</strong>"; ?>, cujas coordenadas são UTM: <?php echo "<strong>" . $barragem['coordenadan'] . "</strong>"; ?> e <?php echo "<strong>" . $barragem['coordenadae'] . "</strong>"; ?> S Zona 24 M, uma vez que compete a 
                        esta Secretaria a identificação dos empreendedores, de acordo com o artigo 16, inciso I da referida lei.</td>
                    </tr>
                </table>
                <br/>
                <table class="table table-sm">
                  <thead>
                    <tr><th scope="col"><center>Fortaleza,<?php echo strftime(' %d de %B de %Y', strtotime('today')); ?></center></th></tr>
                    <tr><th scope="col"><br/><br/><br/><br/><br/><center>Ramon Flávio Gomes Rodrigues</center></th></tr>
                    <tr><td><center>Secretário Executivo de Planejamento e Gestão Interna dos Recursos Hídricos</center></td></tr>
                  </thead>
                </table>
                
                <table class="table table-sm">
                    <tr><td><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                    <h6><center><hr>Centro Administrativo Governador Virgílio Távora s/n Ed. SEINFRA/SRH-Cambeba</center></h6></td>
                    </tr>
                    <tr><td><h6><center>Cep: 60.822-325 - TÉRREO • Fortaleza, Ceará • Fone: (85) 3101.3997 / 3101.4053</center></h6></td></tr>
                  </thead>
                </table>

    </section>

</main><!-- End #main -->



</body>

</html>