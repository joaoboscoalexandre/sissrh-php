<?php

include('config.php');

if(isset($_GET['loggout']) || $_SESSION['cpf'] == '' || $_SESSION['login'] == 1){ Painel::loggout(); }

include('permissoes.php');

?>

<!DOCTYPE html>
<html lang="en">

<?php include('head.php'); ?>

<body>

<?php include('header.php'); ?>

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Painel de Controle</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <?php if($superAdmin == true ) { ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gear-wide-connected"></i><span>Sistemas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="admin-cadastrar-sistema.php">
              <i class="bi bi-circle"></i><span>Cadastrar Sistema</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
      <?php } ?>

      
      <?php if($sistema03 == true || $superAdmin == true){ ?>
      <li class="nav-item">
        <a class="nav-link " data-bs-target="#tables-contrato" data-bs-toggle="collapse" href="#">
          <i class="bi bi-card-checklist"></i><span>Acomp. de Contratos</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-contrato" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="contrato-administrar.php" class="active">
              <i class="bi bi-circle"></i><span>Acompanhar Contratos</span>
            </a>
          </li>
          <li>
            <a href="contrato-cadastrar.php">
              <i class="bi bi-circle"></i><span>Cadastrar Contratos</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
      <?php } ?>
      
      <?php if($sistema01 == true || $superAdmin == true){ ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-biblioteca" data-bs-toggle="collapse" href="#">
          <i class="bi bi-book-half"></i><span>Biblioteca</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-biblioteca" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="biblioteca-cadastrar-livro.php">
              <i class="bi bi-circle"></i><span>Cadastrar Livro</span>
            </a>
          </li>
          <li>
            <a href="biblioteca-listar-livro.php">
              <i class="bi bi-circle"></i><span>Listar Livros</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
      <?php } ?>

      <?php if($sistema03 == true || $superAdmin == true){ ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-barragem" data-bs-toggle="collapse" href="#">
          <i class="bi bi-water"></i><span>Cadastro Barragens</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-barragem" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="barragem-administrar.php">
              <i class="bi bi-circle"></i><span>Administrar Barragens</span>
            </a>
            
          </li>
          <li>
            <a href="barragem-cadastrar.php">
              <i class="bi bi-circle"></i><span>Cadastrar Barragens</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
      <?php } ?>

      <?php if($sistema04 == true || $superAdmin == true){ ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-rh" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-bounding-box"></i><span>Recursos Humanos</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-rh" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="rh-cadastrar-funcionario.php">
              <i class="bi bi-circle"></i><span>Cadastrar Funcionário</span>
            </a>
          </li>
          <li>
            <a href="rh-estrutura-organizacional.php">
              <i class="bi bi-circle"></i><span>Estrutura Organizacional</span>
            </a>
          </li>
          <li>
            <a href="rh-empresa.php">
              <i class="bi bi-circle"></i><span>Cadastrar Empresa</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
      <?php } ?>


      <br/>
      <hr>
      <br/>
      <li class="nav-heading">Relatórios</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?php $hora = date('H');
          if($hora < 12 && $hora >= 6) $saudacao = "Bom dia!";
          if($hora >= 12 && $hora <18) $saudacao = "Boa Tarde!";
          if($hora >= 18 && $hora < 23) $saudacao = "Boa Noite!";
          echo 'Olá! '. $_SESSION['login'] .', '.$saudacao; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Principal
          </li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Revenue Card -->
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Contratos <span>| Vigentes</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-clipboard-check"></i>
                    </div>
                    <div class="ps-3">
                      <h6> 
                      <?php
                      $sql = PgSql::conectar()->prepare("SELECT COUNT(cod_contrato) as qtdreg FROM sissrh.tbcontratos_cadastro WHERE situacao = 'Vigente'");
                      $sql->execute();
                      $qtdVig = $sql->fetch()['qtdreg'];
                      echo $qtdVig;
                      ?>
                    </h6>
                      <span class="text-success small pt-1 fw-bold"><?php $percentReg = ($qtdVig/$qtdCont)*100; echo intval($percentReg).'%'; ?></span><span class="text-muted small pt-2 ps-1"></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-3 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Contratos <span>| Encerrados</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-clipboard-x"></i>
                    </div>
                    <div class="ps-3">
                      <h6> 
                      <?php
                      $regPend = PgSql::conectar()->prepare("SELECT COUNT(cod_contrato) as qtdregp FROM sissrh.tbcontratos_cadastro WHERE situacao = 'Encerrado' ");
                      $regPend->execute();
                      $qtdEnc = $regPend->fetch()['qtdregp'];
                      echo $qtdEnc;
                      ?>
                      </h6>
                      <span class="text-danger small pt-1 fw-bold"><?php $percentRegP = ($qtdEnc/$qtdCont)*100; echo intval($percentRegP).'%'; ?></span> <span class="text-muted small pt-2 ps-1"></span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Relatório <span>| Acompanhamento de Contratos</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-file-earmark-pdf-fill"></i>
                    </div>
                    <div class="ps-3">
                    <a href="contrato-cadastrar.php" class="btn btn-outline-success">Com término em até 60 dias</a> 
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

                      <!-- Customers Card -->
          <div class="col-xxl-3 col-xl-12">

          <div class="card info-card customers-card">

            <div class="card-body">
              <h5 class="card-title">Relatório <span>| Situação e Analises da Comissão</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-file-earmark-pdf-fill"></i>
                </div>
                <div class="ps-3">
                    <a href="contrato-cadastrar.php" class="btn btn-outline-warning">Análises da Comissão</a> 
                </div>
              </div>

            </div>
          </div>

          </div><!-- End Customers Card -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">


        </div><!-- End Right side columns -->

      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Lista de Contatos Vigentes</h5>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">Nº Contrato</th>
                      <th scope="col">Contratado</th>
                      <th scope="col"><center>Data Início</center></th>
                      <th scope="col"><center>Data Término</center></th>
                      <th scope="col"><center>Dias p/ Término</center></th>
                      <th scope="col"><center>Ações</center></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      $barragens = PgSql::conectar()->prepare("SELECT * FROM sissrh.tbcontratos_cadastro WHERE situacao = 'Vigente' ORDER BY data_termino_previsto ASC");
                      $barragens->execute();
                      $barragens = $barragens->fetchAll();
                      foreach($barragens as $key => $value){
                    ?>
                    <tr>
                      <td><?php echo $value['nr_contrato']; ?></td>
                      <td><?php echo $value['contratado']; ?></td>
                      <td><center><?php echo date('d/m/Y', strtotime($value['data_inicio'])); ?></center></td>
                      <td><center><?php echo date('d/m/Y', strtotime($value['data_termino_previsto'])); ?></center></td>
                      <td>
                      <center>
                      <?php 
                      $dataTermino = new DateTime($value['data_termino_previsto']);
                      $dataAtual = new DateTime(date('Y-m-d'));
                      $diferenca = $dataAtual->diff($dataTermino);
                      //echo $diferenca->format('%a dia(s)');                                            
                      $diferencaNumber = $diferenca->format('%a');
                      
                      if($diferencaNumber >90){
                        echo "<div class='alert alert-success bg-success text-light border-0 alert-dismissible fade show' role='alert'> "
                        .$diferenca->format('%a').' dias'.
                      " </div>";
                      } else if($diferencaNumber >60 && $diferencaNumber <=90){
                        echo "<div class='alert alert-primary bg-primary text-light border-0 alert-dismissible fade show' role='alert'> "
                        .$diferenca->format('%a').' dias'.
                      " </div>";
                      } else if($diferencaNumber >30 && $diferencaNumber <=60){
                        echo "<div class='alert alert-warning bg-warning text-light border-0 alert-dismissible fade show' role='alert'><strong> "
                        .$diferenca->format('%a').' dias'.
                      " </strong></div>";
                      } else if($diferencaNumber >0 && $diferencaNumber <=30){
                        echo "<div class='alert alert-danger bg-danger text-light border-0 alert-dismissible fade show' role='alert'><strong> "
                        .$diferenca->format('%a').' dias'.
                      " </strong></div>";
                      }
                      else if($diferencaNumber <=0){
                        echo "<div class='alert alert-danger bg-danger text-light border-0 alert-dismissible fade show' role='alert'>
                        <strong>Contrato com o Prazo Vencido!</strong>
                        </div>";
                      }
                      
                      ?>
                      </center>
                    </td>
                      <td><center><a href="<?php echo INCLUDE_PATH ?>contrato-atualizar-informacoes.php?codContrato=<?php echo $value['cod_contrato']; ?>"><i class="bi bi-clipboard-data"></i></a>&nbsp;
                      <a href="#" target="_blank" onclick="parent.location.href ='<?php echo INCLUDE_PATH; ?>relatorios/historico-contrato-pdf.php?codContrato=<?php echo $value['cod_contrato']; ?>'"><i class="bi bi-file-earmark-pdf"></i></a></center></td>
                    </tr>
                    <?php
                      }
                      ?>
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Lista de Contatos Encerrados</h5>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                  <tr>
                      <th scope="col">Nº Contrato</th>
                      <th scope="col">Contratado</th>
                      <th scope="col"><center>Data Início</center></th>
                      <th scope="col"><center>Data Término</center></th>
                      <th scope="col"><center>Ações</center></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      $barragens = PgSql::conectar()->prepare(" SELECT * FROM sissrh.tbcontratos_cadastro WHERE situacao = 'Encerrado' ORDER BY cod_contrato ASC");
                      $barragens->execute();
                      $barragens = $barragens->fetchAll();
                      foreach($barragens as $key => $value){
                    ?>
                     <tr>
                      <td><?php echo $value['nr_contrato']; ?></td>
                      <td><?php echo $value['contratado']; ?></td>
                      <td><center><?php echo date('d/m/Y', strtotime($value['data_inicio'])); ?></center></td>
                      <td><center><?php echo date('d/m/Y', strtotime($value['data_termino_efetivo'])); ?></center></td>
                      <td><center><a href="<?php echo INCLUDE_PATH ?>contrato-atualizar-informacoes.php?codContrato=<?php echo $value['cod_contrato']; ?>"><i class="bi bi-clipboard-data"></i></a>&nbsp;&nbsp;<a href="<?php echo INCLUDE_PATH ?>contrato-editar.php?codContrato=<?php echo $value['cod_contrato']; ?>"><i class="bi bi-pencil-square"></i></a>&nbsp;&nbsp;<a href=""><i class="bi bi-file-pdf"></i></a></center></td>
                    </tr>
                    <?php
                      }
                      ?>
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
              </div>
            </div>
          </div>
        </div>
      </section>

      </div>
    </section>

  </main><!-- End #main -->

   <!-- ======= Footer ======= -->
   <?php include('footer.php'); ?>

</body>

</html>