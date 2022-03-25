<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\CommentsRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\KitchenType;
use App\Models\Recipe;
use App\Models\User;
use App\Models\View;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public function index()
    {
        $recipes = Recipe::paginate(10);
        $categories = Category::all();
        $kitchenTypes = KitchenType::all();
        return view('site.recipes.index', compact('recipes', 'categories', 'kitchenTypes'));
    }

    public function show($id)
    {
        $check_view = View::where('recipe_id', $id)->where('user_ip', request()->ip())->first();
        if (!$check_view) {
            $view = new View();
            $view->user_ip = request()->ip();
            $view->recipe_id = $id;
            $view->save();
        }
        $all_recipes = Recipe::orderBy('id', 'desc')->take(4)->get();
        $recipe = Recipe::with('view')->findorfail($id);
        $categories = Category::all();
        $comments = Comment::where('recipe_id', $id)->where('comment_status', 'approved')->get(); // get comments from database
        return view('site.recipes.show', compact('all_recipes', 'recipe', 'categories', 'comments'));
    }

    public function search_recipes()
    {
        $searchCat = $_GET['selectCategoryVal'];
        $searchKit = $_GET['selectKitchenVal'];

        $recipe_id = Recipe::where('category_id', 'like', '%' . $searchCat . '%')->Where('kitchen_type_id', 'like', '%' . $searchKit . '%')->pluck('id')->toArray();
        $recipes_result = Recipe::whereIn('id', $recipe_id)->get();
        $views = [];
        foreach ($recipes_result as $recipe) {
            $views[] = $recipe->view->count();
        }
        if ($recipes_result) {
            $data['recipe'] = $recipes_result;
            $data['views'] = $views;
            return response()->json([
                'success' => $data,
            ]);
        }
    }

    public function sendComment(CommentsRequest $request)
    {
        $commentVal = new Comment();
        $commentVal->recipe_id = $request->recipe_id;
        $commentVal->user_id = $request->user_id;
        $commentVal->name = $request->name;
        $commentVal->email = $request->email;
        $commentVal->comment = $request->comment;
        $commentVal->save();

        if ($commentVal) {
            $data['comment_data'] = $commentVal;
            return response()->json([
                'success' => $data,
            ]);
        }
    }
}
