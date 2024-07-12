<?php

namespace App\Http\Controllers;

class CategoryController extends Controller
{
    public function categoryIndex()
    {
        return view('Website.category');
    }
}
