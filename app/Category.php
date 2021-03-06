<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
class Category extends Model
{
    protected $fillable = [
        'name','description',
    ];
    public function post(){
    	return $this->hasMany(Post::class);
    }
}
