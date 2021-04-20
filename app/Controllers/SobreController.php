<?php 
    namespace App\Controllers;

    use Core\BaseController;

    class SobreController extends BaseController {

        public function __construct() {
            parent::__construct();
        }

        public function index() {
            $this->setPageTitle('Sobre');
            $this->view->title = "Sobre";
            $this->renderView('Sobre/index', 'layoutBase');
        }
        
        /**
         * Pegando os dados do $request eu consigo criar um metodo 
         * que pega todos os valores de uma vez igual no laravel
         * print_r($request);
         */
        public function show($id, $request) {
            echo $id . '<br/>';
        }

       

    }