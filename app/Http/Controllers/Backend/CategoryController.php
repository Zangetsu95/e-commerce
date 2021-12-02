<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    function CategoryView ()
    {
        $category = Category::latest()->get();
        return view('backend.category.category_view', compact('category'));
    }

    function CategoryStore ()
    {

    }

function CategoryEdit ()
    {

    }

function CategoryUpdate ()
    {

    }

function CategoryDelete ()
    {

    }

}

