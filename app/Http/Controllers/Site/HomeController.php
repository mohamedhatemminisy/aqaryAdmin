<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Favorit;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::take(9)->get();
        $recipes = Recipe::take(9)->get();
        $popular = Page::where('identifier', 'popular_post')->first();
        $gallery = Gallery::take(6)->get();
        return view('site.index', compact('categories', 'recipes', 'gallery', 'popular'));
    }

    public function about()
    {
        $about = Page::where('identifier', 'about_page')->first();
        $gallery = Gallery::take(6)->get();
        return view('site.about', compact('about', 'gallery'));
    }
    public function contact()
    {
        return view('site.contact');
    }

    public function search_category()
    {
        $searchContent = $_GET['searchCategoryVal'];
        $category_id = CategoryTranslation::where('title', 'like', '%' . $searchContent . '%')->pluck('category_id')->toArray();
        $categories_result = Category::whereIn('id', $category_id)->get();
        $count = [];
        foreach ($categories_result as $category) {
            $count[] = $category->recipe->count();
        }

        if ($categories_result) {
            $data['category'] =  $categories_result;
            $data['count'] =   $count;
            return response()->json([
                'success' => $data,
            ]);
        }
    }
}
