<?php

    namespace Core;

    use App\Models\User;

    trait Authenticate
    {
        public function login()
        {
            $this->setPageTitle('Login');
            $this->view->title = "Logar no Sistema";
            return $this->renderView('User/login', 'layout');
        }

        public function auth($request)
        {
            $result = User::where('email', $request->post->email)->first();
            if($result && password_verify($request->post->password, $result->password)){
                $user = [
                    'id'    => $result->id,
                    'name'  => $result->name,
                    'email' => $result->email
                ];
                Session::set('user', $user);
                return Redirect::route('/');
                // var_dump(Session::get('user'));die();
            }
    
            return Redirect::route('/login', [
                'errors' => ['Usuário ou senha estão incorretos'],
                'inputs' => ['email' => $request->post->email]
            ]);
        }

        public function logout()
        {
            Session::destroy('user');
            return Redirect::route('/login');
        }
    }