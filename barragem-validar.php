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
              <center><h5 class="card-title">Formulário de Cadastro para Barragem de Acumulação de Água<br/>
              Lei Federal nº 12.334/2010 e Portaria nº 2.747/2017 - SRH/CE</h5></center>
              <br/><br/>
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
                
                $municipio = $_POST['municipio'];
                $nr_coordenadan = $_POST['coord_N'];
                $nr_coordenadae = $_POST['coord_E'];
                $ds_finalidade_barragem = $_POST['usoBarragem'];

                $ds_tipo_barragem = $_POST['tipoBarragem'];
                $ds_altura_macico = $_POST['alturaMacico'];
                $ds_largura_coroamento = $_POST['larguraCoroamento'];
                $ds_extensao_coroamento = $_POST['extencaoCoroamento'];
                $ds_tipo_vertedouro = $_POST['tipoVertedouro'];
                $ds_capacidade_reservatorio = $_POST['capacidadeReservatorio'];
                $dt_registro = date('Y-m-d');
                $cadastro_aprovado = true;
                $registro = 001;       
                
                $query = PgSql::conectar()->prepare("UPDATE sissrh.tbbarragem_cadastro SET empreendedor=?, cpf_cnpj=?, endereco=?, email=?, telefone=?, celular=?, total_barragem=?, empreendedor2=?, cpf_cnpj2=?, endereco2=?, email2=?, telefone2=?, celular2=?, nome_barragem=?, denominacao_barragem=?, municipio=?, coordenadan=?, coordenadae=?, finalidade_barragem=?, tipo_barragem=?, altura_macico=?, largura_coroamento=?, extensao_coroamento=?, tipo_vertedouro=?, capacidade_reservatorio=?, cadastro_aprovado=?, numero_registro=?, data_registro=?
                WHERE cod_barragem = ?");
                $query->execute(array($nm_nome, $ds_cpf_cnpj, $ds_endereco, $ds_email, $ds_telefone, $ds_celular, $ds_total_barragem, $nm_nome2, $ds_cpf_cnpj2, $ds_endereco2, $ds_email2, $ds_telefone2, $ds_celular2, $nm_nome_barragem, $ds_denominacao_barragem, $municipio, $nr_coordenadan, $nr_coordenadae, $ds_finalidade_barragem, $ds_tipo_barragem, $ds_altura_macico, $ds_largura_coroamento, $ds_extensao_coroamento, $ds_tipo_vertedouro, $ds_capacidade_reservatorio, $cadastro_aprovado, $registro, $dt_registro, $_GET['codBarragem'] ));               
                   Painel::alert('sucesso','Dados da barragem atualizados com sucesso! Foi gerado o Registro de Identificação do Empreendedor.'); 
                } 
 
              ?>
              <?php

              $barragem = PgSql::conectar()->prepare(" SELECT * FROM sissrh.tbbarragem_cadastro WHERE cod_barragem = $_GET[codBarragem] ");
              $barragem->execute();
              $barragem = $barragem->fetch();
              ?>

              <div class="alert alert-primary alert-dismissible fade show" >
                I. IDENTIFICAÇÃO DO EMPREENDEDOR
              </div>
              <!-- Floating Labels Form -->
              <form method="post" class="row g-3">
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="nomeEmpreendedor" placeholder="Nome Completo" value="<?php echo $barragem['empreendedor']; ?> " >
                    <label for="floatingName">Nome Completo</label>
                  </div>
                </div>

                <div class="col-md-2">
                <select name="empreendedor1" class="form-select" >
                  <option value="" disabled>Selecione o tipo</option>
                  <?php
                    $qtd = strlen($barragem['cpf_cnpj']);
                    if($qtd < 15){
                      echo '<option selected value="fisico">Fisico</option>';
                      echo '<option value="juridico">Jurídico</option>';
                      
                    }else {
                      echo '<option value="fisico">Fisico</option>';
                      echo '<option selected value="juridico">Jurídico</option>';
                    }
                  ?>
                </select>
                </div>
                
                <div class="col-md-2">
                  <div ref="cpf" class="form-floating">
                    <input type="text" name="cpf1" class="form-control" placeholder="CPF" value="<?php echo $barragem['cpf_cnpj']; ?>" >
                    <label for="floatingCPFCNPJ">CPF</label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div style="display: none;" ref="cnpj" class="form-floating">
                    <input type="text" name="cnpj1" class="form-control" placeholder="CNPJ" value="<?php echo $barragem['cpf_cnpj']; ?>" >
                    <label for="floatingCPFCNPJ">CNPJ</label>
                  </div>
                </div>

                <div class="col-md-8">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="endereco" placeholder="Endereço Completo" value="<?php echo $barragem['endereco']; ?>" >
                    <label for="floatingName">Endereço Completo</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="email" class="form-control" name="email" placeholder="Seu E-mail" value="<?php echo $barragem['email']; ?>">
                    <label for="floatingEmail">Seu E-mail</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="tel_celular" placeholder="Telefone Celular" value="<?php echo $barragem['celular']; ?>" >
                    <label for="floatingName">Telefone Celular</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="tel_fixo" placeholder="Telefone Fixo" value="<?php echo $barragem['telefone']; ?>">
                    <label for="floatingName">Telefone Fixo</label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="number" class="form-control" name="qtd_bar" placeholder="Qtd de Barragem" value="<?php echo $barragem['total_barragem']; ?>">
                    <label for="floatingName">Qtd total de barragens</label>
                  </div>
                </div>

                <div class="alert alert-secondary alert-dismissible fade show">
                Tem mais de 01 (um) empreendedor?&nbsp;&nbsp; <input class="form-check-input" type="radio" name="checkBoxSubordinados" id="possui" value="yes">&nbsp;&nbsp;Sim&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="checkBoxSubordinados" id="naoPossui" value="no" checked>&nbsp;&nbsp;Não
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="nomeEmpreendedor2" placeholder="Nome Completo" value="<?php echo $barragem['empreendedor2']; ?>">
                    <label for="floatingName">Nome Completo</label>
                  </div>
                </div>
                <div class="col-md-2">
                <select name="empreendedor2" class="form-select" >
                  <option value="" disabled>Selecione o tipo</option>
                <?php
                    $qtd = strlen($barragem['cpf_cnpj2']);
                    if($qtd < 15){
                      echo '<option selected value="fisico">Fisico</option>';
                      echo '<option value="juridico">Jurídico</option>';
                      
                    }else {
                      echo '<option value="fisico">Fisico</option>';
                      echo '<option selected value="juridico">Jurídico</option>';
                    }
                  ?>
                  </select>
                </div>
                
                <div class="col-md-2">
                  <div ref="cpf" class="form-floating">
                    <input type="text" name="cpf2" class="form-control" placeholder="CPF" value="<?php echo $barragem['cpf_cnpj2']; ?>" >
                    <label for="floatingCPFCNPJ">CPF</label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div style="display: none;" ref="cnpj" class="form-floating">
                    <input type="text" name="cnpj2" class="form-control" placeholder="CNPJ" value="<?php echo $barragem['cpf_cnpj2']; ?>" >
                    <label for="floatingCPFCNPJ">CNPJ</label>
                  </div>
                </div>

                <div class="col-md-5">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="endereco2" placeholder="Endereço Completo" value="<?php echo $barragem['endereco2']; ?>">
                    <label for="floatingName">Endereço Completo</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="email" class="form-control" name="email2" placeholder="Seu E-mail" value="<?php echo $barragem['email2']; ?>">
                    <label for="floatingEmail">Seu E-mail</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="tel_celular2" placeholder="Telefone Celular" value="<?php echo $barragem['celular2']; ?>">
                    <label for="floatingName">Telefone Celular</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="tel_fixo2" placeholder="Telefone Fixo" value="<?php echo $barragem['telefone2']; ?>">
                    <label for="floatingName">Telefone Fixo</label>
                  </div>
                </div>

                <br/><br/><br/>
                <div class="alert alert-primary alert-dismissible fade show" >
                II. IDENTIFICAÇÃO DA BARRAGEM
                </div>
                <div class="col-md-7">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="nomeBarragem" placeholder="Nome da Barragem" value="<?php echo $barragem['nome_barragem']; ?>">
                    <label for="floatingName">Nome da Barragem</label>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="denominacaoBarragem" placeholder="Denominação Popular (se houver)" value="<?php echo $barragem['denominacao_barragem']; ?>">
                    <label for="floatingCPFCNPJ">Denominação Popular (se houver)</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                  <input type="text" class="form-control" name="municipio" placeholder="Nome do Município" value="<?php echo $barragem['municipio']; ?>">
                    <label for="floatingSelect">Município</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-floating">UF: CE</div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="coord_N" maxlength="20" value="<?php echo $barragem['coordenadan']; ?>">
                    <label for="floatingName">UTM: Coordenada N:</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="coord_E" maxlength="20" value="<?php echo $barragem['coordenadae']; ?>">
                    <label for="floatingName">UTM: Coordenada E:</label>
                  </div>
                </div>

                <br/><br/><br/>
                <div class="alert alert-primary alert-dismissible fade show" >
                III. USOS DA BARRAGEM
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                  <input type="text" class="form-control" name="usoBarragem" value="<?php echo $barragem['finalidade_barragem']; ?>">
                  <label for="floatingName">Uso da Barragem:</label>
                  </div>
                </div>

                <br/><br/><br/>
                <div class="alert alert-primary alert-dismissible fade show" >
                IV. IDENTIFICAÇÃO DA BARRAGEM PRINCIPAL
                </div>
                <div class="alert alert-secondary alert-dismissible fade show">
                Tem informações das características técnicas da barragem?&nbsp;&nbsp; <input class="form-check-input" type="radio" name="gridRadio" id="gridRadios" value="option">&nbsp;&nbsp;Sim&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="gridRadio" id="gridRadios" value="option" checked>&nbsp;&nbsp;Não
                </div>
                <div class="alert alert-secondary alert-dismissible fade show"><center>TIPO DE BARRAGEM PRINCIPAL</center></div>
                <div class="col-md-12">
                  <div class="form-floating">
                  <input type="text" class="form-control" name="tipoBarragem" value="<?php echo $barragem['tipo_barragem']; ?>">
                  <label for="floatingName">Tipo de Barragem Principal:</label>
                  </div>
                </div>

                <div class="alert alert-secondary alert-dismissible fade show"><center>BARRAGEM PRINCIPAL</center></div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="alturaMacico" placeholder="Altura do Maciço (m)" value="<?php echo $barragem['altura_macico']; ?>">
                    <label for="floatingName">Altura do Maciço (m)</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="larguraCoroamento" placeholder="Largura do Coroamento (m)" value="<?php echo $barragem['largura_coroamento']; ?>">
                    <label for="floatingCPFCNPJ">Largura do Coroamento (m)</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="extencaoCoroamento" placeholder="Extensão do Coroamento (m)" value="<?php echo $barragem['extensao_coroamento']; ?>">
                    <label for="floatingName">Extensão do Coroamento (m)</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="capacidadeReservatorio" placeholder="Capacidade do Reservatório (m&sup3;)" value="<?php echo $barragem['capacidade_reservatorio']; ?>">
                    <label for="floatingCPFCNPJ">Capacidade do Reservatório (m&sup3;)</label>
                  </div>
                </div>

                <br/><br/><br/>
                <div class="alert alert-primary alert-dismissible fade show"><center>ESTRUTURA EXTRAVASSORA PRINCIPAL (SANGRADOURO)</center></div>
                <div class="alert alert-secondary alert-dismissible fade show">
                Tem vertedouro/Sangradouro?&nbsp;&nbsp; <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1">&nbsp;&nbsp;Sim&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2" checked>&nbsp;&nbsp;Não
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                  <input type="text" class="form-control" name="tipoVertedouro" value="<?php echo $barragem['tipo_vertedouro']; ?>">
                  <label for="floatingName">Tipo de Vertedouro/Sangradouro:</label>
                  </div>
                </div>

                <div class="text-center">
                  <br/>
                  <button type="submit" name="acao" value="validar" class="btn btn-primary">Validar e Gerar RIE</button>
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