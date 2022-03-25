<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('site.categories.index', compact('categories'));
    }

    public function show($id)
    {
        $recipes = Recipe::where('category_id', $id)->get();
        return view('site.categories.show', compact('recipes'));
    }
}
