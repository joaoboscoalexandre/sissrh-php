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
        <a class="nav-link collapsed" data-bs-target="#tables-contrato" data-bs-toggle="collapse" href="#">
          <i class="bi bi-card-checklist"></i><span>Acomp. de Contratos</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-contrato" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="contrato-administrar.php" >
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

      <?php if($sistema02 == true || $superAdmin == true){ ?>
      <li class="nav-item">
        <a class="nav-link " data-bs-target="#tables-barragem" data-bs-toggle="collapse" href="#">
          <i class="bi bi-water"></i><span>Cadastro Barragens</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-barragem" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="barragem-administrar.php" class="active">
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

      <?php if($sistema05 == true || $superAdmin == true){ ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-desapropriacao" data-bs-toggle="collapse" href="#">
          <i class="bi bi-house-fill"></i><span>Desapropriação</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-desapropriacao" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="desapropriacao-cadastro-agrovila.php">
              <i class="bi bi-circle"></i><span>Cadastrar Agrovila</span>
            </a>
          </li>
          <li>
            <a href="desapropriacao-cadastro-familias.php">
              <i class="bi bi-circle"></i><span>Cadastrar Famílias</span>
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

          <!-- Customers Card -->
          <div class="col-xxl-3 col-xl-12">

            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Barragens <span>| Cadastradas</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-water"></i>
                  </div>
                  <div class="ps-3">
                    <h6>
                    <?php
                      $sql = PgSql::conectar()->prepare("SELECT COUNT(cod_barragem) as qtd FROM sissrh.tbbarragem_cadastro");
                      $sql->execute();
                      $qtdbar = $sql->fetch()['qtd'];
                      echo $qtdbar;
                    ?>
                    </h6>
                    <span class="text-danger small pt-1 fw-bold">62%</span> <span class="text-muted small pt-2 ps-1"></span>

                  </div>
                </div>

              </div>
            </div>

            </div><!-- End Customers Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Registros <span>| Emitidos</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-clipboard-check"></i>
                    </div>
                    <div class="ps-3">
                      <h6> 
                      <?php
                      $sql = PgSql::conectar()->prepare("SELECT COUNT(cod_barragem) as qtdreg FROM sissrh.tbbarragem_cadastro WHERE cadastro_aprovado = 'true'");
                      $sql->execute();
                      $qtdreg = $sql->fetch()['qtdreg'];
                      echo $qtdreg;
                      ?>
                    </h6>
                      <span class="text-success small pt-1 fw-bold"><?php $percentReg = ($qtdreg/$qtdbar)*100; echo intval($percentReg).'%'; ?></span><span class="text-muted small pt-2 ps-1"></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-3 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Registros <span>| Pendentes</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-clipboard-x"></i>
                    </div>
                    <div class="ps-3">
                      <h6> 
                      <?php
                      $regPend = PgSql::conectar()->prepare("SELECT COUNT(cod_barragem) as qtdregp FROM sissrh.tbbarragem_cadastro WHERE cadastro_aprovado = 'false'");
                      $regPend->execute();
                      $qtdregp = $regPend->fetch()['qtdregp'];
                      echo $qtdregp;
                      ?>
                      </h6>
                      <span class="text-danger small pt-1 fw-bold"><?php $percentRegP = ($qtdregp/$qtdbar)*100; echo intval($percentRegP).'%'; ?></span> <span class="text-muted small pt-2 ps-1"></span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Secretário assinante do RIE</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-clipboard-check"></i>
                    </div>
                    <div class="ps-3">
                    <a href="#" class="btn btn-outline-success">Editar Assinante do RIE</a> 
                    </div>
                  </div>
                </div>

              </div>

            </div><!-- End Revenue Card -->

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
                <h5 class="card-title">Relação de Barragens Cadatradas</h5>

                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                    <th scope="col">Nome da Barragem</th>
                    <th scope="col">Nome do Proprietário</th>
                    <th scope="col">CPF | CNPJ</th>
                    <th scope="col">Nº Reg.</th>
                    <th scope="col"><center>Ações</center></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      $barragens = PgSql::conectar()->prepare(" SELECT * FROM sissrh.tbbarragem_cadastro ORDER BY cod_barragem DESC");
                      $barragens->execute();
                      $barragens = $barragens->fetchAll();
                      foreach($barragens as $key => $value){
                    ?>
                    <tr>
                      <td><?php echo $value['nome_barragem']; ?></td>
                      <td><?php echo $value['empreendedor']; ?></td>
                      <td><?php echo $value['cpf_cnpj']; ?></td>
                      <td><?php echo $value['numero_registro']; ?></td>
                      <td><center><a href="<?php echo INCLUDE_PATH ?>barragem-editar-validar.php?codBarragem=<?php echo $value['cod_barragem']; ?>"><i class="bi bi-pencil-square"></i></a>&nbsp;<a href="<?php echo INCLUDE_PATH ?>barragem-infor-adicional.php?codBarragem=<?php echo $value['cod_barragem']; ?>"><i class="bi bi-clipboard-plus"></i></a>
                      <a href="#" onclick="parent.location.href ='<?php echo INCLUDE_PATH; ?>relatorios/registro-identificacao-empreendedor.php?codBarragem=<?php echo $value['cod_barragem']; ?>'" ><i class="bi bi-file-earmark-pdf"></i></a>&nbsp;<i class="bi bi-trash"></i></center></td>
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