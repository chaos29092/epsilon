<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Gallery extends Model
{
    public function galleryCategoryId(){
        return $this->belongsTo(GalleryCategory::class);
    }

    public function galleryCategory(){
        return $this->belongsTo(GalleryCategory::class);
    }
}
