<div class="pagetitle">
    <h1>Biblioteca SRH - Acervo</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="principal">Página Principal</a></li>
        <li class="breadcrumb-item active">Cadastro de Livros</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<!-- Left side columns -->
<div class="col-lg-9">
    <div class="row">

    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Formulário para Cadastro de Livro</h5>
              <?php
              if(isset($_POST['acao'])){
                $titulo = $_POST['titulo_livro'];
                $autor = $_POST['autor_livro'];
                $editora = $_POST['editora_livro'];
                $idGenero = $_POST['id_genero'];
                $isbn = $_POST['isbn_livro'];
                $anoLivro = $_POST['ano_livro'];
                $dataCadastroLivro = date('Y-m-d');

                if($titulo == ''){
                  Painel::alert('erro','O campo Título do Livro precisa ser preenchido!');
                }elseif($autor == ''){
                    Painel::alert('erro','O campo Nome do Autor precisa ser preenchido!');
                  } elseif($editora == ''){
                    Painel::alert('erro','O campo Nome da Editora precisa ser preenchido!');
                  } else {
                      //apenas cadastrar
                    $verificar = MySql::conectar()->prepare("SELECT titulo_livro FROM `tb_biblioteca_livros` WHERE titulo_livro = ? ");
                    $verificar->execute(array($_POST['titulo_livro']));
                    if($verificar->rowCount() == 0){
                      $slug = Painel::generateSlug($titulo);
                      $arr = ['titulo_livro'=>$titulo,'autor_livro'=>$autor,'editora_livro'=>$editora,'id_genero'=>$idGenero,'isbn_livro'=>$isbn,'ano_livro'=>$anoLivro,'data_cadastro_livro'=>$dataCadastroLivro,'slug'=>$slug,'nome_tabela'=>'tb_biblioteca_livros'];
                      Painel::insert($arr);
                      Painel::alert('sucesso','Cadastro do Livro realizado com sucesso!');
                    } else {
                      Painel::alert('erro','Já existe um Livro cadastrado com esse Título!');
                    }
                }
              }
              
              ?>
              <form method="post" class="row g-3">
                <div class="col-md-12">
                  <label for="titulo" class="form-label">Título do Livro</label>
                  <input type="text" name="titulo_livro" class="form-control" >
                </div> 
                <div class="col-md-6">
                  <label for="autor" class="form-label">Autor</label>
                  <input type="text" name="autor_livro" class="form-control" >
                </div>
                <div class="col-md-6">
                  <label for="editora" class="form-label">Editora</label>
                  <input type="text" name="editora_livro" class="form-control" >
                </div>
                <div class="col-md-5">
                  <label for="genero" class="form-label">Gênero</label>
                  <select name="id_genero" class="form-select" required>
                    <option selected disabled value="">Selecione o Gênero</option>
                    <?php
                    $generos = MySql::conectar()->prepare("SELECT * FROM `tb_biblioteca_genero`");
                    $generos->execute();
                    $generos = $generos->fetchAll();

                    foreach($generos as $key => $value){
                    ?>
                    <option value="<?php echo $value['id']; ?>"><?php echo $value['nome_genero']; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="col-md-3">
                  <label for="isbn" class="form-label">ISBN</label>
                  <input type="text" name="isbn_livro" class="form-control" >
                </div>
                <div class="col-md-2">
                  <label for="ano" class="form-label">Ano</label>
                  <input type="text" name="ano_livro" class="form-control" >
                </div>
                <div class="col-md-2">
                  <label for="dataCadastro" class="form-label">Data Cadastro</label>
                  <input type="text" name="data_cadastro_livro" disabled class="form-control" value="<?php echo date('d/m/Y'); ?>">
                </div>
                <div class="text-center">
                  <button type="submit" name="acao" class="btn btn-primary">Cadastrar Livro</button>
                  <button type="reset" class="btn btn-secondary">Limpar Campos</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>
    </div>
</div><!-- End Left side columns -->

<!-- Right side columns -->
<div class="col-lg-3">

    <!-- Recent Activity -->
    <div class="card info-card sales-card">
    <?php
      $sql = MySql::conectar()->prepare("SELECT COUNT(id) as qtd FROM `tb_biblioteca_livros`");
      $sql->execute();
      $sql = $sql->fetch();
    ?>
    <div class="card-body">
        <h5 class="card-title">Livros <span>| Cadastrados</span></h5>
        <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-book-half"></i>
            </div>
            <div class="ps-3">
                <h6><?php echo $sql['qtd']; ?></h6>
            </div>
        </div>
    </div>

    </div><!-- End Recent Activity -->

</div><!-- End Right side columns -->