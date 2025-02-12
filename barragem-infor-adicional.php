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
        <ul id="tables-barragem" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="barragem-administrar.php" class="active">
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
            <a href="desapropriacao-cadastro-agrovila.php">
              <i class="bi bi-circle"></i><span>Cadastrar Agrovila</span>
            </a>
          </li>
          <li>
            <a href="desapropriacao-cadastro-familias.php">
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
    <center><h5 class="card-title">Formulário para Cadastro de Informações Adicionais<br/> <i class="bi bi-water"></i>
    <strong>Barragem:&nbsp;<?php echo $barragem['nome_barragem']; ?></strong></h5></center><br/>
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
      $capacidade = $_POST['capacidade'];
      $material = $_POST['material'];
      $estruturaEstrutural = $_POST['estrutura_ou_estrutural'];
      $comprimento = $_POST['comprimento'];
      $registroEmpreendedor = $_POST['registro_empreendedor'];
      $dataInicioConstrucao = date('Y-m-d', strtotime($_POST['data_inicio_construcao']));
      $dataFimConstrucao = $_POST['data_fim_construcao'];
      $usoPrincipal = $_POST['uso_principal'];
      $usoComplementar = $_POST['uso_complementar'];
      $classeResiduo = $_POST['classe_residuo'];
      $cursoDaAgua = $_POST['curso_da_agua'];
      $regiaoHidrografica = $_POST['regiao_hidrografica'];
      $unidadeGestao = $_POST['unidade_gestao'];
      $latitudeDeGrau = $_POST['latitude_de_grau'];
      $longitudeDeGrau = $_POST['longitude_de_grau'];
      $datum = $_POST['datum'];
      $dominioCursoDagua = $_POST['dominio_curso_dagua'];
      $dataUltimaInspecao = date('Y-m-d', strtotime ($_POST['data_ultima_inspecao']));
      $tipoUltimaInspecao = $_POST['tipo_ultima_inspecao'];
      $nivelPerigoBarragem = $_POST['nivel_perigo_barragem'];
      $categoriaRisco = $_POST['categoria_risco'];
      $danoPotencialAssociado = $_POST['dano_potencial_associado'];
      $classe = $_POST['classe'];
      $temPae = $_POST['tem_pae'];
      $temPlanoSeguranca = $_POST['tem_plano_seguranca'];
      $temRevisaoPeriodica = $_POST['tem_revisao_periodica'];
      $vazaoProjetoOrgao = $_POST['vazao_projeto_orgao'];
      $criterioVazaoProjeto = $_POST['criterio_vazao_projeto'];
      $controleExtravasor = $_POST['controle_extravasor'];
      $temProjetoExecutivo = $_POST['tem_projeto_executivo'];
      $temProjetoConstruido = $_POST['tem_projeto_construido'];
      $temProjetoBasico = $_POST['tem_projeto_basico'];
      $temProjetoConceitual = $_POST['tem_projeto_conceitual'];
      $temEclusa = $_POST['tem_eclusa'];
      $faseDaVida = $_POST['fase_da_vida'];
      $sujeitaPnsb = $_POST['sujeita_pnsb'];
      $dataUltimaFiscalizacao = date('Y-m-d', strtotime ($_POST['data_ultima_fiscalizacao']));
      $barragemAutuada = $_POST['barragem_autuada'];
      $criPontuacaoCt = $_POST['cri_pontuacao_ct'];
      $criPontuacaoEc = $_POST['cri_pontuacao_ec'];
      $criPontuacaoPsb = $_POST['cri_pontuacao_psb'];
      $criPontuacaoExtravasoras = $_POST['cri_pontuacao_extravasoras'];
      $criPontuacaoAducao = $_POST['cri_pontuacao_aducao']; 
      $criPontuacaoPercolacao = $_POST['cri_pontuacao_percolacao'];
      $criPontuacaoRecalques = $_POST['cri_pontuacao_recalques'];
      $criPontuacaoTaludes = $_POST['cri_pontuacao_taludes'];
      $criPontuacaoEclusa = $_POST['cri_pontuacao_eclusa'];
      $comentarios = $_POST['comentarios']; 
      $oficio = $_POST['oficio'];
     
      $query = PgSql::conectar()->prepare("INSERT INTO sissrh.tbbarragem_infor_adicional (cod_barragem,assinado,bacia_hidrografica,gerencia_regional,data_emissao,registro_snisb,nome_secundario_barragem,altura_fundacao,altura_terreno,capacidade,material,estrutura_ou_estrutural,comprimento,registro_empreendedor,data_inicio_construcao,data_fim_construcao,uso_principal,uso_complementar,classe_residuo,curso_da_agua,regiao_hidrografica,unidade_gestao,latitude_de_grau,longitude_de_grau,datum,dominio_curso_dagua,data_ultima_inspecao,tipo_ultima_inspecao,nivel_perigo_barragem,categoria_risco,dano_potencial_associado,classe,tem_pae,tem_plano_seguranca,tem_revisao_periodica,vazao_projeto_orgao,criterio_vazao_projeto,controle_extravasor,tem_projeto_executivo,tem_projeto_construido,tem_projeto_basico,tem_projeto_conceitual,tem_eclusa,fase_da_vida,sujeita_pnsb,data_ultima_fiscalizacao,barragem_autuada,cri_pontuacao_ct,cri_pontuacao_ec,cri_pontuacao_psb,cri_pontuacao_extravasoras,cri_pontuacao_aducao,cri_pontuacao_percolacao,cri_pontuacao_recalques,cri_pontuacao_taludes,cri_pontuacao_eclusa,comentarios,oficio) 
      VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ");
      $query->execute(array($codBarragem,$assinado,$baciaHidrografica,$gerenciaRecional,$dataEmissao,$registoSnisb,$nomeSecundario,$alturaFundacao,$alturaTerreno,$capacidade,$material,$estruturaEstrutural,$comprimento,$registroEmpreendedor,$dataInicioConstrucao,$dataFimConstrucao,$usoPrincipal,$usoComplementar,$classeResiduo,$cursoDaAgua,$regiaoHidrografica,$unidadeGestao,$latitudeDeGrau,$longitudeDeGrau,$datum,$dominioCursoDagua,$dataUltimaInspecao,$tipoUltimaInspecao,$nivelPerigoBarragem,$categoriaRisco,$danoPotencialAssociado,$classe,$temPae,$temPlanoSeguranca,$temRevisaoPeriodica,$vazaoProjetoOrgao,$criterioVazaoProjeto,$controleExtravasor,$temProjetoExecutivo,$temProjetoConstruido,$temProjetoBasico,$temProjetoConceitual,$temEclusa,$faseDaVida,$sujeitaPnsb,$dataUltimaFiscalizacao,$barragemAutuada,$criPontuacaoCt,$criPontuacaoEc,$criPontuacaoPsb,$criPontuacaoExtravasoras,$criPontuacaoAducao,$criPontuacaoPercolacao,$criPontuacaoRecalques,$criPontuacaoTaludes,$criPontuacaoEclusa,$comentarios,$oficio));
      Painel::alert("sucesso","As informações adicionais foram cadastradas com sucesso!");

    }

      ?>

    <div class="alert alert-primary alert-dismissible fade show" ><strong>I. INFORMAÇÕES INICIAIS</strong></div>
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
                                        <input type="text" name="altura_terreno" class="form-control">
                                        <label>Altura Terreno:</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="text" name="capacidade" class="form-control">
                                        <label>Capacidade (m²):</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="estrutura_ou_estrutural" class="form-control">
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
                                        <input type="text" name="registro_empreendedor" class="form-control">
                                        <label>Registro Empreendedor:</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="date" name="data_inicio_construcao" class="form-control">
                                        <label>Data Início Construção:</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="text" name="data_fim_construcao" class="form-control" pattern="\d{4}" maxlength="4">
                                        <label>Ano Fim Construção:</label>
                                    </div>
                                </div>

                                <div class="alert alert-primary alert-dismissible fade show"><strong>II. OBJETIVOS</strong></div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <textarea name="uso_principal" class="form-control" value="" style="height: 100px;"></textarea>
                                        <label>Uso Principal:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <textarea name="uso_complementar" class="form-control" value=""></textarea>
                                        <label>Uso Complementar:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="classe_residuo" class="form-control" value="">
                                        <label>Classe Resíduo:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="curso_da_agua" class="form-control" value="">
                                        <label>Curso da Água (Barrado):</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <select name="regiao_hidrografica" class="form-select">
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
                                        <input type="text" name="unidade_gestao" class="form-control" value="">
                                        <label>Unidade Gestão Recursos Hídricos:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="latitude_de_grau" class="form-control" value="">
                                        <label>Latitude de Grau:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="longitude_de_grau" class="form-control" value="">
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
                                        <input type="text" name="dominio_curso_dagua" class="form-control" value="">
                                        <label>Domínio Curso Dágua:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="date" name="data_ultima_inspecao" class="form-control" value="">
                                        <label>Data Última Inspenção:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="tipo_ultima_inspecao" class="form-control" value="">
                                        <label>Tipo Última Inspeção:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="nivel_perigo_barragem" class="form-control" value="">
                                        <label>Nível Perigo Barragem:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="categoria_risco" class="form-control" value="">
                                        <label>Categoria Risco:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="dano_potencial_associado" class="form-control" value="">
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
                                        <input type="text" name="vazao_projeto_orgao" class="form-control" value="">
                                        <label>Vazão Projeto Extravasor:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="criterio_vazao_projeto" class="form-control" value="">
                                        <label>Critério Vazão Projeto Extravasor:</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="text" name="controle_extravasor" class="form-control" value="">
                                        <label>Controle Extravasor:</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="text" name="fase_da_vida" class="form-control" value="">
                                        <label>Fase da Vida:</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="date" name="data_ultima_fiscalizacao" class="form-control" value="">
                                        <label>Data Última Fiscalização:</label>
                                    </div>
                                </div>

                                <!-- Informações Complementares-->
                                <div class="alert alert-primary alert-dismissible fade show"><strong>III. INFORMAÇÕES COMPLEMENTARES</strong></div>

                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select name="tem_pae" class="form-select">
                                            <option disabled selected value="">Selecione</option>
                                            <option value="true">Sim</option>
                                            <option value="false">Não</option>
                                        </select>
                                        <label for="tem_pae" class="form-label">Tem PAE?</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select name="tem_plano_seguranca" class="form-select">
                                            <option disabled selected value="">Selecione</option>
                                            <option value="true">Sim</option>
                                            <option value="false">Não</option>
                                        </select>
                                        <label for="tem_plano_seguranca" class="form-label">Tem Plano de Segurança?</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select name="tem_revisao_periodica" class="form-select">
                                            <option disabled selected value="">Selecione</option>
                                            <option value="true">Sim</option>
                                            <option value="false">Não</option>
                                        </select>
                                        <label for="tem_revisao_periodica" class="form-label">Tem Revisão Periódica?</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select name="tem_projeto_executivo" class="form-select">
                                            <option disabled selected value="">Selecione</option>
                                            <option value="true">Sim</option>
                                            <option value="false">Não</option>
                                        </select>
                                        <label for="tem_projeto_executivo" class="form-label">Tem Projeto Executivo?</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select name="tem_projeto_construido" class="form-select">
                                            <option disabled selected value="">Selecione</option>
                                            <option value="true">Sim</option>
                                            <option value="false">Não</option>
                                        </select>
                                        <label for="tem_projeto_construido" class="form-label">Tem Projeto Construído?</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select name="tem_projeto_basico" class="form-select">
                                            <option disabled selected value="">Selecione</option>
                                            <option value="true">Sim</option>
                                            <option value="false">Não</option>
                                        </select>
                                        <label for="tem_projeto_basico" class="form-label">Tem Projeto Básico?</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select name="tem_projeto_conceitual" class="form-select">
                                            <option disabled selected value="">Selecione</option>
                                            <option value="true">Sim</option>
                                            <option value="false">Não</option>
                                        </select>
                                        <label for="tem_projeto_conceitual" class="form-label">Tem Projeto Conceitual?</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select name="tem_eclusa" class="form-select">
                                            <option disabled selected value="">Selecione</option>
                                            <option value="true">Sim</option>
                                            <option value="false">Não</option>
                                        </select>
                                        <label for="tem_eclusa" class="form-label">Tem Eclusa?</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select name="sujeita_pnsb" class="form-select">
                                            <option disabled selected value="">Selecione</option>
                                            <option value="true">Sim</option>
                                            <option value="false">Não</option>
                                        </select>
                                        <label for="sujeita_pnsb" class="form-label">Sujeita PNSB?</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select name="barragem_autuada" class="form-select">
                                            <option disabled selected value="">Selecione</option>
                                            <option value="true">Sim</option>
                                            <option value="false">Não</option>
                                        </select>
                                        <label for="barragem_autuada" class="form-label">Barragem Autuada?</label>
                                    </div>
                                </div>

                                <!--Pontuação-->
                                <div class="alert alert-primary alert-dismissible fade show"><strong>IV. CRI - PONTUAÇÕES</strong></div>

                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="text" name="cri_pontuacao_ct" class="form-control" value="">
                                        <label>CRI - ∑ pontuação CT:</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="text" name="cri_pontuacao_ec" class="form-control" value="">
                                        <label>CRI - ∑ pontuação EC:</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="text" name="cri_pontuacao_psb" class="form-control" value="">
                                        <label>CRI - ∑ pontuação PSB:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="cri_pontuacao_extravasoras" class="form-control" value="">
                                        <label>CRI - Pontuação Confiabilidade Extravasoras:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="cri_pontuacao_aducao" class="form-control" value="">
                                        <label>CRI - Pontuação Confiabilidade Adução:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="cri_pontuacao_percolacao" class="form-control" value="">
                                        <label>CRI - Pontuação Percolação:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="cri_pontuacao_recalques" class="form-control" value="">
                                        <label>CRI - Pontuação Deformações de Recalques:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="cri_pontuacao_taludes" class="form-control" value="">
                                        <label>CRI - Pontuação Deterioração Taludes:</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" name="cri_pontuacao_eclusa" class="form-control" value="">
                                        <label>CRI - Pontuação Eclusa:</label>
                                    </div>
                                </div>

                                <!--Dados Adicionais-->
                                <div class="alert alert-primary alert-dismissible fade show"><strong>V. DADOS ADICIONAIS</strong></div>

                                <div class="col-md-8">
                                    <div class="form-floating">
                                        <textarea name="comentarios" class="form-control" style="height: 100px;"></textarea>
                                        <label for="comentario">Comentários/Observações:</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" name="oficio" class="form-control" value="">
                                        <label>Ofício:</label>
                                    </div>
                                </div>

                                <div class="text-center mt-4">
                                <button type="submit" name="acao" value="cadastrar" class="btn btn-primary">Cadastrar Informações Adicionais</button>
                                    </button>
                                </div>
                             

              </form><!-- End floating Labels Form -->
            </div>
          </div>

        </div>

      </div>
    </section>

</main><!-- End #main -->

   <!-- ========= Footer ========= -->
   <?php include('footer.php'); ?>

</body>

</html>