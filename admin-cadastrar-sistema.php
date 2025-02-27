<?php

include('config.php');

if (isset($_GET['loggout']) || $_SESSION['cpf'] == '' || $_SESSION['login'] == 1) {
  Painel::loggout();
}

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

      <?php if ($superAdmin == true) { ?>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-gear-wide-connected"></i><span>Sistemas</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
            <li>
              <a href="admin-cadastrar-sistema.php" class="active">
                <i class="bi bi-circle"></i><span>Cadastrar Sistema</span>
              </a>
            </li>
          </ul>
        </li><!-- End Tables Nav -->
      <?php } ?>

      <?php if ($sistema03 == true || $superAdmin == true) { ?>
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

      <?php if ($sistema01 == true || $superAdmin == true) { ?>
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

      <?php if ($sistema02 == true || $superAdmin == true) { ?>
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

      <?php if ($sistema04 == true || $superAdmin == true) { ?>
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

      <br />
      <hr>
      <br />
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
        <div class="col-lg-7">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Formulário Para Cadastro de Sistemas</h5>
              <?php

              if (isset($_POST['acao']) && $_POST['acao'] == 'Cadastrar') {
                $nomeSistema = $_POST['nome_sistema'];
                $siglaSistema = $_POST['sigla_sistema'];
                $urlAcesso = $_POST['url_acesso'];
                $tipoLinguagem = $_POST['tipo_linguagem'];
                $nomeDesenvolvedor = $_POST['nome_desenvolvedor'];
                $statusSistema = $_POST['status_sistema'];
                $dataCadastro = date('Y-m-d');
                $flAtivo = $_POST['fl_ativo'];
                $iconeSistema = $_POST['icone_sistema'];

                //$sql = PgSql::conectar()->prepare("INSERT INTO sissrh.tbadmin_sistemas (nome_sistema, sigla_sistema, url_acesso, tipo_linguagem, nome_desenvolvedor, status_sistema, data_cadastro, icone_sistema) VALUES (?,?,?,?,?,?,?,?) ");
                //$sql->execute(array($nomeSistema, $siglaSistema, $urlAcesso, $tipoLinguagem, $nomeDesenvolvedor, $statusSistema, $dataCadastro,$flAtivo,$iconeSistema));
                $sql = PgSql::conectar()->prepare("INSERT INTO sissrh.tbadmin_sistemas (nome_sistema, sigla_sistema, url_acesso, tipo_linguagem, nome_desenvolvedor, status_sistema, data_cadastro, icone_sistema) VALUES (?,?,?,?,?,?,?,?) ");
                $sql->execute(array($nomeSistema, $siglaSistema, $urlAcesso, $tipoLinguagem, $nomeDesenvolvedor, $statusSistema, $dataCadastro, $iconeSistema));
                Painel::alert('sucesso', 'Sistema cadastrado com sucesso!');
              }

              if (isset($_POST['acao']) && $_POST['acao'] == "editar") {
                $codSistema = $_POST['cod_sistema'];
                $nomeSistema = $_POST['nome_sistema'];
                $siglaSistema = $_POST['sigla_sistema'];
                $urlAcesso = $_POST['url_acesso'];
                $tipoLinguagem = $_POST['tipo_linguagem'];
                $nomeDesenvolvedor = $_POST['nome_desenvolvedor'];
                $statusSistema = $_POST['status_sistema'];
                $flAtivo = $_POST['fl_ativo'];  // "Ativo" ou "Inativo" enviado como 1 ou 0
                $dataCadastro = date('Y-m-d');
                $iconeSistema = $_POST['icone_sistema'];

                // Verifica se os valores de status e fl_ativo não estão vazios e converte para 1 ou 0
                $statusSistema = ($statusSistema == 'Em Produção' || $statusSistema == 'Em Desenvolvimento' || $statusSistema == 'Em Fase de Teste') ? $statusSistema : null;
                $flAtivo = ($flAtivo == 'true') ? 1 : 0;  // Convertendo para 1 ou 0

                // Prepare a consulta SQL para atualização
                $sql = PgSql::conectar()->prepare("UPDATE sissrh.tbadmin_sistemas SET nome_sistema=?, sigla_sistema=?, url_acesso=?, tipo_linguagem=?, nome_desenvolvedor=?, status_sistema=?, data_cadastro=?, fl_ativo=?, icone_sistema=? WHERE cod_sistema=?");
                $sql->execute(array($nomeSistema, $siglaSistema, $urlAcesso, $tipoLinguagem, $nomeDesenvolvedor, $statusSistema, $dataCadastro, $flAtivo, $iconeSistema, $codSistema));
                Painel::alert('sucesso', 'Sistema editado com sucesso!');
              }

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
                  <select name="tipo_linguagem" class="form-select" required>
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
                    <option>AMANDA FARIAS</option>
                    <option>JOÃO BOSCO</option>
                    <option>AMANDA FARIAS - JOÃO BOSCO</option>
                  </select>
                </div>

                <div class="col-md-3">
                  <label for="inputState" class="form-label">Situação</label>
                  <select class="form-select" name="nome_desenvolvedor" required>
                    <option selected disabled value="">Escolha...</option>
                    <option value="Em Produção">Em Produção</option>
                    <option value="Em Desenvolvimento">Em Desenvolvimento</option>
                    <option value="Em Fase de Teste">Em Fase de Teste</option>
                  </select>
                </div>

                <div class="col-md-3">
                  <label for="inputState" class="form-label">Status</label>
                  <select class="form-select" name="nome_desenvolvedor" required>
                    <option selected disabled value="">Escolha...</option>
                    <option value="Ativo">Ativo</option>
                    <option value="Inativo">Inativo</option>
                  </select>
                </div>

                <div class="col-md-2">
                  <label for="inputZip" class="form-label">Data Cadastro</label>
                  <input type="text" class="form-control" name="dataCadastro" value="<?php echo date('d/m/Y'); ?>" disabled>
                </div><br />

                  <center>
                    <button type="submit" name="acao" value="editar" class="btn btn-primary">Salvar Alterações</button>
                  </center>

                
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

        </div>

        <div class="col-lg-5">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Lista de Sistema - SRH</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome do Sistema</th>
                    <th scope="col">Sigla</th>
                    <th scope="col">Ativo</th>
                    <th scope="col">Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = PgSql::conectar()->prepare(" SELECT * FROM sissrh.tbadmin_sistemas ORDER BY cod_sistema ASC ");
                  $sql->execute();
                  $sistemas = $sql->fetchAll();
                  foreach ($sistemas as $key => $value) {
                  ?>
                    <tr>
                      <th scope="row"><?php echo $value['cod_sistema']; ?></th>
                      <td><?php echo $value['nome_sistema']; ?></td>
                      <td><?php echo $value['sigla_sistema'] ?></td>
                      <td>
                        <center><?php echo $value['fl_ativo'] == 1 ? '<i class="ri-thumb-up-line"></i></button>' : '<i class="ri-thumb-down-line"></i>'; ?></center>
                      </td>
                      <td>
                        <center><a href="#" data-bs-toggle="modal" data-bs-target="#sistemaModal<?php echo $value['cod_sistema']; ?>"><i class="bi bi-pencil"></i></a></center>
                      </td>
                    </tr>

                    <!-- Modal de Edição -->
                    <div class="modal fade" id="sistemaModal<?php echo $value['cod_sistema']; ?>" tabindex="-1">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="card-title">Formulário para edição de dados do Sistema </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form method="post">
                              <input type="hidden" name="cod_sistema" value="<?php echo $value['cod_sistema']; ?>">
                              <div class="row g-3">

                                <!-- Nome do Sistema -->
                                <div class="col-md-5">
                                  <label for="nome_sistema" class="form-label">Nome do Sistema</label>
                                  <input type="text" class="form-control" name="nome_sistema" value="<?php echo $value['nome_sistema']; ?>" required>
                                </div>

                                <!-- Sigla do Sistema -->
                                <div class="col-md-3">
                                  <label for="sigla_sistema" class="form-label">Sigla Sistema</label>
                                  <input type="text" class="form-control" name="sigla_sistema" value="<?php echo $value['sigla_sistema']; ?>" required>
                                </div>

                                <!-- Url Sistema -->
                                <div class="col-md-4">
                                  <label for="url-sistema" class="form-label">URL do Sistema</label>
                                  <input type="text" class="form-control" name="url_acesso" value="<?php echo $value['url_acesso']; ?>" required>
                                </div>

                                <!-- Ícone -->
                                <div class="col-md-5">
                                  <label for="sistema" class="form-label">Ícone do Sistema</label>
                                  <input type="text" class="form-control" name="icone_sistema" value="<?php echo $value['icone_sistema']; ?>" required>
                                </div>

                                <!-- URL de Acesso -->
                                <div class="col-md-4">
                                  <label for="url_acesso" class="form-label">URL de Acesso</label>
                                  <input type="text" class="form-control" name="url_acesso" value="<?php echo $value['url_acesso']; ?>" required>
                                </div>

                                <!-- Linguagem -->
                                <div class="col-md-4">
                                  <label for="tipo_linguagem" class="form-label">Linguagem</label>
                                  <select name="tipo_linguagem" class="form-select" required>
                                    <option value="BOOTSTRAP - JAVAWEB" <?php echo $value['tipo_linguagem'] == 'BOOTSTRAP - JAVAWEB' ? 'selected' : ''; ?>>BOOTSTRAP - JAVAWEB</option>
                                    <option value="BOOTSTRAP - PHP - JAVA SCRIPT" <?php echo $value['tipo_linguagem'] == 'BOOTSTRAP - PHP - JAVA SCRIPT' ? 'selected' : ''; ?>>BOOTSTRAP - PHP - JAVA SCRIPT</option>
                                    <option value="HTML - CSS - JAVA SCRIPT" <?php echo $value['tipo_linguagem'] == 'HTML - CSS - JAVA SCRIPT' ? 'selected' : ''; ?>>HTML - CSS - JAVA SCRIPT</option>
                                  </select>
                                </div>

                                <!-- Desenvolvedor -->
                                <div class="col-md-3">
                                  <label for="desenvolvedor" class="form-label">Desenvolvedor</label>
                                  <select class="form-select" name="nome_desenvolvedor" required>
                                    <option value="<?php echo $value['nome_desenvolvedor']; ?>"><?php echo $value['nome_desenvolvedor']; ?></option>
                                    <option value="AMANDA FARIAS">AMANDA FARIAS</option>
                                    <option value="JOÃO BOSCO">JOÃO BOSCO</option>
                                  </select>
                                </div>

                                <!-- Situação -->
                                <div class="col-md-3">
                                  <label for="situacao" class="form-label">Situação</label>
                                  <select class="form-select" name="status_sistema" required>
                                    <option selected disabled value="">Escolha...</option>
                                    <option value="Em Produção" <?php echo $value['status_sistema'] == "Em Produção" ? 'selected' : ''; ?>>Em Produção</option>
                                    <option value="Em Desenvolvimento" <?php echo $value['status_sistema'] == "Em Desenvolvimento" ? 'selected' : ''; ?>>Em Desenvolvimento</option>
                                    <option value="Em Fase de Teste" <?php echo $value['status_sistema'] == "Em Fase de Teste" ? 'selected' : ''; ?>>Em Fase de Teste</option>
                                  </select>
                                </div>

                                <!-- Status -->
                                <div class="col-md-2">
                                  <label for="status" class="form-label">Status</label>
                                  <select class="form-select" name="fl_ativo" required>
                                    <option selected disabled value="">Escolha...</option>
                                    <option value="true" <?php echo $value['fl_ativo'] == 1 ? 'selected' : ''; ?>>Ativo</option>
                                    <option value="false" <?php echo $value['fl_ativo'] == 0 ? 'selected' : ''; ?>>Inativo</option>
                                  </select>
                                </div>

                                <!-- Botão de Edição -->
                                <div class="modal-footer">
                                  <center>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" name="acao" value="editar" class="btn btn-primary">Salvar Alterações</button>
                                </div>
                                </center>
                              </div>
                            </form>

                          </div>
                        </div>
                      </div>
                      <!-- Fim Modal -->
                    </div>
            </div>
          </div>
        <?php
                  }
        ?>
        </tbody>
        </table>
        </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include('footer.php'); ?>

</body>

</html>