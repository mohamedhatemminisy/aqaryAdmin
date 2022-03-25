<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Favorit;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function saveFavorite(Request $request)
    {
        $checkFav = Favorit::where('recipe_id', $request->favorite)->where('user_id', auth()->user()->id)->first();
        if (!$checkFav) {
            $favoriteVal = new Favorit();
            $favoriteVal->recipe_id  = $request->favorite;
            $favoriteVal->user_id  = auth()->user()->id;
            $favoriteVal->save();
            return response()->json([
                'success' => 'true'
            ]);
        } else {
            $checkFav->delete();
            return response()->json([
                'success' => 'false'
            ]);
        }
    }

    public function removeFavorite(Request $request)
    {
        $checkFav = Favorit::where('recipe_id', $request->favorite)->where('user_id', auth()->user()->id)->first();
        $checkFav->delete();
        return response()->json([
            'success' => 'false'
        ]);
    }
}
