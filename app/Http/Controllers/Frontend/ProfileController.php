<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Validator;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application profile index page.
     */
    public function index()
    {
        return view('profile.index');
    }

    /**
     * Show the application profile change password page.
     */
    public function security()
    {
        $user = auth()->user();

        $twofactor_enabled = authy()->isEnabled($user);

        return view('profile.security', compact('twofactor_enabled'));
    }

    /**
     * Update profiles.
     */
    public function updateProfile(Request $request)
    {
        $this->user = Auth::user();

        $this->validate($request, [
            'email'     => 'required|email|min:3|unique:users,email,'.Auth::user()->id,
            'name'      => 'required|min:3',
        ]);

        $values = $request->all();
        $this->user->fill($values)->save();

        return redirect()->back()->with('info', trans('startup.notifications.profile.contact_info'));
    }

    /**
     * Update password on profiles.
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $validation = Validator::make($request->all(), [

            'password'     => 'required|hash:'.$user->password,
            'new_password' => 'required|different:password|confirmed',
          ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors());
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('info', trans('startup.notifications.profile.password_update'));
    }

    /**
     * Update profile photo on profiles.
     */
    public function updatePhoto(Request $request)
    {
        $this->user = Auth::user();

        $this->validate($request, [
            'profile_photo' => 'required|mimes:png,jpg,jpeg,gif,svg',
        ]);

        $image = Input::file('profile_photo');
        $filename = $this->user->id.'_'.time().'.'.$image->getClientOriginalExtension();

        $path = public_path('uploads/avatars/'.$filename);

        Image::make($image->getRealPath())->fit(600, 600)->save($path);
        $this->user->profile_photo = $filename;
        $this->user->save();

        return redirect()->back()->with('info', trans('startup.notifications.profile.profile_photo'));
    }
}
