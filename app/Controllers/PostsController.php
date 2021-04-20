<?php 
    namespace App\Controllers;

    use App\Models\Post;
    use App\Models\Category;
    use Core\BaseController;
    use Core\Auth;
    use Core\Redirect;
    use Core\Validator;

    class PostsController extends BaseController {

        private $post;

        public function __construct() {
            parent::__construct();
            $this->post = new Post;
        }

        public function index() {            
            $this->setPageTitle('Posts');
            $this->view->posts = $this->post->All();
            $this->view->title = "Posts";
            return $this->renderView('Posts/index', 'layoutBase');
        }

        public function show($id) {
            $this->view->post = $this->post->find($id);
            $this->setPageTitle("{$this->view->post->title}");
            $this->view->title = "Post";
            return $this->renderView('Posts/show', 'layoutBase');
        }

        public function create() {
            $this->view->categories = Category::All();
            $this->setPageTitle("Novo Post");
            $this->view->title = "Novo Post";
            return $this->renderView('Posts/create', 'layoutBase');
        }


        public function store($request) {
            $data = [
                'user_id'   => $this->auth->id(),
                'title'     => $request->post->title,
                'content'   => $request->post->content
            ];

            if (Validator::make($data, $this->post->rules())){
                return Redirect::route('/posts/create');
            }

            try {
                $result = $this->post->create($data);
                
                if(isset($request->post->category_id)){
                    $result->category()->sync($request->post->category_id);
                }

                return Redirect::route('/posts', [
                    'success' => ['Post Criado Com Sucesso!']
                ]);
            } catch (\Exception $e) {
                return Redirect::route('/posts', [
                    'errors' => [$e->getMessage()]
                ]);
            }
        }

        public function edit($id) {
            $this->view->post = $this->post->find($id);
            $this->view->categories = Category::All();

            $this->setPageTitle('Editar Post');
            $this->view->title = "Editar Post";
            return $this->renderView('Posts/edit', 'layoutBase');
        }

        public function update($id, $request)
        {
            $data = [
                'user_id'   => $this->auth->id(),
                'title'     => $request->post->title,
                'content'   => $request->post->content
            ];

            if (Validator::make($data, $this->post->rules())) {
                return Redirect::route("/posts/{$id}/edit");
            }
            
            try{
                $post = $this->post->find($id);
                $post->update($data);
                if(isset($request->post->category_id)){
                    $post->category()->sync($request->post->category_id);
                }else{
                    $post->category()->detach();
                }
                return Redirect::route('/posts', [
                    'success' => ['Post atualizado com sucesso!']
                ]);
            }catch(\Exception $e){
                return Redirect::route('/posts', [
                    'errors' => [$e->getMessage()]
                ]);
            }
        }

        public function delete($id) {
            try {
                $post = $this->post->find($id);
                if ($this->auth->id() != $post->user->id) {
                    return Redirect::route('/posts', [
                        'errors' => ['Você Não Pode Excluir Post de Outro Autor!']
                    ]);
                }
                $post->delete();
                $post->category()->detach();
                return Redirect::route('/posts', [
                    'success' => ['Post Excluido Com Sucesso!']
                ]);
            } catch (\Exception $e) {
                return Redirect::route('/posts', [
                    'errors' => [$e->getMessage()]
                ]);
            }
        }

    }