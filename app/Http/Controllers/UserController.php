<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    public function AdminUsers()
    {
        $Users = User::paginate(20);

        return view('Admins/Users', compact('Users'));
    }

    public function AdminUpdateUserForm($id)
    {
        $user = User::where('id', $id)->get()->first();
        return view('Admins/UpdateUser', compact('user'));
    }

    public function AdminUpdateUser(Request $req, $id)
    {
        $validate = $req->validate([
            'name' => ['required', 'min:4', 'max:60'],
            'email' => ['required', 'email', 'max:100'],
            'pic' => ['image', 'nullable']
        ]);
        if ($req->pic != null) {
            $type = explode('.', $req->pic->getClientOriginalName());
            $type = end($type);
//            File::delete('storagepr/ofile-photos/'.$id);
            $profilepic = $id . '.' . $type;
            $req->file('pic')->StoreAs('Public/profile-photos/', $profilepic);
        }

        User::where('id', $id)->update([
            'name' => $req->name,
            'email' => $req->email,
            'profile_photo_path' => 'profile-photos/'.$profilepic,
        ]);
        return redirect()->back()->with('success', 'User Updated Sucess');
    }

    public function deleteUser($id)
    {
        User::where('id', '=', $id)->delete();
        return redirect()->back();
    }

    public
    function CreatePasswordForm()
    {
        return view('Users/CreatePassword');
    }

    public
    function createpassword(UserRequest $req)
    {
        User::where('id', Auth::id())->update([
            'password' => Hash::make($req->password),
        ]);
        return view('/profile');
    }

    /**facebook auth**/
    public
    function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public
    function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $userdb = User::where('email', $user->getEmail())->get()->first();
        if (isset($userdb)) {
            $userid = User::select('id')->where('email', $user->getEmail())->get()->first();
            Auth::guard('web')->loginUsingId($userid->id);
            if ($userdb->password == null) {
                return redirect()->intended('/CreatePassword');

            } else {
                return redirect()->intended('/profile');

            }
        } else {
            User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'created_at' => date('y-m-d h:i:s')
            ]);
            $userid = User::select('id')->where('email', $user->getEmail())->get()->first();
            Auth::guard('web')->loginUsingId($userid->id);
            return redirect()->intended('/CreatePassword');
        }
    }
}
