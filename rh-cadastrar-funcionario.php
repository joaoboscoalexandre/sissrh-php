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
          <a class="nav-link " data-bs-target="#tables-rh" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person-bounding-box"></i><span>Recursos Humanos</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="tables-rh" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
            <li>
              <a href="rh-cadastrar-funcionario.php" class="active">
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
      <h1>Cadastro de Funcionários</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Principal</a></li>
          <li class="breadcrumb-item">Cadastrar Funcionários</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">

        <?php
        if (!isset($_GET['atualizar'])) {
        ?>
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Formulário para Cadastro de Funcionário</h5>
                <?php

                if (isset($_POST['acao']) && $_POST['acao'] == 'cadastrar') {                  
                  // Dados do formulário
                  $matricula = $_POST['matricula'];
                  $nome = $_POST['nome'];
                  $login = $_POST['login'];
                  $senha = $_POST['senha'];
                  $cpf = $_POST['cpf'];
                  $dataNascimento = $_POST['dataNascimento'];
                  $sexo = $_POST['sexo'];
                  $nomePai = $_POST['nomePai'];
                  $nomeMae = $_POST['nomeMae'];
                  $cep = $_POST['cep'];
                  $endereco = $_POST['endereco'];
                  $bairro = $_POST['bairro'];
                  $cidade = $_POST['cidade'];
                  $email = $_POST['email'];
                  $celular = $_POST['celular'];
                  $ramal = $_POST['ramal'];
                  $estadoCivil = $_POST['estadoCivil'];
                  $tipoFuncionario = $_POST['codTipoFuncionario'];
                  $grupoOcupacional = $_POST['codGrupoOcupacional'];
                  $status = $_POST['status'];
                  $dataCadastro = date('Y-m-d');

                  $sql = PgSql::conectar()->prepare(" INSERT INTO sissrh.tbrh_funcionario(matricula, nome, login, email, cpf, sexo, endereco, bairro, cep, telefone, celular, data_nascimento, nome_pai, estado_civil, senha, cod_tipo_funcionario, cod_grupo_ocupacional, inativo, nome_mae, cidade, cadastro)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ");
                  $sql->execute(array($matricula,$nome,$login,$email,$cpf,$sexo,$endereco,$bairro,$cep,$ramal,$celular,$dataNascimento,$nomePai,$estadoCivil,$senha,$tipoFuncionario,$grupoOcupacional,$status,$nomeMae,$cidade,$dataCadastro));
                  
                  Painel::alert('sucesso', 'Funcionário cadastrado com sucesso!');
                }

                ?>

                <form method="post" class="row g-3">
                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="text" name="matricula" class="form-control" required>
                      <label for="matricula" class="form-label">Matrícula:</label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-floating">
                      <input type="text" name="nome" class="form-control" required>
                      <label for="nome" class="form-label">Nome Completo:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="text" name="login" class="form-control" required>
                      <label for="login" class="form-label">Login:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="password" name="senha" class="form-control" required>
                      <label for="senha" class="form-label">Senha:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="text" name="cpf" class="form-control" required>
                      <label for="cpf" class="form-label">CPF:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="date" name="dataNascimento" class="form-control" required>
                      <label for="dataNascimento" class="form-label">Data de Nascimento:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating mb-3">
                      <select name="sexo" class="form-select" required>
                        <option disabled selected value="">Selecione</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Masculino">Masculino</option>
                      </select>
                      <label for="sexo" class="form-label">Sexo:</label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-floating">
                      <input type="text" name="nomePai" class="form-control" required>
                      <label for="nomePai" class="form-label">Nome do Pai:</label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-floating">
                      <input type="text" name="nomeMae" class="form-control" required>
                      <label for="nomeMae" class="form-label">Nome da Mãe:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="text" name="cep" id="cep" class="form-control" value="" maxlength="9" onblur="pesquisacep(this.value);" required>
                      <label for="cep" class="form-label">CEP:</label>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-floating">
                      <input type="text" name="endereco" id="endereco" class="form-control" required>
                      <label for="endereco" class="form-label">Endereço:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="text" name="bairro" id="bairro" class="form-control" required>
                      <label for="bairro" class="form-label">Bairro:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="text" name="cidade" id="cidade" class="form-control" required>
                      <label for="cidade" class="form-label">Cidade:</label>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-floating">
                      <input type="email" name="email" class="form-control" required>
                      <label for="email" class="form-label">E-mail:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="text" name="celular" class="form-control" required>
                      <label for="celular" class="form-label">Celular:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="text" name="ramal" class="form-control" required>
                      <label for="ramal" class="form-label">Ramal SRH:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating mb-3">
                      <select name="estadoCivil" class="form-select" required>
                        <option disabled selected value="">Selecione</option>
                        <option value="Casado">Casado</option>
                        <option value="Solteiro">Solteiro</option>
                        <option value="Separado">Separado</option>
                        <option value="Divorciado">Divorciado</option>
                        <option value="Viuvo">Viuvo</option>
                        <option value="Outros">Outros</option>
                      </select>
                      <label for="ds_estado_civil" class="form-label">Estado Civil:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating mb-3">
                      <select name="codTipoFuncionario" class="form-select" required>
                        <option disabled selected value="">Selecione</option>
                        <option value="1">Servidor</option>
                        <option value="2">Terceirizado</option>
                        <option value="3">Prestador</option>
                        <option value="4">Estagiário</option>
                        <option value="5">Cargo em Comissão</option>
                        <option value="6">Cedido</option>
                      </select>
                      <label for="cd_tipo_funcionario" class="form-label">Tipo de Funcionário:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating mb-3">
                      <select name="codGrupoOcupacional" class="form-select" required>
                        <option disabled selected value="">Selecione</option>
                        <option value="1">ADO</option>
                        <option value="2">ANS</option>
                        <option value="3">Não se aplilca</option>
                      </select>
                      <label for="cd_tipo_funcionario" class="form-label">Grupo Ocupacional:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating mb-3">
                      <select name="status" class="form-select" required>
                        <option disabled selected value="">Selecione</option>
                        <option value="false">Ativo</option>
                        <option value="true">Inativo</option>
                      </select>
                      <label for="status" class="form-label">Status:</label>
                    </div>
                  </div>

                  <div class="text-center mt-3">
                    <button type="submit" name="acao" value="cadastrar" class="btn btn-primary">Cadastrar Novo Funcionário</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        <?php
        } else {
        ?>

          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Formulário de Atualização Dados do Funcionário</h5>

                <?php

                if(isset($_GET['atualizar'])){ $codFunc = $_GET['atualizar']; }

                  if (isset($_POST['acao']) && $_POST['acao'] == 'atualizar') {
                  // Dados do formulário
                  $codFuncionario = $_POST['cod_funcionario'];
                  $matricula = $_POST['matricula'];
                  $nome = $_POST['nome'];
                  $login = $_POST['login'];
                  $senha = $_POST['senha'];
                  $cpf = $_POST['cpf'];
                  $dataNascimento = $_POST['dataNascimento'];
                  $sexo = $_POST['sexo'];
                  $nomePai = $_POST['nomePai'];
                  $nomeMae = $_POST['nomeMae'];
                  $cep = $_POST['cep'];
                  $endereco = $_POST['endereco'];
                  $bairro = $_POST['bairro'];
                  $cidade = $_POST['cidade'];
                  $email = $_POST['email'];
                  $celular = $_POST['celular'];
                  $ramal = $_POST['ramal'];
                  $estadoCivil = $_POST['estadoCivil'];
                  $tipoFuncionario = $_POST['codTipoFuncionario'];
                  $grupoOcupacional = $_POST['codGrupoOcupacional'];
                  $status = $_POST['status'];
                  $dataModificado = date('Y-m-d');
                  $imagem = $_FILES['imagem'];
                  $imagem_atual = $_POST['imagem_atual'];

                  if($imagem['name'] != ''){
                    Painel::deleteFile($imagem);
                    //Existe o upload da imagem.

                  $sql = PgSql::conectar()->prepare("UPDATE sissrh.tbrh_funcionario SET matricula=?,nome=?,login=?,email=?,cpf=?,sexo=?,endereco=?,bairro=?,cep=?,telefone=?,celular=?,data_nascimento=?,nome_pai=?,estado_civil=?,senha=?,cod_tipo_funcionario=?,cod_grupo_ocupacional=?,inativo=?,nome_mae=?,cidade=?,modificado=?,imagem=? WHERE cod_funcionario=? ");
                  $sql->execute(array($matricula,$nome,$login,$email,$cpf,$sexo,$endereco,$bairro,$cep,$ramal,$celular,$dataNascimento,$nomePai,$estadoCivil,$senha,$tipoFuncionario,$grupoOcupacional,$status,$nomeMae,$cidade,$dataModificado,$imagem,$codFuncionario ));
                  Painel::alert('sucesso', 'As informações do funcionário foram atualizadas com sucesso!');

                  }
                }

                ?>

                <?php
                  $query = PgSql::conectar()->prepare("SELECT * FROM sissrh.tbrh_funcionario WHERE cod_funcionario = ?");
                  $query->execute(array($codFunc));
                  $funcionario = $query->fetch();
                ?>

                <form method="post" class="row g-3" enctype="multipart/form-data" >

                  <input type="hidden" name="cod_funcionario" value="<?php echo $funcionario['cod_funcionario']; ?>" >

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="text" name="matricula" class="form-control" value="<?php echo $funcionario['matricula']; ?>" required>
                      <label for="matricula" class="form-label">Matrícula:</label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-floating">
                      <input type="text" name="nome" class="form-control" value="<?php echo $funcionario['nome']; ?>" required>
                      <label for="nome" class="form-label">Nome Completo:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="text" name="login" class="form-control" value="<?php echo $funcionario['login']; ?>" required>
                      <label for="login" class="form-label">Login:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="password" name="senha" class="form-control" value="<?php echo $funcionario['senha']; ?>" required>
                      <label for="senha" class="form-label">Senha:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="text" name="cpf" class="form-control" value="<?php echo $funcionario['cpf']; ?>" required>
                      <label for="cpf" class="form-label">CPF:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="date" name="dataNascimento" class="form-control" value="<?php echo $funcionario['data_nascimento']; ?>" required>
                      <label for="dataNascimento" class="form-label">Data de Nascimento:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating mb-3">
                      <select name="sexo" class="form-select" required>
                        <option selected value="<?php echo $funcionario['sexo']; ?>"><?php echo $funcionario['sexo']; ?></option>
                        <option value="Feminino">Feminino</option>
                        <option value="Masculino">Masculino</option>
                      </select>
                      <label for="sexo" class="form-label">Sexo:</label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-floating">
                      <input type="text" name="nomePai" class="form-control" value="<?php echo $funcionario['nome_pai']; ?>" required>
                      <label for="nomePai" class="form-label">Nome do Pai:</label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-floating">
                      <input type="text" name="nomeMae" class="form-control" value="<?php echo $funcionario['nome_mae']; ?>" required>
                      <label for="nomeMae" class="form-label">Nome da Mãe:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="text" name="cep" id="cep" class="form-control" maxlength="9" onblur="pesquisacep(this.value);" value="<?php echo $funcionario['cep']; ?>" required>
                      <label for="cep" class="form-label">CEP:</label>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-floating">
                      <input type="text" name="endereco" class="form-control" value="<?php echo $funcionario['endereco']; ?>" required>
                      <label for="endereco" class="form-label">Endereço:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="text" name="bairro" class="form-control" value="<?php echo $funcionario['bairro']; ?>" required>
                      <label for="bairro" class="form-label">Bairro:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="text" name="cidade" class="form-control" value="<?php echo $funcionario['cidade']; ?>" required>
                      <label for="cidade" class="form-label">Cidade:</label>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-floating">
                      <input type="email" name="email" class="form-control" value="<?php echo $funcionario['email']; ?>" required>
                      <label for="email" class="form-label">E-mail:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="text" name="celular" class="form-control" value="<?php echo $funcionario['celular']; ?>" required>
                      <label for="celular" class="form-label">Celular:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating">
                      <input type="text" name="ramal" class="form-control" value="<?php echo $funcionario['telefone']; ?>" >
                      <label for="ramal" class="form-label">Ramal SRH:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating mb-3">
                      <select name="estadoCivil" class="form-select" required>
                        <option selected value="<?php echo $funcionario['estado_civil']; ?>"><?php echo $funcionario['estado_civil']; ?></option>
                        <option value="Casado">Casado</option>
                        <option value="Solteiro">Solteiro</option>
                        <option value="Separado">Separado</option>
                        <option value="Divorciado">Divorciado</option>
                        <option value="Viuvo">Viuvo</option>
                        <option value="Outros">Outros</option>
                      </select>
                      <label for="estadoCivil" class="form-label">Estado Civil:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating mb-3">
                      <select name="codTipoFuncionario" class="form-select" required>
                        <option selected value="<?php echo $funcionario['cod_tipo_funcionario']; ?>"><?php 
                        switch ($funcionario['cod_tipo_funcionario']) {
                          case '1': echo 'Servidor'; 
                          break;
                          case '1': echo 'Servidor'; 
                          break;
                          case '2': echo 'Terceirizado'; 
                          break;
                          case '3': echo 'Prestador'; 
                          break;
                          case '4': echo 'Estagiário'; 
                          break;
                          case '5': echo 'Cargo em Comissão'; 
                          break;
                          case '6': echo 'Cedido'; 
                          break;
                          default: echo 'SELECIONE'; 
                          break;
                        }
                        ?></option>
                        <option value="1">Servidor</option>
                        <option value="2">Terceirizado</option>
                        <option value="3">Prestador</option>
                        <option value="4">Estagiário</option>
                        <option value="5">Cargo em Comissão</option>
                        <option value="6">Cedido</option>
                      </select>
                      <label for="codTipoFuncionario" class="form-label">Tipo de Funcionário:</label>

                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating mb-3">
                      <select name="codGrupoOcupacional" class="form-select" required>
                      <option selected value="<?php echo $funcionario['cod_grupo_ocupacional']; ?>"><?php
                        switch ($funcionario['cod_grupo_ocupacional']) {
                          case 1: echo 'ADO'; 
                          break;
                          case 2: echo 'ANS'; 
                          break;
                          case 3: echo 'Não se aplilca'; 
                          break;
                          default: echo 'SELECIONE'; 
                          break;
                        } 
                        ?></option>
                        <option value="1">ADO</option>
                        <option value="2">ANS</option>
                        <option value="3">Não se aplilca</option>
                      </select>
                      <label for="codGrupoOcupacional" class="form-label">Grupo Ocupacional:</label>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-floating mb-3">
                      <select name="status" class="form-select" required>
                        <option value="false" <?php echo  $funcionario['inativo'] == "false" ? 'selected' : ''; ?>>Ativo</option>
                        <option value="true" <?php echo  $funcionario['inativo'] == "false" ? 'selected' : ''; ?>>Inativo</option>
                      </select>
                      <label for="status" class="form-label">Status:</label>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Imagem Perfil do Usuário</label>
                    <div class="col-sm-6">
                      <input class="form-control" name="imagem" type="file" id="formFile">
                      <input class="form-control" name="imagem_atual" type="hidden" id="formFile" value="<?php echo $_SESSION['imagem']; ?>">
                    </div>
                  </div>

                  <div class="text-center mt-3">
                    <button type="submit" name="acao" value="atualizar" class="btn btn-success">Atualizar Informações do Funcionário</button>
                  </div>
                </form>

              </div>
            </div>
          </div>

        <?php
        }
        ?>

      </div>

      <!-- Lista de Funcionários -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Lista de Funcionários</h5>
          </div>
          <?php
        if(isset($_POST['acao']) && $_POST['acao'] == "movimentar"){

          $codFuncionario = $_POST['cod_funcionario'];
          $codEmpresa = $_POST['cod_empresa'];
          $codEstrutura = $_POST['cod_estrutura_organizacional'];
          $observacao = $_POST['observacao'];
          $dataMovimentacao = date('Y/m/d');

          $query = PgSql::conectar()->prepare("SELECT COUNT(cod_funcionario) as qtd FROM sissrh.tbrh_movimentacao WHERE cod_funcionario = ?");
          $query->execute(array($codFuncionario));
          $query = $query->fetch()['qtd'];
          if($query == 0){
  
            $sql = PgSql::conectar()->prepare("INSERT INTO sissrh.tbrh_movimentacao(cod_funcionario, cod_empresa, cod_estrutura_organizacional, observacao, data_movimentacao)
            VALUES (?, ?, ?, ?, ?); ");
            $sql->execute(array($codFuncionario,$codEmpresa,$codEstrutura,$observacao,$dataMovimentacao));
            Painel::alert('sucesso', 'Funcionário movimentado com sucesso!');

          }else{

            $sql = PgSql::conectar()->prepare("DELETE FROM sissrh.tbrh_movimentacao WHERE cod_funcionario = ? ");
            $sql->execute(array($codFuncionario));
            
            $sql = PgSql::conectar()->prepare("INSERT INTO sissrh.tbrh_movimentacao(cod_funcionario, cod_empresa, cod_estrutura_organizacional, observacao, data_movimentacao)
            VALUES (?, ?, ?, ?, ?); ");
            $sql->execute(array($codFuncionario,$codEmpresa,$codEstrutura,$observacao,$dataMovimentacao));
            Painel::alert('sucesso', 'Funcionário movimentado com sucesso!');

          }

        }
      ?>

          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">Matrícula:</th>
                <th scope="col">Nome:</th>
                <th scope="col">Login:</th>
                <th scope="col">E-mail:</th>
                <th scope="col">CPF:</th>
                <th scope="col">Ações:</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Recupera a lista de funcionários
              $funcionarios = PgSql::conectar()->prepare("SELECT * FROM sissrh.tbrh_funcionario ORDER BY nome ASC");
              $funcionarios->execute();
              $funcionarios = $funcionarios->fetchAll(); // Retorna os resultados como array associativo

              foreach ($funcionarios as $value) { ?>
                <tr>
                  <td><?php echo $value['matricula']; ?></td>
                  <td><?php echo $value['nome']; ?></td>
                  <td><?php echo $value['login']; ?></td>
                  <td><?php echo $value['email']; ?></td>
                  <td><?php echo $value['cpf']; ?></td>
                  <td><center>
                    <a href="<?php echo INCLUDE_PATH; ?>rh-cadastrar-funcionario.php?atualizar=<?php echo $value['cod_funcionario']; ?>"><i class="bi bi-pencil-square"></i></a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#movimentarFuncionario<?php echo $value['cod_funcionario']; ?>"><i class="bi bi-shuffle"></i></a>
                    </center>
                  </td>
                </tr>

                <!-- Large Modal -->
                <div class="modal fade" id="movimentarFuncionario<?php echo $value['cod_funcionario']; ?>" tabindex="-1">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="card-title">Formulário para movimentação de funcionário</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>

                      <div class="modal-body">
                        <!-- Multi Columns Form -->
                      <form method="post" >
                      <input type="hidden" name="cod_funcionario" value="<?php echo $value['cod_funcionario']; ?>">
                      <div class="row g-3">

                        <div class="col-md-5">
                          <div class="form-floating">
                          <input type="text" class="form-control" name="nome" value="<?php echo $value['nome']; ?>" disabled>
                          <label for="nome_funcionario" class="form-label">Nome do Funcionário</label>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-floating">
                          <select class="form-select" id="floatingSelect" aria-label="Estrutura" name="cod_estrutura_organizacional" required >
                              <option selected disabled value="">Selecione a Estrutura Organizacional</option>
                              <?php
                                $estrutura = PgSql::conectar()->prepare("SELECT * FROM sissrh.tbrh_estrutura_organizacional ORDER BY cod_estrutura_organizacional ASC ");
                                $estrutura->execute();
                                $estrutura = $estrutura->fetchAll();
                                foreach($estrutura as $key => $value){
                                ?>
                                <option value ="<?php echo $value['cod_estrutura_organizacional']; ?>"><?php echo $value['nome_estrutura_organizacional']; ?></option>;
                              <?php } ?>
                            </select>
                            <label for="floatingSelect">Estrutura Organizacional</label>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-floating">
                          <select class="form-select" id="floatingSelect" aria-label="Empresa" name="cod_empresa" required>
                              <option selected disabled value="">Selecione a Empresa</option>
                              <?php
                                $empresa = PgSql::conectar()->prepare("SELECT * FROM sissrh.tbrh_empresa ORDER BY cod_empresa ASC ");
                                $empresa->execute();
                                $empresa = $empresa->fetchAll();
                                foreach($empresa as $key => $value){
                                ?>
                                <option value ="<?php echo $value['cod_empresa']; ?>"><?php echo $value['sigla_empresa']; ?></option>;
                              <?php } ?>
                            </select>
                            <label for="floatingSelect">Empresa</label>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <label for="inputPassword" class="col-sm-3 col-form-label">Observação</label>
                          <textarea class="form-control" name="observacao" style="height: 100px"></textarea>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                          <button type="submit" name="acao" value="movimentar" class="btn btn-primary">Movimentar Funcionário</button>
                        </div>

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

      </tbody>
      </table>
      </div>
      </div>
      </div>
    </section>

  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <?php include('footer.php'); ?>

</body>

</html>