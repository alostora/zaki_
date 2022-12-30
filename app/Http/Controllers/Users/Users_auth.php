<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Repo\User\UserRepo;
use App\Models\User;
use App\Mail\Forget_pass;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class Users_auth extends Controller
{

    public function register(Request $request)
    {

        $validator = UserRepo::UserRegisterValidate($request);
        if ($validator->fails()) {
            return UserRepo::ValidateResponse($validator);
        }

        $validator = $validator->validated();
        unset($validator['confirmPassword']);

        $userr = User::create($validator);
        $data['status'] = true;
        $data['user'] = $userr->makeHidden(['image_url', 'operations'])->makeVisible('image_path');

        return $data;
    }

    public function login(Request $request)
    {

        $validator = UserRepo::UserLoginValidate($request);

        if ($validator->fails()) {

            return UserRepo::ValidateResponse($validator);
        }
        $validator = $validator->validated();

        $user = User::where('email', $validator['email'])->first();

        if (!empty($user)) {

            if (Hash::check($validator['password'], $user->password)) {

                $user->api_token = empty($user->api_token) ? Str::random(50) : $user->api_token;

                $user->save();

                $data['status'] = true;

                $data['user'] = $user->makeVisible(['api_token', 'image_path'])->makeHidden(['image_url', 'operations']);
            } else {

                $data['status'] = false;

                $data['message'] = 'Error_pass';
            }
        } else {

            $data['status'] = false;

            $data['message'] = 'Error_email';
        }
        return $data;
    }

    public function profile()
    {
        if (auth()->guard('api')->check()) {

            $token = auth()->guard('api')->user()->api_token;

            $user = User::where('api_token', $token)->first();

            $data['status'] = true;

            $data['user'] = $user->makeHidden(['image_url', 'operations'])->makeVisible('image_path');
        } else {

            $data['status'] = false;

            $data['message'] = Lang::get('leftsidebar.plz_login');
        }

        return $data;
    }

    public function updateProfile(Request $request)
    {

        $validator = UserRepo::UserUpdateValidate($request);
        if ($validator->fails()) {
            return UserRepo::ValidateResponse($validator);
        }
        $data = $validator->validate();

        $destinationPath = public_path('uploads/users/');

        $token = auth()->guard('api')->user()->api_token;

        $user = User::where('api_token', $token)->first();

        $data['image'] = $user->image;

        if ($request->hasFile('image')) {
            if ($data['image'] != "defaultLogo.png") {
                File::delete($destinationPath . $data['image']);
            }
            $data['image'] = UserRepo::ChangeUserImage($request->file('image'), $destinationPath);
        }

        $user->update($data);

        $info['status'] = true;

        $info['user'] = $user->makeHidden(['image_url', 'operations'])->makeVisible('image_path');

        return $info;
    }

    public function postForgetPass(Request $request)
    {

        $validator = UserRepo::UserForgetPassValidate($request);
        if ($validator->fails()) {
            return UserRepo::ValidateResponse($validator);
        }
        $validator = $validator->validate();

        $user = User::where('email', $validator['email'])->first();
        if (!empty($user)) {
            $user->verify_token = Str::random(50);
            $user->save();

            Mail::to($user->email)->send(new Forget_pass($user));
            $data['status'] = true;
            $data['message'] = 'email sent successfully';
        } else {
            $data['status'] = false;
            $data['message'] = 'email not found';
        }

        return $data;
    }

    public function changePassword(Request $request)
    {

        $validator = UserRepo::UserChangePassValidate($request);
        if ($validator->fails()) {
            return UserRepo::ValidateResponse($validator);
        }
        $validator = $validator->validate();

        $password = Hash::make($validator['password']);

        $token = auth()->guard('api')->user()->api_token;

        User::where('api_token', $token)->update(['password' => $password]);

        $data['status'] = true;

        $data['message'] = 'password changed successfully';

        return $data;
    }

    public function logOut()
    {

        $token = auth()->guard('api')->user()->api_token;

        User::where('api_token', $token)->update(['api_token' => null]);

        $data['status'] = true;

        $data['message'] = Lang::get('leftsidebar.Logged_out');

        return $data;
    }
}
