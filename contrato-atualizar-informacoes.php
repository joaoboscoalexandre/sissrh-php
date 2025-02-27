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

      <?php if($sistema02 == true || $superAdmin == true){ ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-barragem" data-bs-toggle="collapse" href="#">
          <i class="bi bi-water"></i><span>Cadastro Barragens</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-barragem" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
      <h1>Acompanhamento de Contratos</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Principal</a></li>
          <li class="breadcrumb-item">Atualizar Informações de Acompanhamento de Contratos</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


  <section class="section">
      <div class="row">

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <h5 class="card-title">Informações do Contrato</h5>
            <hr>
              <!-- Floating Labels Form -->

                <?php
                    if(isset($_GET['codContrato'])){
                        $contrato = PgSql::conectar()->prepare("SELECT * FROM sissrh.tbcontratos_cadastro WHERE cod_contrato = ?");
                        $contrato->execute(array($_GET['codContrato']));
                        $contrato = $contrato->fetch();
                    }
                ?>

                <!-- Small tables -->
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">Nr do Contrato</th>
                      <th scope="col">Objeto do Contrato</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row"><?php echo $contrato['nr_contrato'] ?></th>
                      <td><?php echo $contrato['objeto'] ?></td>
                    </tr>
                  </tbody>
                </table>

                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">Contratante</th>
                      <th scope="col">Contratado</th>
                      <th scope="col">CPF/CNPJ</th>
                      <th scope="col">Tipo de Contrato</th>
                      <th scope="col">Situação</th>
                      <th scope="col">Cód. Contrato</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $contrato['contratante'] ?></td>
                      <td><?php echo $contrato['contratado'] ?></td>
                      <td><?php echo $contrato['cnpj_contratado'] ?></td>
                      <td><?php echo $contrato['tipo_contrato'] ?></td>
                      <td><?php echo $contrato['situacao'] ?></td>
                      <td><?php echo $contrato['codigo_contrato'] ?></td>
                    </tr>
                  </tbody>
                </table>

                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">Nr SIC</th>
                      <th scope="col">Fonte de Recurso</th>
                      <th scope="col"><center>Valor Contrato</th>
                      <th scope="col"><center>Valor Pago</th>
                      <th scope="col"><center>Assinatura</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $contrato['nr_sic'] ?></td>
                      <td><?php echo $contrato['fonte_recurso'] ?></td>
                      <td><center><?php echo 'R$ '.number_format($contrato['valor_inicial'],2,",","."); ?></center></td>
                      <td><center><?php echo 'R$ '.number_format($contrato['valor_pago'],2,",","."); ?></center></td>
                      <td><center><?php echo date('d/m/Y', strtotime($contrato['data_assinatura'])); ?></center></td>
                    </tr>
                  </tbody>
                </table>

                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col"><center>Início</center></th>
                      <th scope="col"><center>Término Previsto</center></th>
                      <th scope="col"><center>Publicação</center></th>
                      <th scope="col"><center>Ordem Serviço</center></th>
                      <th scope="col"><center>Responsável/Gestor</center></th>
                      <th scope="col"><center>Url Ceará Transparente</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><center><?php echo date('d/m/Y', strtotime($contrato['data_inicio'])); ?></center></td>
                      <td><center><?php echo date('d/m/Y', strtotime($contrato['data_termino_previsto'])); ?></center></td>
                      <td><center><?php echo date('d/m/Y', strtotime($contrato['data_publicacao'])); ?></center></td>
                      <td><center><?php echo date('d/m/Y', strtotime($contrato['data_ordem_servico'])); ?></center></td>
                      <td><center><?php echo $contrato['responsavel_gestor']; ?></center></td>
                      <td><center><?php echo $contrato['url_hiperlink']; ?></center></td>
                    </tr>
                  </tbody>
                </table>

                <!-- End small tables -->
                <br/>
                
                <div class="alert alert-primary alert-dismissible fade show" ><center><strong>HISTÓRICO DE ACOMPANHAMENTO DO CONTRATO</strong></center></div>
                
                  <nav class="d-flex justify-content-end">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item active">
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ExtralargeModal">Nova Atualização</button>
                      </li>
                    </ol>
                  </nav>

                  <?php
                      if(isset($_POST['acao']) && $_POST['acao'] == 'cadastrar'){

                        $codigoContrato = $contrato['cod_contrato'];
                        $analiseComissao = $_POST['analise_comissao'];
                        $providencias = $_POST['providencias'];
                        $dataAtualizacao = date('Y-m-d H:i:s');
                        $observacao = $_POST['observacao'];
                        $resposavel = $_SESSION['login'];

                        $sql = PgSql::conectar()->prepare("INSERT INTO sissrh.tbcontatos_acompanhamento(cod_contrato,analise_comissao,providencias,data_atualizacao,observacao,responsavel)
                          VALUES (?,?,?,?,?,?);");
                        $sql->execute(array($codigoContrato,$analiseComissao,$providencias,$dataAtualizacao,$observacao,$resposavel));
                        Painel::alert('sucesso','Atualizações de acompanhamento de contrato cadastradas com sucesso!');
                      } 
                      if(isset($_POST['acao']) && $_POST['acao'] == 'alterar'){
                        $codAcompanhamento = $_POST['cod_acompanhamento'];
                        $analise = $_POST['analise_comissao'];
                        $providencias = $_POST['providencias'];
                        $observacao = $_POST['observacao'];
                        $dataAtualizacao = date('Y-m-d H:i:s');
                        $resposavel = $_SESSION['login'];
                        
                        $sql = PgSql::conectar()->prepare("UPDATE sissrh.tbcontatos_acompanhamento SET analise_comissao = ?, providencias = ?, observacao = ?, data_atualizacao = ?, responsavel = ? WHERE cod_acompanhamento = ? ");
                        $sql->execute(array($analise,$providencias,$observacao,$dataAtualizacao,$resposavel,$codAcompanhamento));
                        Painel::alert('sucesso','Alterações realizadas com sucesso!');
                        
                      }

                    ?>

              <!-- Large Modal -->
              <div class="modal fade" id="ExtralargeModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="card-title">Formulário para atualizar informações de acompanhamento do Contrato</h5>

                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                      <!-- Multi Columns Form -->
                      <form class="row g-3" method="post" >
                          <div class="col-md-12">
                            <label for="analise" class="col-sm-3 col-form-label">Análise da Comissão</label>
                                <textarea class="form-control" name="analise_comissao" style="height: 100px"></textarea>
                          </div>
                          <div class="col-md-12">
                            <label for="providencias" class="col-sm-3 col-form-label">Providências</label>
                                <textarea class="form-control" name="providencias" style="height: 100px"></textarea>
                          </div>
                          <div class="col-md-8">
                            <label for="observacao" class="col-sm-3 col-form-label">Observação</label>
                                <textarea class="form-control" name="observacao" style="height: 100px"></textarea>
                          </div>
                          <div class="col-md-4">
                              <label for="dataAtualizacao" class="form-label">Data da Atualização</label>
                              <input type="text" class="form-control" name="data_atualizacao" value="<?php echo date('d/m/Y');?>" disabled >
                          </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                      <button type="submit" name="acao" value="cadastrar" class="btn btn-primary">Salvar Atualização</button>
                    </div>
                    </form><!-- End Multi Columns Form -->
                  </div>
                </div>
              </div>
              <!-- End Large Modal-->
              
              <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Análise da Comissão</th>
                      <th scope="col">Providências</th>
                      <th scope="col">Observação</th>
                      <th scope="col"><center>Dt. Atualização</center></th>
                      <th scope="col"><center>Atualizado Por:</center></th>
                      <th scope="col"><center>Ações:</center></th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        $dados = PgSql::conectar()->prepare("SELECT * FROM sissrh.tbcontatos_acompanhamento WHERE cod_contrato = ? ORDER BY cod_acompanhamento DESC");
                        $dados->execute(array($_GET['codContrato']));
                        $dados = $dados->fetchAll();
                        foreach ($dados as $key => $value) {
                      ?>
                    <tr>
                      <td><?php echo $value['analise_comissao']; ?></td>
                      <td><?php echo $value['providencias'] ?></td>
                      <td><?php echo $value['observacao'] ?></td>
                      <td><center><?php echo date('d/m/Y - H:i:s', strtotime($value['data_atualizacao'])); ?></center></td>
                      <td><center><?php echo $value['responsavel'] ?></center></td>
                      <td><center><a href="#" data-bs-toggle="modal" data-bs-target="#editarContrato<?php echo $value['cod_acompanhamento']; ?>"><i class="bi bi-pencil-square"></i></a>
                      <a href="#" onclick="parent.location.href ='<?php echo INCLUDE_PATH; ?>relatorios/historico-contrato-pdf.php?codContrato=<?php echo $_GET['codContrato']; ?>'" ><i class="bi bi-file-earmark-pdf"></i></a></center>
                      </td>
                    </tr>

                    <!-- Large Modal -->
                      <div class="modal fade" id="editarContrato<?php echo $value['cod_acompanhamento']; ?>" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="card-title">Formulário para editar informações de acompanhamento do Contrato</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                              <!-- Multi Columns Form -->
                              <form class="row g-3" method="post" >
                                  <input type="hidden" name="cod_acompanhamento" value="<?php echo $value['cod_acompanhamento']; ?>">
                                  <div class="col-md-12">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Análise da Comissão</label>
                                        <textarea class="form-control" name="analise_comissao" style="height: 100px"><?php echo $value['analise_comissao']; ?></textarea>
                                  </div>
                                  <div class="col-md-12">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Providências</label>
                                        <textarea class="form-control" name="providencias" style="height: 100px"><?php echo $value['providencias']; ?></textarea>
                                  </div>
                                  <div class="col-md-8">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Observação</label>
                                        <textarea class="form-control" name="observacao" style="height: 100px"><?php echo $value['observacao']; ?></textarea>
                                  </div>
                                  <div class="col-md-4">
                                      <label for="inputZip" class="form-label">Data da Atualização</label>
                                      <input type="text" class="form-control" name="data_atualizacao" value="<?php echo date('d/m/Y');?>" disabled >
                                  </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                              <button type="submit" name="acao" value="alterar" class="btn btn-primary">Salvar Alterações</button>
                            </div>
                            </form><!-- End Multi Columns Form -->
                          </div>
                        </div>
                      </div>
                      <!-- End Large Modal-->
                      
                    <?php } ?>
                  </tbody>
                </table>

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