<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <h4 class="cor-title">&raquo; <?php echo $this->view->title; ?></h4>
        </div>
        <div class="col-lg-6 text-right">
            <a href="/posts/<?php echo $this->view->post->id; ?>/edit" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
            <a href="/posts/create" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar</a>
            <a href="/posts/<?php echo $this->view->post->id; ?>/delete" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Deletar</a>
        </div>
    </div>
    <hr/>
    <div class="album py-4 bg-light">
        <div class="container">
            <div class="row pl-4 pr-4">
                <h1 class="cor-title"><?php echo $this->view->post->title; ?></h1>
            </div>
            <hr class="text-black"/>
            <div class="row pl-4 pr-4">
                <p class="text-justify"><?php echo $this->view->post->content; ?></p>
            </div>
        </div>
  </div>
</div>