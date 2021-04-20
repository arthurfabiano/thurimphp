<div class="container">
    <div class="row">
        <div class="col-lg-6">
          
            <h4 class="cor-title">&raquo; <?php echo $this->view->title; ?></h4>
          
        </div>
        <div class="col-lg-6 text-right">
            <?php if($this->auth->check()) : ?>
              <a href="/posts/create" class="btn btn-sm btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar</a>
            <?php endif; ?>
        </div>
    </div>
    <hr/>
    
    <?php $this->renderView('Alerts/_errors'); ?>
    <?php $this->renderView('Alerts/_success'); ?>

    <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
        <?php foreach ($this->view->posts as $post) { ?>
          <div class="col-md-3">
            <div class="card mb-3 shadow-sm">

            <img src="/assets/img/bg-thurim-03.png" width="100%" height="160" class="" alt="THURIM PHP" title="THURIM PHP" /> 
            
              <div class="card-body">
                <strong class="text-justify"><a href="/posts/<?php echo $post->id; ?>/show"><?php echo $post->title; ?></a></strong>
                <hr/>
                <p class="card-text text-justify"><?php echo substr($post->content, 0 , 100); ?></p>

                <div class="d-flex justify-content-between align-items-center">
                  <?php if($this->auth->check() && $post->user->id == $this->auth->id()) : ?>
                    <div class="btn-group">
                      <a href="/posts/<?php echo $post->id; ?>/show" type="button" class="btn btn-sm btn-outline-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                      <a href="/posts/<?php echo $post->id; ?>/edit" type="button" class="btn btn-sm btn-outline-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                      <a href="/posts/<?php echo $post->id; ?>/delete" type="button" class="btn btn-sm btn-outline-danger" onCLick="return confirm('Deseja Deletar Este Post?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </div>
                  <?php endif; ?>

                  <small class="text-muted">
                    <b>Author:</b> <?php echo $post->user->name . '<br/>' . '<b>Email:</b> ' .$post->user->email; ?>
                  </small>
                </div>

              </div>

            </div>
          </div>
        <?php } ?>
      </div>
      
    </div>
  </div>
</div>