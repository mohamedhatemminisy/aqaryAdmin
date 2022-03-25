<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Hash;

class UserController  extends BaseController
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'email' => 'required|email',
            'password' => 'required',

        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['name'] =  $user->name;
            $success['email'] =  $user->email;
            $success['phone'] =  $user->phone;
            $success['id'] =  $user->id;

            return $this->sendResponse($success, 'Login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Login info not falid']);
        }
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'phone' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;
        $success['email'] =  $user->email;
        $success['phone'] =  $user->phone;
        $success['id'] =  $user->id;
        return $this->sendResponse($success, 'User register successfully.');
    }

    public function logout(Request $request)
    {
        $user = Auth::user()->token();
        $user->revoke();
        return response()->json([
            'status' => 'true',
            'data' => [],
        ]);
    }

    public function update_prodile(Request $request)
    {
        $validator = Validator::make($request->formDataFields, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user = User::findOrfail(Auth()->user()->id);
        $user->fill($request->formDataFields)->save();
        $success['name'] =  $user->name;
        $success['email'] =  $user->email;
        $success['phone'] =  $user->phone;
        $success['id'] =  $user->id;
        return response()->json([
            'status' => 'true',
            'data' => $success,
        ]);
    }

    public function update_password(Request $request)
    {
        $validator = Validator::make($request->formDataFields, [
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $old_password = $request->formDataFields['old_password'];
        $password = $request->formDataFields['new_password'];
        $confirm_password = $request->formDataFields['confirm_password'];
        $user = auth()->user();

        if (Hash::check($old_password, $user->password)) {
            if ($password == $confirm_password) {
                $user->password = Hash::make($password);
                $user->save();
                return response()->json([
                    'status' => 'true',
                    'data' => $user,
                ]);
            } else {
                return response()->json([
                    'status' => 'false',
                    'data' => 'password not match',
                ]);
            }
        } else {
            return response()->json([
                'status' => 'false',
                'data' => 'old password not correct',
            ]);
        }
    }
}
