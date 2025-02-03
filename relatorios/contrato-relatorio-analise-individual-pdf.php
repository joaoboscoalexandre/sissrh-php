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

  <title>Relatório de Análises da Comissão</title>
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
                    if(isset($_GET['codContrato'])){
                        $contrato = PgSql::conectar()->prepare("SELECT * FROM sissrh.tbcontratos_cadastro WHERE cod_contrato = ?");
                        $contrato->execute(array($_GET['codContrato']));
                        $contrato = $contrato->fetch();
                    }
                ?>

          <div class="card">
            <div class="card-body">
            <h5 class="card-title">Relatório da Análises da Comissão e Situação do Contrato Nr <?php echo $contrato['nr_contrato'] ?></h5>
            <hr>
              <!-- Floating Labels Form -->

              <!-- Small tables -->
                <table class="table table-bordered border-primary">
                  <thead>
                    <tr>
                      <th scope="col">Objeto do Contrato</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $contrato['objeto'] ?></td>
                    </tr>
                  </tbody>
                </table>

                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">Contratante</th>
                      <th scope="col">Contratado</th>
                      <th scope="col">CPF/CNPJ</th>
                      <th scope="col">Tipo Contrato</th>
                      <th scope="col">Situação</th>
                      <th scope="col">Cód. Contrato</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $contrato['contratante'] ?></td>
                      <td><?php echo $contrato['contratado'] ?></td>
                      <td><?php echo $contrato['cnpj_contratado'] ?></td>
                      <td><?php echo $contrato['tipo_contrato'] ?></td>
                      <td><?php echo $contrato['situacao'] ?></td>
                      <td><?php echo $contrato['codigo_contrato'] ?></td>
                    </tr>
                  </tbody>
                </table>

                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">Nr SIC</th>
                      <th scope="col">Fonte de Recurso</th>
                      <th scope="col"><center>Valor Contrato</th>
                      <th scope="col"><center>Valor Pago</th>
                      <th scope="col"><center>Assinatura</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $contrato['nr_sic'] ?></td>
                      <td><?php echo $contrato['fonte_recurso'] ?></td>
                      <td><center><?php echo 'R$ '.number_format($contrato['valor_inicial'],2,",","."); ?></center></td>
                      <td><center><?php echo 'R$ '.number_format($contrato['valor_pago'],2,",","."); ?></center></td>
                      <td><center><?php echo date('d/m/Y', strtotime($contrato['data_assinatura'])); ?></center></td>
                    </tr>
                  </tbody>
                </table>

                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col"><center>Início</center></th>
                      <th scope="col"><center>Término Previsto</center></th>
                      <th scope="col"><center>Publicação</center></th>
                      <th scope="col"><center>Responsável/Gestor</center></th>
                      <th scope="col"><center>Url Ceará Transparente</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><center><?php echo date('d/m/Y', strtotime($contrato['data_inicio'])); ?></center></td>
                      <td><center><?php echo date('d/m/Y', strtotime($contrato['data_termino_previsto'])); ?></center></td>
                      <td><center><?php echo date('d/m/Y', strtotime($contrato['data_publicacao'])); ?></center></td>
                      <td><center><?php echo $contrato['responsavel_gestor']; ?></center></td>
                      <td><center><?php echo $contrato['url_hiperlink']; ?></center></td>
                    </tr>
                  </tbody>
                </table>

                <!-- End small tables -->
                <br/>                
                <center><strong>HISTÓRICO DE ACOMPANHAMENTO DO CONTRATO</strong> </center>

                  <?php
                      if(isset($_POST['acao']) && $_POST['acao'] == 'alterar'){

                        $codigoContrato = $contrato['cod_contrato'];
                        $analiseComissao = $_POST['analise_comissao'];
                        $providencias = $_POST['providencias'];
                        $dataAtualizacao = date('Y-m-d H:i:s');
                        $observacao = $_POST['observacao'];
                        $resposavel = $_SESSION['login'];

                        $sql = PgSql::conectar()->prepare("INSERT INTO sissrh.tbcontatos_acompanhamento(cod_contrato,analise_comissao,providencias,data_atualizacao,observacao,responsavel)
                          VALUES (?,?,?,?,?,?);");
                        $sql->execute(array($codigoContrato,$analiseComissao,$providencias,$dataAtualizacao,$observacao,$resposavel));
                        Painel::alert('sucesso','Acompanhamento de contrato atualizado com sucesso!');
                      }
                    ?>
 
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
                        $dados->execute(array($_GET['codContrato']));
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