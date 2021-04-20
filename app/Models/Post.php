<?php 
    namespace App\Models;

    use Core\BaseModelEloquent;

    class Post extends BaseModelEloquent {

        public $table = "posts";
        public $primaryKey = 'id';

        protected $fillable = ['user_id', 'title', 'content'];

        public $timestamps = false;
        public $createdField = 'created_at';
        public $updatedField = 'updated_at';
        public $deletedField = 'deleted_at';

        public function rules() {
            return [
                'title' => 'min:5|max:255',
                'content' => 'min:10'
            ];
        }

        public function user() {
            return $this->belongsTo(User::class);
        }

        public function category() {
            return $this->belongsToMany(Category::class);
        }        
    }
