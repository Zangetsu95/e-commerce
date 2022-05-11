<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BlogPostCategory extends Model
{
    use HasFactory;

   /* Telling Laravel that we don't want to use mass assignment. */
    protected $guarded = [];
}
