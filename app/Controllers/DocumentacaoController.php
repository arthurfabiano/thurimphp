<?php 
    namespace App\Controllers;

    use Core\BaseController;

    class DocumentacaoController extends BaseController {

        public function __construct() {
            parent::__construct();
        }

        public function index() {
            $this->setPageTitle('Documentação');
            $this->view->title = "Documentacao";
            $this->renderView('Documentacao/index', 'layoutBase');
        }
    }