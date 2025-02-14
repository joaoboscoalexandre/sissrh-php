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
        <ul id="tables-barragem" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="barragem-administrar.php" >
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
        <ul id="tables-desapropriacao" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="desapropriacao-cadastro-agrovila.php">
              <i class="bi bi-circle"></i><span>Cadastrar Agrovila</span>
            </a>
          </li>
          <li>
            <a href="desapropriacao-cadastro-familias.php"  class="active">
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

  <section class="section">
      <div class="row">

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body"><br/>
              <center><img src="assets/img/Logotipo_SRH.png" alt=""></center><br/>
              <center><h5 class="card-title">Formulário de Cadastro da Obra e da Agrovila</h5><hr width="10%"><br/></center>
              
              <?php 
              if(isset($_POST['acao'])){

                $nomeObra = $_POST['nome_obra'];
                $codMunicipio = $_POST['municipio'];
                $nomeAgrovila = $_POST['nome_agrovila'];

                $obra = PgSql::conectar()->prepare("INSERT INTO sissrh.tbdesapropriacao_obra (nome_obra, nome_agrovila, cod_municipio) VALUES (?,?,?)");
                $obra->execute(array($nomeObra,$nomeAgrovila,$codMunicipio));
                Painel::alert('sucesso', 'Obra Cadastrada com sucesso!');

              } 

              ?>
              <div class="alert alert-primary alert-dismissible fade show" ><strong>1. Cadastro da Obra e Agrovila</strong></div>
              <!-- Floating Labels Form -->
              <form method="post" class="row g-3">
                <div class="col-md-5">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="nome_obra" placeholder="Nome da Obra" required>
                    <label for="floatingName">Nome da Obra</label>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="Municipio" name="municipio" required>
                      <option value="" selected disabled>Selecione o Município</option>
                      <?php
                        $municipios = PgSql::conectar()->prepare("SELECT * FROM sissrh.tbadmin_municipio ORDER BY nome_municipio");
                        $municipios->execute();
                        $municipios = $municipios->fetchAll();
                        foreach($municipios as $key => $value){
                        ?>
                        <option value ="<?php echo $value['cod_municipio']; ?>"><?php echo $value['nome_municipio']; ?></option>;
                      <?php } ?>
                    </select>
                    <label for="floatingSelect">Município</label>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="nome_agrovila" placeholder="Nome da Agrovila" required>
                    <label for="floatingName">Nome da Agrovila</label>
                  </div>
                </div>
               
                <div class="text-center"><br/><button type="submit" name="acao" value="cadastrar" class="btn btn-primary">Cadastrar Obra e Agrovila</button>
                </div>

              </form><!-- End floating Labels Form -->
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Relação de obras cadastradas</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome da Obra</th>
                    <th scope="col">Nome da Agrovila</th>
                    <th scope="col">Município</th>
                    <th scope="col">Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Brandon Jacob</td>
                    <td>Designer</td>
                    <td>28</td>
                    <td>2016-05-25</td>
                  </tr>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

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