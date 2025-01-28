<?php

    if(isset($_GET['idGenero'])){
        $idGenero = (int)$_GET['idGenero'];
        $genero = Painel::select('tb_biblioteca_genero','id=?',array($idGenero));   
    } else {
        Painel::alert('erro','Você precisa selecionar um Gênero para editar!');
    }
?>


<div class="pagetitle">
    <h1>Biblioteca SRH - Acervo</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="principal">Página Principal</a></li>
        <li class="breadcrumb-item active">Cadastro de Gênero</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<!-- Left side columns -->
<div class="col-lg-9">
    <div class="row">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Formulário para Editar Gênero</h5>

              <!-- Multi Columns Form -->
              <?php
                    if(isset($_POST['acao'])){
                      $nomeGenero = $_POST['genero'];
                       if($_POST['genero'] == ''){
                        Painel::alert('erro','Por favor, preencha o Nome do Gênero.');
                       } else {
                        $verificar = MySql::conectar()->prepare("SELECT nome_genero FROM `tb_biblioteca_genero` WHERE nome_genero = ? ");
                        $verificar->execute(array($_POST['genero']));
                        if($verificar->rowCount() == 0){
                          $slug = Painel::generateSlug($nomeGenero);
                          $arr = ['nome_genero'=>$nomeGenero,'data_cadastro_genero'=>date('Y-m-d'),'slug'=>$slug,'id'=>$idGenero,'nome_tabela'=>'tb_biblioteca_genero'];
                          Painel::update($arr);
                          $genero = Painel::select('tb_biblioteca_genero','id=?',array($idGenero));
                          Painel::alert('sucesso','Gênero Atualizado com sucesso!');
                        } else {
                          Painel::alert('erro','Já existe um Gênero cadastrado com esse Nome!');
                        }
                       } 
                    } 
                ?>
              <form method="post" class="row g-3">
                <div class="col-md-10">
                  <label for="genero" class="form-label">Nome do Gênero</label>
                  <input type="text" name="genero" class="form-control" value="<?php echo $genero['nome_genero']; ?>">
                </div>
                <div class="col-md-2">
                  <label for="dataCadastro" class="form-label">Data da Atualização</label>
                  <input type="text" name="dataCadastro" disabled class="form-control" value="<?php echo date('d/m/Y'); ?>">
                </div>
                <div class="text-center">
                  <button type="submit" name="acao" class="btn btn-primary">Atualizar</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
        </div>
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Gêneros Cadastrados</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Gênero</th>
                    <th scope="col">Data Cadastro</th>
                    <th scope="col">Editar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $generos = MySql::conectar()->prepare("SELECT * FROM `tb_biblioteca_genero` ");
                    $generos->execute();
                    $generos = $generos->fetchAll();

                    foreach($generos as $key => $value){
                  ?>
                  <tr>
                    <th scope="row"><?php echo $value['id']; ?></th>
                    <td><?php echo $value['nome_genero']; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($value['data_cadastro_genero'])) ; ?></td>
                    <td><a href="<?php echo INCLUDE_PATH?>editar-genero?idGenero=<?php echo $value['id']; ?>"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-pencil-square"></i> Editar</button></a></td>
                  </tr>
                 <?php
                    }
                    ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>
    </div>
</div><!-- End Left side columns -->

<!-- Right side columns -->
<div class="col-lg-3">

    <!-- Recent Activity -->
    <div class="card info-card sales-card">
    <?php
      $sql = MySql::conectar()->prepare("SELECT COUNT(id) as qtd FROM `tb_biblioteca_genero`");
      $sql->execute();
      $sql = $sql->fetch();
    ?>
    <div class="card-body">
        <h5 class="card-title">Gêneros <span>| Cadastrados</span></h5>
        <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-distribute-vertical"></i>
            </div>
            <div class="ps-3">
                <h6><?php echo $sql['qtd']; ?></h6>
            </div>
        </div>
    </div>

    </div><!-- End Recent Activity -->
</div><!-- End Right side columns -->

