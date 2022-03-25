<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\PasswordRequest;
use App\Http\Requests\Site\UserRequest;
use App\Models\Recipe;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $recipes = Recipe::paginate(10);
        return view('site.profile', compact('recipes'));
    }
    /**
     * Update user data
     *
     * @param User $user
     * @param UpdateUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, UserRequest $request)
    {
        $user_data = User::find(auth()->user()->id);
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = upload_image($request->file('image'), 'image');
        } else {
            unset($data['image']);
            // $data['image'] = asset('') . 'admin/assets/media/users/blank.png';
        }
        $user_data->fill($data)->save();
        return redirect()->route('site.profile')->withSuccess(__('User updated successfully.'));
    }

    public function update_password(User $user, PasswordRequest $request)
    {
        $user_data = User::find(auth()->user()->id);
        $data = $request->all();
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $user->password;
        }
        $user_data->fill($data)->save();
        return redirect()->route('site.profile')->withSuccess(__('User updated successfully.'));
    }
}
