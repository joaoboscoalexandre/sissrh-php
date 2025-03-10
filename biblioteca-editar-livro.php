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
            <a href="biblioteca-cadastrar-livro.php" class="active">
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

      
      <?php if($sistema06 == true || $superAdmin == true){ ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-SiSMat" data-bs-toggle="collapse" href="#">
          <i class="bi bi-basket2"></i><span>Solicitação de Material</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-SiSMat" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
          <li class="breadcrumb-item"><a href="index.php">Principal</a></li>
          <li class="breadcrumb-item active">Edição de Livros</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-9">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Formulário Para Edição de Livros</h5>

              <?php

                if(isset($_GET['codLivro'])){
                  $idLivro = $_GET['codLivro'];
                  $sql = PgSql::conectar()->prepare(" SELECT * FROM sissrh.tbbiblioteca_livros WHERE cod_livro = ? ");
                  $sql->execute(array($idLivro));
                  $livro = $sql->fetch();
                } else {
                  Painel::alert('erro','Você precisa selecionar um livro para editar!');
                }

              if(isset($_POST['acao']) && $_POST['acao'] == 'atualizar'){
                $codLivro = $_POST['cod_livro'];
                $titulo = $_POST['titulo_livro'];
                $autor = $_POST['autor_livro'];
                $editora = $_POST['editora_livro'];
                $idGenero = $_POST['id_genero'];
                $isbn = $_POST['isbn_livro'];
                $anoLivro = $_POST['ano_livro'];
                $dataCadastroLivro = date('Y-m-d');

                $sql = PgSql::conectar()->prepare(" UPDATE sissrh.tbbiblioteca_livros SET titulo_livro=?, autor_livro=?, editora_livro=?, id_genero=?, isbn_livro=?, ano_livro=? WHERE cod_livro=? ");
                $sql->execute(array($titulo,$autor,$editora,$idGenero,$isbn,$anoLivro,$codLivro));
              //$sql = PgSql::conectar()->prepare(" UPDATE sissrh.tbbiblioteca_livros SET titulo_livro = ?, autor_livro = ?, editora_livro = ?, id_genero = ?, isbn_livro = ?, ano_livro = ? data_cadastro = ? WHERE cod_livro = ? ");
              //$sql->execute(array($titulo,$autor,$editora,$idGenero,$isbn,$anoLivro,$dataCadastroLivro,$codLivro));
                Painel::alert('sucesso','As informações do Livro foram atualizadas com sucesso!');
                
                $idLivro = $_GET['codLivro'];
                $sql = PgSql::conectar()->prepare(" SELECT * FROM sissrh.tbbiblioteca_livros WHERE cod_livro = ? ");
                $sql->execute(array($codLivro));
                $livro = $sql->fetch();
                } 
                  
              ?>
              <form method="post" class="row g-3">
                <input type="hidden" name="cod_livro" value="<?php echo $idLivro; ?> ">
                <div class="col-md-12">
                  <label for="titulo" class="form-label">Título do Livro</label>
                  <input type="text" name="titulo_livro" class="form-control" value="<?php echo $livro['titulo_livro']; ?>" required >
                </div> 
                <div class="col-md-6">
                  <label for="autor" class="form-label">Autor</label>
                  <input type="text" name="autor_livro" class="form-control" value="<?php echo $livro['autor_livro']; ?>" required >
                </div>
                <div class="col-md-6">
                  <label for="editora" class="form-label">Editora</label>
                  <input type="text" name="editora_livro" class="form-control" value="<?php echo $livro['editora_livro']; ?>" required >
                </div>
                <div class="col-md-5">
                  <label for="genero" class="form-label">Gênero</label>
                  <select name="id_genero" class="form-select" required>
                    <option value="1">RECURSOS HÍDRICOS</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <label for="isbn" class="form-label">ISBN</label>
                  <input type="text" name="isbn_livro" class="form-control" value="<?php echo $livro['isbn_livro']; ?>" >
                </div>
                <div class="col-md-2">
                  <label for="ano" class="form-label">Ano</label>
                  <input type="text" name="ano_livro" maxlength="4" class="form-control" value="<?php echo $livro['ano_livro']; ?>" >
                </div>
                <div class="col-md-2">
                  <label for="dataCadastro" class="form-label">Data Cadastro</label>
                  <input type="text" name="data_cadastro" disabled class="form-control" value="<?php echo date('d/m/Y'); ?>">
                </div>
                <div class="text-center">
                  <button type="submit" name="acao" value="atualizar" class="btn btn-primary">Atualizar Livro</button>
                </div>
              </form><!-- End Multi Columns Form -->
           
            </div>
          </div>

        </div>

        <div class="col-lg-3">
          <?php

            $query = PgSql::conectar()->prepare("SELECT COUNT(cod_livro) as qtd FROM sissrh.tbbiblioteca_livros");
            $query->execute();
            $total = $query->fetch();
          ?>

          <div class="card">
          <div class="card-body">
              <h5 class="card-title">Livros <span>| Cadastrados</span></h5>
              <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                  </div>
                  <div class="ps-3">
                      <h6><?php echo $total['qtd']; ?></h6>
                  </div>
              </div>
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