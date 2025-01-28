<?php
  include('config.php');

	if(isset($_GET['loggout']) || $_SESSION['cpf'] == '' || $_SESSION['login'] == 1){ Painel::loggout(); }

  Painel::updateUsiarioOnline();
  $usuariosOnLine = Painel::listarUsuariosOnLine();
  

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
        <ul id="tables-contrato" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="contrato-administrar.php">
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
        <ul id="tables-biblioteca" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
        <ul id="tables-barragem" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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

  <?php
    $perfil = PgSql::conectar()->prepare(" SELECT * FROM sissrh.tbrh_funcionario WHERE cpf = ? AND cod_perfil = ?");
    $perfil->execute(array($_SESSION['cpf'],1));
    if($perfil->rowCount() == 1){
  ?>
  <main id="main" class="main">

    <div class="pagetitle">

      <h1><?php $hora = date('H');
          if($hora < 12 && $hora >= 6) $saudacao = "Bom dia!";
          if($hora >= 12 && $hora <18) $saudacao = "Boa Tarde!";
          if($hora >= 18 && $hora < 23) $saudacao = "Boa Noite!";
          echo 'Olá '. $_SESSION['login'] .', '.$saudacao; 
          ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Principal</li>
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
                <h5 class="card-title">Usuários <span>| Cadastrados</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-globe"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?php 
                      $sql = PgSql::conectar()->prepare("SELECT COUNT(DISTINCT cpf_usuario) as qtd FROM sissrh.tbadmin_sistema_pessoa");
                      $sql->execute();
                      echo $sql->fetch()['qtd'];
                    ?></h6>
                  </div>
                </div>

              </div>
            </div>

            </div><!-- End Customers Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Sistemas <span>| Cadastrados</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-gear-wide-connected"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php 
                      $sql = PgSql::conectar()->prepare("SELECT COUNT(cod_sistema) as qtd FROM sissrh.tbadmin_sistemas");
                      $sql->execute();
                      echo $sql->fetch()['qtd'];
                    ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-3 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Usuários <span>| On-Line</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo count($usuariosOnLine); ?></h6>
                      <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1"></span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Funcionários <span>| Ativos</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-gear-wide-connected"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php 
                      $sql = PgSql::conectar()->prepare("SELECT COUNT(cod_funcionario) as qtd FROM sissrh.tbrh_funcionario WHERE inativo = 't' ");
                      $sql->execute();
                      echo $sql->fetch()['qtd'];
                    ?></h6>
                      <span class="text-success small pt-1 fw-bold">80%</span> <span class="text-muted small pt-2 ps-1"></span>

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

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Usuário On-line</h5>
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">IP</th>
                    <th scope="col"><center>Último Acesso</center></th>
                    <th scope="col"><center>Ações</center></th>
                  </tr>
                </thead>
                <tbody>
              <?php
                $onLine = PgSql::conectar()->prepare("SELECT * FROM sissrh.tbadmin_online ORDER BY cod_online DESC ");
                $onLine->execute();
                $onLine = $onLine->fetchAll();
                foreach($onLine as $key => $value){
              ?>
                  <tr>
                    <th scope="row">#</th>
                    <td><?php echo $value['ip']; ?></td>
                    <td><center><?php echo date('d/m/Y - H:i', strtotime($value['ultimo_acesso'])); ?></center></td>
                    <td><center><i class="bi bi-broadcast-pin"></i>&nbsp;<i class="bi bi-cloud-download"></i>&nbsp;<i class="bi bi-speedometer2"></i></center></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Solicitação de Sistemas</h5>
              <?php
                if(isset($_POST['acao']) && $_POST['acao'] == 'habilitar_sistema'){
                  $cod_sistema = $_POST['cod_sistema'];
                  $cpf_usuario = $_POST['cpf_usuario'];
                  $cod_perfil = $_POST['cod_perfil'];
                  $fl_ativo = 't';
                  $sql = PgSql::conectar()->prepare("INSERT INTO sissrh.tbadmin_sistema_pessoa(cod_sistema, cpf_usuario, cod_perfil, fl_ativo) VALUES (?,?,?,?) ");
                  $sql->execute(array($cod_sistema,$cpf_usuario,$cod_perfil,$fl_ativo));
                  $query = PgSql::conectar()->prepare("UPDATE sissrh.tbadmin_solicita_sistema SET fl_atendido = 't' WHERE cpf_usuario = ? AND cod_sistema = ? ");
                  $query->execute(array($cpf_usuario, $cod_sistema));
                  Painel::alert('sucesso','Sistema habilitado com sucesso!');
                } 
              ?>
              
              <!-- Table with stripped rows -->

              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Sigla Sistema</th>
                    <th scope="col">Nível de Acesso</th>
                    <th scope="col"><center>Ações</center></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $sql = PgSql::conectar()->prepare(" SELECT rh.ds_login, s.sigla_sistema, ss.cod_solicitacao, ss.cod_sistema, ss.cpf_usuario 
                    FROM rh.tbsirh_servidor rh, sissrh.tbadmin_solicita_sistema ss, sissrh.tbadmin_sistemas s 
                    WHERE rh.ds_cpf = ss.cpf_usuario AND fl_atendido = 'false' AND ss.cod_sistema = s.cod_sistema ");
                    $sql->execute();
                    $sistemas = $sql->fetchAll();
                    foreach($sistemas as $key => $value){
                  ?>
                  <tr>
                    <form class="row g-3" name="solicitar_sistema" method="POST" action="index.php">
                      <input type="hidden" name="cod_sistema" value="<?php echo $value['cod_sistema']; ?>" >
                      <input type="hidden" name="cpf_usuario" value="<?php echo $value['cpf_usuario']; ?>" >
                    <th scope="row"><?php echo $value['cod_solicitacao']; ?></th>
                    <td><?php echo $value['ds_login']; ?></td>
                    <td><?php echo $value['sigla_sistema']; ?></td>

                    <td>
                      <select class="form-select" name="cod_perfil" required >
                        <option value="" selected disabled>SELECIONE</option>
                        <option value="1">SUPER ADMINISTRADOR</option>
                        <option value="2">ADMINISTRADOR</option>
                        <option value="3">USUÁRIO</option>
                      </select>
                    </td>
                    <td>
                      <button type="submit" name="acao" value="habilitar_sistema" class="btn btn-primary" ><i class="bi bi-check-all"></i></button>
                      <button type="submit" name="acao" value="desabilitar_sistema" class="btn btn-danger"><i class="bi bi-x-octagon"></i></button>
                    </td>
                    </form>
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

  <?php
    } else { ?>

<main id="main" class="main">

<div class="pagetitle">

  <h1><?php $hora = date('H');
      if($hora < 12 && $hora >= 6) $saudacao = "Bom dia!";
      if($hora >= 12 && $hora <18) $saudacao = "Boa Tarde!";
      if($hora >= 18 && $hora < 23) $saudacao = "Boa Noite!";
      echo 'Olá '. $_SESSION['login'] .', '.$saudacao; ?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active">Principal</li>
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
            <h5 class="card-title">Usuários <span>| Online</span></h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-globe"></i>
              </div>
              <div class="ps-3">
                <h6>6</h6>
                <span class="text-danger small pt-1 fw-bold">22%</span> <span class="text-muted small pt-2 ps-1"></span>

              </div>
            </div>

          </div>
        </div>

        </div><!-- End Customers Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-3 col-md-6">
          <div class="card info-card revenue-card">

            <div class="card-body">
              <h5 class="card-title">Sistemas <span>| Cadastrados</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-gear-wide-connected"></i>
                </div>
                <div class="ps-3">
                  <h6>6</h6>
                  <span class="text-success small pt-1 fw-bold">100%</span> <span class="text-muted small pt-2 ps-1"></span>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <!-- Customers Card -->
        <div class="col-xxl-3 col-xl-12">

          <div class="card info-card customers-card">

            <div class="card-body">
              <h5 class="card-title">Usuários <span>| Administradores</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>6</h6>
                  <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1"></span>

                </div>
              </div>

            </div>
          </div>

        </div><!-- End Customers Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-3 col-md-6">
          <div class="card info-card revenue-card">

            <div class="card-body">
              <h5 class="card-title">Servidores <span>| Ativos</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-gear-wide-connected"></i>
                </div>
                <div class="ps-3">
                  <h6>125</h6>
                  <span class="text-success small pt-1 fw-bold">80%</span> <span class="text-muted small pt-2 ps-1"></span>

                </div>
              </div>
            </div>

          </div>

        </div><!-- End Revenue Card -->

      </div>
    </div><!-- End Left side columns -->

    <section class="section">
  <div class="row">
    
    <div class="col-lg-6">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Sistemas habilitados para seu usuário</h5>
          <hr class="hr hr-blurry" />

          <?php
              if(isset($_POST['acao']) && $_POST['acao'] == 'desabilitar'){
                $cod_sistema = $_POST['cod_sistema'];
                $query = PgSql::conectar()->prepare("DELETE FROM sissrh.tbadmin_sistema_pessoa WHERE cod_sistema = $cod_sistema AND cpf_usuario = '".$_SESSION['cpf']."' ");
                $query->execute();
                Painel::alert('sucesso','O sistema foi desabilitado com sucesso!');
              }
          ?>

          <!-- List group With Icons -->
          <ul class="list-group">
          <table>
          <?php
                $query = PgSql::conectar()->prepare("SELECT s.cod_sistema, s.nome_sistema, s.icone_sistema FROM sissrh.tbadmin_sistemas s, sissrh.tbadmin_sistema_pessoa sp
                WHERE s.cod_sistema = sp.cod_sistema AND sp.cpf_usuario = '".$_SESSION['cpf']."' ");
                $query->execute();
                $sistemas = $query->fetchAll();
                foreach($sistemas as $key => $value){
              ?>
            <tr>
            <form class="row g-3" method="post" enctype="multipart/form-data">
              <input type="hidden" name="cod_sistema" value="<?php echo $value['cod_sistema'] ; ?> " />
              <td><li class="list-group-item"><?php echo $value['icone_sistema'].' '.$value['nome_sistema']; ?></li></td>
              <td><button type="submit" name="acao" value="desabilitar" class="btn btn-danger">&nbsp;Desabilitar Sistema</button></td>
            </form>
            </tr>
            <?php
                }
                ?>
          </table>
          </ul><!-- End List group With Icons -->
        </div>
      </div>
    </div>

    <div class="col-lg-6">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Sistemas desabilitados para seu usuário</h5>
          <hr class="hr hr-blurry" />

          <?php
              if(isset($_POST['acao']) && $_POST['acao'] == 'habilitar'){
                $cod_sistema = $_POST['cod_sistema'];
                $cpf_usuario = $_SESSION['cpf'];
                $data_solicitacao = date('Y-m-d');
                $query = PgSql::conectar()->prepare("INSERT INTO sissrh.tbadmin_solicita_sistema (cpf_usuario, cod_sistema, data_solicitacao) VALUES (?,?,?) ");
                $query->execute(array($cpf_usuario,$cod_sistema,$data_solicitacao));
                Painel::alert('sucesso','Solicitação enviada com sucesso. Aguarde! Em breve o sistema estará disponível.');
              }
          ?>

          <!-- List group With Icons -->
          <ul class="list-group">
          <table>
          <?php
            $query = PgSql::conectar()->prepare(" SELECT cod_sistema, icone_sistema, nome_sistema FROM sissrh.tbadmin_sistemas WHERE cod_sistema NOT IN (SELECT cod_sistema FROM sissrh.tbadmin_sistema_pessoa WHERE cpf_usuario = '".$_SESSION['cpf']."') AND cod_sistema NOT IN (SELECT cod_sistema FROM sissrh.tbadmin_solicita_sistema WHERE cpf_usuario = '".$_SESSION['cpf']."' AND fl_atendido = 'false') ");
            $query->execute();
            $sistemas = $query->fetchAll();
            foreach($sistemas as $key => $value){
          ?>
            <tr>
            <form class="row g-3" method="post" enctype="multipart/form-data">
              <input type="hidden" name="cod_sistema" value="<?php echo $value['cod_sistema'] ; ?> " />
              <input type="hidden" name="nome_tabela" value="tbadmin_solicita_sistema" />
              <td><li class="list-group-item"><?php echo $value['icone_sistema'].' '.$value['nome_sistema']; ?></li></td>
              <td><button type="submit" name="acao" value="habilitar" class="btn btn-primary">&nbsp;Solicitar Sistema</button></td>
            </form>
            </tr>
            <?php
            }
            ?>
          </table>
          </ul><!-- End List group With Icons -->
        </div>
      </div>

    </div>
  </div>
</section>

  </div>
</section>

</main><!-- End #main -->


  <?php } ?>


  <!-- ======= Footer ======= -->
  <?php include('footer.php'); ?>
</body>

</html>
