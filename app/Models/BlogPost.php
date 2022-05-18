<?php

namespace App\Models;

use App\Models\Blog\BlogPostCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BlogPost extends Model
{
    use HasFactory;

    /* Telling Laravel that we don't want to use mass assignment. */
    protected $guarded = [];

    public function blogCategory()
    {
        return $this->belongsTo(BlogPostCategory::class,'category_id','id');
    }
}
