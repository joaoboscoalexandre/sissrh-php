<?php

include('config.php');

if (isset($_GET['loggout']) || $_SESSION['cpf'] == '' || $_SESSION['login'] == 1) { Painel::loggout(); }

include('permissoes.php');

$codAgrovila = $_GET['codAgrovila'];
$agrovila = PgSql::conectar()->prepare("SELECT a.nome_obra, a.nome_agrovila, m.nome_municipio
FROM sissrh.tbdesapropriacao_agrovila a
INNER JOIN sissrh.tbadmin_municipio m ON a.cod_municipio = m.cod_municipio AND a.cod_agrovila = ?");
$agrovila->execute(array($codAgrovila));
$agrovila = $agrovila->fetchAll();
foreach($agrovila as $key => $value){
  $nomeAgrovila = $value['nome_agrovila'];
  $nomeMunicipio = $value['nome_municipio'];
}

//$nomeAgrovila = $agrovila['nome_agrovila'];
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

      <?php if($sistema05 == true || $superAdmin == true){ ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-desapropriacao" data-bs-toggle="collapse" href="#">
          <i class="bi bi-house-fill"></i><span>Desapropriação</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-desapropriacao" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
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
                <a href="desapropriacao-cadastro-familia.php?codAgrovila=<?php echo $value['cod_agrovila']; ?>" class="active">
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

  <section class="section">
      <div class="row">

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <br/><br/>
              <center><img src="assets/img/Logotipo_SRH.png" alt=""></center>
              <center><h5 class="card-title">Formulário para cadastro de Famílias a serem reassentadas na Agrovila</strong><br/>
              <?php echo '<strong>'. $nomeAgrovila .' no Município de '. $nomeMunicipio .'</strong>'; ?></h5></center>
              <br/>
              <?php 
              if(isset($_POST['acao']) && $_POST['acao'] == "cadastrar"){

                $codAgrovila = $_GET['codAgrovila'];
                $nomeTitular = $_POST['nome_titular'];
                $cpfTitular = $_POST['cpf_titular'];
                $rgTitular = $_POST['rg_titular'];
                $nomePai = $_POST['nome_pai'];
                $nomeMae = $_POST['nome_mae'];
                $sexo = $_POST['sexo'];
                $dataNasc = date('Y-m-d', strtotime($_POST['data_nascimento']));
                $naturalidade = $_POST['naturalidade'];
                $uf = $_POST['uf'];
                $apelido = $_POST['apelido'];
                $estadoCivil = $_POST['estado_civil'];
                $telefoneEmail = $_POST['telefone_email'];
                
                $escolaridade = $_POST['escolaridade'];
                $carteiraAssinada = $_POST['carteira_assinada'];
                $atividadeDesenv = $_POST['atividade_desenvolvida'];
                $atividadeDesenv = implode(", ",$atividadeDesenv);
                $aposentado = $_POST['aposentado'];
                $cultivaArea = $_POST['cultiva_area'];
                $areaCultivada = $_POST['area_cultivada'];
                $dapCafAtivo = $_POST['dap_caf_ativo'];
                $ocupanteCargoPublico = $_POST['ocupante_cargo_publico'];
                $compativelExploracao = $_POST['compativel_exploracao'];
                $rendaFamiliar = $_POST['renda_familiar'];
                $source = array('.', ',');  
                $replace = array('', '.');  
                $rendaFamiliar = str_replace($source, $replace, $rendaFamiliar); //remove os pontos e substitui a virgula pelo ponto  

                $assistenciaGoverno = $_POST['assistencia_governo'];
                $orgaoEntidade = $_POST['orgao_entidade'];
                $frequenciaAssistencia = $_POST['frequencia_assistencia'];
                $modoAssistencia = $_POST['modo_assistencia'];
                
                /*
                echo $participacaoSocial = $_POST['participacao_social']."<br/>";
                echo $servicoComunitario = $_POST['servico_comunitario']."<br/>";
                echo $qualServicoComunitario = $_POST['qual_comunitario']."<br/>";
                echo $reformaAgraria = $_POST['reforma_agraria']."<br/>";
                echo $qualReforma = $_POST['programa_reforma']."<br/>";
                echo '================================================='."<br/>";
                echo $tempoResideVila = $_POST['tempo_reside_vila']."<br/>";
                echo $ondeReside = $_POST['nao_reside_vila_onde_reside']."<br/>";
                echo $tipoExploracao = $_POST['tipo_exploracao']."<br/>";
                echo $imovelForaArea = $_POST['imovel_fora_area']."<br/>";
                echo $membrosFamilia = $_POST['membros_familia']."<br/>";
                echo $mudouEndereco = $_POST['mudou_endereco']."<br/>";
                echo $mudouPorque = $_POST['mudou_porque']."<br/>";
                echo $vendeuTrocou = $_POST['vendeu_trocou']."<br/>";
                echo $mudouEndereco = $_POST['vendeu_trocou_porque']."<br/>";
                echo $sustentaFamilia = $_POST['propriedade_sustenta_familia']."<br/>";
                echo '================================================='."<br/>";
                echo $nrPessoaImovel = $_POST['nr_pessoas_imovel']."<br/>";
                echo $ate12 = $_POST['ate_12']."<br/>";
                echo $entre13_18 = $_POST['entre_13_18']."<br/>";
                echo $entre19_40 = $_POST['entre_19_40']."<br/>";
                echo $entre41_59 = $_POST['entre_41_59']."<br/>";
                echo $entre_60_65 = $_POST['entre_60_65']."<br/>";
                echo $entre_66_80 = $_POST['entre_66_80']."<br/>";
                echo $mais_80 = $_POST['mais_80']."<br/>";
                echo $nrFilhoImovel = $_POST['nr_filho_imovel']."<br/>";
                echo $nrMulheresImovel = $_POST['nr_mulheres_imovel']."<br/>";
                echo $pessoasDeficiencia = $_POST['pessoas_deficiencia']."<br/>";
                echo '================================================='."<br/>";
                echo $veracidadeInformacoes = $_POST['veracidade_informacoes']."<br/>";
                echo $enderecoResidencia = $_POST['endereco_residencia']."<br/>";
                echo $cadastradoPor = $_POST['cadastrado_por']."<br/>";
                echo $cpfCadastrador = $_POST['cpf_cadastrador']."<br/>";
                echo $orgaoCadastrador = $_POST['orgao_cadastrador']."<br/>";
                echo $localPreenchimento = $_POST['local_preenchimento']."<br/>";
                echo $dataCadastro = date('Y-m-d')."<br/>";
                echo $arquivoPdf = $_FILES['formularioPdf'];
                echo $nomeArquivoPdf = $_FILES['formularioPdf']['name'];
                */

                $sql = PgSql::conectar()->prepare("INSERT INTO sissrh.tbdesapropriacao_cadastro_familia(cod_agrovila,nome_titular,cpf_titular,rg_titular,nome_pai,nome_mae,sexo,data_nascimento,naturalidade,uf,apelido,estado_civil,telefone,escolaridade,carteira_assinada,atividade_desenvolvida,aposentado,cultiva_area,area_cultivada,dap_caf_ativo,ocupante_cargo_publico,compativel_exploracao,renda_familiar,assistencia_governo,orgao_entidade,frequencia_assistencia,modo_assistencia)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                $sql->execute(array($codAgrovila,$nomeTitular,$cpfTitular,$rgTitular,$nomePai,$nomeMae,$sexo,$dataNasc,$naturalidade,$uf,$apelido,$estadoCivil,$telefoneEmail,$escolaridade,$carteiraAssinada,$atividadeDesenv,$aposentado,$cultivaArea,$areaCultivada,$dapCafAtivo,$ocupanteCargoPublico,$compativelExploracao,$rendaFamiliar,$assistenciaGoverno,$orgaoEntidade,$frequenciaAssistencia,$modoAssistencia));
                Painel::alert('sucesso', 'Família cadastrada com sucesso!');
              } 

              ?>
              <div class="alert alert-primary alert-dismissible fade show" ><strong>1. IDENTIFICAÇÃO</strong></div>
              <!-- Floating Labels Form -->
              <form method="post" class="row g-3" enctype="multipart/form-data">

                <div class="col-md-8">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="nome_titular" placeholder="Nome Completo do Titular" required>
                    <label for="floatingName">Nome Completo do Titular</label>
                  </div>
                </div>
               
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" name="cpf_titular" class="form-control" placeholder="CPF do Titular" required>
                    <label for="floatingCPFCNPJ">CPF do Titular</label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" name="rg_titular" class="form-control" placeholder="RG com Órgão Emissor" >
                    <label for="floatingCPFCNPJ">RG com Órgão Emissor</label>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="nome_pai" placeholder="Nome do Pai" >
                    <label for="floatingName">Nome do Pai</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="nome_mae" placeholder="Nome da Mãe">
                    <label for="floatingEmail">Nome da Mãe</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="sexo" name="sexo" required>
                      <option value="" selected disabled>Selecione</option>
                      <option value ="Masculino">Masculino</option>
                      <option value ="Feminino">Feminino</option>
                    </select>
                    <label for="floatingSelect">Sexo</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="date" class="form-control" name="data_nascimento" required>
                    <label for="floatingName">Data de Nascimento</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="naturalidade" required>
                    <label for="floatingName">Naturalidade</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="Municipio" name="uf" required>
                      <option value="" selected disabled>Selecione a UF</option>
                      <?php
                        $uf = PgSql::conectar()->prepare("SELECT * FROM sissrh.tbadmin_estados ORDER BY nome_estado ASC");
                        $uf->execute();
                        $uf = $uf->fetchAll();
                        foreach($uf as $key => $value){
                        ?>
                        <option value ="<?php echo $value['sigla_estado']; ?>"><?php echo $value['sigla_estado']; ?></option>;
                      <?php } ?>
                    </select>
                    <label for="floatingSelect">UF</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="apelido" >
                    <label for="floatingName">Apelido</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="estado_civil" name="estado_civil" required>
                      <option value ="" selected disabled>Selecione</option>
                      <option value ="Solteiro">Solteiro</option>
                      <option value ="Casado">Casado</option>
                      <option value ="Viúvo">Viúvo</option>
                      <option value ="Divorciado ou Separado Judicialmente">Divorciado ou Separado Judicialmente</option>
                      <option value ="União Estável">União Estável</option>
                    </select>
                    <label for="floatingSelect">Estado Civil</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="telefone_email" required>
                    <label for="floatingName">Telefone e/ou E-mail</label>
                  </div>
                </div>

                <div class="alert alert-primary alert-dismissible fade show"><strong>2. ESCOLARIDADE | 3. TRABALHO</strong></div>
                <div class="col-md-3">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="escolaridade" name="escolaridade" >
                      <option value ="" selected disabled>Selecione</option>
                      <option value ="Não Alfabetizado">Não Alfabetizado</option>
                      <option value ="Alfabetizado">Alfabetizado</option>
                      <option value ="Ensino Fundamental Incompleto">Ensino Fundamental Incompleto</option>
                      <option value ="Ensino Fundamental Completo">Ensino Fundamental Completo</option>
                      <option value ="Ensino Médio Incompleto">Ensino Médio Incompleto</option>
                      <option value ="Ensino Médio Completo">Ensino Médio Completo</option>
                      <option value ="Nível Superior Incompleto">Nível Superior Incompleto</option>
                      <option value ="Nível Superior Completo">Nível Superior Completo</option>
                      <option value ="Pós-graduação Incompleto">Pós-graduação Incompleto</option>
                      <option value ="Pós-graduação Completo">Pós-graduação Completo</option>
                    </select>
                    <label for="floatingSelect">Escolaridade</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="carteira_assinada" name="carteira_assinada" >
                      <option value ="" selected disabled>Selecione</option>
                      <option value ="True">Sim</option>
                      <option value ="False">Não</option>
                    </select>
                    <label for="floatingSelect">Possuir carteira assinada?</label>
                  </div>
                </div>
                <div class="col-md-7">
                  <label for="floatingSelect">Qual a atividade desenvolvida?</label>
                  <div class="form-floating">
                  <input class="form-check-input" type="checkbox" name="atividade_desenvolvida[]" value="Agricultura" />&nbsp;Agricultura&nbsp;&nbsp;
                  <input class="form-check-input" type="checkbox" name="atividade_desenvolvida[]" value="Pecuária" />&nbsp;Pecuária&nbsp;&nbsp;
                  <input class="form-check-input" type="checkbox" name="atividade_desenvolvida[]" value="Artesanato" />&nbsp;Artesanato&nbsp;&nbsp;
                  <input class="form-check-input" type="checkbox" name="atividade_desenvolvida[]" value="Comércio" />&nbsp;Comércio&nbsp;&nbsp;
                  <input class="form-check-input" type="checkbox" name="atividade_desenvolvida[]" value="Pesca" />&nbsp;Pesca&nbsp;&nbsp;
                  <input class="form-check-input" type="checkbox" name="atividade_desenvolvida[]" value="Outros" />&nbsp;Outros&nbsp;&nbsp;
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="aposentado" name="aposentado" >
                      <option selected disabled>Selecione</option>
                      <option value ="True">Sim</option>
                      <option value ="False">Não</option>
                    </select>
                    <label for="floatingSelect">É aposentado?</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="cultiva_area" name="cultiva_area" >
                      <option selected disabled>Selecione</option>
                      <option value ="True">Sim</option>
                      <option value ="False">Não</option>
                    </select>
                    <label for="floatingSelect">Cultiva área em questão?</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="area_cultivada" placeholder="area_cultivada">
                    <label for="floatingName">Caso afirmativo, qual a área?</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="dap_caf_ativo" name="dap_caf_ativo" >
                      <option selected disabled>Selecione</option>
                      <option value ="True">Sim</option>
                      <option value ="False">Não</option>
                    </select>
                    <label for="floatingSelect">Possuir DAP ou CAF  ativa</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="ocupante_cargo_publico" name="ocupante_cargo_publico" >
                      <option selected disabled>Selecione</option>
                      <option value ="True">Sim</option>
                      <option value ="False">Não</option>
                    </select>
                    <label for="floatingSelect">Ocupante de cargo público ou função pública remunerada?</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="compativel_exploracao" name="compativel_exploracao" >
                      <option selected disabled>Selecione</option>
                      <option value ="True">Sim</option>
                      <option value ="False">Não</option>
                    </select>
                    <label for="floatingSelect">Caso afirmativo, é compatível com a exploração da parcela pelo indivíduo ou pelo núcleo familiar?</label>
                  </div>
                </div>               
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="renda_familiar" placeholder="Renda Familiar</label>
                  </div>" >
                    <label for="floatingName">Renda Familiar R$</label>
                  </div>
                </div>

                <div class="alert alert-primary alert-dismissible fade show" ><strong>4. ASSISTÊNCIA TÉCNICA</strong></div>
                <div class="col-md-4">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="assistencia_governo" name="assistencia_governo" >
                      <option selected disabled>Selecione</option>
                      <option value ="True">Sim</option>
                      <option value ="False">Não</option>
                    </select>
                    <label for="floatingSelect">Recebe assistência técnica de alguma entidade do governo?</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="orgao_entidade" >
                    <label for="floating">Caso afirmativo, qual órgão/entidade?</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="frequencia_assistencia" >
                    <label for="floating">Qual a frequência que recebe a assistência técnica?</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="modo_assistencia">
                    <label for="floating">De que modo é realizada a assistência técnica?</label>
                  </div>
                </div>
                  

                <div class="alert alert-primary alert-dismissible fade show" ><strong>5. REPRESENTAÇÃO SOCIAL</strong></div>
                <div class="col-md-6">
                  <label for="floatingSelect">Participação Social</label>
                  <div class="form-floating">
                  <input class="form-check-input" type="checkbox" name="participacao_social[]" value="Associações Comunitárias" />&nbsp;Associações Comunitárias&nbsp;&nbsp;
                  <input class="form-check-input" type="checkbox" name="participacao_social[]" value="Sindicato" />&nbsp;Sindicato&nbsp;&nbsp;
                  <input class="form-check-input" type="checkbox" name="participacao_social[]" value="Cooperativas" />&nbsp;Cooperativas&nbsp;&nbsp;
                  <input class="form-check-input" type="checkbox" name="participacao_social[]" value="Não parcitipa" />&nbsp;Não parcitipa&nbsp;&nbsp;
                  <input class="form-check-input" type="checkbox" name="participacao_social[]" value="Outros" />&nbsp;Outros&nbsp;&nbsp;
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="servico_comunitario" name="servico_comunitario" >
                      <option selected disabled>Selecione</option>
                      <option value ="True">Sim</option>
                      <option value ="False">Não</option>
                    </select>
                    <label for="floatingSelect">Presta serviços de interesse comunitário à comunidade rural na área objeto do projeto de Reassentamento?</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="qual_comunitario">
                    <label for="floatingCPFCNPJ">Caso afirmativo, qual?</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="reforma_agraria" name="reforma_agraria" >
                      <option selected disabled>Selecione</option>
                      <option value ="True">Sim</option>
                      <option value ="False">Não</option>
                    </select>
                    <label for="floatingSelect">Participa ou participou de algum programa de reforma agrária, regularização fundiária ou de crédito fundiário?</label>
                  </div>
                </div>
                
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="programa_reforma">
                    <label for="floatingCPFCNPJ">Caso afirmativo, qual?</label>
                  </div>
                </div>
               
                <div class="alert alert-primary alert-dismissible fade show" ><strong>6. MORADIA</strong></div>
                
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="tempo_reside_vila">
                    <label for="floatingCPFCNPJ">Reside na Vila há quanto tempo?</label>
                  </div>
                </div>
                
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="nao_reside_vila_onde_reside">
                    <label for="floatingCPFCNPJ">Não Reside na Vila? Onde reside?</label>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="tipo_exploracao">
                    <label for="floatingCPFCNPJ">Tipo de Exploração da área</label>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="imovel_fora_area" name="imovel_fora_area" >
                      <option selected disabled>Selecione</option>
                      <option value ="True">Sim</option>
                      <option value ="False">Não</option>
                    </select>
                    <label for="floatingSelect">Possui algum imóvel rural fora da área do imóvel em questão?</label>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="membros_familia">
                    <label for="floatingCPFCNPJ">Quantos membros de sua família ocupam terras na Agrovila?</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="mudou_endereco " name="mudou_endereco" >
                      <option selected disabled>Selecione</option>
                      <option value ="True">Sim</option>
                      <option value ="False">Não</option>
                    </select>
                    <label for="floatingSelect">Já mudou de endereço nas terras da Agrovila?</label>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="mudou_porque">
                    <label for="floatingCPFCNPJ">Caso afirmativo, porque?</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="vendeu_trocou" name="vendeu_trocou" >
                      <option selected disabled>Selecione</option>
                      <option value ="True">Sim</option>
                      <option value ="False">Não</option>
                    </select>
                    <label for="floatingSelect">Já vendeu/trocou/negociou terras dentro da Agrovila?</label>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="vendeu_trocou_porque">
                    <label for="floatingCPFCNPJ">Caso afirmativo, porque?</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="propriedade_sustenta_familia" name="propriedade_sustenta_familia" >
                      <option selected disabled>Selecione</option>
                      <option value ="True">Sim</option>
                      <option value ="False">Não</option>
                    </select>
                    <label for="floatingSelect">Sua propriedade é suficiente para o sustento próprio de sua família?</label>
                  </div>
                </div>

                <div class="alert alert-primary alert-dismissible fade show" ><strong>7. INFORMAÇÕES FAMILIARES</strong></div>
                
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="nr_pessoas_imovel" placeholder="Nº de pessoas no imóvel">
                    <label for="floatingName">Nº de pessoas no imóvel</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="ate_12" placeholder="até 12 anos">
                    <label for="floatingName">até 12 anos</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="entre_13_18" placeholder="13 a 18 anos">
                    <label for="floatingName">13 a 18 anos</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="entre_19_40" placeholder="19 a 40 anos">
                    <label for="floatingName">19 a 40 anos</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="entre_41_59" placeholder="41 a 59 anos">
                    <label for="floatingName">41 a 59 anos</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="entre_60_65" placeholder="60 a 65 anos">
                    <label for="floatingName">60 a 65 anos</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="entre_66_80" placeholder="66 a 80 anos">
                    <label for="floatingName">66 a 80 anos</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="mais_80" placeholder="mais de 80 anos">
                    <label for="floatingName">mais de 80 anos</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="nr_filho_imovel" placeholder="Nº de filhos residentes no imóvel">
                    <label for="floatingCPFCNPJ">Nº de filhos residentes no imóvel</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="nr_mulheres_imovel" placeholder="Nº de mulheres residentes no imóvel">
                    <label for="floatingName">Nº de mulheres residentes no imóvel</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="pessoas_deficiencia" name="pessoas_deficiencia" >
                      <option selected disabled>Selecione</option>
                      <option value ="True">Sim</option>
                      <option value ="False">Não</option>
                    </select>
                    <label for="floatingSelect">Há pessoas com deficiência</label>
                  </div>
                </div>

                <div class="alert alert-primary alert-dismissible fade show" ><strong>8. DECLARAÇÃO</strong></div>
                <p>De acordo com art. 299 do Código Penal Brasileiro: é crime omitir, em documento público ou particular, declaração que dele devia constar, ou nele inserir ou fazer inserir declaração falsa ou diversa da que devia ser escrita, com o fim de prejudicar direito, criar obrigação ou alterar a verdade sobre fato juridicamente relevante, sob pena de reclusão, de um a cinco anos, e multa, se o documento é público.</p>
                <div class="col-md-12">
                  <div class="form-floating">
                  <input class="form-check-input" type="checkbox" name="veracidade_informacoes" value="Sim" checked />&nbsp;&nbsp;DECLARO, para os devidos fins, que as informações prestadas neste formulário são verdadeiras e estar ciente e de acordo com todas as regras da SRH e do Código Penal Brasileiro.
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="endereco_residencia" placeholder="Endereço da residência">
                    <label for="floatingName">Endereço da Residência</label>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="cadastrado_por" placeholder="Cadastrado por">
                    <label for="floatingName">Preenchido por</label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="cpf_cadastrador" placeholder="CPF Cadastrador">
                    <label for="floatingName">CPF do Cadastrador</label>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="orgao_cadastrador" placeholder="Orgão do Cadastrador">
                    <label for="floatingName">Órgão do Cadastrador</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="local_preenchimento" placeholder="Local do Preenchimento">
                    <label for="floatingName">Local do Preenchimento</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="data_cadastro" placeholder="Data do Cadastro" value="<?php echo date('d/m/Y');?>" disabled>
                    <label for="floatingName">Data Cadastro</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                  <input class="form-control" type="file" name="formularioPdf" accept=".pdf" >
                    <label for="floatingName">Upload do Formulário de Cadastro</label>
                  </div>
                </div>

                <div class="text-center">
                    <br/>
                  <button type="submit" name="acao" value="cadastrar" class="btn btn-primary">Cadastrar Titular da Família</button>
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