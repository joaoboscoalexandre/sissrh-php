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
            <a href="contrato-administrar.php">
              <i class="bi bi-circle"></i><span>Acompanhar Contratos</span>
            </a>
            
          </li>
          <li>
            <a href="contrato-cadastrar.php" class="active">
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
      <h1>Cadastro de Contratos</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Principal</a></li>
          <li class="breadcrumb-item">Cadastrar Contratos</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


  <section class="section">
    <div class="row">

      <?php if(!isset($_GET['editar'])) { ?>

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <h5 class="card-title">Formulário para Cadastro de Contratos</h5>
              
              <?php 
              if(isset($_POST['acao']) && $_POST['acao'] == "cadastrar" ){

                $query = PgSql::conectar()->prepare("SELECT * FROM sissrh.tbcontratos_cadastro WHERE nr_contrato = ? ");
                $query->execute(array($_POST['nr_contrato']));
                if($query->rowCount() > 0){
                  Painel::alert('erro','Erro! Já existe um contrato cadastrado com esse número');
                } else {

                $nrContrato = $_POST['nr_contrato'];
                $objeto = $_POST['objeto'];
                $tipoContrato = $_POST['tipo_contrato'];
                $contratante = $_POST['contratante'];
                $contratado = $_POST['contratado'];
                //$dataAss = $_POST['data_assinatura'];
                $_POST['data_assinatura'] !== null ? $dataAssinatura = date('Y-m-d', strtotime($_POST['data_assinatura'])) : null ;
                $_POST['data_inicio'] !== null ? $dataInicio = date('Y-m-d', strtotime($_POST['data_inicio'])) : null;
                $_POST['data_termino_previsto'] !== null ? $dataTerminoPrevisto = date('Y-m-d', strtotime($_POST['data_termino_previsto'])) : null;
                $_POST['data_termino_efetivo'] !== null ? $dataTerminoEfetivo = date('Y-m-d', strtotime($_POST['data_termino_efetivo'])) : null;
                $_POST['data_publicacao'] !== null ? $dataPublicacao = date('Y-m-d', strtotime($_POST['data_publicacao'])) : null;
                if($valorInicial = $_POST['valor_inicial'] !== ""){
                $valorInicial = $_POST['valor_inicial'];
                $source = array('.', ',');  
                $replace = array('', '.');  
                $valorInicial = str_replace($source, $replace, $valorInicial);
                } else {$valorInicial = 0.00;}
                if($valorPago = $_POST['valor_pago'] !== "" ){
                $valorPago = $_POST['valor_pago'];
                $source = array('.', ',');  
                $replace = array('', '.');  
                $valorPago = str_replace($source, $replace, $valorPago);
                } else {$valorPago = 0.00;}
                $situacao = $_POST['situacao'];
                $cod_contrato = $_POST['codigo_contrato'];
                $_POST['data_ordem_servico'] !== null ? $dataOrdemServico = date('Y-m-d', strtotime($_POST['data_ordem_servico'])) : null;
                $fonteRecurso = $_POST['fonte_recurso'];
                $_POST['data_aditivo'] !== null ? $dataAditivo = date('Y-m-d', strtotime($_POST['data_aditivo'])) : null;
                $nrSic = $_POST['nr_sic'];
                $cnpjContratado = $_POST['cnpj_contratado'];
                $dataCadastro = date('Y-m-d H:i:s');
                $responsavelGestor = $_POST['responsavel_gestor'];
                $urlHiperlink = $_POST['url_hiperlink'];

                $sql = PgSql::conectar()->prepare("INSERT INTO sissrh.tbcontratos_cadastro (nr_contrato, contratado, contratante, tipo_contrato, objeto, data_assinatura, data_inicio, data_termino_previsto, data_termino_efetivo, data_publicacao, valor_inicial, valor_pago, situacao, codigo_contrato, data_ordem_servico, fonte_recurso, data_aditivo, nr_sic,cnpj_contratado, data_cadastro, responsavel_gestor, url_hiperlink)
                  VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                $sql->execute(array($nrContrato, $contratado, $contratante, $tipoContrato, $objeto, $dataAssinatura, $dataInicio, $dataTerminoPrevisto, $dataTerminoEfetivo, $dataPublicacao, $valorInicial, $valorPago, $situacao, $cod_contrato, $dataOrdemServico, $fonteRecurso, $dataAditivo, $nrSic, $cnpjContratado, $dataCadastro, $responsavelGestor, $urlHiperlink));

                Painel::alert('sucesso','Contrato cadastrado com sucesso!');
              }
              } 
                
              ?>
              <!-- Floating Labels Form -->
              <form method="post" class="row g-3">

                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="nr_contrato" placeholder="Número do Contrato" required >
                    <label for="floatingName">Número do Contrato</label>
                  </div>
                </div>

                <div class="col-md-8">
                  <div class="form-floating">
                    <textarea class="form-control" name="objeto" placeholder="Objeto do Contrato" id="floatingTextarea" style="height: 100px;" required></textarea>
                    <label for="floatingTextarea">Objeto do Contrato</label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-floating">
                    <select class="form-select" id="floatingSelect" name="contratante" required>
                      <option selected disabled value="">Selecione</option>
                      <option value="SRH">SRH</option>
                      <option value="COGERH">COGERH</option>
                      <option value="SOHIDRA">SOHIDRA</option>
                      <option value="FUNCEME">FUNCEME</option>
                    </select>
                    <label for="floatingSelect">Contratante</label>
                  </div>
                </div>
                
                <div class="col-md-5">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="contratado" placeholder="Contratado" required>
                    <label for="floatingName">Contratado</label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="cnpj_contratado" placeholder="CNPJ do Contratado" required>
                    <label for="floatingName">CNPJ do Contratado</label>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-floating">
                    <select class="form-select" id="floatingSelect" name="tipo_contrato" required>
                      <option selected disabled value="">Selecione</option>
                      <option value="Acordo de Cooperação Técnica">Acordo de Cooperação Técnica</option>
                      <option value="Cooperação Técnica e Financeira">Cooperação Técnica e Financeira</option>
                      <option value="Contrato Formal">Contrato Formal</option>
                      <option value="Convênio2">Convênio</option>
                      <option value="Custeio">Custeio</option>
                      <option value="Investimento">Investimento</option>
                      <option value="Pagamento Único">Pagamento Único</option>
                    </select>
                    <label for="floatingSelect">Tipo de Contrato</label>
                  </div>
                </div>
                

                <div class="col-md-2">
                  <div class="form-floating">
                    <select class="form-select" id="floatingSelect" name="situacao" required>
                      <option selected disabled value="">Selecione</option>
                      <option value="Encerrado">Encerrado</option>
                      <option value="Vigente">Vigente</option>
                    </select>
                    <label for="floatingSelect">Situação</label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="codigo_contrato" placeholder="Código do Contrato">
                    <label for="floatingName">Código do Contrato</label>
                  </div>
                </div>
              
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="nr_sic" placeholder="Nr SIC">
                    <label for="floatingName">Nr SIC</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="fonte_recurso" placeholder="Fonte de Recurso">
                    <label for="floatingEmail">Fonte de Recurso</label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="valor_inicial" placeholder="Valor do Contrato" >
                    <label for="floatingName">Valor do Contrato - R$</label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="valor_pago" placeholder="Valor Pago" >
                    <label for="floatingName">Valor Pago - R$</label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="date" class="form-control" name="data_assinatura" >
                    <label for="floatingName">Data da Assinatura</label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="date" class="form-control" name="data_inicio" >
                    <label for="floatingName">Data início</label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="date" class="form-control" name="data_termino_previsto" >
                    <label for="floatingName">Data Término Previsto</label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="date" class="form-control" name="data_termino_efetivo" >
                    <label for="floatingName">Data Término Efetivo</label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="date" class="form-control" name="data_publicacao"  >
                    <label for="floatingName">Data da Publicação</label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="date" class="form-control" name="data_ordem_servico" >
                    <label for="floatingName">Data Ordem de Serviço</label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="date" class="form-control" name="data_aditivo" >
                    <label for="floatingName">Data do Aditivo</label>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-floating">
                  <input type="text" class="form-control" name="responsavel_gestor" placeholder="Responsável / Gestor">
                    <label for="floatingName">Responsável / Gestor</label>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="url_hiperlink" placeholder="URL Ceará Transparente" >
                    <label for="floatingName">URL Ceará Transparente</label>
                  </div>
                </div>

                <br/>           
                <div class="text-center">
                    <br/>
                  <button type="submit" name="acao" value="cadastrar" class="btn btn-primary">Cadastrar Contrato</button>
                </div>

              </form><!-- End floating Labels Form -->
            </div>
          </div>

        </div>
      <?php } else {?>

        <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
              <h5 class="card-title">Formulário para Alteração de Dados do Contrato</h5>
                
                <?php 
                if(isset($_POST['acao']) && $_POST['acao'] == "atualizar" ){

                  $codContrato = $_POST['cod_contrato'];
                  $nrContrato = $_POST['nr_contrato'];
                  $objeto = $_POST['objeto'];
                  $tipoContrato = $_POST['tipo_contrato'];
                  $contratante = $_POST['contratante'];
                  $contratado = $_POST['contratado'];
                  $_POST['data_assinatura'] == "" ? $dataAssinatura = null : $dataAssinatura = date('Y-m-d', strtotime($_POST['data_assinatura']));
                  $_POST['data_inicio'] == "" ? $dataInicio = null : $dataInicio = date('Y-m-d', strtotime($_POST['data_inicio']));
                  $_POST['data_termino_previsto'] == "" ? $dataTerminoPrevisto = null : $dataTerminoPrevisto = date('Y-m-d', strtotime($_POST['data_termino_previsto']));
                  $_POST['data_termino_efetivo'] == "" ? $dataTerminoEfetivo = null : $dataTerminoEfetivo = date('Y-m-d', strtotime($_POST['data_termino_efetivo']));
                  $_POST['data_publicacao'] == "" ? $dataPublicacao = null : $dataPublicacao = date('Y-m-d', strtotime($_POST['data_publicacao']));
                  $valorInicial = $_POST['valor_inicial'];
                  $source = array('.', ',');  
                  $replace = array('', '.');  
                  $valorInicial = str_replace($source, $replace, $valorInicial);
                  $valorPago = $_POST['valor_pago'];
                  $source = array('.', ',');  
                  $replace = array('', '.');  
                  $valorPago = str_replace($source, $replace, $valorPago);
                  $situacao = $_POST['situacao'];
                  $cod_contrato = $_POST['codigo_contrato'];
                  $_POST['data_ordem_servico'] == "" ? $dataOrdemServico = null : $dataOrdemServico = date('Y-m-d', strtotime($_POST['data_ordem_servico']));
                  $fonteRecurso = $_POST['fonte_recurso'];
                  $_POST['data_aditivo'] == "" ? $dataAditivo = null : $dataAditivo = date('Y-m-d', strtotime($_POST['data_aditivo']));
                  $nrSic = $_POST['nr_sic'];
                  $cnpjContratado = $_POST['cnpj_contratado'];
                  $dataAtualizacao = date('Y-m-d H:i:s');
                  $responsavelGestor = $_POST['responsavel_gestor'];
                  $urlHiperlink = $_POST['url_hiperlink'];

                  $sql = PgSql::conectar()->prepare(" UPDATE sissrh.tbcontratos_cadastro SET nr_contrato=?,contratado=?,contratante=?,tipo_contrato=?,objeto=?,data_assinatura=?,data_inicio=?,data_termino_previsto=?,data_termino_efetivo=?,data_publicacao=?,valor_inicial=?,Valor_pago=?,situacao=?,codigo_contrato=?,data_ordem_servico=?,fonte_recurso=?,data_aditivo=?,nr_sic=?,cnpj_contratado=?,data_atualizacao=?,responsavel_gestor=?,url_hiperlink=? WHERE cod_contrato = ? ");
                  $sql->execute(array($nrContrato,$contratado,$contratante,$tipoContrato,$objeto,$dataAssinatura,$dataInicio,$dataTerminoPrevisto,$dataTerminoEfetivo,$dataPublicacao,$valorInicial,$valorPago,$situacao,$cod_contrato,$dataOrdemServico,$fonteRecurso,$dataAditivo,$nrSic,$cnpjContratado,$dataAtualizacao,$responsavelGestor,$urlHiperlink,$codContrato));

                  Painel::alert('sucesso','Informações do Contrato atualizadas com sucesso!');

                } 
                  
                ?>

                <!-- Floating Labels Form -->
                <form method="post" class="row g-3">

                <?php
                if(isset($_GET['codContrato'])){
                  if(isset($_GET['codContrato'])){
                    $contrato = PgSql::conectar()->prepare("SELECT * FROM sissrh.tbcontratos_cadastro WHERE cod_contrato = ?");
                    $contrato->execute(array($_GET['codContrato']));
                    $contrato = $contrato->fetch();
                }
                }
                ?>
                <input type="hidden" name="cod_contrato" value="<?php echo $contrato['cod_contrato']; ?>" />
                  <div class="col-md-4">
                    <div class="form-floating">
                    <input type="text" class="form-control" name="nr_contrato" value="<?php echo $contrato['nr_contrato'] ?>" placeholder="Número do Contrato" required >
                      <label for="floatingName">Número do Contrato</label>
                    </div>
                  </div>

                  <div class="col-md-8">
                    <div class="form-floating">
                      <textarea class="form-control" name="objeto" placeholder="Objeto do Contrato" id="floatingTextarea" style="height: 100px;" required><?php echo $contrato['objeto'] ?></textarea>
                      <label for="floatingTextarea">Objeto do Contrato</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <select class="form-select" id="floatingSelect" name="contratante">
                        <option value="<?php echo $contrato['contratante'] ?>" selected ><?php echo $contrato['contratante'] ?></option>
                        <option value="SRH">SRH</option>
                        <option value="COGERH">COGERH</option>
                        <option value="SOHIDRA">SOHIDRA</option>
                        <option value="FUNCEME">FUNCEME</option>
                      </select>
                      <label for="floatingSelect">Contratante</label>
                    </div>
                  </div>
                  
                  <div class="col-md-5">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="contratado" value="<?php echo $contrato['contratado'] ?>" placeholder="Contratado" required>
                      <label for="floatingName">Contratado</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="cnpj_contratado" value="<?php echo $contrato['cnpj_contratado'] ?>" placeholder="CNPJ do Contratado" required>
                      <label for="floatingName">CNPJ do Contratado</label>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-floating">
                      <select class="form-select" id="floatingSelect" name="tipo_contrato">
                        <option value="<?php echo $contrato['tipo_contrato'] ?>" selected><?php echo $contrato['tipo_contrato'] ?></option>
                        <option value="Acordo de Cooperação Técnica">Acordo de Cooperação Técnica</option>
                        <option value="Cooperação Técnica e Financeira">Cooperação Técnica e Financeira</option>
                        <option value="Contrato Formal">Contrato Formal</option>
                        <option value="Convênio2">Convênio</option>
                        <option value="Custeio">Custeio</option>
                        <option value="Investimento">Investimento</option>
                        <option value="Pagamento Único">Pagamento Único</option>
                      </select>
                      <label for="floatingSelect">Tipo de Contrato</label>
                    </div>
                  </div>
                  

                  <div class="col-md-2">
                    <div class="form-floating">
                      <select class="form-select" id="floatingSelect" name="situacao">
                        <option value="<?php echo $contrato['situacao'] ?>" selected><?php echo $contrato['situacao'] ?></option>
                        <option value="Encerrado">Encerrado</option>
                        <option value="Vigente">Vigente</option>
                      </select>
                      <label for="floatingSelect">Situação</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="codigo_contrato" value="<?php echo $contrato['codigo_contrato'] ?>" placeholder="Código do Contrato">
                      <label for="floatingName">Código do Contrato</label>
                    </div>
                  </div>
                
                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="nr_sic" value="<?php echo $contrato['nr_sic'] ?>" placeholder="Nr SIC">
                      <label for="floatingName">Nr SIC</label>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="fonte_recurso" value="<?php echo $contrato['fonte_recurso'] ?>" placeholder="Fonte de Recurso">
                      <label for="floatingEmail">Fonte de Recurso</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="valor_inicial" value="<?php echo $contrato['valor_inicial'] ?>" placeholder="Valor do Contrato" >
                      <label for="floatingName">Valor do Contrato - R$</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="valor_pago" value="<?php echo $contrato['valor_pago'] ?>" placeholder="Valor Pago" >
                      <label for="floatingName">Valor Pago - R$</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="date" class="form-control" name="data_assinatura" value="<?php echo $contrato['data_assinatura'] ?>">
                      <label for="floatingName">Data da Assinatura</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="date" class="form-control" name="data_inicio" value="<?php echo $contrato['data_inicio'] ?>">
                      <label for="floatingName">Data início</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="date" class="form-control" name="data_termino_previsto" value="<?php echo $contrato['data_termino_previsto'] ?>">
                      <label for="floatingName">Data Término Previsto</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="date" class="form-control" name="data_termino_efetivo" value="<?php echo $contrato['data_termino_efetivo'] ?>" >
                      <label for="floatingName">Data Término Efetivo</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="date" class="form-control" name="data_publicacao" value="<?php echo $contrato['data_publicacao'] ?>" >
                      <label for="floatingName">Data da Publicação</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="date" class="form-control" name="data_ordem_servico" value="<?php echo $contrato['data_ordem_servico'] ?>">
                      <label for="floatingName">Data Ordem de Serviço</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="date" class="form-control" name="data_aditivo" value="<?php echo $contrato['data_aditivo'] ?>">
                      <label for="floatingName">Data do Aditivo</label>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-floating">
                    <input type="text" class="form-control" name="responsavel_gestor" value="<?php echo $contrato['responsavel_gestor'] ?>" placeholder="Responsável / Gestor">
                      <label for="floatingName">Responsável / Gestor</label>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="url_hiperlink" value="<?php echo $contrato['url_hiperlink'] ?>" placeholder="URL Ceará Transparente" >
                      <label for="floatingName">URL Ceará Transparente</label>
                    </div>
                  </div>

                  <br/>           
                  <div class="text-center">
                      <br/>
                    <button type="submit" name="acao" value="atualizar" class="btn btn-primary">Atualizar Dados do Contrato</button>
                  </div>

                </form><!-- End floating Labels Form -->
              </div>
            </div>

            </div>
        
      <?php } ?>
      
    </div>
  </section>

    <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Lista de Contratos Vigentes - SRH</h5>
                <!-- Table with stripped rows -->
              <!-- Table with stripped rows -->
              <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">Nº Contrato</th>
                      <th scope="col">Contratado</th>
                      <th scope="col"><center>Objeto do Contrato</center></th>
                      <th scope="col"><center>Ações</center></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      $contratos = PgSql::conectar()->prepare("SELECT * FROM sissrh.tbcontratos_cadastro WHERE situacao = 'Vigente' ORDER BY data_termino_previsto ASC");
                      $contratos->execute();
                      $contratos = $contratos->fetchAll();
                      foreach($contratos as $key => $value){
                    ?>
                    <tr>
                      <td><?php echo $value['nr_contrato']; ?></td>
                      <td><?php echo $value['contratado']; ?></td>
                      <td><?php echo $value['objeto']; ?></td>
                      <td><center><a href="<?php echo INCLUDE_PATH ?>contrato-cadastrar.php?editar=true&codContrato=<?php echo $value['cod_contrato']; ?>"><i class="bi bi-pencil-square"></i></a>
                    </tr>
                    <?php
                      }
                      ?>
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
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