<div class="pagetitle">
    <h1>Cadastro de Livros</h1>
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
              <h5 class="card-title">Formulário para cadastro de livro</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">
                <div class="col-md-12">
                  <label for="titulo" class="form-label">Título do Livro</label>
                  <input type="text" name="titulo" class="form-control" required >
                </div> 
                <div class="col-md-6">
                  <label for="autor" class="form-label">Autor</label>
                  <input type="email" name="autor" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label for="editora" class="form-label">Editora</label>
                  <input type="text" name="editora" class="form-control" required>
                </div>
                <div class="col-md-5">
                  <label for="genero" class="form-label">Gênero</label>
                  <select name="genero" class="form-select">
                    <option selected disabled>Selecione o gênero</option>
                    <option value="Recursos Hídricos">Recursos Hídricos</option>
                    <option value="Recursos Hídricos">Ação</option>
                    <option value="Recursos Hídricos">Ficção</option>
                    <option value="Recursos Hídricos">Romance</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <label for="isbn" class="form-label">ISBN</label>
                  <input type="text" name="isbn" class="form-control" >
                </div>
                <div class="col-md-2">
                  <label for="ano" class="form-label">Ano</label>
                  <input type="text" name="ano" class="form-control" >
                </div>
                <div class="col-md-2">
                  <label for="dataCadastro" class="form-label">Data Cadastro</label>
                  <input type="text" name="dataCadastro" disabled class="form-control" value="<?php echo date('d/m/Y'); ?>">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Cadastrar</button>
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

    <div class="card-body">
        <h5 class="card-title">Livros <span>| Cadastrados</span></h5>
        <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-cart"></i>
            </div>
            <div class="ps-3">
                <h6>145</h6>
            </div>
        </div>
    </div>

    </div><!-- End Recent Activity -->

</div><!-- End Right side columns -->