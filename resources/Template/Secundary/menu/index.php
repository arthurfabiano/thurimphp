<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark shadow">
    <div class="container">
        <img src="/assets/img/logo-thurim.png" width="30" height="30" class="shadow" alt="THURIM PHP" title="THURIM PHP" /> 
        <a class="ml-2 navbar-brand" href="/"><b>THURIM PHP</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/sobre">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/documentacao">Documentação</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/posts">Blog</a>
                </li>
            </ul>

            <?php if (!$this->auth->check()) { ?>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="btn btn-sm btn-outline-light" href="/login"><i class="fa fa-sign-in" aria-hidden="true"></i> Entrar</a>
                    <i class="fa fa-ellipsis-v text-white m-2" aria-hidden="true"></i>
                    <a class="btn btn-sm btn-outline-light" href="/user/create"><i class="fa fa-user-plus" aria-hidden="true"></i> Cadastrar</a>
                </div>
            <?php } else { ?>
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $this->auth->name(); ?>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#"><i class="fa fa-user" aria-hidden="true"></i> Perfil</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-cogs" aria-hidden="true"></i> Painel</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</nav>