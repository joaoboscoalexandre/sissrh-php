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

      <?php if($sistema03 == true || $superAdmin == true){ ?>
      <li class="nav-item">
        <a class="nav-link " data-bs-target="#tables-barragem" data-bs-toggle="collapse" href="#">
          <i class="bi bi-water"></i><span>Cadastro Barragens</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-barragem" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="barragem-administrar.php" >
              <i class="bi bi-circle"></i><span>Administrar Barragens</span>
            </a>
            
          </li>
          <li>
            <a href="barragem-cadastrar.php" class="active">
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
  <div class="card-body">
  <?php
      if (isset($_GET['codBarragem'])) {
          $codBarragem = $_GET['codBarragem'];
          $barragem = PgSql::conectar()->prepare("SELECT nome_barragem FROM sissrh.tbbarragem_cadastro WHERE cod_barragem = ?");
          $barragem->execute(array($codBarragem));
          $barragem = $barragem->fetch();
      }
  ?>
  
    <br/><br/>
    <center><img src="assets/img/Logotipo_SRH.png" alt=""></center>
    <center><h5 class="card-title">Formulário para Cadastro de Informações Adicionais da Barragem<br/>
    <?php echo $barragem['nome_barragem']; ?> </h5></center>
    <br/><br/>

    <?php

    if(isset($_POST['acao']) && $_POST['acao'] == "cadastrar"){

        
      $codBarragem = $_GET['codBarragem'];
      $assinado = $_POST['assinado'];
      $baciaHidrografica = $_POST['bacia_hidrografica'];
      $gerenciaRecional = $_POST['gerencia_regional'];
      $dataEmissao = date('Y-m-d', strtotime($_POST['data_emissao']));
      $registoSnisb = $_POST['registro_snisb'];
      $nomeSecundario = $_POST['nome_secundario_barragem'];
      $alturaFundacao = $_POST['altura_fundacao'];
      $alturaTerreno = $_POST['altura_terreno'];

      $query = PgSql::conectar()->prepare("INSERT INTO sissrh.tbbarragem_infor_adicional (cod_barragem,assinado,bacia_hidrografica,gerencia_regional,data_emissao,registro_snisb,nome_secundario_barragem,altura_fundacao,altura_terreno) 
      VALUES (?,?,?,?,?,?,?,?) ");
      $query->execute(array($codBarragem,$assinado,$baciaHidrografica,$gerenciaRecional,$dataEmissao,$registoSnisb,$nomeSecundario,$alturaFundacao));
      Painel::alert("sucesso","As informações adicionais foram cadastradas com sucesso!");

    }

      ?>

    <div class="alert alert-primary alert-dismissible fade show" >
      I. INFORMAÇÕES INICIAIS
    </div>
    <!-- Floating Labels Form -->
    <form method="post" class="row g-3">
        <!-- Selects and Inputs -->
        <div class="col-md-3">
                          <div class="form-floating">
                              <select name="bacia_hidrografica" class="form-select">
                                  <option disabled selected value="">Selecione</option>
                                  <option value="Acaraú">Acaraú</option>
                                  <option value="Baixo Jaguaribe">Baixo Jaguaribe</option>
                                  <option value="Banabuiú">Banabuiú</option>
                                  <option value="Salgado">Salgado</option>
                                  <option value="Médio Jaguaribe">Médio Jaguaribe</option>
                                  <option value="Alto Jaguaribe">Alto Jaguaribe</option>
                                  <option value="Serra da Ibiapaba">Serra da Ibiapaba</option>
                                  <option value="Sertões de Crateús">Sertões de Crateús</option>
                                  <option value="Curu">Curu</option>
                                  <option value="Litoral">Litoral</option>
                                  <option value="Coreaú">Coreaú</option>
                                  <option value="Metropolitana">Metropolitana</option>
                              </select>
                              <label>Bacia Hidrográfica:</label>
                          </div>
                      </div>

                      <div class="col-md-2">
                          <div class="form-floating mb-3">
                              <select name="assinado" class="form-select">
                                  <option disabled selected value="">Selecione</option>
                                  <option value="true">Sim</option>
                                  <option value="false">Não</option>
                              </select>
                              <label for="assinado" class="form-label">Assinado?</label>
                          </div>
                      </div>

                      <div class="col-md-3">
                          <div class="form-floating">
                              <select name="gerencia_regional" class="form-select">
                                  <option selected value="">Selecione</option>
                                  <option value="Crateús">Crateús</option>
                                  <option value="Crato">Crato</option>
                                  <option value="Curu">Curu</option>
                                  <option value="Iguatú">Iguatú</option>
                                  <option value="Limoeiro do Norte">Limoeiro do Norte</option>
                                  <option value="Fortaleza">Fortaleza</option>
                                  <option value="Pentecoste">Pentecoste</option>
                                  <option value="Quixeramobim">Quixeramobim</option>
                                  <option value="São Benedito">São Benedito</option>
                                  <option value="Sobral">Sobral</option>
                              </select>
                              <label>Gerência Regional:</label>
                          </div>
                      </div>

                      <div class="col-md-2">
                          <div class="form-floating">
                              <input type="date" name="data_emissao" class="form-control">
                              <label>Data da Emissão:</label>
                          </div>
                      </div>

                      <div class="col-md-2">
                          <div class="form-floating">
                              <input type="text" name="registro_snisb" class="form-control">
                              <label>Registro SNISB:</label>
                          </div>
                      </div>

                      <div class="col-md-3">
                          <div class="form-floating">
                              <input type="text" name="nome_secundario_barragem" class="form-control">
                              <label>Nome Secundário da Barragem:</label>
                          </div>
                      </div>


                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="text" name="altura_fundacao" class="form-control">
                                        <label>Altura Fundação:</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="text" name="alturaTerreno" class="form-control">
                                        <label>Altura Terreno:</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="text" name="capacidade" class="form-control">
                                        <label>Capacidade (m³):</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="estruturaEstrutural" class="form-control">
                                        <label>Estrutura ou Estrutural:</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <textarea name="material" class="form-control" style="height: 100px;"></textarea>
                                        <label>Material:</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="text" name="comprimento" class="form-control">
                                        <label>Comprimento:</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="text" name="registroEmpreendedor" class="form-control">
                                        <label>Registro Empreendedor:</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="date" name="dataInicioConstrucao" class="form-control">
                                        <label>Data Início Construção:</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="text" name="anoFimConstrucao" class="form-control" pattern="\d{4}" maxlength="4">
                                        <label>Ano Fim Construção:</label>
                                    </div>
                                </div>

                                <div class="alert alert-primary alert-dismissible fade show">
                                    II. OBJETIVOS
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <textarea name="usoPrincipal" class="form-control" value="" style="height: 100px;"></textarea>
                                        <label>Uso Principal:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <textarea name="usoComplementar" class="form-control" value=""></textarea>
                                        <label>Uso Complementar:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="classeResiduo" class="form-control" value="">
                                        <label>Classe Resíduo:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="cursoAgua" class="form-control" value="">
                                        <label>Curso da Água (Barrado):</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <select name="regiaoHidrografica" class="form-select">
                                            <option disabled selected value="">Selecione</option>
                                            <option value="Acaraú">Acaraú</option>
                                            <option value="Baixo Jaguaribe">Baixo Jaguaribe</option>
                                            <option value="Banabuiú">Banabuiú</option>
                                            <option value="Salgado">Salgado</option>
                                            <option value="Médio Jaguaribe">Médio Jaguaribe</option>
                                            <option value="Alto Jaguaribe">Alto Jaguaribe</option>
                                            <option value="Serra da Ibiapaba">Serra da Ibiapaba</option>
                                            <option value="Sertões de Crateús">Sertões de Crateús</option>
                                            <option value="Curu">Curu</option>
                                            <option value="Litoral">Litoral</option>
                                            <option value="Coreaú">Coreaú</option>
                                            <option value="Metropolitana">Metropolitana</option>
                                        </select>
                                        <label>Região Hidrográfica:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="unidadeGestao" class="form-control" value="">
                                        <label>Unidade Gestão Recursos Hídricos:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="latitudeGrau" class="form-control" value="">
                                        <label>Latitude de Grau:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="longitudeGrau" class="form-control" value="">
                                        <label>Longitude de Grau:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="datum" class="form-control" value="">
                                        <label>Datum:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="dominioDagua" class="form-control" value="">
                                        <label>Domínio Curso Dágua:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="date" name="dataUltimaInspecao" class="form-control" value="">
                                        <label>Data Última Inspenção:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="tipoUltimaInspecao" class="form-control" value="">
                                        <label>Tipo Última Inspeção:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="nivelPerigo" class="form-control" value="">
                                        <label>Nível Perigo Barragem:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="categoriaRisco" class="form-control" value="">
                                        <label>Categoria Risco:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="danoAssociado" class="form-control" value="">
                                        <label>Dano Potencial Associado:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="classe" class="form-control" value="">
                                        <label>Classe:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="vazaoProjetoExtravasor" class="form-control" value="">
                                        <label>Vazão Projeto Extravasor:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="criterioVazaoExtravasor" class="form-control" value="">
                                        <label>Critério Vazão Projeto Extravasor:</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="text" name="controleExtravasor" class="form-control" value="">
                                        <label>Controle Extravasor:</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="text" name="faseVida" class="form-control" value="">
                                        <label>Fase da Vida:</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="date" name="dataUltimaFiscalizacao" class="form-control" value="">
                                        <label>Data Última Fiscalização:</label>
                                    </div>
                                </div>

                                <!-- Informações Complementares-->
                                <div class="alert alert-primary alert-dismissible fade show">
                                    III. INFORMAÇÕES COMPLEMENTARES

                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select name="temPae" class="form-select">
                                            <option disabled selected value="">Selecione</option>
                                            <option value="true">Sim</option>
                                            <option value="false">Não</option>
                                        </select>
                                        <label for="temPae" class="form-label">Tem PAE?</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select name="temPlanoSeguranca" class="form-select">
                                            <option disabled selected value="">Selecione</option>
                                            <option value="true">Sim</option>
                                            <option value="false">Não</option>
                                        </select>
                                        <label for="temPlanoSeguranca" class="form-label">Tem Plano de Segurança?</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select name="temRevisaoPeriodica" class="form-select">
                                            <option disabled selected value="">Selecione</option>
                                            <option value="true">Sim</option>
                                            <option value="false">Não</option>
                                        </select>
                                        <label for="temRevisaoPeriodica" class="form-label">Tem Revisão Periódica?</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select name="temProjetoExecutivo" class="form-select">
                                            <option disabled selected value="">Selecione</option>
                                            <option value="true">Sim</option>
                                            <option value="false">Não</option>
                                        </select>
                                        <label for="temProjetoExecutivo" class="form-label">Tem Projeto Executivo?</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select name="temProjetoConstruido" class="form-select">
                                            <option disabled selected value="">Selecione</option>
                                            <option value="true">Sim</option>
                                            <option value="false">Não</option>
                                        </select>
                                        <label for="temProjetoConstruido" class="form-label">Tem Projeto Construído?</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select name="temProjetoBasico" class="form-select">
                                            <option disabled selected value="">Selecione</option>
                                            <option value="true">Sim</option>
                                            <option value="false">Não</option>
                                        </select>
                                        <label for="temProjetoBasico" class="form-label">Tem Projeto Básico?</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select name="temProjetoConceitual" class="form-select">
                                            <option disabled selected value="">Selecione</option>
                                            <option value="true">Sim</option>
                                            <option value="false">Não</option>
                                        </select>
                                        <label for="temProjetoConceitual" class="form-label">Tem Projeto Conceitual?</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select name="temEclusa" class="form-select">
                                            <option disabled selected value="">Selecione</option>
                                            <option value="true">Sim</option>
                                            <option value="false">Não</option>
                                        </select>
                                        <label for="temEclusa" class="form-label">Tem Eclusa?</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select name="sujeitaPnsb" class="form-select">
                                            <option disabled selected value="">Selecione</option>
                                            <option value="true">Sim</option>
                                            <option value="false">Não</option>
                                        </select>
                                        <label for="sujeitaPnsb" class="form-label">Sujeita PNSB?</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select name="barragemAutuada" class="form-select">
                                            <option disabled selected value="">Selecione</option>
                                            <option value="true">Sim</option>
                                            <option value="false">Não</option>
                                        </select>
                                        <label for="barragemAutuada" class="form-label">Barragem Autuada?</label>
                                    </div>
                                </div>

                                <!--Pontuação-->
                                <div class="alert alert-primary alert-dismissible fade show">
                                    IV. CRI - PONTUAÇÕES
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="text" name="pontuacaoCt" class="form-control" value="">
                                        <label>CRI - ∑ pontuação CT:</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="text" name="pontuacaoEc" class="form-control" value="">
                                        <label>CRI - ∑ pontuação EC:</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="text" name="pontuacaoPsb" class="form-control" value="">
                                        <label>CRI - ∑ pontuação PSB:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="pontuacaoExtravasoras" class="form-control" value="">
                                        <label>CRI - Pontuação Confiabilidade Extravasoras:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="pontuacaoAducao" class="form-control" value="">
                                        <label>CRI - Pontuação Confiabilidade Adução:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="pontuacaoPercolacao" class="form-control" value="">
                                        <label>CRI - Pontuação Percolação:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="pontuacaoDeformacaoRecalque" class="form-control" value="">
                                        <label>CRI - Pontuação Deformações de Recalques:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="pontuacaoDeterioracaoTaludes" class="form-control" value="">
                                        <label>CRI - Pontuação Deterioração Taludes:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="pontuacaoEclusa" class="form-control" value="">
                                        <label>CRI - Pontuação Eclusa:</label>
                                    </div>
                                </div>

                                <!--Dados Adicionais-->
                                <div class="alert alert-primary alert-dismissible fade show">
                                    V. DADOS ADICIONAIS
                                </div>

                                <div class="col-md-9">
                                    <div class="form-floating">
                                        <textarea name="comentarioObservacao" class="form-control" style="height: 100px;"></textarea>
                                        <label for="comentario">Comentários/Observações:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="oficio" class="form-control" value="">
                                        <label>Ofício:</label>
                                    </div>
                                </div>

                                <div class="text-center mt-4">
                                <button type="submit" name="acao" value="cadastrar" class="btn btn-primary">Cadastrar Informação Adicional</button>
                                    </button>
                                </div>
                             

              </form><!-- End floating Labels Form -->
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