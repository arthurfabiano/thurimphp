<div class="container">
    <!-- <?php $this->renderView('Alerts/_errors'); ?> -->

    <h4 class="cor-title">&raquo; <?php echo $this->view->title; ?></h4>
    <hr/>
    <form action="/posts/<?php echo $this->view->post->id; ?>/update" method="POST" accept-charset="utf-8">
        <div class="row">
            <div class="col-lg-9">
                <div class="album py-5 p-4 bg-light">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="text" name="title" class="form-control <?php echo (isset($this->errors['title'])) ? 'is-invalid' : ''; ?>" value="<?php echo (isset($this->inputs['title'])) ? $this->inputs['title'] : $this->view->post->title; ?>">
                            <?php if ($this->errors['title']) { ?>
                                <div class="help-block text-danger"><?php echo $this->errors['title'] ?></div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <textarea name="content" class="form-control <?php echo (isset($this->errors['content'])) ? 'is-invalid' : ''; ?>" id="conteudo" rows="10" width="100%"><?php echo (isset($this->inputs['content'])) ? $this->inputs['content'] : $this->view->post->content; ?></textarea>
                            <?php if ($this->errors['content']) { ?>
                                <div class="help-block text-danger"><?php echo $this->errors['content'] ?></div>
                            <?php } ?>
                        </div>
                    </div>
                    <button type="reset" class="btn btn-secondary">Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Cadastrar</button>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="album py-5 p-4 bg-light">
                    <h5 class="text-center cor-title">Categorias</h5>  
                    <hr/>
                    <?php foreach ($this->view->categories as $cat) : ?>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="category_id[]" id="<?php echo $cat->name; ?>" value="<?php echo $cat->id; ?>"
                                <?php foreach ($this->view->post->category as $item)
                                    echo ($cat->id == $item->id) ? 'checked' : '';
                                ?>
                            >
                            <label class="form-check-label" for="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            
        </div>
    </form>        
</div>