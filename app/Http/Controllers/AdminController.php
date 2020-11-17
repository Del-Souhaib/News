<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Models\Category_visit;
use App\Models\Post;
use App\Models\Post_visit;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function LoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect('/Admins/Home');
        } else {
            return view('Admins/Login');
        }
    }

    public function Login(AdminRequest $req)
    {
        $credentials = $req->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('/Admins/Home');
        } else {
            $error = 'email or password inccorect';
            return redirect()->back()->withErrors($error)->withInput(['email']);
        }
    }

    public function home()
    {

        $users = User::select(DB::raw('count(*) as nb,date(created_at) as date2'))->groupBy(DB::raw('date(created_at)'))->get();

         $news=Post_visit::select(DB::raw('post_id,count(*) as nb'))->groupBy('post_id')->limit(10)->get();

        $count = 1;
        $data = ('');
        for ($i = 0; $i <= 6; $i++) {
            $date = date('d-m-Y');
            $date = strtotime($date . '-' . $count . 'days');
            $date = date('d-m-Y', $date);
            $data = ($data . $date . '|');
            $count++;

        }
        $data = explode('|', $data);

        $categoriesvisits = Category_visit::select('category', DB::raw('count(*) as nb'))->groupBy('category')->get();

        return view('Admins/Home', compact(['data', 'categoriesvisits', 'users','news']));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/Admins/Login');
    }

    public function profileform()
    {
        $admin = Auth::guard('admin')->user();
        return view('Admins/Profile', compact('admin'));
    }

    public function updateinformation(Request $req)
    {
        $validate = $req->validate([
            'name' => ['required', 'min:3', 'max:30'],
            'email' => ['required', 'email', 'max:30']
        ]);
        Admin::where('id', '=', Auth::guard('admin')->id())->update([
            'name' => $req->name,
            'email' => $req->email,
        ]);
        return redirect()->back()->with('infoupdated', 'good');
    }

    public function updatepassword(Request $req)
    {
        $validate = $req->validate([
            'oldpassword' => ['password:admin', 'required', 'min:8', 'max:200'],
            'password' => ['required', 'min:8', 'max:200', 'confirmed'],

        ]);
        $newpass = Hash::make($req->password);
        Admin::where('id', '=', Auth::guard('admin')->id())->update([
            'password' => $newpass
        ]);
        return redirect()->back()->with('good', 'password chanched success');

    }
}
