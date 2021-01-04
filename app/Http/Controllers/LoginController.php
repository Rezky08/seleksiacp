<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    private $user_model;
    function __construct()
    {
        $this->user_model = new User();
    }
    public function index()
    {
        $data = [
            'title' => "Login | Axioo Class Program"
        ];
        return view('login', $data);
    }
    public function login(Request $request)
    {
        $rules = [
            'email' => ['required', 'filled', 'exists:users,email,deleted_at,NULL'],
            'password' => ['required', 'filled']
        ];
        $message = [
            'email.exists' => 'Email or password is invalid'
        ];
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $user = $this->user_model->where('email', $request->email)->first();
        if (Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect('/dashboard');
        } else {
            $errors  = [
                'email' => 'Email or password is invalid'
            ];
            return redirect()->back()->withErrors($errors)->withInput();
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
