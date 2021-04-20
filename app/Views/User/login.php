<div class="container">
    <?php $this->renderView('Alerts/_errors'); ?>

    <h4 class="cor-title">&raquo; <?php echo $this->view->title; ?></h4>
    <hr/>
    <div class="row">
        <div class="col-lg-6">
            <div class="album py-5 p-4 text-center">
                <img src="/assets/img/logo-thurim.png" width="100" height="100" alt="THURIM PHP" title="THURIM PHP" /> 
                <h5 class="mt-5">THURIM PHP</h5>
                <p>Faça o Login para Começarmos</p>
            </div>
            
        </div>

        <div class="col-lg-6">
            <div class="album py-5 p-4 bg-light">
                <form action="/login/auth" method="POST" accept-charset="utf-8">

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo (isset($this->inputs['email'])) ? $this->inputs['email'] : ''; ?>">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                    </div>

                    <button type="reset" class="btn btn-secondary"><i class="fa fa-reply" aria-hidden="true"></i> Cancelar</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-sign-in" aria-hidden="true"></i> Entrar</button>

                </form>        
            </div>
        </div>
    </div>
</div>