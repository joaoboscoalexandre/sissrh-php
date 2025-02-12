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
              <br/><br/>
              <center><img src="assets/img/Logotipo_SRH.png" alt=""></center>
              <center><h5 class="card-title"><strong>Formulário de Cadastro para Barragem de Acumulação de Água</strong><br/>
              Lei Federal nº 12.334/2010 e Portaria nº 2.747/2017 - SRH/CE</h5></center>
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
                $mail->setFrom('cadastrobarragem@jbwebdesigner.com.br', 'Cadastro de Barragem no site da SRH');
                $mail->addAddress('brenda.carneiro@srh.ce.gov.br', 'Brenda Carneiro');
                $mail->addAddress('joao.bosco@srh.ce.gov.br', 'João Bosco Alexandre');
                $mail->addAddress('amanda.farias@srh.ce.gov.br', 'Amanda Farias');
                $mail->Subject = 'Nova Barragem cadastrada no site da SRH';
                $mail->msgHTML(file_get_contents('message.html'), __DIR__);
                $mail->Body = 'Olá Brenda Carneiro! Uma nova barragem foi cadastrada com sucesso! Clique <a href="http://intranet.srh.ce.gov.br/externos/sissrh_v1/" target="_blank">aqui</a> para conferir detalhes e informações importantes..';
                //$mail->addAttachment('test.txt');
                if($mail->send()){
                  Painel::alert('sucesso','Sua barragem foi cadastrada com sucesso na Secretaria dos Recursos Hídricos - SRH.<br/> Para maiores informações ligar para o Setor de Segurança de Barragens (85) 3492-9233.'); 
                } 

              } 

                /*
                echo "I. IDENTIFICAÇÃO DO EMPREENDEDOR<br/>";
                echo "Nome empreendedor: ".$nm_nome."<br/>";
                echo "CPF ou CNPJ empreendedor: ".$ds_cpf_cnpj."<br/>";
                echo "Endereço empreendedor: ".$ds_endereco."<br/>";
                echo "Email empreendedor: ".$ds_email."<br/>";
                echo "Tel. Fixo empreendedor: ".$ds_telefone."<br/>";
                echo "Celular empreendedor: ".$ds_celular."<br/>";
                echo "Qtd de Barragem: ".$ds_total_barragem."<br/>";
                echo "Nome empreendedor2: ".$nm_nome2."<br/>";
                echo "CPF ou CNPJ empreendedor2: ".$ds_cpf_cnpj2."<br/>";
                echo "Endereço empreendedor2: ".$ds_endereco2."<br/>";
                echo "Email empreendedor2: ".$ds_email2."<br/>";
                echo "Tel. Fixo empreendedor: ".$ds_telefone2."<br/>";
                echo "Celular empreendedor2: ".$ds_celular2."<br/><br/><br/>";
                echo "II. IDENTIFICAÇÃO DA BARRAGEM<br/>";
                echo "Nome da Barragem: ".$nm_nome_barragem."<br/>";
                echo "Denominação da Barragem: ".$ds_denominacao_barragem."<br/>";
                echo "Município da Barragem: ".$nome_municipio."<br/>";
                echo "Coordenada N: " .$nr_coordenadan."<br/>";
                echo "Coordenada E: " .$nr_coordenadae."<br/><br/><br/>";
                echo "III. USOS DA BARRAGEM<br/>";
                echo "Usos barragem: ". $ds_finalidade_barragem ."<br />";
                echo "IV. IDENTIFICAÇÃO DA BARRAGEM PRINCIPAL<br/>";
                echo "Tipo de Barragem: ".$ds_tipo_barragem."<br/>";
                echo "Altura Maciço: ".$ds_altura_macico."<br/>";
                echo "largura Coroamento: ".$ds_largura_coroamento."<br/>";
                echo "Extensão Coroamento: ".$ds_extensao_coroamento."<br/>";
                echo "Capacidade do Reservatório: ".$ds_capacidade_reservatorio."<br/>";
                echo "Tipo de Vertedouro: ".$ds_tipo_vertedouro."<br/>";
                echo "Data preenchimento: ".$dt_preenchimento."<br/>";
                
                */

              ?>
              <div class="alert alert-primary alert-dismissible fade show"><strong>I. IDENTIFICAÇÃO DO EMPREENDEDOR</strong></div>
              <!-- Floating Labels Form -->
              <form method="post" class="row g-3">
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="nomeEmpreendedor" placeholder="Nome Completo" required>
                    <label for="floatingName">Nome Completo</label>
                  </div>
                </div>

                <div class="col-md-2">
                <select name="empreendedor1" class="form-select" required>
                  <option value="" selected disabled >Selecione Físico ou Jurídico</option>
                  <option value="fisico">Fisico</option>
                  <option value="juridico">Jurídico</option>
                </select>
                </div>
                
                <div class="col-md-2">
                  <div ref="cpf" class="form-floating">
                    <input type="text" name="cpf1" class="form-control" placeholder="CPF" >
                    <label for="floatingCPFCNPJ">CPF</label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div style="display: none;" ref="cnpj" class="form-floating">
                    <input type="text" name="cnpj1" class="form-control" placeholder="CNPJ" >
                    <label for="floatingCPFCNPJ">CNPJ</label>
                  </div>
                </div>

                <div class="col-md-8">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="endereco" placeholder="Endereço Completo"  required>
                    <label for="floatingName">Endereço Completo</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="email" class="form-control" name="email" placeholder="Seu E-mail">
                    <label for="floatingEmail">Seu E-mail</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="tel_celular" placeholder="Telefone Celular" required>
                    <label for="floatingName">Telefone Celular</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="tel_fixo" placeholder="Telefone Fixo">
                    <label for="floatingName">Telefone Fixo</label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="number" class="form-control" name="qtd_bar" placeholder="Qtd de Barragem" >
                    <label for="floatingName">Qtd total de barragens</label>
                  </div>
                </div>

                <div class="alert alert-secondary alert-dismissible fade show">
                Tem mais de 01 (um) empreendedor?&nbsp;&nbsp; 
                <input class="form-check-input" type="radio" name="gridRadio" id="gridRadios" value="sim">&nbsp;Sim&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="gridRadio" id="gridRadios" value="não" checked>&nbsp;&nbsp;Não, caso afirmativo preecher as informações abaixo.
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="nomeEmpreendedor2" placeholder="Nome Completo">
                    <label for="floatingName">Nome Completo</label>
                  </div>
                </div>
                <div class="col-md-2">
                <select name="empreendedor2" class="form-select" >
                    <option value="fisico">Fisico</option>
                    <option value="juridico">Jurídico</option>
                  </select>
                </div>
                
                <div class="col-md-2">
                  <div ref="cpf" class="form-floating">
                    <input type="text" name="cpf2" class="form-control" placeholder="CPF" >
                    <label for="floatingCPFCNPJ">CPF</label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div style="display: none;" ref="cnpj" class="form-floating">
                    <input type="text" name="cnpj2" class="form-control" placeholder="CNPJ" >
                    <label for="floatingCPFCNPJ">CNPJ</label>
                  </div>
                </div>

                <div class="col-md-5">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="endereco2" placeholder="Endereço Completo" >
                    <label for="floatingName">Endereço Completo</label>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="email" class="form-control" name="email2" placeholder="Seu E-mail">
                    <label for="floatingEmail">Seu E-mail</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="tel_celular2" placeholder="Telefone Celular">
                    <label for="floatingName">Telefone Celular</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="tel_fixo2" placeholder="Telefone Fixo">
                    <label for="floatingName">Telefone Fixo</label>
                  </div>
                </div>

                <br/><br/><br/>
                <div class="alert alert-primary alert-dismissible fade show"><strong>II. IDENTIFICAÇÃO DA BARRAGEM</strong></div>
                <div class="col-md-7">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="nomeBarragem" placeholder="Nome da Barragem" >
                    <label for="floatingName">Nome da Barragem</label>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="denominacaoBarragem" placeholder="Denominação Popular (se houver)">
                    <label for="floatingCPFCNPJ">Denominação Popular (se houver)</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="Municipio" name="municipiobarragem" >
                      <option selected disabled>Selecione o Município</option>
                      <?php
                        $municipios = PgSql::conectar()->prepare("SELECT * FROM sissrh.tbadmin_municipio ORDER BY nome_municipio");
                        $municipios->execute();
                        $municipios = $municipios->fetchAll();
                        foreach($municipios as $key => $value){
                        ?>
                        <option value ="<?php echo $value['cod_municipio']; ?>"><?php echo $value['nome_municipio']; ?></option>;
                      <?php } ?>
                    </select>
                    <label for="floatingSelect">Município</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">UF: CE</div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="coord_N" maxlength="20" >
                    <label for="floatingName">UTM: Coordenada N:</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="coord_E" maxlength="20" >
                    <label for="floatingName">UTM: Coordenada E:</label>
                  </div>
                </div>

                <br/><br/><br/>
                <div class="alert alert-primary alert-dismissible fade show"><strong>III. USOS DA BARRAGEM</strong></div>
                <div class="col-md-12">
                  <div class="form-floating">
                  <input class="form-check-input" type="checkbox" name="usoBarragem[]" value="Abastecimento Humano" />&nbsp;Abastecimento Humano&nbsp;&nbsp;
                  <input class="form-check-input" type="checkbox" name="usoBarragem[]" value="Dessendentação Animal" />&nbsp;Dessendentação Animal&nbsp;&nbsp;
                  <input class="form-check-input" type="checkbox" name="usoBarragem[]" value="Abastecimento Industrial" />&nbsp;Abastecimento Industrial&nbsp;&nbsp;
                  <input class="form-check-input" type="checkbox" name="usoBarragem[]" value="Irrigação" />&nbsp;Irrigação&nbsp;&nbsp;
                  <input class="form-check-input" type="checkbox" name="usoBarragem[]" value="Regularização de Vazões" />&nbsp;Regularização de Vazões&nbsp;&nbsp;
                  <input class="form-check-input" type="checkbox" name="usoBarragem[]" value="Piscicultura" />&nbsp;Piscicultura&nbsp;&nbsp;
                  <input class="form-check-input" type="checkbox" name="usoBarragem[]" value="Controle de Cheias" />&nbsp;Controle de Cheias&nbsp;&nbsp;
                  <input class="form-check-input" type="checkbox" name="usoBarragem[]" value="Recreação" />&nbsp;Recreação&nbsp;&nbsp;</br>
                  <input class="form-check-input" type="checkbox" name="usoBarragem[]" value="Outros Usos" />&nbsp;Outros Usos:&nbsp;&nbsp; <input type="text" class="form-control" name="usoBarragem[]" maxlength="50" />
                  </div>
                </div>

                <br/><br/><br/>
                <div class="alert alert-primary alert-dismissible fade show"><strong>IV. IDENTIFICAÇÃO DA BARRAGEM PRINCIPAL</strong></div>
                <div class="alert alert-secondary alert-dismissible fade show">
                Tem informações das características técnicas da barragem?&nbsp;&nbsp; <input class="form-check-input" type="radio" name="gridRadio" id="gridRadios" value="option">&nbsp;&nbsp;Sim&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="gridRadio" id="gridRadios" value="option" checked>&nbsp;&nbsp;Não, caso afirmativo preecher as informações abaixo.
                </div>
                <div class="alert alert-secondary alert-dismissible fade show"><center><strong>TIPO DE BARRAGEM PRINCIPAL</strong></center></div>
                <div class="col-md-12">
                  <div class="form-floating">
                  <input class="form-check-input" type="radio" name="tipoBarragem" value="Concreto">&nbsp;&nbsp;Concreto&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="tipoBarragem" value="Terra">&nbsp;&nbsp;Terra&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="tipoBarragem" value="Enrocamento">&nbsp;&nbsp;Enrocamento&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="tipoBarragem" value="Alvenaria de Argamassa">&nbsp;&nbsp;Alvenaria de Argamassa&nbsp;&nbsp;&nbsp;
                  </div>
                </div>

                <div class="alert alert-secondary alert-dismissible fade show"><center><strong>BARRAGEM PRINCIPAL</strong></center></div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="alturaMacico" placeholder="Altura do Maciço (m)">
                    <label for="floatingName">Altura do Maciço (m)</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="larguraCoroamento" placeholder="Largura do Coroamento (m)">
                    <label for="floatingCPFCNPJ">Largura do Coroamento (m)</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="extencaoCoroamento" placeholder="Extensão do Coroamento (m)">
                    <label for="floatingName">Extensão do Coroamento (m)</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="capacidadeReservatorio" placeholder="Capacidade do Reservatório (m&sup3;)">
                    <label for="floatingCPFCNPJ">Capacidade do Reservatório (m&sup3;)</label>
                  </div>
                </div>

                <br/><br/><br/>
                <div class="alert alert-primary alert-dismissible fade show"><center><strong>ESTRUTURA EXTRAVASSORA PRINCIPAL (SANGRADOURO)</strong></center></div>
                <div class="alert alert-secondary alert-dismissible fade show">
                Tem vertedouro/Sangradouro?&nbsp;&nbsp; <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1">&nbsp;&nbsp;Sim&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2" checked>&nbsp;&nbsp;Não
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                  <input class="form-check-input" type="radio" name="tipoVertedouro" value="Canal Escavado">&nbsp;&nbsp;Canal Escavado&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="tipoVertedouro" value="Com Comportas">&nbsp;&nbsp;Com Comportas&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="tipoVertedouro" value="Perfil Creager">&nbsp;&nbsp;Perfil Creager&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="tipoVertedouro" value="OutroTipoVertedouro">&nbsp;&nbsp;Outro&nbsp;&nbsp;&nbsp;
                  </div>
                </div>

                <div class="text-center">
                    <br/>
                  <button type="submit" name="acao" value="cadastrar" class="btn btn-primary">Cadastrar Barragem</button>
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