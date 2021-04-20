<div class="container">
    <!-- <?php $this->renderView('Alerts/_errors'); ?> -->

    <h4 class="cor-title">&raquo; <?php echo $this->view->title; ?></h4>
    <hr/>
    <div class="row">
        <div class="col-lg-6">
            <div class="album py-5 p-4 text-center">
                <img src="/assets/img/logo-thurim.png" width="100" height="100" alt="THURIM PHP" title="THURIM PHP" /> 
                <h5 class="mt-5">THURIM PHP</h5>
                <p>Seja bem vindo ao cadatro de usuário!</p>
            </div>
            
        </div>

        <div class="col-lg-6">
            <div class="album py-5 p-4 bg-light">
                <form action="/user/store" method="POST" accept-charset="utf-8">

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="text" name="name" class="form-control <?php echo (isset($this->errors['name'])) ? 'is-invalid' : ''; ?>" placeholder="Nome" value="<?php echo (isset($this->inputs['name'])) ? $this->inputs['name'] : ''; ?>">
                            <?php if ($this->errors['name']) { ?>
                                <div class="help-block text-danger"><?php echo $this->errors['name'] ?></div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="text" name="email" class="form-control <?php echo (isset($this->errors['email'])) ? 'is-invalid' : ''; ?>" placeholder="Email" value="<?php echo (isset($this->inputs['email'])) ? $this->inputs['email'] : ''; ?>">
                            <?php if ($this->errors['email']) { ?>
                                <div class="help-block text-danger"><?php echo $this->errors['email'] ?></div>
                            <?php } ?>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="password" name="password" class="form-control <?php echo (isset($this->errors['password'])) ? 'is-invalid' : ''; ?>" placeholder="Password">
                            <?php if ($this->errors['password']) { ?>
                                <div class="help-block text-danger"><?php echo $this->errors['password'] ?></div>
                            <?php } ?>
                        </div>
                    </div>

                    <button type="reset" class="btn btn-secondary"><i class="fa fa-reply" aria-hidden="true"></i> Cancelar</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-user-plus" aria-hidden="true"></i> Cadastrar</button>

                </form>        
            </div>
        </div>
    </div>
</div>