<?php 
    namespace Core;

    class BaseController {

        protected $view;
        protected $auth;
        protected $errors;
        protected $success;
        protected $inputs;
        
        private $viewPath;
        private $layoutPath;
        private $pageTitle = null;

        public function __construct() {
            
            $this->view = new \stdClass;
            $this->auth = new Auth;
            
            if (Session::get('errors')) {
                $this->errors = Session::get('errors');
                Session::destroy('errors');
            }
            if (Session::get('success')) {
                $this->success = Session::get('success');
                Session::destroy('success');
            }
            if (Session::get('inputs')) {
                $this->inputs = Session::get('inputs');
                Session::destroy('inputs');
            }
        }

        protected function helper() {
            if (file_exists(__DIR__ . "/../app/Config/Autoload.php")) {
                require_once __DIR__ .  "/../app/Config/Autoload.php";
                if (!empty($autoload['helper'])) {
                    foreach ($autoload['helper'] as $value) {
                        if (!strpos($value, "_")) {
                            include_once __DIR__ .  "/Helpers/{$value}.php";
                        } else {
                            include_once __DIR__ .  "/../app/Helpers/{$value}.php";
                        }
                    }
                    } else {
                        echo "O Arquivo Helper não foi carregado!";
                    }
            } else {
                echo "Error Autoload.php Não Existe";
            }
        }

        protected function renderView($viewPath, $layoutPath = null) {
            $this->viewPath = $viewPath;
            $this->layoutPath = $layoutPath;

            if ($layoutPath) {
                return $this->layout();
            } else {
                return $this->content();
            }
        }

        protected function content() {
            if (file_exists(__DIR__ . "/../app/Views/{$this->viewPath}.php")) {
                return require_once __DIR__ .  "/../app/Views/{$this->viewPath}.php";
            } else {
                echo "Error: View Path not Found";
            }
        }

        protected function layout() {
            if (file_exists(__DIR__ . "/../resources/Template/{$this->layoutPath}/index.php")) {
                return require_once __DIR__ .  "/../resources/Template/{$this->layoutPath}/index.php";
            } else {
                echo "Error: Layout Path not Found";
            }
        }

        protected function setPageTitle($pageTitle) {
            $this->pageTitle = $pageTitle;
        }

        protected function getPageTitle($pipe = null) {
            if ($pipe) {
                return $this->pageTitle ." ". $pipe . " ";
            } else {
                return $this->pageTitle;
            }
        }

        public function forbiden(){
            return Redirect::route('/login');
        }
    }