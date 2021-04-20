<?php 
    namespace App\Models;

    use Core\BaseModelEloquent;

    class User extends BaseModelEloquent {

        public $table = "users";
        public $primaryKey = 'id';

        protected $fillable = ['name', 'email', 'password'];

        public $timestamps = false;
        public $createdField = 'created_at';
        public $updatedField = 'updated_at';
        public $deletedField = 'deleted_at';

        public function rulesCreate() {
            return [
                'name' => 'min:4|max:255',
                'email' => 'email|unique:User:email',
                'password' => 'min:6'
            ];
        }

        public function rulesUpdate() {
            return [
                'name' => 'min:4|max:255',
                'email' => "email|unique:User:email:$id",
                'password' => 'min:6'
            ];
        }

        public function post() {
            return $this->hasMany(Post::class);
        }

    }