<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'category_id',
        'author_id',
        'title',
        'content',
        'status',
        'published_at'

        ];

}
