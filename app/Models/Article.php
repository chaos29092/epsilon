<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    public function categoryId(){
        return $this->belongsTo(Category::class);
    }
}
