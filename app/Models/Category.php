<?php 
    namespace App\Models;

    use Core\BaseModelEloquent;

    class Category extends BaseModelEloquent {

        public $table = "categories";
        public $primaryKey = 'id';

        protected $fillable = ['name', 'description'];

        public $timestamps = false;
        public $createdField = 'created_at';
        public $updatedField = 'updated_at';
        public $deletedField = 'deleted_at';

        public function post() {
            return $this->belongsToMany(Post::class);
        }
    }
