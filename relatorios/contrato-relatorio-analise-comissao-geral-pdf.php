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

  <title>Relatório Geral de Análises da Comissão</title>
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
      <h1>Governo do Estado do Ceará | Secretaria dos Recursos Hídricos - SRH</h1>
  </div><!-- End Page Title -->

  <section class="section">
      <div class="row">

        <div class="col-lg-12"> 
          <?php
            //$dataAtual = date('Y-m-d');
            $prazo = date('Y-m-d', strtotime("+ 60 days",strtotime(date('Y-m-d'))));
          ?>

          <div class="card">
            <div class="card-body">
            <h5 class="card-title">Relatório de Acompanhamento de Contratos e Análises da Comissão - Prazo de vencimento com até <?php echo $prazo; ?> dias</h5>
            <hr>
              <!-- Floating Labels Form -->
               <?php                            
                $contrato = PgSql::conectar()->prepare("SELECT * FROM sissrh.tbcontratos_cadastro WHERE data_termino_previsto <= ?");
                $contrato->execute(array($prazo));
                $contrato = $contrato->fetchAll();
                foreach($contrato as $key => $value){
                $codContrato = $value['cod_contrato'];
               ?>

              <!-- Small tables -->
                <table class="table table-bordered border-primary">
                  <thead>
                    <tr>
                    <th scope="col">Contrato</th>
                    <th scope="col">Contratado</th>
                    <th scope="col">Objeto do Contrato</th>
                    <th scope="col">Término</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $value['nr_contrato']; ?></td>
                      <td><?php echo $value['contratado']; ?></td>
                      <td><?php echo $value['objeto']; ?></td>
                      <td><?php echo date('d/m/Y', strtotime($value['data_termino_previsto'])); ?></td>
                    </tr>
                  </tbody>
                </table>
                <table class="table table-sm">
                  <thead>
                  <tr>
                    <th scope="col">Análise da Comissão</th>
                    <th scope="col">Providências</th>
                    <th scope="col">Observação</th>
                    <th scope="col"><center>Dt. Atualização</center></th>
                    <th scope="col"><center>Atualizado Por:</center></th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $dados = PgSql::conectar()->prepare("SELECT * FROM sissrh.tbcontatos_acompanhamento WHERE cod_contrato = ? ORDER BY cod_acompanhamento DESC");
                    $dados->execute(array($codContrato));
                    $dados = $dados->fetchAll();
                    foreach ($dados as $key => $value) {
                    ?>
                  <tr>
                    <td><?php echo $value['analise_comissao']; ?></td>
                    <td><?php echo $value['providencias'] ?></td>
                    <td><?php echo $value['observacao'] ?></td>
                    <td><center><?php echo date('d/m/Y - H:i:s', strtotime($value['data_atualizacao'])); ?></center></td>
                    <td><center><?php echo $value['responsavel'] ?></center></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
                <hr>


                <?php
                  }
                  ?>

            </div>
          </div>

        </div>

      </div>
    </section>

</main><!-- End #main -->

   <!-- ======= Footer ======= -->
   <?php include('footer.php'); ?>

</body>

</html>