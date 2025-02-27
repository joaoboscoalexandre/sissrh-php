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
                <a href="material-cadastrar-produto.php"><i class="bi bi-circle"></i><span>Cadastrar Produto</span></a>
              </li>
              <li>
                <a href="material-listar-produtos.php"><i class="bi bi-circle"></i><span>Listar Produtos</span></a>
              </li>
              <li>
                <a href="material-cadastrar-categoria.php" class="active" ><i class="bi bi-circle"></i><span>Cadastrar Categoria</span></a>
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
      <h1>Cadastro de Categorias</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Principal</a></li>
          <li class="breadcrumb-item active">Cadastro de Categorias</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

  <section class="section">
      <div class="row">

          <!-- Left side columns -->
          <div class="col-lg-7">
          <div class="row">
            
            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="card-body">
                  <h5 class="card-title">Formulário para Cadastro de Categoria</h5>
                  <?php
                    if(isset($_POST["acao"]) && $_POST["acao"] == "cadastrar"){
                      $nomeCategoria = $_POST['nome_categoria'];
                      $sql = PgSql::conectar()->prepare("INSERT INTO sissrh.tbmaterial_categorias(nome_categoria) VALUES (?);");
                      $sql->execute(array($nomeCategoria));
                      Painel::alert("sucesso","Categoria Cadastrada com sucesso!");
                    }
                  ?>
                
                  <!-- Floating Labels Form -->
                  <form class="row g-3" name="cadastrarProduto" method="POST" >
                    <div class="col-md-12">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="categoria" name="nome_categoria" placeholder="Nome da Categoria" required>
                        <label for="floatingEmail">Nome da Categoria</label>
                      </div>
                    </div>                
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" name="acao" value="cadastrar" >Cadastrar Categoria</button>
                    </div>
                  </form><!-- End floating Labels Form -->
                
                </div>

              </div>
            </div><!-- End Reports -->

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-5">

          <!-- Recent Activity -->
          <div class="card">

            <div class="card-body">
              <h5 class="card-title">Categorias <span>| Lista de Categorias</span></h5>

              <div class="activity">

                <!-- Small tables -->
                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nome da Categoria</th>
                        <th scope="col">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php                           
                      /* Instrução de consulta para paginação com PostgreSQL */  
                      $categorias = PgSql::conectar()->prepare(" SELECT * FROM sissrh.tbmaterial_categorias ORDER BY cod_categoria ASC");
                      $categorias->execute();
                      $categorias = $categorias->fetchAll();  
                      foreach($categorias as $key => $value)  {
                      ?>      
                      <tr>
                        <td><?php echo $value['cod_categoria']; ?></td>
                        <td><?php echo mb_strtoupper($value['nome_categoria'], 'UTF-8'); ?></td>
                        <td><button type="button" class="btn btn-warning" onclick="parent.location.href ='#'"><i class="bi bi-pencil-fill"></i></button></td>
                      </tr>
                      <?php } ?>  
                    </tbody>
                  </table>
                <!-- End small tables -->

              </div>

            </div>
          </div><!-- End Recent Activity -->

        </div><!-- End Right side columns -->

      </div>
    </section>

</main><!-- End #main -->

   <!-- ======= Footer ======= -->
   <?php include('footer.php'); ?>

</body>

</html>