<?php

use App\Models\Favorit;
use Illuminate\Filesystem\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

if (!function_exists('getRoute')) {
    function getRoute($route, $params = null)
    {
        if ($params === null) {
            $params = [app()->getLocale()];
        } else {
            if (gettype($params) == 'array') {
                array_unshift($params, app()->getLocale());
            } else {
                $params = [app()->getLocale(), $params];
            }
        }
        return route($route, $params);
    }
}

if (!function_exists('upload_image')) {
    function upload_image($file, $prefix)
    {
        if ($file) {
            $files = $file;
            $imageName = $prefix . rand(3, 999) . '-' . time() . '.' . $files->extension();
            $image = "storage/" . $imageName;
            $files->move(public_path('storage'), $imageName);
            $getValue = $image;
            return $getValue;
        }
    }
}
if (!function_exists('upload_photo')) {
    function upload_photo($file, $prefix)
    {
        if ($file) {
            $files = $file;
            $imageName = $prefix . rand(3, 999) . '-' . time() . '.' . $files->extension();
            $image = "storage/" . $imageName;
            $files->move(public_path('storage'), $imageName);
            $getValue = $image;
            return $imageName;
        }
    }
}
if (!function_exists('upload_file')) {
    function upload_file($file, $prefix)
    {
        if ($file) {
            $files = $file;
            $imageName = $prefix . rand(3, 999) . '-' . time() . '.' . $files->extension();
            $comming_file = "storage/files/" . $imageName;
            $files->move(public_path('storage/files'), $imageName);
            $getValue = $comming_file;
            return $getValue;
        }
    }
}

if (!function_exists('upload_multifile')) {
    function upload_multifile($file, $prefix)
    {
        if ($file) {
            $files = $file;
            $imageName = $prefix . rand(3, 999) . '-' . time() . '.' . $files->extension();
            $comming_file = "storage/files/" . $imageName;
            $files->move(public_path('storage/files'), $imageName);
            $getValue = $comming_file;
            return $getValue;
        }
    }
}
if (!function_exists('settings')) {
    function settings()
    {
        return App\Models\Setting::first();
    }
}


if (!function_exists('is_active_menu')) {

    function is_active_menu($url)
    {

        return Route::is($url) ? 'menu-item-active' : '';
    }
}


if (!function_exists('auth_id')) {

    function auth_id()
    {
        $user = User::where('id', auth()->user()->id)->first();
        return auth()->user()->id;
    }
}

if (!function_exists('checkFavoriate')) {

    function checkFavoriate($id)
    {
        return Favorit::where('user_id', auth()->user()->id)->where('recipe_id',$id)->first();
    }
}
