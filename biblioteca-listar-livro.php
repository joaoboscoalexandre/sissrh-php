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
        <a class="nav-link " data-bs-target="#tables-biblioteca" data-bs-toggle="collapse" href="#">
          <i class="bi bi-book-half"></i><span>Biblioteca</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-biblioteca" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="biblioteca-cadastrar-livro.php">
              <i class="bi bi-circle"></i><span>Cadastrar Livro</span>
            </a>
          </li>
          <li>
            <a href="biblioteca-listar-livro.php" class="active">
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

      <?php if($sistema05 == true || $superAdmin == true){ ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-desapropriacao" data-bs-toggle="collapse" href="#">
          <i class="bi bi-house-fill"></i><span>Desapropriação</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-desapropriacao" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Cadastro de Famílias</span></a>
            <ul>
              <?php
              $obra = PgSql::conectar()->prepare("SELECT * FROM sissrh.tbdesapropriacao_agrovila ORDER BY cod_agrovila ASC ");
              $obra->execute();
              $obra = $obra->fetchAll();
              foreach($obra as $key => $value){
              ?>
              <li>
                <a href="desapropriacao-cadastro-familia.php?codAgrovila=<?php echo $value['cod_agrovila']; ?>">
                <i class="bi bi-circle"></i><span><?php echo $value['nome_agrovila']; ?>
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
      <h1>Biblioteca SRH - Acervo</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="main.php">Principal</a></li>
          <li class="breadcrumb-item active">Listagem de Livros</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Relação de Livros - Acervo Biblioteca SRH</h5>

                  <!-- Table with stripped rows -->
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Editora</th>
                        <th scope="col">Gênero</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Ano</th>
                        <th scope="col">Editar</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $livros = PgSql::conectar()->prepare(" SELECT * FROM sissrh.tbbiblioteca_livros ORDER BY titulo_livro ASC ");
                      $livros->execute();
                      $livros = $livros->fetchAll();
                      foreach($livros as $key => $value){
                      ?>
                      <tr>
                        <th scope="row"><?php echo $value['cod_livro']; ?></th>
                        <td><?php echo mb_strtoupper($value['titulo_livro'], 'UTF-8'); ?></td>
                        <td><?php echo mb_strtoupper($value['autor_livro'], 'UTF-8'); ?></td>
                        <td><?php echo mb_strtoupper($value['editora_livro'], 'UTF-8'); ?></td>
                        <td><?php if($value['id_genero'] == 1) { echo 'RECURSOS HÍDRICOS';} ?></td>
                        <td><?php echo mb_strtoupper($value['isbn_livro'], 'UTF-8'); ?></td>
                        <td><?php echo $value['ano_livro']; ?></td>
                        <td><a href="<?php echo INCLUDE_PATH?>biblioteca-editar-livro.php?codLivro=<?php echo $value['cod_livro']; ?>"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-pencil-square"></i> Editar</button></a>
                        </td>
                      </tr>
                      <?php } ?>
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