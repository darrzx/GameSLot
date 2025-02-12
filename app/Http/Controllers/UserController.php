<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function showLoginPage(){
        return view('login');
    }

    public function showRegisterPage(){
        return view('register');
    }

    public function signin(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $userCredential = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];

        $remember = $request->has('remember_me');

        if($remember){
            Cookie::queue('rememberedemail', $request->email, time()+604800);
            Cookie::queue('rememberedpassword', $request->password, time()+604800);
        }else{
            Cookie::queue(Cookie::forget('rememberedemail'));
            Cookie::queue(Cookie::forget('rememberedpassword'));
        }

        if (Auth::attempt($userCredential, $remember)) {
            // session(['name' => Auth::User()->name]);
            Session::put('user', Auth::user());
            return redirect('/');
        }else{
            if(User::where('email', $request['email'])->exists()){
                $errors = ['Incorrect password'];
                return redirect('signIn')->withErrors($errors);
            }else{
                $errors = ['Email is not registered!'];
                return redirect('signIn')->withErrors($errors);
            }
        }
    }

    public function signup(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            "password" => "required",
            "gender" => "required",
            "dob" => "required"
        ]);

        $diff = abs(strtotime(now()) - strtotime($request->dob));
        $yearsdiff = floor($diff / (365 * 60 * 60 * 24));

        if ($yearsdiff < 13) {
            return redirect()->back()->withErrors(new MessageBag(['Must be more than 13 years old']));
        }

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $gender = $request->gender;
        $dob = $request->dob;

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'gender' => $gender,
            'dob' => $dob,
            'role_id' => 2
        ]);

        $userCredential = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];

        if (Auth::attempt($userCredential)) {
            return redirect('/');
        }
    }

    public function signout(){
        Auth::logout();
        session()->forget('name');
        session()->forget('user');
        return redirect('/');
    }

    public function showProfilePage(){
        $user = Auth::user();
        return view('profile')->with('user', $user);
    }

    public function updateUser(Request $request){
        if (Auth::user()) {
            $this->validate($request, [
                'name' => 'required',
                "photo" => "image",
                "email" => "required|email|unique:users"
            ]);

            $user = User::find($request->route('id'));
            $user->name = $request->name;
            if ($_FILES['photo']['size'] != 0) {
                $name = $request->file('photo')->getClientOriginalName();
                $request->file('photo')->storeAs('public/User Image', $name);
                $user->image = $name;
            }
            $user->email = $request->email;

            $user->save();

            return redirect('/');
        } else {
            return redirect('/');
        }
    }

    public function updateAccountUser(Request $request){
        if (Auth::user()) {
            $this->validate($request, [
                'oldPassword' => 'required',
                "newPassword" => "required",
                "confirmNewPassword" => "required"
            ]);

            $user = User::find($request->route('id'));
            if (Hash::check($request->oldPassword, $user->password)) {

            }else{
                return redirect()->back()->withErrors(new MessageBag(['Old Password doesn\'t Match!']));
            }
            if ($request->newPassword != $request->confirmNewPassword) {
                return redirect()->back()->withErrors(new MessageBag(['New Password and Confirm New Password doesn\'t Match!']));
            }

            $user->password = Hash::make($request->newPassword);
            $user->save();

            return redirect('/');
        } else {
            return redirect('/');
        }
    }
}
