<?php 
    namespace App\Controllers;

    use App\Models\User;
    use Core\BaseController;
    use Core\Redirect;
    use Core\Validator;
    use Core\Authenticate;
    use Core\Email;

    class UserController extends BaseController {

        use Authenticate;
        private $user;
        private $mail;

        public function __construct() {
            parent::__construct();
            $this->user = new User;
            $this->mail = new Email(true);
        }

        public function login() {
            $this->setPageTitle("Realizar Login");
            $this->view->title = "Realizar Login";
            return $this->renderView('User/login', 'layoutBase');
        }
        
        public function create() {
            $this->setPageTitle("Criar Usuário");
            $this->view->title = "Criar Usuário";
            return $this->renderView('User/create', 'layoutBase');
        }

        public function store($request) {
            $data = [
                'name' => $request->post->name,
                'email' => $request->post->email,
                'password' => $request->post->password
            ];

            if (Validator::make($data, $this->user->rulesCreate())){
                return Redirect::route('/user/create');
            }

            $data['password'] = password_hash($request->post->password, PASSWORD_BCRYPT);

            try {
                $this->user->create($data);
                // $this->mail->send($data['email']);
                return Redirect::route('/', [
                    'success' => ['Usuário Criado Com Sucesso!']
                ]);
            } catch (\Exception $e) {
                return Redirect::route('/', [
                    'errors' => [$e->getMessage()]
                ]);
            }
        }
       

    }