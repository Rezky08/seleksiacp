<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    private $user_model;
    function __construct()
    {
        $this->user_model = new User();
    }
    public function index(Request $request)
    {
        $data = [
            'title' => "Register | Axioo Class Program"
        ];
        return view('register', $data);
    }
    public function regist(Request $request)
    {
        $rules = [
            'name' => ['required', 'filled'],
            'email' => ['required', 'filled', 'unique:users,email,NULL,id,deleted_at,NULL'],
            'password' => ['required', 'filled', 'confirmed']
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $user_data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        try {
            $user = $this->user_model->firstOrCreate($user_data);
            Auth::login($user);
            return redirect('/dashboard');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            $response = [
                'error' => 'Server Error 500'
            ];
            return redirect()->back()->with($response);
        }
    }
}
