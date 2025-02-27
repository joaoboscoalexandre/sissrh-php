<?php
  include('config.php');
  if(isset($_GET['loggout']) || $_SESSION['cpf'] == '' || $_SESSION['login'] == 1){ Painel::loggout(); }
  include('permissoes.php');
  use PHPMailer\PHPMailer\PHPMailer;
  require 'vendor/autoload.php';

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
        <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
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

      <?php if($sistema05 == true || $superAdmin == true){ ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-desapropriacao" data-bs-toggle="collapse" href="#">
          <i class="bi bi-house-fill"></i><span>Desapropriação</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-desapropriacao" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="#"><i class="bi bi-circle"></i><span>Cadastro de Famílias</span></a>
            <ul>
              <?php
              $obra = PgSql::conectar()->prepare("SELECT * FROM sissrh.tbdesapropriacao_agrovila ORDER BY cod_agrovila ASC ");
              $obra->execute();
              $obra = $obra->fetchAll();
              foreach($obra as $key => $value){
              ?>
              <li>
                <a href="desapropriacao-cadastro-familia.php?codAgrovila=<?php echo $value['cod_agrovila']; ?>">
                <i class="bi bi-circle"></i><span><?php echo $value['nome_agrovila']; ?></span>
                </a>
              </li>
              <?php
              }
              ?>
            </ul>
            </li>
            <li>
            <a href="desapropriacao-cadastro-agrovila.php">
              <i class="bi bi-circle"></i><span>Cadastrar Agrovila</span>
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
        <ul id="tables-rh" class="nav-content collapse" data-bs-parent="#sidebar-nav">
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

      <?php if($sistema06 == true || $superAdmin == true){ ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-SiSMat" data-bs-toggle="collapse" href="#">
          <i class="bi bi-basket2"></i><span>Solicitação de Material</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-SiSMat" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="rh-cadastrar-funcionario.php">
              <i class="bi bi-circle"></i><span>Pedidos</span>
            </a>
            <ul>
              <li>
                <a href="material-administrar-pedidos.php"><i class="bi bi-circle"></i><span>Administrar Pedidos</span></a>
              </li>
              <li>
                <a href="material-pedido-material.php"><i class="bi bi-circle"></i><span>Pedido de Material</span></a>
              </li>
              <li>
                <a href="material-listar-pedidos.php"><i class="bi bi-circle"></i><span>Listar Pedidos</span></a>
              </li>
            </ul>
          </li>
          <li>
            <a href="rh-cadastrar-funcionario.php">
              <i class="bi bi-circle"></i><span>Produtos</span>
            </a>
            <ul>
              <li>
                <a href="material-cadastrar-produto.php" class="active" ><i class="bi bi-circle"></i><span>Cadastrar Produto</span></a>
              </li>
              <li>
                <a href="material-listar-produtos.php"><i class="bi bi-circle"></i><span>Listar Produtos</span></a>
              </li>
              <li>
                <a href="material-cadastrar-categoria.php"><i class="bi bi-circle"></i><span>Cadastrar Categoria</span></a>
              </li>
            </ul>
          </li>
          <li>
            <a href="rh-cadastrar-funcionario.php">
              <i class="bi bi-circle"></i><span>Estoque</span>
            </a>
            <ul>
              <li>
                <a href="material-entrada-material.php"><i class="bi bi-circle"></i><span>Entrada de Material</span></a>
              </li>
              <li>
                <a href="material-listar-estoque.php"><i class="bi bi-circle"></i><span>Listar Estoque</span></a>
              </li>
              <li>
                <a href="material-listar-entrada-material.php"><i class="bi bi-circle"></i><span>Listar Entradas</span></a>
              </li>
            </ul>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
      <?php } ?>


      <br/>
      <hr>
      <br/>
      <li class="nav-heading">Relatórios</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

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
      <h1>Página de Cadastro de Sistemas - SRH</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Principal</a></li>
          <li class="breadcrumb-item active">Cadastrar Sistemas</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Formulário Para Cadastro de Sistemas</h5>
              <?php


              ?>

              <!-- Multi Columns Form -->
              <form class="row g-3" method="post" enctype="multipart/form-data">
                <div class="col-md-8">
                  <label for="sistma" class="form-label">Nome do Sistema</label>
                  <input type="text" class="form-control" name="nome_sistema" required>
                </div>
                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Sigla do Sistema</label>
                  <input type="text" class="form-control" name="sigla_sistema" required>
                </div>
                <div class="col-md-3">
                  <label for="sistema" class="form-label">Ícone do Sistema</label>
                  <input type="text" class="form-control" name="icone_sistema" required>
                </div>
                <div class="col-md-5">
                  <label for="sistema" class="form-label">URL do Sistema</label>
                  <input type="text" class="form-control" name="url_acesso" required>
                </div>
                <div class="col-md-4">
                  <label for="inputState" class="form-label">Linguagem</label>
                  <select class="form-select" name="tipo_linguagem" required>
                    <option selected disabled value="">Escolha...</option>
                    <option value="BOOTSTRAP - JAVAWEB">BOOTSTRAP - JAVAWEB</option>
                    <option value="BOOTSTRAP - PHP - JAVA SCRIPT">BOOTSTRAP - PHP - JAVA SCRIPT</option>
                    <option value="HTML - CSS - JAVA SCRIPT">HTML - CSS - JAVA SCRIPT</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="inputState" class="form-label">Desenvolvedor</label>
                  <select class="form-select" name="nome_desenvolvedor" required>
                    <option selected disabled value="">Escolha...</option>
                    <option value="AMANDA FARIAS">AMANDA FARIAS</option>
                    <option value="JOÃO BOSCO">JOÃO BOSCO</option>
                    <option value="AMANDA FARIAS - JOÃO BOSCO">AMANDA FARIAS - JOÃO BOSCO</option>
                  </select>
                </div>

                <div class="col-md-3">
                  <label for="inputState" class="form-label">Situação</label>
                  <select class="form-select" name="status_sistema" required>
                    <option selected disabled value="">Escolha...</option>
                    <option value="Em Produção">Em Produção</option>
                    <option value="Em Desenvolvimento">Em Desenvolvimento</option>
                    <option value="Em Fase de Teste">Em Fase de Teste</option>
                  </select>
                </div>

                <div class="col-md-3">
                  <label for="inputState" class="form-label">Status</label>
                  <select class="form-select" name="fl_ativo" required>
                    <option selected disabled value="">Escolha...</option>
                    <option value="true">Ativo</option>
                    <option value="false">Inativo</option>
                  </select>
                </div>

                <div class="col-md-2">
                  <label for="inputZip" class="form-label">Data Cadastro</label>
                  <input type="text" class="form-control" name="dataCadastro" value="<?php echo date('d/m/Y'); ?>" disabled>
                </div><br />

                  <center>
                    <button type="submit" name="acao" value="cadastrar" class="btn btn-primary">Cadastrar Sistema</button>
                  </center>

                
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

        </div>

        <div class="col-lg-2">
            <!-- Recent Activity -->
            <div class="card">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Produtos <span>| Cadastros</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-box"></i>
                            </div>
                        <div class="ps-3">
                        <?php
                            $sql = pg_query(" SELECT COUNT(cod_produto) as qtdprod FROM estoque.tbestoque_produtos ");
                            $linha = pg_fetch_array($sql);
                            $Qtdprod = $linha['qtdprod'];
                            ?>
                        <h6><?= $Qtdprod; ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Recent Activity -->

        </div>
    </section>

</main><!-- End #main -->

   <!-- ======= Footer ======= -->
   <?php include('footer.php'); ?>

</body>

</html>