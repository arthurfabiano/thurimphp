<?php 
    namespace App\Controllers;

    use Core\BaseController;

    class HomeController extends BaseController {

        public function __construct() {
            parent::__construct();
        }

        public function index() {
            $this->setPageTitle('Home');
            $this->view->title = "Home";
            $this->renderView('Home/index', 'layoutBase');
        }
    }