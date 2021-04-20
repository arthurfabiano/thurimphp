<?php 
    namespace Core;

    class Route {

        private $routes;

        public function __construct(array $routes){
            // $this->routes = $routes;
            $this->setRoutes($routes);
            $this->run();
        }

        private function setRoutes($routes) {
            foreach ($routes as $route){
                $explode = explode('@', $route[1]);
                if(isset($route[2])){
                    $r = [$route[0], $explode[0], $explode[1], $route[2]];
                }else{
                    $r = [$route[0], $explode[0], $explode[1]];
                }
                $newRoutes[] = $r;
            }
            $this->routes = $newRoutes;
        }

        private function getRequest() {
            $obj = new \stdClass; //apenas inicializa um objeto
            foreach ($_GET as $key => $value) {
                @$obj->get->$key = $value;
            }
            foreach ($_POST as $key => $value) {
                @$obj->post->$key = $value;
            }
            return $obj;
        }

        private function getUrl() {
            return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        }

        private function run() {
            $url = $this->getUrl();
            $urlArray = explode('/', $url);

            foreach ($this->routes as $route) {
                $routeArray = explode('/', $route[0]);
                $param = [];
                for ($i=0; $i < count($routeArray); $i++) {
                    if ((strpos($routeArray[$i], "{") !== false) && (count($urlArray) == count($routeArray))) {
                        $routeArray[$i] = $urlArray[$i];
                        $param[] = $urlArray[$i];
                    }
                    $route[0] = implode($routeArray, '/');
                }

                if ($url == $route[0]) {
                    $found = true;
                    $controller = $route[1];
                    $action = $route[2];
                    $auth = new Auth;
                    // var_dump($auth->check());
                    // posso cirar outras regras para isso
                    // Video 60 ele explica
                    if(isset($route[3]) && $route[3] == 'auth' && !$auth->check()){
                        $action = 'forbiden';
                    }
                    break;
                }

                // if ($url == $route[0]) {
                //     echo '0 ' . $route[0] . '<br>'; // /post/45/show
                //     echo '1 ' . $route[1] . '<br>'; // PostsController
                //     echo '2 ' . $route[2] . '<br>'; // show
                //     echo '3 ' . $param[0] . '<br>'; // 45
                //     break;
                // }
            }
            if ($found) {
                $controller = Container::newController($controller);
                switch (count($param)) {
                    case '1':
                        $controller->$action($param[0], $this->getRequest());
                        break;
                    case '2':
                        $controller->$action($param[0], $param[1], $this->getRequest());
                        break;
                    case '3':
                        $controller->$action($param[0], $param[1], $param[2], $this->getRequest());
                        break;
                    case '4':
                        $controller->$action($param[0], $param[1], $param[2]. $param[3], $this->getRequest());
                        break;
                    default:
                        $controller->$action($this->getRequest());
                        break;
                }
            } else {
                Container::pageNotFound();
            }
        } 
    }