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
            <a href="desapropriacao-cadastro-agrovila.php" class="active">
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
              <center><img src="assets/img/Logotipo_SRH.png" alt=""></center><br/>
              <center><h5 class="card-title">CADASTRO DAS FAMÍLIAS A SEREM REASSENTADAS NA AGROVILA VILA GRAÇA (CRATEÚS)</h5></center>
              <center><hr width="15%"></center>
              <br/>
              <?php 
              if(isset($_POST['acao'])){

                $nm_nome = $_POST['nomeEmpreendedor'];
                if($_POST['empreendedor1'] == 'fisico'){
                  $ds_cpf_cnpj = $_POST['cpf1'];                  
                } else {
                  $ds_cpf_cnpj = $_POST['cnpj1'];                  
                }
                $ds_endereco = $_POST['endereco'];
                $ds_email = $_POST['email'];
                $ds_telefone = $_POST['tel_fixo'];
                $ds_celular = $_POST['tel_celular'];
                $ds_total_barragem = $_POST['qtd_bar'];
                $nm_nome2 = $_POST['nomeEmpreendedor2'];
                if($_POST['empreendedor2'] == 'fisico'){
                  $ds_cpf_cnpj2 = $_POST['cpf2'];                  
                } else {
                  $ds_cpf_cnpj2 = $_POST['cnpj2'];                  
                }
                $ds_endereco2 = $_POST['endereco2'];
                $ds_email2 = $_POST['email2'];
                $ds_telefone2 = $_POST['tel_fixo2'];
                $ds_celular2 = $_POST['tel_celular2'];
                $nm_nome_barragem = $_POST['nomeBarragem'];
                $ds_denominacao_barragem = $_POST['denominacaoBarragem'];

                $cd_municipio = $_POST['municipiobarragem'];
                $nome_municipio = PgSql::conectar()->prepare("SELECT ds_municipio FROM sicbar.tbsicbar_municipio WHERE cd_municipio = ? ");
                $nome_municipio->execute(array($cd_municipio));
                $nome_municipio = $nome_municipio->fetch()['ds_municipio'];

                $nr_coordenadan = $_POST['coord_N'];
                $nr_coordenadae = $_POST['coord_E'];
                $ds_finalidade_barragem = $_POST['usoBarragem'];
                $ds_finalidade_barragem = implode(", ",$ds_finalidade_barragem);

                $ds_tipo_barragem = $_POST['tipoBarragem'];
                $ds_altura_macico = $_POST['alturaMacico'];
                $ds_largura_coroamento = $_POST['larguraCoroamento'];
                $ds_extensao_coroamento = $_POST['extencaoCoroamento'];
                $ds_tipo_vertedouro = $_POST['tipoVertedouro'];
                $ds_capacidade_reservatorio = $_POST['capacidadeReservatorio'];
                $dt_preenchimento = date('Y-m-d');       
                
                $query = PgSql::conectar()->prepare("INSERT INTO sissrh.tbbarragem_cadastro (empreendedor, cpf_cnpj, endereco, email, telefone, celular, total_barragem, empreendedor2, cpf_cnpj2, 
                endereco2, email2, telefone2, celular2, nome_barragem, denominacao_barragem, municipio, coordenadan, coordenadae, finalidade_barragem, tipo_barragem, altura_macico, 
                largura_coroamento, extensao_coroamento, tipo_vertedouro, capacidade_reservatorio, data_cadastro) 
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                $query->execute(array($nm_nome, $ds_cpf_cnpj, $ds_endereco, $ds_email, $ds_telefone, $ds_celular, $ds_total_barragem, $nm_nome2, $ds_cpf_cnpj2, $ds_endereco2, $ds_email2, $ds_telefone2, $ds_celular2, $nm_nome_barragem, $ds_denominacao_barragem, $nome_municipio, $nr_coordenadan, $nr_coordenadae, $ds_finalidade_barragem, $ds_tipo_barragem, $ds_altura_macico, $ds_largura_coroamento, $ds_extensao_coroamento, $ds_tipo_vertedouro, $ds_capacidade_reservatorio, $dt_preenchimento));
                
                $mail = new PHPMailer;
                $mail->isSMTP();
                $mail->SMTPDebug = 0;
                $mail->Host = 'smtp.hostinger.com';
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                $mail->Username = 'cadastrobarragem@jbwebdesigner.com.br';
                $mail->Password = 'srhBarragem@2024!$';
                $mail->setFrom('cadastrobarragem@jbwebdesigner.com.br', 'Cadastro de Barragem');
                $mail->addAddress('joao.bosco@srh.ce.gov.br', 'Brenda Carneiro');
                $mail->Subject = 'Nova Barragem Cadastrada no site da SRH';
                $mail->msgHTML(file_get_contents('message.html'), __DIR__);
                $mail->Body = 'Olá Brenda Carneiro, uma nova barragem foi cadastrada no site da SRH.<br/><br/> Atenciosamente!';
                //$mail->addAttachment('test.txt');
                if($mail->send()){
                  Painel::alert('sucesso','Sua barragem foi cadastrada com sucesso na Secretaria dos Recursos Hídricos - SRH.<br/> Para maiores informações ligar para o Setor de Segurança de Barragens (85) 3492-9233.'); 
                } 

              } 

              ?>
              <div class="alert alert-primary alert-dismissible fade show" ><strong>1. IDENTIFICAÇÃO</strong></div>
              <!-- Floating Labels Form -->
              <form method="post" class="row g-3">
                <div class="col-md-8">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="nomeEmpreendedor" placeholder="Nome Completo" >
                    <label for="floatingName">Nome Completo do Titular</label>
                  </div>
                </div>
               
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" name="cpf" class="form-control" placeholder="CPF" >
                    <label for="floatingCPFCNPJ">CPF</label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" name="rg" class="form-control" placeholder="rg" >
                    <label for="floatingCPFCNPJ">RG - Órgão Emissor</label>
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
                    <input type="text" class="form-control" name="nome_mae" placeholder="Nome do Mãe">
                    <label for="floatingEmail">Nome do Mãe</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="sexo" name="sexo" >
                      <option selected disabled>Selecione</option>
                      <option value ="Masculino">Masculino</option>
                      <option value ="Feminino">Feminino</option>
                    </select>
                    <label for="floatingSelect">Sexo</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="date" class="form-control" name="data_nascimento" >
                    <label for="floatingName">Data de Nascimento</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="naturalidade" >
                    <label for="floatingName">Naturalidade</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="Municipio" name="uf" >
                      <option selected disabled>Selecione a UF</option>
                      <?php
                        $uf = PgSql::conectar()->prepare("SELECT * FROM sissrh.tbadmin_estados ORDER BY nome_estado ASC");
                        $uf->execute();
                        $uf = $uf->fetchAll();
                        foreach($uf as $key => $value){
                        ?>
                        <option value ="<?php echo $value['cod_estado']; ?>"><?php echo $value['sigla_estado']; ?></option>;
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
                  <select class="form-select" id="floatingSelect" aria-label="estado_civil" name="estado_civil" >
                      <option selected disabled>Selecione</option>
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
                    <input type="text" class="form-control" name="telefone_email" >
                    <label for="floatingName">Telefone e E-mail</label>
                  </div>
                </div>

                <div class="alert alert-primary alert-dismissible fade show"><strong>2. ESCOLARIDADE | 3. TRABALHO</strong></div>
                <div class="col-md-3">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="escolaridade" name="escolaridade" >
                      <option selected disabled>Selecione</option>
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
                  <select class="form-select" id="floatingSelect" aria-label="carteira_assinada" name="carteira_assinada" >
                      <option selected disabled>Selecione</option>
                      <option value ="True">Sim</option>
                      <option value ="False">Não</option>
                    </select>
                    <label for="floatingSelect">Possuir carteira assinada?</label>
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
                <div class="col-md-2">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="dap_caf_ativo" name="dap_caf_ativo" >
                      <option selected disabled>Selecione</option>
                      <option value ="True">Sim</option>
                      <option value ="False">Não</option>
                    </select>
                    <label for="floatingSelect">Ocupante de cargo público?</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="dap_caf_ativo" name="dap_caf_ativo" >
                      <option selected disabled>Selecione</option>
                      <option value ="True">Sim</option>
                      <option value ="False">Não</option>
                    </select>
                    <label for="floatingSelect">Ocupante de cargo público?</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="renda_familiar" placeholder="Renda Familiar</label>
                  </div>" >
                    <label for="floatingName">Renda Familiar R$</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="dap_caf_ativo" name="dap_caf_ativo" >
                      <option selected disabled>Selecione</option>
                      <option value ="True">Sim</option>
                      <option value ="False">Não</option>
                    </select>
                    <label for="floatingSelect">Ocupante de cargo público?</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="dap_caf_ativo" name="dap_caf_ativo" >
                      <option selected disabled>Selecione</option>
                      <option value ="True">Sim</option>
                      <option value ="False">Não</option>
                    </select>
                    <label for="floatingSelect">Caso afirmativo, o exercício do cargo, do emprego ou da função pública é compatível com a exploração da parcela pelo indivíduo ou pelo núcleo familiar?</label>
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
                <div class="col-md-4">
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
                    <input type="text" class="form-control" name="orgao_entidade">
                    <label for="floating">De que modo é realizada a assistência técnica?</label>
                  </div>
                </div>
                  

                <div class="alert alert-primary alert-dismissible fade show" ><strong>5. REPRESENTAÇÃO SOCIAL</strong></div>
                <div class="col-md-7">
                  <label for="floatingSelect">Participação Social</label>
                  <div class="form-floating">
                  <input class="form-check-input" type="checkbox" name="participacao_social[]" value="Associações Comunitárias" />&nbsp;Associações Comunitárias&nbsp;&nbsp;
                  <input class="form-check-input" type="checkbox" name="participacao_social[]" value="Sindicato" />&nbsp;Sindicato&nbsp;&nbsp;
                  <input class="form-check-input" type="checkbox" name="participacao_social[]" value="Cooperativas" />&nbsp;Cooperativas&nbsp;&nbsp;
                  <input class="form-check-input" type="checkbox" name="participacao_social[]" value="Não parcitipa" />&nbsp;Não parcitipa&nbsp;&nbsp;
                  <input class="form-check-input" type="checkbox" name="participacao_social[]" value="Outros" />&nbsp;Outros&nbsp;&nbsp;
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="servico_comunitario" name="servico_comunitario" >
                      <option selected disabled>Selecione</option>
                      <option value ="True">Sim</option>
                      <option value ="False">Não</option>
                    </select>
                    <label for="floatingSelect">Presta serviços de interesse comunitário à comunidade rural ou à vizinhança da área objeto do projeto de Reassentamento?</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="qual_comunitario">
                    <label for="floatingCPFCNPJ">Caso afirmativo, qual?</label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="reforma_agraria" name="reforma_agraria" >
                      <option selected disabled>Selecione</option>
                      <option value ="True">Sim</option>
                      <option value ="False">Não</option>
                    </select>
                    <label for="floatingSelect">Participa ou participou de algum programa de reforma agrária, de regularização fundiária ou de crédito fundiário?</label>
                  </div>
                </div>
                
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="programa_reforma">
                    <label for="floatingCPFCNPJ">Caso afirmativo, qual?</label>
                  </div>
                </div>
               
                <div class="alert alert-primary alert-dismissible fade show" ><strong>6. MORADIA</strong></div>
                
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="tempo_reside">
                    <label for="floatingCPFCNPJ">Reside na Vila há quanto tempo?</label>
                  </div>
                </div>
                
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="onde_reside">
                    <label for="floatingCPFCNPJ">Não Reside na Vila Graça Onde reside?</label>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="tipo_exploracao">
                    <label for="floatingCPFCNPJ">Tipo de Exploração da área</label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="reforma_agraria" name="reforma_agraria" >
                      <option selected disabled>Selecione</option>
                      <option value ="True">Sim</option>
                      <option value ="False">Não</option>
                    </select>
                    <label for="floatingSelect">Possui algum imóvel rural fora da área do imóvel em questão?</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="tipo_exploracao">
                    <label for="floatingCPFCNPJ">Entre Pais/Filho(a)s/Irmão(ã)s, quantos membros de sua família ocupam terras na Agrovila?</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="reforma_agraria" name="reforma_agraria" >
                      <option selected disabled>Selecione</option>
                      <option value ="True">Sim</option>
                      <option value ="False">Não</option>
                    </select>
                    <label for="floatingSelect">Já mudou de endereço nas terras da Agrovila?</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="tipo_exploracao">
                    <label for="floatingCPFCNPJ">Caso afirmativo, porque?</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="reforma_agraria" name="reforma_agraria" >
                      <option selected disabled>Selecione</option>
                      <option value ="True">Sim</option>
                      <option value ="False">Não</option>
                    </select>
                    <label for="floatingSelect">Já vendeu/trocou/negociou terras dentro da Agrovila?</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="tipo_exploracao">
                    <label for="floatingCPFCNPJ">Caso afirmativo, porque?</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="reforma_agraria" name="reforma_agraria" >
                      <option selected disabled>Selecione</option>
                      <option value ="True">Sim</option>
                      <option value ="False">Não</option>
                    </select>
                    <label for="floatingSelect">Sua propriedade é suficiente para o sustento próprio de sua família?</label>
                  </div>
                </div>

                <div class="alert alert-primary alert-dismissible fade show" ><strong>7. INFORMAÇÕES FAMILIARES</strong></div>
                
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="alturaMacico" placeholder="Altura do Maciço (m)">
                    <label for="floatingName">Nº de pessoas residentes no imóvel</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="larguraCoroamento" placeholder="Largura do Coroamento (m)">
                    <label for="floatingCPFCNPJ">Nº de filhos residentes no imóvel</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="extencaoCoroamento" placeholder="Extensão do Coroamento (m)">
                    <label for="floatingName">Nº de filhos residentes no imóvel</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="reforma_agraria" name="reforma_agraria" >
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
                  <input class="form-check-input" type="checkbox" name="participacao_social[]" value="Associações Comunitárias" checked />&nbsp;&nbsp;DECLARO, para os devidos fins, que as informações prestadas neste formulário são verdadeiras e estar ciente e de acordo com todas as regras da SRH e do Código Penal Brasileiro.
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="extencaoCoroamento" placeholder="Extensão do Coroamento (m)">
                    <label for="floatingName">Endereço da Residência</label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="extencaoCoroamento" placeholder="Extensão do Coroamento (m)">
                    <label for="floatingName">Data Cadastro</label>
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