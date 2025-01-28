<div class="pagetitle">
    <h1>Biblioteca SRH - Acervo</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="principal">Página Principal</a></li>
        <li class="breadcrumb-item active">Cadastro de Livros</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<div class="col-lg-12">
    <h5 class="card-title">Relação de Livros - Acervo Biblioteca SRH</h5>

    <!-- Table with stripped rows -->
    <table class="table datatable">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Título</th>
          <th scope="col">Autor</th>
          <th scope="col">Editora</th>
          <th scope="col">Gênero</th>
          <th scope="col">ISBN</th>
          <th scope="col">Ano</th>
          <th scope="col">Editar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $livros = MySql::conectar()->prepare("SELECT * FROM `tb_biblioteca_livros`");
        $livros->execute();
        $livros = $livros->fetchAll();
        foreach($livros as $key => $value){
          $info = MySql::conectar()->prepare("SELECT nome_genero FROM tb_biblioteca_livros l INNER JOIN tb_biblioteca_genero g ON l.id_genero = g.id AND l.id = $value[id];");
          $info->execute();
          $info = $info->fetch();
        ?>
        <tr>
          <th scope="row"><?php echo $value['id']; ?></th>
          <td><?php echo mb_strtoupper($value['titulo_livro'], 'UTF-8'); ?></td>
          <td><?php echo mb_strtoupper($value['autor_livro'], 'UTF-8'); ?></td>
          <td><?php echo mb_strtoupper($value['editora_livro'], 'UTF-8'); ?></td>
          <td><?php echo mb_strtoupper($info['nome_genero'], 'UTF-8'); ?></td>
          <td><?php echo mb_strtoupper($value['isbn_livro'], 'UTF-8'); ?></td>
          <td><?php echo $value['ano_livro']; ?></td>
          <td><a href="<?php echo INCLUDE_PATH?>editar-livro?idLivro=<?php echo $value['id']; ?>"><button type="button" class="btn btn-outline-secondary"><i class="bi bi-pencil-square"></i> Editar</button></a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <!-- End Table with stripped rows -->
</div>
