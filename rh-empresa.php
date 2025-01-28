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

      <?php if ($sistema03 == true || $superAdmin == true) { ?>
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

      <?php if ($sistema04 == true || $superAdmin == true) { ?>
        <li class="nav-item">
          <a class="nav-link " data-bs-target="#tables-rh" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person-bounding-box"></i><span>Recursos Humanos</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="tables-rh" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
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
              <a href="rh-empresa.php" class="active">
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
      <h1>Cadastro de Empresas</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Principal</a></li>
          <li class="breadcrumb-item active">Cadastro de empresas</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <!-- Formulário de Cadastro -->
        <div class="col-lg-7">
          <div class="card">
            <div class="card-body">
              
              <h5 class="card-title">Formulário para Cadastro de Empresa</h5>
              <form method="post" class="row g-3">
              <?php
              if (isset($_POST['acao']) && $_POST['acao'] == "cadastrar") {
                $nomeEmpresa = $_POST['nome_empresa'];
                $siglaEmpresa = $_POST['sigla_empresa'];
                $situacao = $_POST['situacao'];

                $sql = PgSql::conectar()->prepare("INSERT INTO sissrh.tbrh_empresa (nome_empresa, sigla_empresa, situacao) VALUES (?,?,?)");
                $sql->execute(array($nomeEmpresa, $siglaEmpresa, $situacao));
                Painel::alert('sucesso', 'Empresa cadastrada com sucesso!');
              }

              if (isset($_POST['acao']) && $_POST['acao'] == "editar") {
                $nomeEmpresa = $_POST['nome_empresa'];
                $siglaEmpresa = $_POST['sigla_empresa'];
                $situacao = $_POST['situacao'];
                $codEmpresa = $_POST['cod_empresa'];

                $sql = PgSql::conectar()->prepare("UPDATE sissrh.tbrh_empresa SET nome_empresa=?, sigla_empresa=?, situacao=? WHERE cod_empresa=?");
                $sql->execute(array($nomeEmpresa, $siglaEmpresa, $situacao, $codEmpresa));
                Painel::alert('sucesso', 'Empresa editada com sucesso!');
              }
              ?>
                <div class="col-md-6">
                  <label for="empresa" class="form-label">Nome da Empresa</label>
                  <input type="text" name="nome_empresa" class="form-control" required>
                </div>

                <div class="col-md-3">
                  <label for="sigla" class="form-label">Sigla Empresa</label>
                  <input type="text" name="sigla_empresa" class="form-control" required>
                </div>

                <div class="col-md-3">
                  <label for="Situacao" class="form-label">Situação</label>
                  <select name="situacao" class="form-select" required>
                    <option selected disabled value="">Selecione</option>
                    <option value="true">Ativo</option>
                    <option value="false">Inativo</option>
                  </select>
                </div>

                <div class="text-center">
                  <button type="submit" name="acao" value="cadastrar" class="btn btn-primary">Cadastrar Empresa</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Lista de Empresas -->
        <div class="col-lg-5">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Lista de Empresas</h5>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Sigla</th>
                    <th scope="col"><center>Situação</center></th>
                    <th scope="col"><center>Ações</center></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $empresas = PgSql::conectar()->prepare("SELECT * FROM sissrh.tbrh_empresa ORDER BY cod_empresa");
                  $empresas->execute();
                  $empresas = $empresas->fetchAll();
                  foreach ($empresas as $value) {
                  ?>
                    <tr>
                      <td><?php echo $value['sigla_empresa']; ?></td>
                      <td>
                        <center><?php echo $value['situacao'] == 1 ? 'Ativo' : 'Inativo'; ?></center>
                      </td>
                      <td><center><a href="#" data-bs-toggle="modal" data-bs-target="#editarEmpresa<?php echo $value['cod_empresa']; ?>"><i class="bi bi-pencil-square"></i></a></center>
                      </td>
                    </tr>

                    <!-- Modal de Edição -->
                    <div class="modal fade" id="editarEmpresa<?php echo $value['cod_empresa']; ?>" tabindex="-1">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                          <h5 class="card-title">Formulário para atualização de dados da Empresa </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form method="post">
                              <input type="hidden" name="cod_empresa" value="<?php echo $value['cod_empresa']; ?>">

                              <div class="row g-3">
                                <!-- Nome da Empresa -->
                                <div class="col-md-6">
                                  <label for="nome_empresa" class="form-label">Nome da Empresa</label>
                                  <input type="text" name="nome_empresa" class="form-control" value="<?php echo $value['nome_empresa']; ?>" required>
                                </div>

                                <!-- Sigla Empresa -->
                                <div class="col-md-3">
                                  <label for="sigla_empresa" class="form-label">Sigla Empresa</label>
                                  <input type="text" name="sigla_empresa" class="form-control" value="<?php echo $value['sigla_empresa']; ?>" required>
                                </div>

                                <!-- Situação -->
                                <div class="col-md-3">
                                  <label for="situacao" class="form-label">Situação</label>
                                  <select name="situacao" class="form-select" required>
                                    <option value="true" <?php echo $value['situacao'] == 1 ? 'selected' : ''; ?>>Ativo</option>
                                    <option value="false" <?php echo $value['situacao'] == 0 ? 'selected' : ''; ?>>Inativo</option>
                                  </select>
                                </div>
                              </div>
                          </div>
                          <div class="modal-footer"><center>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" name="acao" value="editar" class="btn btn-primary">Salvar Alterações</button>
                          </div></center>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- Fim Modal -->
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

  </tbody>
  </table>
  </div>
  </div>
  </div>
  </div>
  </section>

  </main>

  <!-- ======= Footer ======= -->
  <?php include('footer.php'); ?>

</body>

</html>